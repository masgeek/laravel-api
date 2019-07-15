<?php

namespace App\Http\Controllers;

use App\Http\Resources\HotelBookingResource;
use App\Http\Resources\RoomTypeResource;
use App\RoomType;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $rooms = RoomType::all();

        $response = RoomTypeResource::collection($rooms)
            ->response()
            ->header('X-Total-Count', $rooms->count());

        return $response;
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
            'room_type_name' => 'required',
        ]);

        $roomType = RoomType::create($request->all());

        return response()->json($roomType);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return Response
     */
    public function show($id)
    {
        $roomType = RoomType::find($id);
        return response()->json($roomType);
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
            'room_type_name' => 'required',
        ]);

        $roomType = RoomType::find($id);
        $roomType->update($request->all());

        return response()->json($roomType);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Response
     */
    public function destroy($id)
    {
        $roomType = RoomType::findOrFail($id);

        $roomType->delete();

        return response()->json([]);
    }
}
