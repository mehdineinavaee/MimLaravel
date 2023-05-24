<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class City extends Model
{
    use HasFactory;
    public $fillable = ['city_code', 'city_name'];

    public static function getCities()
    {
        $records = DB::table('cities')->select('city_code', 'city_name')->get()->toArray();
        return $records;
    }
}
