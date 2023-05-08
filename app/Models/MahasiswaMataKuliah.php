<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MahasiswaMataKuliah extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa_matakuliah';
    protected $fillable = [
        'mahasiswa_id',
        'kode_matkul',
        'nilai',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function matkul()
    {
        return $this->belongsTo(Matkul::class, 'kode_matkul', 'kode_matkul');
    }
}
