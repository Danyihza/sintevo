<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;
    protected $table = 'faq';
    protected $fillable = [
        'id_faq',
        'nama_usaha',
        'pertanyaan',
        'tanggapan'
    ];
    protected $primaryKey = 'id_faq';
    protected $keyType = 'string';
}
