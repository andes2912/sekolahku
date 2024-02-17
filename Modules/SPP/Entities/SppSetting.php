<?php

namespace Modules\SPP\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SppSetting extends Model
{
    use HasFactory;

    protected $table = 'spp_setting';
    protected $guarded = [];

    public function updateBy(){
        return $this->belongsTo(User::class,'update_by','id');
    }
}
