<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnSellFactor extends Model
{
    use HasFactory;
    protected $table = "return_sell_factors";

    public function buyer()
    {
        return $this->belongsTo(TarafHesab::class);
    }

    public function broker()
    {
        return $this->belongsTo(TarafHesab::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_return_sell_factor')
            ->withPivot(['total', 'amount', 'discount', 'considerations'])
            ->withTimestamps();
    }
}
