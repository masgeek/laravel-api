<?php

namespace App\Http\Controllers;

use App\HotelBooking;
use App\Http\Requests\HotelBookingRequest;
use App\Http\Resources\HotelBookingResource;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class HotelBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        $bookings = HotelBooking::with(['user', 'room', 'room.roomType', 'room.hotel'])->get();

        return HotelBookingResource::collection($bookings);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param HotelBookingRequest $request
     * @return Response
     */
    public function store(HotelBookingRequest $request)
    {
        $validated = $request->validated();

        $booking = HotelBooking::create($request->all());

        return (new HotelBookingResource($booking))
            ->response()
            ->setStatusCode(201);
        

        return response()->json([
            'message' => 'Success! New booking made',
            'data' => $booking
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
        $hotelBooking = HotelBooking::with(['user', 'room', 'room.roomType'])->find($id);
        return response()->json([
            'message' => 'Success',
            'data' => $hotelBooking
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
            'room_id' => 'nullable',
            'start_date' => 'nullable',
            'end_date' => 'nullable',
            'customer_names' => 'nullable',
            'customer_email' => 'nullable'
        ]);

        $hotelBooking = HotelBooking::find($id);
        $hotelBooking->update($request->all());

        return response()->json([
            'message' => 'Success! Hotel booking updated',
            'data' => $hotelBooking
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Response
     */
    public function destroy($id)
    {
        $hotelBooking = HotelBooking::find('id', $id);
        $hotelBooking->delete();

        return response()->json([
            'message' => 'Successfully deleted hotel!',
            'data' => []
        ]);
    }
}
