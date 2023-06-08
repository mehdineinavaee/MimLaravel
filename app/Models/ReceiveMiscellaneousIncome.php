<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceiveMiscellaneousIncome extends Model
{
    use HasFactory;
    public $fillable = ['form_date', 'form_number', 'cash_amount', 'considerations1', 'date', 'deposit_amount', 'wage', 'issue_tracking', 'considerations2'];

    public function fund()
    {
        return $this->belongsTo(Fund::class);
    }

    public function bank_account()
    {
        return $this->belongsTo(BankAccount::class);
    }
}
