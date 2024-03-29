<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matkul extends Model
{
    use HasFactory;
    protected $primaryKey = 'kode_matkul';
    protected $keyType = 'string';
    protected $fillable = [
        'kode_matkul',
        'nama',
        'deskripsi',
        'sks',
        'semester',
        'dosen',
    ];

    public function mahasiswa_matakuliah()
    {
        return $this->hasMany(MahasiswaMatakuliah::class, 'kode_matkul', 'kode_matkul');
    }
}
