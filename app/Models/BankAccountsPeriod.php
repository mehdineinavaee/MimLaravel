<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccountsPeriod extends Model
{
    use HasFactory;
    public $fillable = ['amount', 'considerations'];

    public function bank_account()
    {
        return $this->belongsTo(BankAccount::class);
    }
}
