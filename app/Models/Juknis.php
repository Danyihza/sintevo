<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Juknis extends Model
{
    use HasFactory;
    protected $table = 'petunjuk_teknis';
    protected $fillable = [
        'id_juknis',
        'kode',
        'file',
    ];
    public $primaryKey = 'id_juknis';
    public $keyType = 'string';

    public function hasFile()
    {
        return $this->hasOne(File::class, 'id_file', 'file');
    }
}
