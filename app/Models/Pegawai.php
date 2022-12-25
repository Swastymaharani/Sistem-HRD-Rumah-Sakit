<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table='m_pegawai';
    protected $fillable=['id', 'kode', 'no_induk', 'absen_id', 'kode_bpjs','nama', 'nama_tercetak', 'gelar_depan', 'gelar_belakang', 
    'status_pegawai_id','jenis_profesi_id', 'spesialisasi_id','sub_spesialisasi_id','qualifikasi_id',
    'pendidikan_terakhir_id', 'jabatan_fungsional_terakhir','jabatan_struktural_id','unit_id',
    'subunit_id','tempat_lahir','tanggal_lahir','jeniskelamin_id','agama_id','bahasa_aktif_id','alamat','dusun','desa_id',
    'kecamatan_id','kabupaten_id','provinsi_id','kodepos','nik','npwp','file_photo','file_ktp','file_kk','file_npwp','status_nikah_id','status_daftar_id'];

    public function agama(){
        return $this->belongsTo(Agama::class, 'agama_id', 'id');
    }

    public function bahasaAktif(){
        return $this->belongsTo(BahasaAktif::class, 'bahasa_aktif_id', 'id');
    }

    public function jabatanStruktural(){
        return $this->belongsTo(JabatanStruktural::class, 'jabatan_struktural_id', 'jabatan_id');
    }

    public function jenisKelamin(){
        return $this->belongsTo(JenisKelamin::class, 'jenis_kelamin_id', 'id');
    }

    public function jenisProfesi(){
        return $this->belongsTo(JenisProfesi::class, 'jenis_profesi_id', 'id');
    }   
    
    public function kabupaten(){
        return $this->belongsTo(Kabupaten::class, 'kabupaten_id', 'id');
    } 

    public function kecamatan(){
        return $this->belongsTo(Kecamatan::class, 'kecamatan_id', 'id');
    } 

    public function kualifikasi(){
        return $this->belongsTo(Kualifikasi::class, 'qualifikasi_id', 'id');
    } 

    public function pendidikan(){
        return $this->belongsTo(Pendidikan::class, 'pendidikan_id', 'id');
    }

    public function provinsi(){
        return $this->belongsTo(Provinsi::class, 'provinsi_id', 'id');
    }

    public function spesialisasi(){
        return $this->belongsTo(Spesialisasi::class, 'spesialisasi_id', 'id');
    }

    public function statusNikah(){
        return $this->belongsTo(StatusNikah::class, 'status_nikah_id', 'id');
    }

    public function statusPegawai(){
        return $this->belongsTo(StatusPegawai::class, 'status_pegawai_id', 'id');
    }

    public function subSpesialisasi(){
        return $this->belongsTo(SubSpesialisasi::class, 'subspesialisasi_id', 'id');
    }

    public function subUnit(){
        return $this->belongsTo(SubUnit::class, 'subunit_id', 'id');
    }

    public function unit(){
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }
}
