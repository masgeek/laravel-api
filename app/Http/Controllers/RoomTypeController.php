<?php

namespace App\Http\Controllers;

use App\RoomType;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $rooms = RoomType::all();

        return response()->json(
            $rooms, 200)
            ->header('X-Total-Count', $rooms->count());
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

        return response()->json([
            'message' => 'Success! New room type created',
            'data' => $roomType
        ]);
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
        return response()->json([
            'message' => 'Room type',
            'data' => $roomType
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
            'room_type_name' => 'required',
        ]);

        $roomType = RoomType::find($id);
        $roomType->update($request->all());

        return response()->json([
            'message' => 'Success! Room type updated',
            'data' => $roomType
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param RoomType $roomType
     * @return Response
     */
    public function destroy(RoomType $roomType)
    {
        //
    }
}
