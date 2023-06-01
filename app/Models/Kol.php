<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kol extends Model
{
    use HasFactory;
    protected $table = "kols";

    public function account_group()
    {
        return $this->belongsTo(AccountGroup::class);
    }
}
