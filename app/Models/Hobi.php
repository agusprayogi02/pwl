<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hobi extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_hobi';
    protected $fillable = [
        'nama',
        'deskripsi',
    ];
}
