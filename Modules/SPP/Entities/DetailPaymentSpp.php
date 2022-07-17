<?php

namespace Modules\SPP\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailPaymentSpp extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function payment()
    {
      return $this->hasOne(PaymentSpp::class,'id','payment_id');
    }

    public function user()
    {
      return $this->belongsTo(User::class,'user_id');
    }
}
