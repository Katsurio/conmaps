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

    /**
     * Store contact
     *
     * @param array $data
     * @return void
     */
    public static function storeContact($data)
    {
        Contact::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'birthday' => date('Y-m-d', strtotime($data['birthday'])),
            'address' => $data['address'],
            'city' => $data['city'],
            'state' => $data['state'],
            'zip' => $data['zip'],
        ]);
    }

    /**
     * Update contact
     *
     * @param array $data
     * @return void
     */
    public function updateContact($data)
    {
        $this->update([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'birthday' => date('Y-m-d', strtotime($data['birthday'])),
            'address' => $data['address'],
            'city' => $data['city'],
            'state' => $data['state'],
            'zip' => $data['zip'],
        ]);
    }

}
