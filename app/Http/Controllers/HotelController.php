<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\Http\Requests\HotelRequest;
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
        $hotel = $this->loadHotel($id);
        return response()->json($hotel);
    }

    public function update(HotelRequest $request, $id)
    {
        $imageSrc = $request->pictures['src'];

        $hotel = $this->loadHotel($id);

        $hotel->fill($request->all());
        $hotel->image = $imageSrc;

        $request->validated();

        $hotel->save();

        return response()->json($hotel);
    }

    public function destroy($id)
    {
        $hotel = $this->loadHotel($id);
        $hotel->delete();
        return response()->json([]);
    }

    /**
     * @param $id
     * @return mixed
     */
    private function loadHotel($id)
    {
        return Hotel::findOrFail($id);
    }
}
