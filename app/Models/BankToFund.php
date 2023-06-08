<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankToFund extends Model
{
    use HasFactory;
    // public $table = "bank_to_funds";
    public $fillable = ['form_date', 'form_number', 'cash_amount', 'considerations1', 'date', 'deposit_amount', 'wage', 'issue_tracking', 'considerations2'];

    public function bank_type()
    {
        return $this->belongsTo(BankType::class);
    }

    public function bank_account()
    {
        return $this->belongsTo(BankAccount::class);
    }
}
