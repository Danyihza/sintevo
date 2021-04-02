<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';
    protected $fillable = [
        'nama_kategori'
    ];
    public $primaryKey = 'id_kategori';

    
    public function detail_user()
    {
        return $this->hasMany(Detail_user::class, 'kategori', 'id_kategori');
    }
}
