<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    protected $fillable = ['nik','nama','tanggallahir','dusun_id','agama_id','jeniskelamin','pekerjaan'];

    public function dusun(){
        return $this->belongsTo(Dusun::class, 'dusun_id');
    }
    public function agama(){
        return $this->belongsTo(Agama::class, 'agama_id');
    }
}
