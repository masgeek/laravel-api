<?php

namespace App\Http\Controllers;

use App\RoomType;
use App\RoomTypePrice;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RoomTypePriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $prices = RoomTypePrice::with(['roomType'])->get();
        return response()->json([
            'message' => 'Success!',
            'data' => $prices
        ], 200);
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
            'room_type_id' => 'required:integer',
            'room_price' => 'required:float',
        ]);
        $price = RoomTypePrice::create($request->all());

        return response()->json([
            'message' => 'Success! New room type price added',
            'data' => $price
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
        $roomTypePrice = RoomTypePrice::with(['roomType'])->find($id);
        return response()->json([
            'message' => 'Success!',
            'data' => $roomTypePrice
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
            'room_type_id' => 'required',
            'room_price' => 'required',
        ]);

        $roomTypePrice = RoomTypePrice::find($id);
        $roomTypePrice->update($request->all());

        return response()->json([
            'message' => 'Success! Room type price updated',
            'data' => $roomTypePrice
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return void
     */
    public function destroy($id)
    {
        //
    }
}
