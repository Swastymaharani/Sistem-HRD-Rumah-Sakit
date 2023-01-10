<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Agama;
use App\Models\AuthPegawai;
use App\Models\Pegawai;
use App\Models\SubUnit;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Pendidikan;
use App\Models\BahasaAktif;
use App\Models\Kualifikasi;
use App\Models\StatusNikah;
use App\Models\JenisKelamin;
use App\Models\JenisProfesi;
use App\Models\Spesialisasi;
use App\Models\StatusDaftar;
use Illuminate\Http\Request;
use App\Models\StatusPegawai;
use App\Models\SubSpesialisasi;
use App\Models\JabatanFungsional;
use App\Models\JabatanStruktural;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Symfony\Component\Console\Input\Input;

class UserController extends Controller
{
    public function index(){
        $icon = 'ni ni-dashlite';
        $subtitle = 'Beranda';
        $table_id = 'm_pegawai';
        return view('crudauthpegawai.authcrud',compact('subtitle','table_id','icon'));
    }

    public function detail(Request $request, $pegawai_id){
        $icon = 'ni ni-dashlite';
        $subtitle = 'Detail Data Pegawai';
        $table_id = 'm_pegawai';
        $data = AuthPegawai::find($pegawai_id);

        return view('crudauthpegawai.authdetail',compact('subtitle','table_id','icon', 'data'));
    }

    // public function deleteData(Request $request){
    //     if(Pegawai::destroy($request->id)){
    //         $response = array('success'=>1,'msg'=>'Berhasil hapus data');
    //     }else{
    //         $response = array('success'=>2,'msg'=>'Gagal menghapus data');
    //     }
    //     return $response;
    // }

    public function edit(Request $request, $id){
        $agama = Agama::all();
        $bahasaAktif = BahasaAktif::all();
        $jabatanFungsional = JabatanFungsional::all();
        $jabatanStruktural = JabatanStruktural::all();
        $jenisKelamin = JenisKelamin::all();
        $jenisProfesi = JenisProfesi::all();
        $kabupaten = Kabupaten::all();
        $kecamatan = Kecamatan::all();
        $kualifikasi = Kualifikasi::all();
        $pendidikan = Pendidikan::all();
        $provinsi = Provinsi::all();
        $spesialisasi = Spesialisasi::all();
        $statusDaftar = StatusDaftar::all();
        $statusNikah = StatusNikah::all();
        $statusPegawai = StatusPegawai::all();
        $jenisProfesi = JenisProfesi::all();
        $subSpesialisasi = SubSpesialisasi::all();
        $subUnit = SubUnit::all();
        $unit = Unit::all();
        $data = AuthPegawai::find($id);
        $icon = 'ni ni-dashlite';
        $subtitle = 'Edit Data Pegawai';
        return view('crudauthpegawai.authedit',compact('subtitle','icon','data', 'statusPegawai','agama','bahasaAktif','jabatanFungsional','jabatanStruktural','jenisKelamin','jenisProfesi','kecamatan','kabupaten','kualifikasi','pendidikan','provinsi','spesialisasi','statusDaftar','statusNikah','statusPegawai','subSpesialisasi','subUnit','unit'));
    }

    public function update(Request $request, $id){
        $data = AuthPegawai::find($id);
        $data->kode = $request-> input('kode');
        $data->no_induk = $request-> input('no_induk');
        $data-> absen_id = $request-> input('absen_id');
        $data-> kode_bpjs = $request-> input('kode_bpjs');
        $data-> nama = $request-> input('nama');
        $data-> nama_tercetak = $request-> input('nama_tercetak');
        $data-> gelar_depan = $request-> input('gelar_depan');
        $data->gelar_belakang = $request-> input('gelar_belakang');
        $data-> status_pegawai_id = $request-> input('status_pegawai_id');
        $data-> jenis_profesi_id = $request-> input('jenis_profesi_id');
        $data-> spesialisasi_id  = $request-> input('spesialisasi_id');
        $data-> sub_spesialisasi_id = $request-> input('sub_spesialisasi_id');
        $data-> qualifikasi_id = $request-> input('qualifikasi_id');
        $data-> pendidikan_terakhir_id = $request-> input('pendidikan_terakhir_id');
        $data-> jabatan_fungsional_terakhir = $request-> input('jabatan_fungsional_terakhir');
        $data-> jabatan_struktural_id = $request-> input('jabatan_struktural_id');
        $data-> unit_id = $request-> input('unit_id');
        $data->subunit_id = $request-> input('subunit_id');
        $data-> tempat_lahir = $request-> input('tempat_lahir');
        $data-> tanggal_lahir= $request-> input('tanggal_lahir');
        $data-> jeniskelamin_id = $request-> input('jeniskelamin_id');
        $data-> agama_id= $request-> input('agama_id');
        $data-> bahasa_aktif_id = $request-> input('bahasa_aktif_id');
        $data-> alamat = $request-> input('alamat');
        $data-> dusun = $request-> input('dusun');
        $data-> desa_id = $request-> input('desa_id');
        $data-> kecamatan_id = $request-> input('kecamatan_id');
        $data-> kabupaten_id = $request-> input('kabupaten_id');
        $data->provinsi_id  = $request-> input('provinsi_id');
        $data-> kodepos = $request-> input('kodepos');
        $data-> nik= $request-> input('nik');
        $data-> npwp = $request-> input('npwp');
        $data-> status_nikah_id = $request-> input('status_nikah_id');
        $data-> status_daftar_id  = $request-> input('status_daftar_id');
        
        if($request->hasFile('file_photo')){
            $path = 'upload/pegawai/photo/'.$data->file_photo;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('file_photo');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/pegawai/photo/', $filename);
            $data->file_photo = $filename;
        }

        if($request->hasFile('file_ktp')){
            $path = 'upload/pegawai/ktp/'.$data->file_ktp;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('file_ktp');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/pegawai/ktp/', $filename);
            $data->file_ktp = $filename;
        }

        if($request->hasFile('file_kk')){
            $path = 'upload/pegawai/kk/'.$data->file_kk;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('file_kk');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/pegawai/kk/', $filename);
            $data->file_kk = $filename;
        }

        if($request->hasFile('file_npwp')){
            $path = 'upload/pegawai/npwp/'.$data->file_npwp;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('file_npwp');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/pegawai/npwp/', $filename);
            $data->file_npwp = $filename;
        }
        $data->save();

        if($data){
            $response = array('success'=>1,'msg'=>'Berhasil mengedit data');
        }else{
            $response = array('success'=>2,'msg'=>'Gagal mengedit data');
        }
        return $response;
    }

    public function getSubspesialisasi($spesialisasi_id){
        echo json_encode(DB::table('m_subspesialisasi')->where('spesialisasi_id', $spesialisasi_id)->get());
    }

    public function getKabupaten($provinsi_id){
        echo json_encode(DB::table('m_kabupaten')->where('provinsi_id', $provinsi_id)->get());
    }

    public function getKecamatan($kabupaten_id){
        echo json_encode(DB::table('m_kecamatan')->where('kabupaten_id', $kabupaten_id)->get());
    }

    public function getSubunit($unit_id){
        echo json_encode(DB::table('m_subunit_medik')->where('unit_id', $unit_id)->get());
    }
}
