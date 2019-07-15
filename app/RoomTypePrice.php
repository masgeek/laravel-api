<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string currency
 * @property float room_price
 */
class RoomTypePrice extends Model
{
    protected $guarded = [
        'currency'
    ];
    protected $fillable = [
        'room_type_id',
        'room_price'
    ];

    public function roomType()
    {
        return $this->belongsTo('App\RoomType');
    }
}
