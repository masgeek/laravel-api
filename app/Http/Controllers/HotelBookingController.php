<?php

namespace App\Http\Controllers;

use App\HotelBooking;
use Illuminate\Http\Request;

class HotelBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = HotelBooking::all();

        return response()->json($bookings);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'customer_names' => 'required',
            'customer_email' => 'required'
        ]);

        $booking = HotelBooking::created($request->all());

        return response()->json([
            'message' => 'Success! New booking made',
            'booking' => $booking
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\HotelBooking $hotelBooking
     * @return \Illuminate\Http\Response
     */
    public function show(HotelBooking $hotelBooking)
    {
        return response()->json([
            'message' => 'Success! New booking made',
            'booking' => $hotelBooking
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\HotelBooking $hotelBooking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HotelBooking $hotelBooking)
    {
        $request->validate([
            'room_id' => 'nullable',
            'start_date' => 'nullable',
            'end_date' => 'nullable',
            'customer_names' => 'nullable',
            'customer_email' => 'nullable'
        ]);

        $hotelBooking->update($request->all());

        return response()->json([
            'message' => 'Success! Hotel booking updated',
            'task' => $hotelBooking
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\HotelBooking $hotelBooking
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(HotelBooking $hotelBooking)
    {
        $hotelBooking->delete();

        return response()->json([
            'message' => 'Successfully deleted hotel!'
        ]);
    }
}
