<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    use HasFactory;
    protected $table = 'pengumuman';
    protected $fillable = [
        'id_pengumuman',
        'kode',
        'pengumuman',
        'file',
        'end_at'
    ];
    public $primaryKey = 'id_pengumuman';
    public $keyType = 'string';

    public function hasFile()
    {
        return $this->hasOne(File::class, 'id_file', 'file');
    }
}
