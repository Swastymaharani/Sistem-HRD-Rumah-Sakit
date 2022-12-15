<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diklat extends Model
{
    use HasFactory;
    protected $table='m_diklat';
    protected $fillable=['id_diklat', 'no_urut', 'nama_diklat', 'jenis_diklat_id'];
}
