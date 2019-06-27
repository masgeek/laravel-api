<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomTypePrice extends Model
{
    protected $fillable = [
        'room_type_id',
        'room_price'
    ];

    public function roomType()
    {
        return $this->belongsTo('App\RoomType');
    }
}
