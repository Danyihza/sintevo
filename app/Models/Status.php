<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    
    protected $table = 'statuses';
    protected $fillable = [
        'jenis_status'
    ];
    public $primaryKey = 'id_status';

    public function detail_user()
    {
        return $this->hasMany(Detail_user::class, 'status', 'id_status');
    }
}
