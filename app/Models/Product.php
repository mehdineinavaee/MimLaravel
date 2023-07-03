<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    public $fillable = ['code', 'main_group', 'sub_group', 'product_name', 'sell_price', 'value_added_group', 'chk_active', 'introduce_date', 'latest_buy_price', 'main_barcode', 'order_point'];

    public function product_unit()
    {
        return $this->belongsTo(ProductNoUnit::class);
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }

    public function sell_factors()
    {
        return $this->belongsToMany(SellFactor::class, 'product_sell_factor')
            ->withPivot(['total', 'amount', 'discount', 'considerations'])
            ->withTimestamps();
    }

    public function buy_factors()
    {
        return $this->belongsToMany(BuyFactor::class, 'buy_factor_product')
            ->withPivot(['total', 'amount', 'discount', 'considerations'])
            ->withTimestamps();
    }

    public function return_buy_factors()
    {
        return $this->belongsToMany(ReturnBuyFactor::class, 'product_return_buy_factor')
            ->withPivot(['total', 'amount', 'discount', 'considerations'])
            ->withTimestamps();
    }

    public function return_sell_factors()
    {
        return $this->belongsToMany(ReturnSellFactor::class, 'product_return_sell_factor')
            ->withPivot(['total', 'amount', 'discount', 'considerations'])
            ->withTimestamps();
    }

    public function sell_factor_advanceds()
    {
        return $this->belongsToMany(SellFactorAdvanced::class, 'product_sell_factor_advanced')
            ->withPivot(['total', 'amount', 'discount', 'considerations'])
            ->withTimestamps();
    }

    public function wastage_factors()
    {
        return $this->belongsToMany(WastageFactor::class, 'product_wastage_factor')
            ->withPivot(['total', 'amount', 'discount', 'considerations'])
            ->withTimestamps();
    }

    public function warehouse_moves()
    {
        return $this->belongsToMany(WarehouseMove::class, 'product_warehouse')
            ->withPivot(['total', 'amount', 'discount', 'considerations'])
            ->withTimestamps();
    }

    public function inventory_products_periods()
    {
        return $this->hasMany(InventoryProductsPeriod::class);
    }
}
