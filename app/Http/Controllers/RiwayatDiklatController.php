<?php

namespace App\Http\Controllers;

use App\Models\RiwayatDiklat;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RiwayatDiklatController extends Controller
{
    public function index(){
        $icon = 'ni ni-dashlite';
        $subtitle = 'Riwayat Diklat';
        $table_id = 't_riwayat_diklat';
        return view('crudriwayatdiklat.crud',compact('subtitle','table_id','icon'));
    }

    public function listData(Request $request){
        $data = RiwayatDiklat::all();
        $datatables = DataTables::of($data);
        return $datatables
                ->addIndexColumn()
                ->addColumn('aksi', function($data){
                    $aksi = "";
                    $aksi .= "<a title='Edit Data' href='/riwayatdiklat/".$data->id."/edit' class='btn btn-md btn-primary' data-toggle='tooltip' data-placement='bottom' onclick='buttonsmdisable(this)'><i class='ti-pencil' ></i></a>";
                    $aksi .= "<a title='Delete Data' href='javascript:void(0)' onclick='deleteData(\"{$data->id}\",\"{$data->nama_kursus}\",this)' class='btn btn-md btn-danger' data-id='{$data->id}' data-nama-kursus='{$data->nama_kursus}'><i class='ti-trash' data-toggle='tooltip' data-placement='bottom' ></i></a> ";
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

    public function create(){
        $icon = 'ni ni-dashlite';
        $subtitle = 'Tambah Riwayat Diklat Pegawai';
        return view('crudriwayatdiklat.create',compact('subtitle','icon'));
    }

    public function edit(Request $request, $id){
        $data = RiwayatDiklat::find($request->id);
        $icon = 'ni ni-dashlite';
        $subtitle = 'Edit Riwayat Diklat Pegawai';
        return view('crudriwayatdiklat.edit',compact('subtitle','icon','data'));
    }

    public function save(Request $request){
        if(RiwayatDiklat::create($request->all())){
            $response = array('success'=>1,'msg'=>'Berhasil menambah data');
        }else{
            $response = array('success'=>2,'msg'=>'Gagal menambah data');
        }
        return $response;
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
