<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monev_Finansial extends Model
{
    use HasFactory;
    protected $table = 'monev_finansial';
    protected $fillable = [
        'id_finansial',
        'id_user',
        'tanggal',
        'jenis_finansial',
        'keterangan_finansial',
        'jumlah',
        'path_file',
        'origin_file',
    ];
    protected $primaryKey = 'id_finansial';
    protected $keyType = 'string';
    
    
    public function hasFile()
    {
        return $this->hasOne(File::class, 'id_file', 'file');
    }
}
