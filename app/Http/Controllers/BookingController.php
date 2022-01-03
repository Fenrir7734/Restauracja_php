<?php

namespace App\Http\Controllers;

use App\Models\Bookings;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Bookings::all();
        return view('/booking_history', ['bookings' => $bookings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/booking');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $d = $request->get('booking-date');
        echo "<script>console.log($d)</script>";

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
            'time' => [
                'required',
                'date_format:H:i',
                'after:time_start'
            ]
        ]);

        $d = DateTime::createFromFormat('Y-m-d H:i', $request->get('booking-date') . " " . $request->time);
        $tz = 'Europe/Warsaw';
        $timestamp = time();
        $dt = new DateTime("now", new DateTimeZone($tz));
        $dt->setTimestamp($timestamp);

        if ($d < $dt) {
            return redirect()->back()->withErrors(['booking-date' => 'Niepoprawna data'])->withInput();
        }

        $phone = str_replace("-", "",$request->get('phone'));
        if (str_starts_with($phone, "+")) {
            $phone = substr($phone, 3);
        }

        $bookings = new Bookings();
        $bookings->first_name = $request->get('first-name');
        $bookings->last_name = $request->get('last-name');
        $bookings->email = $request->mail;
        $bookings->phone = $phone;
        $bookings->number_of_people = $request->people;
        $bookings->status = 1;
        $bookings->description = $request->note;
        $bookings->booking_on_date = $request->get('booking-date') . " " . $request->time;
        $bookings->booking_send_date =  $dt->format("Y-m-d H:i:s");
        $bookings->user_id = \Auth::user() ? \Auth::user()->id : null;

        if ($bookings->save()) {
            return redirect('booking-complete');
        }
        return \redirect('error');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $booking = Bookings::find($id);
        return view('/booking_details', ['booking' => $booking]);
    }

    public function cancel($id) {
        $booking = Bookings::find($id);
        $booking->status = 4;

        if ($booking->save()) {
            return redirect()->back();
        }
        return \redirect('error');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
