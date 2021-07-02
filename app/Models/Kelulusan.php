<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelulusan extends Model
{
    use HasFactory;
    protected $table = 'kelulusan';
    protected $fillable = [
        'id_kelulusan',
        'id_user',
        'kelulusan',
        'file',
    ];
    public $primaryKey = 'id_kelulusan';
    public $keyType = 'string';

    public function hasFile()
    {
        return $this->hasOne(File::class, 'id_file', 'file');
    }
}
