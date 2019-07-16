<?php

namespace App\Http\Controllers;

use App\HotelRoom;
use App\Http\Requests\HotelRoomRequest;
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
     * @param HotelRoomRequest $request
     * @return Response
     */
    public function store(HotelRoomRequest $request)
    {
        $imageSrc = $request->pictures['src'];
        $hotelRoom = new HotelRoom();
        $hotelRoom->fill($request->all());
        $hotelRoom->image = $imageSrc;

        $request->validated();
        $hotelRoom->save();

        return response()->json($hotelRoom);
    }

    /**
     * Display the specified resource.
     *
     * @param HotelRoom $hotelRoom
     * @return Response
     */
    public function show($id)
    {
        $hotelRoom = HotelRoom::find($id);
        return response()->json($hotelRoom);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return Response
     */
    public function update(HotelRoomRequest $request, $id)
    {
        $hotelRoom = HotelRoom::find($id);

        $request->validated();
        $room = $hotelRoom->update($request->all());

        return response()->json($room);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Response
     */
    public function destroy($id)
    {
        $hotelRoom = HotelRoom::findOrFail($id);

        $hotelRoom->delete();

        return response()->json([]);
    }
}
