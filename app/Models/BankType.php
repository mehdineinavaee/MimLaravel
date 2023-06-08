<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankType extends Model
{
    use HasFactory;
    public $fillable = ['chk_active', 'bank_code', 'bank_name'];

    public function bank_accounts()
    {
        return $this->hasMany(BankAccount::class);
    }

    public function bank_to_funds()
    {
        return $this->hasMany(BankToFund::class);
    }

    public function bank_to_banks()
    {
        return $this->hasMany(BankToBank::class);
    }
}
