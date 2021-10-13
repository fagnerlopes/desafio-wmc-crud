<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'name',
        'city_id',
        'address',
        'number',
        'neighborhood',
        'address_details',
        'postal_code',
        'cpf',
        'rg',
        'phone',
        'cell_phone',
        'dob',
        'email',
        'wage'
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
