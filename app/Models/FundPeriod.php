<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FundPeriod extends Model
{
    use HasFactory;
    public $fillable = ['amount', 'considerations'];

    public function fund()
    {
        return $this->belongsTo(Fund::class);
    }
}
