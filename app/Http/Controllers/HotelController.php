<?php

namespace App\Http\Controllers;

use App\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index()
    {
        $hotels = Hotel::all();

        return response()->json($hotels);
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

    public function show(Hotel $hotel)
    {
        return $hotel;
    }

    public function update(Request $request, Hotel $hotel)
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

        $hotel->update($request->all());

        return response()->json([
            'message' => 'Success! Hotel updated',
            'task' => $hotel
        ]);
    }

    public function destroy(Hotel $hotel)
    {
        $hotel->delete();

        return response()->json([
            'message' => 'Successfully deleted hotel!'
        ]);
    }
}
