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
        'jk',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'hp',
        'id_prodi'
    ];

    public function prodi()
    {
        return $this->hasOne(Prodi::class, 'prodi_id', 'id_prodi');
    }
}
