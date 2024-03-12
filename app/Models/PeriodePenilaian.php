<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeriodePenilaian extends Model
{
    use HasFactory;
    protected $table = 'periode_penilaian';
    protected $primaryKey = 'id'; // Menentukan primary key

    protected $fillable = ['tahun', 'bulan', 'terbit', 'tutup', 'status'];

    protected $arrBulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

    public function getBulanAttribute($value)
    {
        return $this->arrBulan[$value - 1] ?? null;
    }

}
