<?php

namespace App\Http\Controllers;
use App\Models\Diklat;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Models\RiwayatDiklat;
use Yajra\DataTables\Facades\DataTables;

class RiwayatDiklatController extends Controller
{
    public function index(){
        $icon = 'ni ni-dashlite';
        $subtitle = 'Riwayat Diklat';
        $table_id = 't_riwayat_diklat';
        return view('crudriwayatdiklat.crud',compact('subtitle','table_id','icon'));
    }

    public function riwayatdiklatDetail($id){
        $icon = 'ni ni-dashlite';
        $subtitle = 'Riwayat Diklat';
        $table_id = 't_riwayat_diklat';
        $pegawai = Pegawai::find($id);
        $pegawai_id = $id;
        return view('crudriwayatdiklat.crud',compact('subtitle','table_id','icon', 'pegawai_id', 'pegawai'));
    }

    public function listData(Request $request, $pegawai_id){
        $data = RiwayatDiklat::select('id_t_diklat', 'pegawai_id', 'diklat_id', 'nama_kursus', 'tempat', 'jumlah_jam', 'tanggal_kursus', 'institusi_penyelenggara', 'nomor_sertifikat', 'tgl_sertifikat','tanggal_selesai_kursus', 'jabatan_ttd_sertifikat','is_aktif','is_valid','keterangan','file_sertifikat')->where('pegawai_id', $pegawai_id)->get();
        $datatables = DataTables::of($data);
        return $datatables
                ->addIndexColumn()
                ->addColumn('aksi', function($data){
                    $aksi = "";
                    $aksi .= "<a title='Edit Data' href='/riwayatdiklat/".$data->id_t_diklat."/edit' class='btn btn-md btn-primary' data-toggle='tooltip' data-placement='bottom' onclick='buttonsmdisable(this)'><i class='ti-pencil' ></i></a>";
                    $aksi .= "<a title='Delete Data' href='javascript:void(0)' onclick='deleteData(\"{$data->id_t_diklat}\",\"{$data->nama_kursus}\",this)' class='btn btn-md btn-danger' data-id='{$data->id_t_diklat}' data-nama-kursus='{$data->nama_kursus}'><i class='ti-trash' data-toggle='tooltip' data-placement='bottom' ></i></a> ";
                    return $aksi;
                })
                ->rawColumns(['aksi'])
                ->make(true);
    }

    public function deleteData(Request $request){
        if(RiwayatDiklat::destroy($request->id)){
            $response = array('success'=>1,'msg'=>'Berhasil hapus data');
        }else{
            $response = array('success'=>2,'msg'=>'Gagal menghapus data');
        }
        return $response;
    }

    public function create($pegawai_id){
        $icon = 'ni ni-dashlite';
        $subtitle = 'Tambah Riwayat Diklat Pegawai';
        $diklats = Diklat::all();
        $pegawai_id = $pegawai_id;
        return view('crudriwayatdiklat.create',compact('subtitle','icon','diklats','pegawai_id'));
    }

    public function edit(Request $request, $id){
        $data = RiwayatDiklat::find($request->id);
        $icon = 'ni ni-dashlite';
        $subtitle = 'Edit Riwayat Diklat Pegawai';
        $pegawais = Pegawai::all();
        $riwayat_diklat = RiwayatDiklat::find($id);

        return view('crudriwayatdiklat.edit',compact('subtitle','icon','data','riwayat_diklat','pegawais'));
    }

    public function save(Request $request, $id){
    //     $riwayat_diklats = RiwayatDiklat::all();
    //     $tidakUnik = 0;
    //     foreach ($riwayat_diklats as $riwayat_diklat) {
    //         if($diklat->nama_kursus==$request->input('nama_kursus')){
    //             $tidakUnik = 1;
    //         }
    //         if($diklat->tempat==$request->input('tempat')){
    //             $tidakUnik = 2;
    //         }
    //     }
    //     if($tidakUnik == 1){
    //         $response = array('success'=>2,'msg'=>'Nama Kursus harus Unik');
    //     }elseif($tidakUnik == 2){
    //         $response = array('success'=>2,'msg'=>'Tempat Kursus harus Unik');
    //     }else{
    //         Diklat::create($request->all());
    //         $response = array('success'=>1,'msg'=>'Berhasil menambah data');
    //     }
    //     return $response;
    }

    public function update(Request $request, $id){
        $data = RiwayatDiklat::find($id);
        if($data->fill($request->all())->save()){
            $response = array('success'=>1,'msg'=>'Berhasil mengedit data');
        }else{
            $response = array('success'=>2,'msg'=>'Gagal mengedit data');
        }
        return $response;
    }
}
