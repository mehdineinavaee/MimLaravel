<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TarafHesab extends Model
{
    use HasFactory;
    protected $fillable = [
        'chk_seller', 'chk_buyer', 'chk_broker', 'chk_investor', 'chk_block_list', 'chk_active', 'chk_move_phone', 'code', 'fullname', 'zip_code', 'phone', 'broker', 'commission', 'address', 'person_type', 'ceo_fullname', 'national_code', 'birthdate', 'occupation', 'fax', 'tel', 'activity_type', 'economic_code', 'email', 'website', 'credit_limit', 'opt_warning', 'opt_prohibition_sale', 'opt_uncleared', 'opt_customer_balance', 'not_spent'
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
