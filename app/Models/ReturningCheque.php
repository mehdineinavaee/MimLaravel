<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturningCheque extends Model
{
    use HasFactory;
    public $fillable = ['form_date', 'form_number', 'mark_back', 'serial_number', 'total', 'due_date', 'bank_account_details', 'payer', 'considerations'];

    public function bank_account()
    {
        return $this->belongsTo(BankAccount::class);
    }
}
