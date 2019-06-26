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
    ];
}
