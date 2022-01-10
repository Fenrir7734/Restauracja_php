<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function index()
    {
        $account = User::find(\Auth::user()->id);
        return view('account_details', ['account' => $account]);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'password' => 'required',
            'new_password' => 'required|min:8',
            'new_password_again' => 'required'
        ]);

        if (!Hash::check($request->password, auth()->user()->password)) {
            return \redirect()->back()->withErrors(['password' => 'Nieprawidłowe hasło']);
        }

        if ($request->new_password !== $request->new_password_again) {
            return \redirect()->back()->withErrors(['new_password' => 'Podane hasła się nie zgadzają']);
        }

        User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);

        return redirect()->back()->with('message', 'Hasło zostało zmienione');
    }
}
