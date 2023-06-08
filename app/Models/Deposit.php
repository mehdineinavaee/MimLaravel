<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;
    public $fillable = ['form_number', 'form_date', 'place', 'mark_back', 'serial_number', 'total', 'due_date', 'payer'];

    public function bank_account()
    {
        return $this->belongsTo(BankAccount::class);
    }
}
