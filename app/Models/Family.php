<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_family';
    protected $fillable = [
        'nama',
        'alamat',
        'phone',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'pekerjaan',
        'pendidikan',
        'jenis_kelamin',
    ];
}
