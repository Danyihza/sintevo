<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use HasFactory;
    protected $table = 'prestasi';
    protected $fillable = [
        'id_prestasi',
        'id_user',
        'tanggal',
        'prestasi',
        'tingkat_prestasi',
        'file',
    ];
    protected $primaryKey = 'id_prestasi';
    protected $keyType = 'string';


    public function hasFile()
    {
        return $this->hasOne(File::class, 'id_file', 'file');
    }
}
