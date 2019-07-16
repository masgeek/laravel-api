<?php

namespace App\Http\Resources;

use App\RoomType;
use App\RoomTypePrice;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property RoomTypePrice $price
 * @property integer $id
 * @property string $room_type_name
 */
class RoomTypeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent=>=>toArray($request);
        return [
            "id" => $this->id,
            "room_type_name" => $this->room_type_name,
            'currency' => $this->price != null ? $this->price->currency : 'USD',
            'room_price' => $this->price != null ? $this->price->room_price : 0,
        ];
    }
}
