<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'role',
        'userId',
        'last',
        'first',
        'middle',
        'status',
        'email',
        'phone',
        'job',
        'sss',
        'philhealth',
        'pagibig',
        'rate',
        'address',
        'eName',
        'ePhone',
        'eAdd',
        'created_by',
        'image',
    ];

    public function image()
    {
        return $this->hasOne(Image::class);
    }
}
