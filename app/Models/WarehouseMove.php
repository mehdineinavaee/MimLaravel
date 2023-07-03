<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarehouseMove extends Model
{
    use HasFactory;
    protected $table = "warehouse_moves";

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_warehouse_move')
            ->withPivot(['amount'])
            ->withTimestamps();
    }

    public function transmitter()
    {
        return $this->belongsTo(Warehouse::class);
    }

    public function receiver()
    {
        return $this->belongsTo(Warehouse::class);
    }
}
