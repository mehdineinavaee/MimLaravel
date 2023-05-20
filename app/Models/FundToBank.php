<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FundToBank extends Model
{
    use HasFactory;
    public $fillable = ['bank', 'form_date', 'form_number', 'cash_amount', 'considerations'];
}
