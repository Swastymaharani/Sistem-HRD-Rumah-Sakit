<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table='m_pegawai';
    protected $primarykey='id';
    protected $fillable=['kode', 'no_induk', 'absen_id', 'kode_bpjs','nama', 'nama_tercetak', 'gelar_depan', 'gelar_belakang', 
    'status_pegawai_id','jenis_profesi_id', 'spesialisasi_id','sub_spesialisasi_id','qualifikasi_id',
    'pendidikan_terakhir_id', 'jabatan_fungsional_terakhir','jabatan_struktural_id','unit_id',
    'subunit_id','tempat_lahir','tanggal_lahir','jeniskelamin_id','agama_id','bahasa_aktif_id','alamat','dusun','desa_id',
    'kecamatan_id','kabupaten_id','provinsi_id','kodepos','nik','npwp','file_photo','file_ktp','file_kk','file_npwp','status_nikah_id','status_daftar_id'];


    public function agama(){
        return $this->belongsTo(Agama::class);
    }

    public function bahasaAktif(){
        return $this->belongsTo(BahasaAktif::class, 'bahasa_aktif_id');
    }

    public function jabatanFungsional(){
        return $this->belongsTo(JabatanStruktural::class, 'jabatan_fungsional_terakhir', 'jabatan_fungsional_id');
    }

    public function jabatanStruktural(){
        return $this->belongsTo(JabatanStruktural::class, 'jabatan_struktural_id');
    }

    public function jenisKelamin(){
        return $this->belongsTo(JenisKelamin::class, 'jenis_kelamin_id');
    }

    public function jenisProfesi(){
        return $this->belongsTo(JenisProfesi::class);
    }   
    
    public function kabupaten(){
        return $this->belongsTo(Kabupaten::class);
    } 

    public function kecamatan(){
        return $this->belongsTo(Kecamatan::class);
    } 

    public function kualifikasi(){
        return $this->belongsTo(Kualifikasi::class);
    } 

    public function pendidikan(){
        return $this->belongsTo(Pendidikan::class);
    }

    public function provinsi(){
        return $this->belongsTo(Provinsi::class);
    }

    public function spesialisasi(){
        return $this->belongsTo(Spesialisasi::class);
    }

    public function statusDaftar(){
        return $this->belongsTo(StatusDaftar::class, 'status_daftar_id');
    }

    public function statusNikah(){
        return $this->belongsTo(StatusNikah::class, 'status_nikah_id');
    }

    public function statusPegawai(){
        return $this->belongsTo(StatusPegawai::class);
    }

    public function subSpesialisasi(){
        return $this->belongsTo(SubSpesialisasi::class, 'subspesialisasi_id');
    }

    public function subUnit(){
        return $this->belongsTo(SubUnit::class, 'subunit_id');
    }

    public function unit(){
        return $this->belongsTo(Unit::class, 'unit_id');
    }

    public function riwayatDiklat(){
        return $this->hasMany(RiwayatDiklat::class, 'id', 'id');
    }
}
