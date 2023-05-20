<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankToBank extends Model
{
    use HasFactory;
    public $fillable = ['from_bank', 'to_bank', 'form_date', 'form_number', 'cash_amount', 'considerations1', 'date', 'bank_account_details', 'deposit_amount', 'wage', 'issue_tracking', 'considerations2'];
}
