<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    use HasFactory;
    protected $table = 'dashboard_pengumuman';
    protected $fillable = [
        'file'
    ];

    public function hasFile()
    {
        return $this->hasOne(File::class, 'id_file', 'file');
    }
}
