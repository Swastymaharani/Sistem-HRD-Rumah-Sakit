<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agama extends Model
{
    use HasFactory;
    protected $table='m_agama';
    protected $fillable=['id', 'kode', 'nama'];

    public function pegawai(){
<<<<<<< HEAD
        return $this->hasOne(Pegawai::class);
=======
        return $this->hasOne(Pegawai::class, 'agama_id');
>>>>>>> crud_pegawai
    }
}
