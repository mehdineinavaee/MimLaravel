<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnBuyFactor extends Model
{
    use HasFactory;
    protected $table = "return_buy_factors";

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
        return $this->belongsToMany(Product::class, 'product_return_buy_factor')
            ->withPivot(['total', 'amount', 'discount', 'considerations'])
            ->withTimestamps();
    }
}
