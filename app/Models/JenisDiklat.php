<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisDiklat extends Model
{
    use HasFactory;
    protected $table='m_jenis_diklat';
    protected $primaryKey='jenis_diklat_id';
    protected $fillable=['jenis_diklat_id', 'nama_jenis_diklat'];
}
