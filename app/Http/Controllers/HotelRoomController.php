<?php

namespace App\Http\Controllers;

use App\HotelRoom;
use Illuminate\Http\Request;

class HotelRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = HotelRoom::all();

        return response()->json($rooms);
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
            'hotel_id' => 'required',
            'room_type_id' => 'required',
            'image' => 'required'
        ]);

        $room = HotelRoom::create($request->all());

        return response()->json([
            'message' => 'Room created successfully',
            'room' > $room
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\HotelRoom $hotelRoom
     * @return \Illuminate\Http\Response
     */
    public function show(HotelRoom $hotelRoom)
    {
        return response()->json([
            'message' => 'Room details',
            'room' => $hotelRoom
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\HotelRoom $hotelRoom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HotelRoom $hotelRoom)
    {
        $request->validate([
            'hotel_id' => 'required',
            'room_type_id' => 'required',
            'image' => 'required'
        ]);

        $room = $hotelRoom->update($request->all());

        return response()->json([
            'message' => 'Room updated successfully',
            'room' > $room
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\HotelRoom $hotelRoom
     * @return \Illuminate\Http\Response
     */
    public
    function destroy(HotelRoom $hotelRoom)
    {
        //
    }
}
