<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TarafHesabPeriod extends Model
{
    use HasFactory;
    public $fillable = ['amount', 'opt_debtor', 'opt_creditor', 'considerations'];

    public function taraf_hesab()
    {
        return $this->belongsTo(TarafHesab::class);
    }
}
