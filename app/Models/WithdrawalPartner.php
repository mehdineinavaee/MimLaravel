<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WithdrawalPartner extends Model
{
    use HasFactory;
    protected $table = "withdrawal_partners";

    public function from_taraf_hesab()
    {
        return $this->belongsTo(TarafHesab::class);
    }

    public function to_taraf_hesab()
    {
        return $this->belongsTo(TarafHesab::class);
    }
}
