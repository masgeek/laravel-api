<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomTypePrice extends Model
{
    protected $fillable = [
        'room_type_id',
        'room_price'
    ];
}
