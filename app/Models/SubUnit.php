<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubUnit extends Model
{
    use HasFactory;
    protected $table='m_subunit_medik';
    protected $fillable=['id', 'unit_id', 'kode_subunit', 'nama_subunit'];

    public function pegawai(){
        return $this->hasMany(Pegawai::class);
    }
}
