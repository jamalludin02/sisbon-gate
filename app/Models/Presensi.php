<?php

namespace App\Models;

use Attribute;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;
    protected $table = 'presensi';
    protected $primaryKey = 'id'; // Menentukan primary key

    protected $fillable = ['pegawai_id', 'tgl', 'status'];


    public function pegawai()
    {
        return $this->hasOne(Pegawai::class, 'id', 'pegawai_id');
    }
}
