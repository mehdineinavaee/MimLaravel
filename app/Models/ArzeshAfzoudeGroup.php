<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArzeshAfzoudeGroup extends Model
{
    use HasFactory;
    public $fillable = ['group_name', 'financial_year', 'avarez', 'maliyat', 'saghfe_moamelat'];
}
