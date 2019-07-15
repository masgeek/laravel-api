<?php

namespace App\Http\Resources;

use App\HotelRoom;
use App\Http\Requests\HotelBookingRequest;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property integer $id
 * @property string $start_date
 * @property integer $room_id
 * @property integer $total_nights
 * @property float $total_cost
 * @property string $end_date
 * @property string $customer_names
 * @property string $customer_email
 * @property HotelRoom room
 */
class HotelBookingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param HotelBookingRequest $request
     * @return array
     */
    public function toArray($request)
    {
        $this->room->roomType;

        return [
            'id' => $this->id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'customer_names' => $this->customer_names,
            'customer_email' => $this->customer_email,
            'total_nights' => $this->total_nights,
            'total_cost' => $this->total_cost,
            'hotelRoomId' => $this->room->id,
        ];
    }
}
