<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employee';

    protected $fillable = [
        'name',
        'age',
        'email',
        'gender',
        'phone_number',
        'govid',
        'idno',
        'gardian',
        'gardian_name',
        'address',
        'country',
        'state',
        'city',
        'pincode',
        'occuppation',
        'Religion',
        'marital_status',
        'gardian_name',
        'bood_group',
        'nationality',
        'emergency_con'
    ];
}
