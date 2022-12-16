<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatDiklat extends Model
{
    use HasFactory;
    protected $table='t_riwayat_diklat';
    protected $fillable=['id_t_diklat', 'pegawai_id', 'diklat_id', 'nama_kursus', 'tempat', 'jumlah_jam', 'tanggal_kursus', 'institusi_penyelenggara', 'nomor_sertifikat', 'tgl_sertifikat','tanggal_selesai_kursus', 'jabatan_ttd_sertifikat','is_aktif','is_valid','keterangan','file_sertifikat'];
}
