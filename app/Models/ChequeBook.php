<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChequeBook extends Model
{
    use HasFactory;
    public $fillable = ['code', 'receive_date', 'quantity', 'cheque_from', 'cheque_to'];

    public function bank_account()
    {
        return $this->belongsTo(BankAccount::class);
    }
}
