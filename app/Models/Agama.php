<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agama extends Model
{
    protected $table = "agamas";

    public function penduduks()
    {
    return $this->hasMany(Penduduk::class);
    }
}
