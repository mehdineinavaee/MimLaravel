<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    public $fillable = ['chk_active', 'chk_messenger', 'opt_sex', 'first_name', 'last_name', 'father', 'birthdate', 'national_code', 'occupation'];
}
