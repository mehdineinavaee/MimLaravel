<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $fillable = ['code', 'main_group', 'sub_group', 'product_name', 'sell_price', 'value_added_group', 'chk_active', 'introduce_date', 'latest_buy_price', 'main_barcode', 'order_point'];

    public function product_unit()
    {
        return $this->belongsTo(ProductNoUnit::class);
    }
}
