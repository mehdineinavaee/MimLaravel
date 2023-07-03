<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuyFactor extends Model
{
    use HasFactory;
    protected $table = "buy_factors";

    public function seller()
    {
        return $this->belongsTo(TarafHesab::class);
    }

    public function broker()
    {
        return $this->belongsTo(TarafHesab::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'buy_factor_product')
            ->withPivot(['total', 'amount', 'discount', 'considerations'])
            ->withTimestamps();
    }
}
