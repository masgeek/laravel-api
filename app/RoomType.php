<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property RoomTypePrice $price
 */
class RoomType extends Model
{
    protected $fillable = [
        'room_type_name'
    ];

    public function price()
    {
        return $this->hasOne(RoomTypePrice::class);
    }
}
