<?php

namespace App\Http\Controllers;
use App\Models\Diklat;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Models\RiwayatDiklat;
use Illuminate\Support\Facades\File;
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
                // ->addColumn('file_sertifikats', function($data){
                //         $url= asset('uploads/riwayatdiklat/filesertifikat/'.$data->file_sertifikat);
                //         return '<img src="'.$url.'" border="0" width="100" class="img-rounded" align="center" />';
                // })
                ->addColumn('aksi', function($data){
                    $aksi = "<a title='Detail Riwayat Diklat' href='/admin/riwayatdiklat/".$data->id_t_diklat."/detail' class='btn btn-md btn-success' data-toggle='tooltip' data-placement='bottom' onclick='buttonsmdisable(this)'><i class='ti-eye' ></i></a>";
                    $aksi .= "<a title='Edit Data' href='/admin/riwayatdiklat/".$data->id_t_diklat."/edit' class='btn btn-md btn-primary' data-toggle='tooltip' data-placement='bottom' onclick='buttonsmdisable(this)'><i class='ti-pencil' ></i></a>";
                    $aksi .= "<a title='Delete Data' href='javascript:void(0)' onclick='deleteData(\"{$data->id_t_diklat}\",\"{$data->nama_kursus}\",this)' class='btn btn-md btn-danger' data-id_t_diklat='{$data->id_t_diklat}' data-nama_kursus='{$data->nama_kursus}'><i class='ti-trash' data-toggle='tooltip' data-placement='bottom' ></i></a> ";
                    return $aksi;
                })
                ->rawColumns(['file_sertifikats', 'aksi'])
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

    public function create($id){
        $icon = 'ni ni-dashlite';
        $subtitle = 'Tambah Riwayat Diklat Pegawai';
        $diklats = Diklat::all();
        $id_pegawai = $id;
        return view('crudriwayatdiklat.create',compact('subtitle','icon','diklats', 'id_pegawai'));
    }

    public function edit(Request $request){
        $data = RiwayatDiklat::find($request->id);
        $icon = 'ni ni-dashlite';
        $subtitle = 'Edit Riwayat Diklat Pegawai';
        $diklats = Diklat::all();

        return view('crudriwayatdiklat.edit',compact('subtitle','icon','data','diklats'));
    }

    public function save(Request $request, $id_pegawai){
        $riwayatDiklat = new RiwayatDiklat;
        $riwayatDiklat-> pegawai_id = $id_pegawai;
        $riwayatDiklat-> diklat_id = $request-> input('diklat_id');
        $riwayatDiklat-> nama_kursus = $request-> input('nama_kursus');
        $riwayatDiklat-> tempat = $request-> input('tempat');
        $riwayatDiklat-> jumlah_jam = $request-> input('jumlah_jam');
        $riwayatDiklat-> tanggal_kursus = $request-> input('tanggal_kursus');
        $riwayatDiklat-> institusi_penyelenggara = $request-> input('institusi_penyelenggara');
        $riwayatDiklat-> nomor_sertifikat = $request-> input('nomor_sertifikat');
        $riwayatDiklat-> tgl_sertifikat = $request-> input('tgl_sertifikat');
        $riwayatDiklat-> tanggal_selesai_kursus = $request-> input('tanggal_selesai_kursus');
        $riwayatDiklat-> jabatan_ttd_sertifikat  = $request-> input('jabatan_ttd_sertifikat');
        $riwayatDiklat-> is_aktif = $request-> input('is_aktif');
        $riwayatDiklat-> is_valid = $request-> input('is_valid');
        $riwayatDiklat-> keterangan = $request-> input('keterangan');
        
        if($request->hasFile('file_sertifikat')){
            $file = $request->file('file_sertifikat');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/riwayatdiklat/filesertifikat/', $filename);
            $riwayatDiklat->file_sertifikat = $filename;
        }

        $riwayatDiklat->save();

        if($riwayatDiklat){
             $response = array('success'=>1,'msg'=>'Berhasil menambah data');
        }else{
            $response = array('success'=>2,'msg'=>'Gagal menambah data');
        }
        return $response;
    }

    public function update(Request $request, $id){
        $riwayatDiklat = RiwayatDiklat::find($id);

        $riwayatDiklat-> diklat_id = $request-> input('diklat_id');
        $riwayatDiklat-> nama_kursus = $request-> input('nama_kursus');
        $riwayatDiklat-> tempat = $request-> input('tempat');
        $riwayatDiklat-> jumlah_jam = $request-> input('jumlah_jam');
        $riwayatDiklat-> tanggal_kursus = $request-> input('tanggal_kursus');
        $riwayatDiklat-> institusi_penyelenggara = $request-> input('institusi_penyelenggara');
        $riwayatDiklat-> nomor_sertifikat = $request-> input('nomor_sertifikat');
        $riwayatDiklat-> tgl_sertifikat = $request-> input('tgl_sertifikat');
        $riwayatDiklat-> tanggal_selesai_kursus = $request-> input('tanggal_selesai_kursus');
        $riwayatDiklat-> jabatan_ttd_sertifikat  = $request-> input('jabatan_ttd_sertifikat');
        $riwayatDiklat-> is_aktif = $request-> input('is_aktif');
        $riwayatDiklat-> is_valid = $request-> input('is_valid');
        $riwayatDiklat-> keterangan = $request-> input('keterangan');
        
        if($request->hasFile('file_sertifikat')){
            $path = 'uploads/riwayatdiklat/filesertifikat/'.$riwayatDiklat->file_sertifikat;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('file_sertifikat');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/riwayatdiklat/filesertifikat/', $filename);
            $riwayatDiklat->file_sertifikat = $filename;
        }
        $riwayatDiklat->save();

        if($riwayatDiklat){
            $response = array('success'=>1,'msg'=>'Berhasil mengedit data');
        }else{
            $response = array('success'=>2,'msg'=>'Gagal mengedit data');
        }
        return $response;
    }

    public function detail(Request $request, $id){
    $icon = 'ni ni-dashlite';
        $subtitle = 'Detail Riwayat Diklat';
        $table_id = 't_riwayat_diklat';
        $data = RiwayatDiklat::find($id);
        return view('crudriwayatdiklat.detail',compact('subtitle','table_id','icon', 'data'));
    }
}
