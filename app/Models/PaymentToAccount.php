<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentToAccount extends Model
{
    use HasFactory;
    public $fillable = [
        'form_date', 'form_number', 'cash_amount', 'considerations1',
        'payment_for', 'tab2_cheque_total', 'tab2_issue_date', 'tab2_due_date',
        'tab2_cheque_serial_number', 'tab2_bank_account_details', 'tab2_consideration',
        'date', 'deposit_amount', 'wage', 'issue_tracking',
        'considerations2', 'paid_discount'
    ];

    public function taraf_hesab()
    {
        return $this->belongsTo(TarafHesab::class);
    }

    public function bank_account()
    {
        return $this->belongsTo(BankAccount::class);
    }
}
