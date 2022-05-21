<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    protected $fillable = [
        'id',
        'nik',
        'nama',
        'tanggallahir',
        'alamat',
        'jeniskelamin',
        'pekerjaan',
    ];
}
