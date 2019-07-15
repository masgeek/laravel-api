<?php

namespace App\Http\Controllers;

use App\HotelRoom;
use App\Http\Resources\HotelBookingResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HotelRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $rooms = HotelRoom::with(['hotel', 'roomType'])->get();

        return response(
            $rooms
        )->header('X-Total-Count', $rooms->count());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
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
            'data' => $room,
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param HotelRoom $hotelRoom
     * @return Response
     */
    public function show($id)
    {
        $hotelRoom = HotelRoom::with(['hotel', 'roomType'])->find($id);
        return response()->json([
            'message' => 'Hotel rooms',
            'data' => $hotelRoom
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'hotel_id' => 'required',
            'room_type_id' => 'required',
            'image' => 'required'
        ]);

        $hotelRoom = HotelRoom::find($id);

        $room = $hotelRoom->update($request->all());

        return response()->json([
            'message' => 'Room updated successfully',
            'room' > $room
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param HotelRoom $hotelRoom
     * @return Response
     */
    public
    function destroy(HotelRoom $hotelRoom)
    {
        //
    }
}
