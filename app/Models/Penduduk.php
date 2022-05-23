<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    protected $fillable = ['nik','nama','tanggallahir','dusun_id','agama_id','jeniskelamin','pekerjaan'];
    protected $table = "penduduks";
    
    public function dusun(){
        return $this->belongsTo(Dusun::class, 'dusun_id');
    }
    public function agama(){
        return $this->belongsTo(Agama::class, 'agama_id');
    }
    public function kematians()
    {
        return $this->hasOne(kematian::class);
    }
}
