<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use App\Models\BahasaAktif;
use App\Models\JabatanStruktural;
use App\Models\JenisKelamin;
use App\Models\JenisProfesi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kualifikasi;
use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Pendidikan;
use App\Models\Provinsi;
use App\Models\Spesialisasi;
use App\Models\StatusNikah;
use App\Models\StatusPegawai;
use App\Models\SubSpesialisasi;
use App\Models\SubUnit;
use App\Models\Unit;
use Symfony\Component\Console\Input\Input;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

class PegawaiController extends Controller
{
    public function index(){
        $icon = 'ni ni-dashlite';
        $subtitle = 'Pegawai';
        $table_id = 'm_pegawai';
        return view('crudpegawai.crud',compact('subtitle','table_id','icon'));
    }

    public function listData(Request $request){
        $data = Pegawai::all();
        $datatables = DataTables::of($data);
        return $datatables
        ->addIndexColumn()
        ->addColumn('status_pegawai', function($data){
            $nama_status = Pegawai::find($data->id);
            return $nama_status->statusPegawai->nama;
        })
        ->addColumn('jenis_profesi', function($data){
            $jenis_profesi = Pegawai::find($data->id);  
            return $jenis_profesi->jenisProfesi->nama_profesi;
        })
        ->addColumn('aksi', function($data){
            $aksi = "";
            $aksi .= "<a title='Riwayat Diklat' href='#' class='btn btn-md btn-primary' data-toggle='tooltip' data-placement='bottom' onclick='buttonsmdisable(this)'><i class='ti-book' ></i></a>";
            $aksi .= "<a title='Edit Data' href='/pegawai/".$data->id."/edit' class='btn btn-md btn-primary' data-toggle='tooltip' data-placement='bottom' onclick='buttonsmdisable(this)'><i class='ti-pencil' ></i></a>";
            $aksi .= "<a title='Delete Data' href='javascript:void(0)' onclick='deleteData(\"{$data->id}\",\"{$data->kode}\",this)' class='btn btn-md btn-danger' data-id='{$data->id}' data-kode='{$data->kode}'><i class='ti-trash' data-toggle='tooltip' data-placement='bottom' ></i></a> ";
            return $aksi;
        })
        ->rawColumns(['aksi'])
        ->make(true);
    }

    public function deleteData(Request $request){
        if(Pegawai::destroy($request->id)){
            $response = array('success'=>1,'msg'=>'Berhasil hapus data');
        }else{
            $response = array('success'=>2,'msg'=>'Gagal menghapus data');
        }
        return $response;
    }

    public function create(){
        $agama = Agama::all();
        $bahasaAktif = BahasaAktif::all();
        $jabatanStruktural = JabatanStruktural::all();
        $jenisKelamin = JenisKelamin::all();
        $jenisProfesi = JenisProfesi::all();
        // $kabupaten = Kabupaten::all();
        $kecamatan = Kecamatan::all();
        $kualifikasi = Kualifikasi::all();
        $pendidikan = Pendidikan::all();
        $provinsi = Provinsi::all();
        $spesialisasi = Spesialisasi::all();
        $statusNikah = StatusNikah::all();
        $statusPegawai = StatusPegawai::all();
        $jenisProfesi = JenisProfesi::all();
        $subSpesialisasi = SubSpesialisasi::all();
        $subUnit = SubUnit::all();
        $unit = Unit::all();

        $icon = 'ni ni-dashlite';
        $subtitle = 'Tambah Data Pegawai';
        return view('crudpegawai.create',compact('subtitle','icon','statusPegawai','agama','bahasaAktif','jabatanStruktural','jenisKelamin','jenisProfesi','kecamatan','kualifikasi','pendidikan','provinsi','spesialisasi','statusNikah','statusPegawai','subSpesialisasi','subUnit','unit'));
    }

    public function edit(Request $request, $id){
        $agama = Agama::all();
        $bahasaAktif = BahasaAktif::all();
        $jabatanStruktural = JabatanStruktural::all();
        $jenisKelamin = JenisKelamin::all();
        $jenisProfesi = JenisProfesi::all();
        // $kabupaten = Kabupaten::all();
        $kecamatan = Kecamatan::all();
        $kualifikasi = Kualifikasi::all();
        $pendidikan = Pendidikan::all();
        $provinsi = Provinsi::all();
        $spesialisasi = Spesialisasi::all();
        $statusNikah = StatusNikah::all();
        $statusPegawai = StatusPegawai::get()->pluck('nama', 'id');
        $jenisProfesi = JenisProfesi::all();
        $subSpesialisasi = SubSpesialisasi::all();
        $subUnit = SubUnit::all();
        $unit = Unit::all();
        $data = Pegawai::find($request->id);
        $icon = 'ni ni-dashlite';
        $subtitle = 'Edit Data Pegawai';
        return view('crudpegawai.edit',compact('subtitle','icon','data', 'statusPegawai','agama','bahasaAktif','jabatanStruktural','jenisKelamin','jenisProfesi','kecamatan','kualifikasi','pendidikan','provinsi','spesialisasi','statusNikah','statusPegawai','subSpesialisasi','subUnit','unit'));
    }

    public function save(Request $request){
        // $file_photo_nama = time().'.'.$request->file_photo->extension();
        // $file_ktp_nama = time().'.'.$request->file_ktp->extension();
        // $file_kk_nama = time().'.'.$request->file_kk->extension();
        // $file_npwp_nama = time().'.'.$request->file_npwp->extension();

        // $request->file_photo->move(public_path('images'), $file_photo_nama);
        // $request->file_ktp->move(public_path('images'), $file_ktp_nama);
        // $request->file_kk->move(public_path('images'), $file_kk_nama);
        // $request->file_npwp->move(public_path('images'), $file_npwp_nama);

        // $data = $request->except('file_photo');
        // $data = $request->except('file_kk');
        // $data = $request->except('file_npwp');

        // $data['file_photo'] = $file_photo_nama;
        // $data['file_kk'] = $file_kk_nama;
        // $data['file_npwp'] = $file_npwp_nama;

        $data = Pegawai::create([
            'kode'              => $request-> input('kode'),
            'no_induk'          => $request-> input('no_induk'),
            'absen_id'          => $request-> input('absen_id'),
            'kode_bpjs'         => $request-> input('kode_bpjs'),
            'nama'              => $request-> input('nama'),
            'nama_tercetak'     => $request-> input('nama_tercetak'),
            'gelar_depan'       => $request-> input('gelar_depan'),
            'gelar_belakang'    => $request-> input('gelar_belakang'),
            'status_pegawai_id' => $request-> input('status_pegawai_id'),
            'jenis_profesi_id'  => $request-> input('jenis_profesi_id'),
            'spesialisasi_id'   => $request-> input('spesialisasi_id'),
            'sub_spesialisasi_id'       => $request-> input('sub_spesialisasi_id'),
            'qualifikasi_id'            => $request-> input('qualifikasi_id'),
            'pendidikan_terakhir_id'    => $request-> input('pendidikan_terakhir_id'),
            'jabatan_fungsional_terakhir'=> $request-> input('jabatan_fungsional_terakhir'),
            'jabatan_struktural_id'     => $request-> input('jabatan_struktural_id'),
            'unit_id'           => $request-> input('unit_id'),
            'subunit_id'        => $request-> input('subunit_id'),
            'tempat_lahir'      => $request-> input('tempat_lahir'),
            'tanggal_lahir'     => $request-> input('tanggal_lahir'),
            'jeniskelamin_id'   => $request-> input('jeniskelamin_id'),
            'agama_id'          => $request-> input('agama_id'),
            'bahasa_aktif_id'   => $request-> input('bahasa_aktif_id'),
            'alamat'            => $request-> input('alamat'),
            'dusun'             => $request-> input('dusun'),
            'desa_id'           => $request-> input('desa_id'),
            'kecamatan_id'      => $request-> input('kecamatan_id'),
            'provinsi_id'       => $request-> input('provinsi_id'),
            'kodepos'           => $request-> input('kodepos'),
            'nik'               => $request-> input('nik'),
            'npwp'              => $request-> input('npwp'),
            // 'file_photo'        => $file_photo_nama,
            // 'file_ktp'          => $file_ktp_nama,
            // 'file_kk'           => $file_kk_nama,
            // 'file_npwp'         => $file_npwp_nama,
            // 'status_nikah_id'   => $request-> input('status_nikah_id'),
            // 'status_daftar_id'  => $request-> input('status_daftar_id'),
        ]);

        // Carbon::createFromFormat('m/d/Y', $request->input('tanggal_lahir'))->format('Y-m-d'),
        // if(Pegawai::create($request->all())){
        if($data){
            $response = array('success'=>1,'msg'=>'Berhasil menambah data');
        }else{
            $response = array('success'=>2,'msg'=>'Gagal menambah data');
        }
        return $response;
    }

    public function update(Request $request, $id){
        $data = Pegawai::find($id);
        if($data->fill($request->all())->save()){
            $response = array('success'=>1,'msg'=>'Berhasil mengedit data');
        }else{
            $response = array('success'=>2,'msg'=>'Gagal mengedit data');
        }
        return $response;
    }
}
