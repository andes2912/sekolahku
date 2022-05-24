<?php

namespace Modules\Perpustakaan\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Borrowing extends Model
{
    use HasFactory;

    protected $guarded = '';

    public function members()
    {
      return $this->hasOne(Member::class,'id','member_id');
    }

    public function books()
    {
      return $this->hasOne(Book::class,'id','book_id');
    }
}
