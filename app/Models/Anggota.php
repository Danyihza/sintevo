<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;
    protected $table = 'anggota';
    protected $fillable = [
        'id_user',
        'nama',
        'status',
        'prodi',
        'no_identify',
        'jabatan'
    ];
    protected $primaryKey = 'id_anggota';

    public function hasTeam()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function hasStatus()
    {
        return $this->belongsTo(Status::class, 'status');
    }

    public function hasProdi()
    {
        return $this->belongsTo(Prodi::class, 'prodi');
    }
}
