<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'beritas';

    public function kategori()
    {
        return $this->belongsTo(KategoriBerita::class ,'kategori_id','id');
    }
}
