<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleModel extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'vehicleregister';

    protected $fillable=[
       
        'customer_name',
        'customer_telephone',
        'province',

        'vehicle_model',
        'vehicle_number',
        'vehicle_type',

        'vehicle_year',
        'Address_one',
        'Address_two',
        
    ];
}
