<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KriteriaPenilaian extends Model
{
    use HasFactory;
    protected $table = 'kriteria_penilaian';
    protected $primaryKey = 'id'; // Menentukan primary key

    protected $fillable = [
        'kriteria',
        'deskripsi',
        'bobot',
        'status',
    ];
}
