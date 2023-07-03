<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;
    public $fillable = ['code', 'title', 'chk_active'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function inventory_products_periods()
    {
        return $this->hasMany(InventoryProductsPeriod::class);
    }

    public function warehouse_moves()
    {
        return $this->hasMany(WarehouseMove::class);
    }
}
