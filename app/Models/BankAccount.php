<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    use HasFactory;
    public $fillable = ['chk_active', 'account_type', 'account_number', 'shaba_number', 'cart_number', 'bank_name', 'branch_name', 'branch_address', 'cheque_print_type'];

    public function bank_types()
    {
        return $this->belongsToMany(BankType::class)->withTimestamps();
    }
}
