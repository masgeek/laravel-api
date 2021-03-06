<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = [
        'name',
        'address',
        'city',
        'state',
        'country',
        'zip_code',
        'phone_number',
        'email',
        'image' /* should we pass base encoded data here, will make it easier for reading to front end and no url changes if domain varies*/
    ];
}
