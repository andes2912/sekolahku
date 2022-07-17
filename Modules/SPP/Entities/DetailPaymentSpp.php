<?php

namespace Modules\SPP\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;

class DetailPaymentSpp extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['url_file'];

    public function getUrlFileAttribute()
    {
        if (!isset($this->file) && $this->file == '') {
            return null;
        }
        return asset(Storage::url('images/bukti_payment/' .$this->file));
    }

    public function payment()
    {
      return $this->hasOne(PaymentSpp::class,'id','payment_id');
    }

    public function user()
    {
      return $this->belongsTo(User::class,'user_id');
    }

    public function aprroveBy()
    {
      return $this->belongsTo(User::class, 'approve_by');
    }
}
