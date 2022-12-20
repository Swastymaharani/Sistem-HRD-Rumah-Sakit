<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BahasaAktif extends Model
{
    use HasFactory;
    protected $table='m_bahasaaktif';
    protected $fillable=['id', 'kode', 'nama'];
}
