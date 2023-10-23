<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class issuesAddModel extends Model
{
    use HasFactory;

    protected $table = 'issues_list';

    protected $fillable=[
       
        'service_name',
        'telephone',
        'issue_status',

        'price',
        'comment',
        'invoice_status',

        'batch_number',
        'created_at',
        'updated_at',
        
    ];
}
