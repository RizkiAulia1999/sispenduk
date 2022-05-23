<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dusun extends Model
{
    protected $table = "dusuns";

    public function penduduks()
    {
    return $this->hasMany(Penduduk::class);
    }
}
