<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;
    protected $table = 'penilaian';
    protected $primaryKey = 'id'; // Menentukan primary key

    protected $fillable = [
        'pegawai_id',
        'periode_id',
        'kriteria_id',
        'nilai',
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }

    public function periode()
    {
        return $this->belongsTo(PeriodePenilaian::class);
    }

    public function kriteria()
    {
        return $this->belongsTo(KriteriaPenilaian::class);
    }
}
