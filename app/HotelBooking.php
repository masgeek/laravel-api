<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelBooking extends Model
{
    protected $fillable = [
        'room_id',
        'start_date',
        'end_date',
        'customer_names',
        'customer_email',
        'total_nights',
        'total_cost'
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
