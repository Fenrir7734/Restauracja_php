<?php

namespace App\Http\Controllers;

use App\Models\Bookings;
use Illuminate\Http\Request;

class AdminBookingController extends Controller
{
    public function index()
    {
        $p_filters = ['0', '1', '2', '3', '4'];
        $p_sort = ['booking_on_date', 'id'];
        $p_direction = ['asc', 'desc'];

        if (!in_array(\request()->get('filter'), $p_filters) ||
            !in_array(\request()->get('sort'), $p_sort) ||
            !in_array(\request()->get('direction'), $p_direction)) {
            return redirect()->route('preview-admin-booking', ['filter' => '0', 'sort' => 'booking_on_date', 'direction' => 'asc']);
        }

        $filter = \request()->get('filter') != '0' ? ['status', '=', \request()->get('filter')] : ['status', '!=', '0'];
        $sort = \request()->get('sort');
        $direction = \request()->get('direction');

        $bookings = Bookings::where([
            ['user_id', '=', \Auth::user()->id],
            $filter
        ])
            ->orderBy($sort, $direction)
            ->paginate(10);

        return view('/admin/booking_preview', ['bookings' => $bookings]);
    }

    public function edit($id)
    {
        $booking = Bookings::find($id);
        return view('admin/booking_edit', ['booking' => $booking]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'first-name' => [
                'required',
                'min:3',
                'max:40',
                'regex:/^[A-ZĘĄŚŁŻŹĆŃÓ][ a-zA-ZęąśłżźćńóĘĄŚŁŻŹĆŃÓ]{1,20}$/'
            ],
            'last-name' =>  [
                'required',
                'min:3',
                'max:40',
                'regex:/^[A-ZĘĄŚŁŻŹĆŃÓ][ a-zA-ZęąśłżźćńóĘĄŚŁŻŹĆŃÓ-]{1,40}$/'
            ],
            'mail' => [
                'required',
                'max:255',
                'email'
            ],
            'phone' => [
                'required',
                'min:9',
                'regex:/^(\+[0-9]{2})?[0-9]{3}[-]?[0-9]{3}[-]?[0-9]{3}$/'
            ],
            'people' => [
                'required',
                'between:1,99'
            ],
            'booking-date' => [
                'required',
                'date',
                'after:yesterday',
            ],
        ]);

        $booking = Bookings::find($id);

        $booking->first_name = $request->get('first-name');
        $booking->last_name = $request->get('last-name');
        $booking->email = $request->mail;
        $booking->phone = $request->phone;
        $booking->booking_on_date = $request->get('booking-date');
        $booking->number_of_people = $request->people;
        $booking->status = $request->status;
        $booking->description = $request->note;

        if ($booking->save()) {
            return redirect()->route('preview-admin-booking');
        }
        return redirect('error');
    }

    public function destroy($id)
    {
        $booking = Bookings::find($id);
        if ($booking->delete()) {
            return redirect()->route('preview-admin-booking');
        }
        return redirect('error');
    }
}
