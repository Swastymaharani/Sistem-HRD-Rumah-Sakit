<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSpesialisasi extends Model
{
    use HasFactory;
    protected $table='m_subspesialisasi';
    protected $fillable=['id', 'spesialis_id','kode', 'nama'];

    public function pegawai(){
        return $this->hasMany(Pegawai::class);
    }
}
