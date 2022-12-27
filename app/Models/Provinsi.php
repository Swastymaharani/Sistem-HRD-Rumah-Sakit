<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use HasFactory;
    protected $table='m_provinsi';
    protected $fillable=['id','nama_provinsi'];

    public function pegawai(){
<<<<<<< HEAD
        return $this->hasMany(Pegawai::class);
=======
        return $this->hasOne(Pegawai::class);
>>>>>>> crud_pegawai
    }
}
