<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $table = 'file';
    protected $primaryKey = 'id_file';
    protected $keyType = 'string';
    
    public function hasMonev()
    {
        return $this->hasOne(Monev::class, 'file', 'id_file');
    }
}
