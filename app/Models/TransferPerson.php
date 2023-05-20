<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransferPerson extends Model
{
    use HasFactory;
    public $fillable = ['from_taraf_hesab', 'to_taraf_hesab', 'form_date', 'form_number', 'cash_amount', 'considerations'];
}
