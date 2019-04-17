<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    /**
     * Fill database values
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'birthday',
        'address',
        'city',
        'state',
        'zip'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'birthday'
    ];




}
