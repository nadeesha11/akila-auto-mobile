<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class servicesModel extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'services';

    protected $fillable=[
       
        'service'
        
    ];




}
