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
}
