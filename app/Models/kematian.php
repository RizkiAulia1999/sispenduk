<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kematian extends Model
{
    protected $fillable = ['penduduk_id','umur','tanggalkematian','tempatkematian'];
    
    public function penduduks()
    {
        return $this->belongsTo(Penduduk::class, 'penduduk_id');
    }
}
