<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankToFund extends Model
{
    use HasFactory;
    public $fillable = ['bank', 'form_date', 'form_number', 'cash_amount', 'considerations1', 'date', 'bank_account_details', 'deposit_amount', 'wage', 'issue_tracking', 'considerations2'];
}
