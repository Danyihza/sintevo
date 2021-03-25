<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';

    protected $fillable = [
        'id_user',
        'email',
        'password',
        'role',
        'detail',
        'token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function generateId($role)
    {
        $last_id = DB::table('users')->where('role', $role)->latest()->first();
        if (!$last_id) {
            switch ($role) {
                case 1:
                    $result = 'MHS0001';
                    break;
                case 2:
                    $result = 'DOS0001';
                    break;
                default:
                    $result = 'OTH0001';
                    break;
            }
            return $result;
        }
        $number = (int) substr($last_id->id_user, 3);
        $number++;
        switch ($role) {
            case 1:
                $str = 'MHS';
                break;
            case 2:
                $str = 'DOS';
                break;
            default:
                $str = 'OTH';
                break;
        }
        $result = str_pad($number,4,'0',STR_PAD_LEFT);
        return $str.$result;
    }
}
