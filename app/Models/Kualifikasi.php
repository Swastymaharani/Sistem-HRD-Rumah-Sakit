<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kualifikasi extends Model
{
    use HasFactory;
    protected $table='m_kualifikasi';
    protected $fillable=['id', 'kode', 'nama'];

    public function pegawai(){
        return $this->hasMany(Pegawai::class);
    }
}
