<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelRoom extends Model
{
    protected $fillable = [
        'hotel_id',
        'room_type_id',
        'image'
    ];
}
