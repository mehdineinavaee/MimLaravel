<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;
    public $fillable = ['form_number', 'form_date', 'place', 'mark_back', 'serial_number', 'total', 'due_date', 'bank_account_details', 'payer'];
}
