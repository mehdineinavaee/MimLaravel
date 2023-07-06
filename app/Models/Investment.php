<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    use HasFactory;
    public $fillable = ['shareholder', 'form_date', 'cash_amount', 'cash_register', 'considerations1', 'date', 'bank_account_details', 'deposit_amount', 'wage', 'issue_tracking', 'considerations2'];

    public function bank_account()
    {
        return $this->belongsTo(BankAccount::class);
    }

    public function investor()
    {
        return $this->belongsTo(TarafHesab::class);
    }
}
