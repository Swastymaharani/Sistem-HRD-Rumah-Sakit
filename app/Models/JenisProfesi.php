<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisProfesi extends Model
{
    use HasFactory;
    protected $table='m_jenis_profesi';
    protected $fillable=['id', 'kode', 'nama_profesi', 'kelompok_profesi_id'];
}
