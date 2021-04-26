<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monev extends Model
{
    use HasFactory;

    protected $table = 'monev';
    protected $fillable = [
        'id_monev',
        'id_user',
        'jenis_monev',
        'status_progress',
        'uraian',
        'tanggal',
        'path',
        'nama_file',
        'feedback'
    ];
    public $primaryKey = 'id_monev';
    public $timestamps = false;
    public $keyType = 'string';
}
