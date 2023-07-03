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

    public function receive_from_the_accounts()
    {
        return $this->hasMany(ReceiveFromTheAccount::class);
    }

    public function payment_to_accounts()
    {
        return $this->hasMany(PaymentToAccount::class);
    }

    public function withdrawal_partners()
    {
        return $this->hasMany(WithdrawalPartner::class);
    }

    public function transfer_persons()
    {
        return $this->hasMany(TransferPerson::class);
    }

    public function sell_factors()
    {
        return $this->hasMany(SellFactor::class);
    }

    public function buy_factors()
    {
        return $this->hasMany(BuyFactor::class);
    }
}
