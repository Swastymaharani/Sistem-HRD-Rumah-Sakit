<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPegawai extends Model
{
    use HasFactory;
    protected $table='m_statuspegawai';
    protected $fillable=['id', 'kode', 'nama'];
}
