<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Akun extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'Akun';

    protected $primaryKey = 'id'; //

    protected $fillable = ['pegawai_id', 'username', 'email', 'password', 'role'];

    protected $hidden = ['password', 'remember_token'];

    public function pegawai()
    {
        return $this->hasOne(Pegawai::class, 'id', 'pegawai_id');
    }
}
