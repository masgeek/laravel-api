<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\RoomTypePrice;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index()
    {
        $hotels = Hotel::all();

        return response()->json(
            $hotels
        , 200) ->header('X-Total-Count', $hotels->count());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'zip_code' => 'required',
            'phone_number' => 'required',
            'email' => 'required',
            'image' => 'required',
        ]);

        $hotel = Hotel::create($request->all());

        return response()->json([
            'message' => 'Success! New hotel created',
            'hotel' => $hotel
        ]);
    }

    public function show($id)
    {
        $hotel = Hotel::all()->find($id);
        return response()->json([
            'message' => 'Success!',
            'data' => $hotel
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'nullable',
            'address' => 'nullable',
            'city' => 'nullable',
            'state' => 'nullable',
            'country' => 'nullable',
            'zip_code' => 'nullable',
            'phone_number' => 'nullable',
            'email' => 'nullable',
            'image' => 'nullable',
        ]);
        $hotel = Hotel::find($id);

        $hotel->update($request->all());

        return response()->json([
            'message' => 'Success! Hotel updated',
            'data' => $hotel
        ]);
    }

    public function destroy($id)
    {
        $hotel = Hotel::find('id', $id);
        $hotel->delete();

        return response()->json([
            'message' => 'Successfully deleted hotel!',
            'data' => []
        ]);
    }
}
