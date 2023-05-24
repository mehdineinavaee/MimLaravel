<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChequeBook extends Model
{
    use HasFactory;
    public $fillable = ['code', 'receive_date', 'bank_account_details', 'quantity', 'cheque_from', 'cheque_to'];
}
