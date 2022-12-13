<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PangkatPegawai extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_Pangkat';
    
    public function pangkat()
    {
        return $this->hasOne(Pangkat::class, "id");
    }
}
