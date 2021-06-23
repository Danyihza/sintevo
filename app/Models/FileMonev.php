<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileMonev extends Model
{
    use HasFactory;
    protected $table = 'file_monev';
    protected $fillable = [
        'id_filemonev',
        'jenis_kegiatan',
        'keterangan_file',
        'file',
        'tanggal',
    ];
    public $primaryKey = 'id_filemonev';
    public $keyType = 'string';

    public function hasFile()
    {
        return $this->hasOne(File::class, 'id_file', 'file');
    }
}
