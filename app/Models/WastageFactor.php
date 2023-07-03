<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WastageFactor extends Model
{
    use HasFactory;
    protected $table = "wastage_factors";

    public function buyer()
    {
        return $this->belongsTo(TarafHesab::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_wastage_factor')
            ->withPivot(['total', 'amount', 'discount', 'considerations'])
            ->withTimestamps();
    }
}
