<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;

    protected $table = 'prodis';
    protected $fillable =[
        'nama_prodi'
    ];
    public $primaryKey = 'id_prodi';

    public function detail_user()
    {
        return $this->hasMany(Detail_user::class, 'prodi', 'id_prodi');
    }
}
