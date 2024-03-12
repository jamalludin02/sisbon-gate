<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = 'pegawai';
    protected $primaryKey = 'id'; // Menentukan primary key

    protected $fillable = [
        'nip',
        'nama',
        'tgl_lahir',
        'pendidikan',
        'gender',
        'no_telp',
        'alamat',
        'jabatan_id',
        'status',
    ];


    public function jabatan()
    {
        return $this->hasOne(Jabatan::class, 'id', 'jabatan_id');
    }
}
