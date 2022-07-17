<?php

namespace Modules\SPP\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentSpp extends Model
{
    use HasFactory;

    protected $guarded = '';

    public function user()
    {
      return $this->belongsTo(User::class,'user_id');
    }

    public function detailPayment()
    {
      return $this->hasMany(DetailPaymentSpp::class,'payment_id');
    }
}
