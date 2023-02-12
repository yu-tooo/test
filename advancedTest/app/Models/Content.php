<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname', 'gender', 'email', 'postcode', 'address', 'building_name', 'opinion'
    ];
}
