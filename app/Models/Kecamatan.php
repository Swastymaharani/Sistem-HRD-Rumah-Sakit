<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;
    protected $table='m_kecamatan';
    protected $fillable=['id', 'nama_kecamatan'];

    public function pegawai(){
        return $this->hasMany(Pegawai::class);
    }
}
