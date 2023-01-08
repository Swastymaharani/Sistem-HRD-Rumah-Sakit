<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;
    protected $table='users';
    protected $fillable = array('id', 'name', 'email', 'password', 'admin');

    public function pegawaiID(){
        return $this->hasOne(Pegawai::class, 'id', 'sso_user_id');
    }
}
