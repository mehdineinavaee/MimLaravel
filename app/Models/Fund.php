<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fund extends Model
{
    use HasFactory;
    public $fillable = ['form_type', 'daramad_code', 'daramad_name'];

    public function pays()
    {
        return $this->hasMany(Pay::class);
    }

    public function receive_miscellaneous_income()
    {
        return $this->hasMany(ReceiveMiscellaneousIncome::class);
    }
}
