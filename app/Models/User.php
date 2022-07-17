<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Modules\Perpustakaan\Entities\Member;
use Modules\PPDB\Entities\BerkasMurid;
use Modules\PPDB\Entities\DataOrangTua;
use Modules\SPP\Entities\BankAccount;
use Modules\SPP\Entities\PaymentSpp;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'role',
        'status',
        'foto_profile',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userDetail()
    {
        return $this->belongsTo(UsersDetail::class,'id','user_id');
    }

    public function muridDetail()
    {
        return $this->belongsTo(dataMurid::class, 'id','user_id');
    }

    public function dataOrtu()
    {
        return $this->belongsTo(DataOrangTua::class,'id','user_id');
    }

    public function berkas()
    {
        return $this->belongsTo(BerkasMurid::class,'id','user_id');
    }

    public function member()
    {
      return $this->hasOne(Member::class,'user_id');
    }

    public function payment()
    {
      return $this->hasOne(PaymentSpp::class,'user_id');
    }

    public function bank()
    {
      return $this->hasOne(BankAccount::class,'user_id');
    }
    public function banks()
    {
      return $this->hasMany(BankAccount::class,'user_id');
    }
}
