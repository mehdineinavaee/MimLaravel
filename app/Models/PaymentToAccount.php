<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentToAccount extends Model
{
    use HasFactory;
    public $fillable = [
        'taraf_hesab_name', 'form_date', 'form_number', 'cash_amount', 'considerations1',
        'payment_for', 'tab2_cheque_total', 'tab2_issue_date', 'tab2_due_date',
        'tab2_cheque_serial_number', 'tab2_bank_account_details', 'tab2_consideration',
        'date', 'bank_account_details', 'deposit_amount', 'wage', 'issue_tracking',
        'considerations2', 'paid_discount'
    ];
}
