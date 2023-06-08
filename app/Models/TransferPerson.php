<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransferPerson extends Model
{
    use HasFactory;
    public $fillable = ['form_date', 'form_number', 'cash_amount', 'document'];

    public function from_taraf_hesab()
    {
        return $this->belongsTo(TarafHesab::class);
    }

    public function to_taraf_hesab()
    {
        return $this->belongsTo(TarafHesab::class);
    }
}
