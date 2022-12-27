<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kualifikasi extends Model
{
    use HasFactory;
    protected $table='m_kualifikasi';
<<<<<<< HEAD
    protected $fillable=['id', 'kode', 'nama'];
=======
    protected $fillable=['kode', 'nama'];
>>>>>>> crud_pegawai

    public function pegawai(){
        return $this->hasMany(Pegawai::class);
    }
<<<<<<< HEAD
=======

>>>>>>> crud_pegawai
}
