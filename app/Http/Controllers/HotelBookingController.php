<?php

namespace App\Http\Controllers;

use App\HotelBooking;
use App\Http\Requests\HotelBookingRequest;
use App\Http\Resources\HotelBookingResource;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class HotelBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $bookings = HotelBooking::with(['user', 'room', 'room.roomType', 'room.hotel'])->get();

        //return HotelBookingResource::collection($bookings);

        $response = HotelBookingResource::collection($bookings)
            ->response()
            ->header('X-Total-Count', $bookings->count());

        return $response;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param HotelBookingRequest $request
     * @return JsonResponse
     */
    public function store(HotelBookingRequest $request)
    {

        $validated = $request->validated();

        $startDate = strtotime($request->start_date);
        $endDate = strtotime($request->end_date);
        $datediff = $endDate - $startDate;

        $numberOfDays = round($datediff / (60 * 60 * 24));

        $book = new HotelBooking();
        $book->fill($request->all());
        //$book->total_nights = $numberOfDaays;

//        var_dump($request);


        return $this->sendError(is_array($request), $book);


        $booking = HotelBooking::create($request->all());

        return (new HotelBookingResource($booking))
            ->response();
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return JsonResponse
     */
    public function show($id)
    {
        $hotelBooking = HotelBooking::with(['user', 'room', 'room.roomType'])->findOrFail($id);

        return (new HotelBookingResource($hotelBooking))
            ->response();
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

        $hotelBooking = HotelBooking::findOrFail($id);
        $hotelBooking->update($request->all());

        return response()->json($hotelBooking);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Response
     */
    public function destroy($id)
    {
        $hotelBooking = HotelBooking::findOrFail('id', $id);
        $hotelBooking->delete();

        return response()->json([
            'message' => 'Successfully deleted hotel!',
            'data' => []
        ]);
    }
}
