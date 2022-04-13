<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'model',
        'outlet',
        'description',
        'purchase_time',
        'loan_amount',
        'loan_tenure',
    ];
}
