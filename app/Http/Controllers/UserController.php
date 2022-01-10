<?php

namespace App\Http\Controllers;

use App\Models\User;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Nette\Utils\DateTime;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'asc')->paginate(10);
        return view('/admin/user_preview', ['users' => $users]);
    }

    public function edit($id)
    {
        if($id == auth()->user()->id) {
            return redirect()->back()->withErrors(['msg' => "Nie możesz edytować swojego własnego konta"]);
        }

        $user = User::find($id);
        return view('admin/user_edit', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        if($id == auth()->user()->id) {
            return redirect()->back()->withErrors(['msg' => "Nie możesz edytować swojego własnego konta"]);
        }

        $user = User::find($id);
        if ($user->email == $request->email) {
            $this->validate($request, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255'],
            ]);
        } else {
            $this->validate($request, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            ]);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_as = $request->role;

        if ($user->save()) {
            return redirect()->route('preview-user');
        }
        return redirect('error');
    }

    public function verify($id) {
        if($id == auth()->user()->id) {
            return redirect()->back()->withErrors(['msg' => "Nie możesz zweryfikować swojego własnego konta"]);
        }

        $user = User::find($id);

        if ($user->email_verified_at) {
            return redirect()->back()->with(['msg' => "To konto jest już zweryfikowane"]);
        }

        $tz = 'Europe/Warsaw';
        $timestamp = time();
        $dt = new DateTime("now", new DateTimeZone($tz));
        $dt->setTimestamp($timestamp);

        $user->email_verified_at = $dt->format("Y-m-d H:m:s");

        if ($user->save()) {
            return redirect()->back()->with(['msg' => "Konto zostało zweryfikowane"]);
        }
        return redirect('error');
    }

    public function resetPassword($id) {
        if($id == auth()->user()->id) {
            return redirect()->back()->withErrors(['msg' => "Nie możesz zweryfikować swojego własnego konta"]);
        }

        $user = User::find($id);
        $token = Password::createToken($user);

        $user->sendPasswordResetNotification($token);
        return redirect()->back()->with(['msg' => "Hasło zostało zresetowane"]);
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if($id == auth()->user()->id) {
            return redirect()->back()->withErrors(['msg' => "Nie możesz usunąć swojego własnego konta"]);
        }

        if($user->delete()) {
            return redirect()->route('preview-user');
        }
        return \redirect('error');
    }
}
