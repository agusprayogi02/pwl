<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nim',
        'nama',
        // 'photo',
        'jk',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'hp',
        'id_prodi',
        'kelas_id'
    ];

    public function prodi()
    {
        return $this->hasOne(Prodi::class, 'prodi_id', 'id_prodi');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id');
    }

    public function mahasiswa_matakuliah()
    {
        return $this->hasMany(MahasiswaMatakuliah::class);
    }
}
