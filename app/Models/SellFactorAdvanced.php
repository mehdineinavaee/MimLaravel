<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellFactorAdvanced extends Model
{
    use HasFactory;
    protected $table = "sell_factor_advanceds";

    public function applicant()
    {
        return $this->belongsTo(TarafHesab::class);
    }

    public function broker()
    {
        return $this->belongsTo(TarafHesab::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_sell_factor_advanced')
            ->withPivot(['total', 'amount', 'discount', 'considerations'])
            ->withTimestamps();
    }
}
