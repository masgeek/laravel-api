<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class HotelRoom
 *
 * @property RoomType $roomType
 * @property Hotel $hotel
 * @property integer $id
 * @property  object $image
 * @property  string $room_name
 * @package App
 */
class HotelRoom extends Model
{
    protected $guarded = [
        'image'
    ];
    protected $fillable = [
        'hotel_id',
        'room_type_id',
        'room_name'
    ];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function roomType()
    {
        return $this->belongsTo(RoomType::class);
    }
}
