<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankType extends Model
{
    use HasFactory;
    public $fillable = ['bank_code', 'bank_name'];

    public function bank_accounts()
    {
        return $this->belongsToMany(BankAccount::class)->withTimestamps();
    }
}
