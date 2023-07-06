<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayCheque extends Model
{
    use HasFactory;
    public $fillable = ['amount', 'issue_date', 'due_date', 'serial_number', 'considerations'];

    public function receiver()
    {
        return $this->belongsTo(TarafHesab::class);
    }

    public function bank_account()
    {
        return $this->belongsTo(BankAccount::class);
    }
}
