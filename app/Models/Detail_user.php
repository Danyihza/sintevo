<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_user extends Model
{
    use HasFactory;
    protected $table = 'detail_users';
    protected $fillable = [
        'id_detail',
        'kategori',
        'nama_brand',
        'deskripsi',
        'alamat',
        'nama_ketua',
        'no_whatsapp',
        'status',
        'prodi',
        'website',
        'instagram'
    ];
}
