<?php

namespace App;

use Carbon\Carbon;
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

    protected $dates = [
        'dob'
    ];

    protected $casts = [
        'wage' => 'double'
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function getDobAttribute($value) {
        return \Carbon\Carbon::parse($value)->format('d/m/Y');
    }


}
