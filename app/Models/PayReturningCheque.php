<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayReturningCheque extends Model
{
    use HasFactory;
    public $fillable = ['form_date', 'form_number', 'serial_number', 'total', 'wage', 'due_date', 'bank_account_details', 'receiver', 'considerations'];
}
