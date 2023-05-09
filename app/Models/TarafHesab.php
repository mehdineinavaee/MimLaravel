<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TarafHesab extends Model
{
    use HasFactory;
    protected $fillable = [
        'code', 'fullname', 'tel', 'phone', 'seller', 'buyer', 'middleman', 'address', 'active', 'introduce-date', 'national-code', 'economic-code', 'zip-code', 'province', 'city', 'broker', 'commission', 'person-type', 'ceo-fullname', 'birthdate', 'occupation', 'fax', 'activity-type', 'email', 'website', 'credit-limit'
    ];
}
