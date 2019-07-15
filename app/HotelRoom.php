<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class HotelRoom
 *
 * @property RoomType $roomType
 * @property Hotel $hotel
 * @property integer $id
 * @package App
 */
class HotelRoom extends Model
{
    protected $fillable = [
        'hotel_id',
        'room_type_id',
        'room_name',
        'image'
    ];

    public function hotel()
    {
        return $this->belongsTo('App\Hotel');
    }

    public function roomType()
    {
        return $this->belongsTo('App\RoomType');
    }
}
