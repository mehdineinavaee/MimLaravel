<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductNoUnit extends Model
{
    use HasFactory;
    public $fillable = ['code', 'title', 'chk_active'];
}
