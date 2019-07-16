<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\RoomTypePrice;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index()
    {
        $hotels = Hotel::all();

        return response()->json($hotels)
            ->header('X-Total-Count', $hotels->count());
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

        return response()->json($hotel);
    }

    public function show($id)
    {
        $hotel = Hotel::findOrFail($id);
        return response()->json($hotel);
    }

    public function update(Request $request, $id)
    {
        $image = $request->pictures;

        $data = [
            'h' => is_array($image),
            'b' => $image['src']
        ];

        return response()->json($data);

        $hotel = Hotel::find($id);

        $hotel->update($request->all());

        return response()->json($hotel);
    }

    public function destroy($id)
    {
        $hotel = Hotel::find('id', $id);
        $hotel->delete();

        return response()->json([]);
    }
}
