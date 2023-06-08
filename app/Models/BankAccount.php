<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    use HasFactory;
    public $fillable = ['chk_active', 'account_type', 'account_number', 'shaba_number', 'cart_number', 'branch_name', 'branch_address', 'cheque_print_type'];

    public function bank_type()
    {
        return $this->belongsTo(BankType::class);
    }

    public function receive_from_the_accounts()
    {
        return $this->hasMany(ReceiveFromTheAccount::class);
    }

    public function payment_to_accounts()
    {
        return $this->hasMany(PaymentToAccount::class);
    }

    public function pays()
    {
        return $this->hasMany(Pay::class);
    }

    public function bank_to_funds()
    {
        return $this->hasMany(BankToFund::class);
    }

    public function bank_to_banks()
    {
        return $this->hasMany(BankToBank::class);
    }

    public function receive_miscellaneous_incomes()
    {
        return $this->hasMany(ReceiveMiscellaneousIncome::class);
    }

    public function deposits()
    {
        return $this->hasMany(Deposit::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function returning_cheques()
    {
        return $this->hasMany(ReturningCheque::class);
    }

    public function receipt_cheques()
    {
        return $this->hasMany(ReceiptCheque::class);
    }

    public function pay_returning_cheques()
    {
        return $this->hasMany(PayReturningCheque::class);
    }

    public function cheque_books()
    {
        return $this->hasMany(ChequeBook::class);
    }
}
