<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKelamin extends Model
{
    use HasFactory;
    protected $table='m_jenis_kelamin';
    protected $fillable=['id', 'nama'];

    public function pegawai(){
        return $this->hasOne(Pegawai::class);
    }
}
