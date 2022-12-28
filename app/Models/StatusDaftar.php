<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusDaftar extends Model
{
    use HasFactory;
    protected $table ='m_statusdaftar';
    protected $fillable =['id', 'status'];

    public function pegawai(){
        return $this->hasOne(Pegawai::class);
    }

}
