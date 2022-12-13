<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    public function pangkat_pegawai()
    {
        return $this->hasOne(PangkatPegawai::class, "id_pegawai", "id")->latestOfMany();
    }
}
