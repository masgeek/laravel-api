<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $total_nights
 * @property float $total_cost
 */
class HotelBooking extends Model
{
    protected $guarded = [
        'total_nights',
        'total_cost'
    ];
    protected $fillable = [
        'room_id',
        'start_date',
        'end_date',
        'customer_names',
        'customer_email',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }


    public function room()
    {
        return $this->belongsTo('App\HotelRoom');
    }

    public function hotel()
    {
        return $this->hasOne(Hotel::class);
    }
}
