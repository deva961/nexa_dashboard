<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'model',
        'registration_no',
        'registration_year',
        'policy_no',
        'insurance_company',
        'insurance_expiry_date',
        'claim',
    ];
}
