<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'email',
        'phone',
        'outlet',
        'model',
        'message',
        'pick_up',
        'service_type',
        'customer_address',
        'rating',
        'form_type',
    ];
}
