<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spesialisasi extends Model
{
    use HasFactory;
    protected $table='m_spesialisasi';
    protected $fillable=['id', 'kode', 'nama', 'gelar'];
}
