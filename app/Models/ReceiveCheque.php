<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceiveCheque extends Model
{
    use HasFactory;
    public $fillable = ['amount', 'issue_date', 'due_date', 'serial_number', 'bank_name', 'account_number', 'considerations'];

    public function payer()
    {
        return $this->belongsTo(TarafHesab::class);
    }
}
