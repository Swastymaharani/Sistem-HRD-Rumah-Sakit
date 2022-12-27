<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Diklat;
use App\Models\JenisDiklat;

class DiklatController extends Controller
{
    public function index(){
        $icon = 'ni ni-dashlite';
        $subtitle = 'Diklat';
        $table_id = 'm_diklat';
        return view('cruddiklat.crud',compact('subtitle','table_id','icon'));
    }

    public function diklatDetail($id){
        $icon = 'ni ni-dashlite';
        $subtitle = 'Diklat Detail';
        $table_id = 'm_diklat';
        $diklat = Diklat::find($id);
        $jenis_diklat = JenisDiklat::find($id);
        $jenis_diklat_id = $id;
        return view('cruddiklat.crud',compact('subtitle','table_id','icon', 'jenis_diklat_id', 'diklat', 'jenis_diklat'));
    }

    // public function listData(Request $request, $jenis_diklat_id){
    public function listData(Request $request, $jenis_diklat_id){
        $data = Diklat::select('id_diklat', 'jenis_diklat_id', 'no_urut', 'nama_diklat')->where('jenis_diklat_id', $jenis_diklat_id)->get();
        $datatables = DataTables::of($data);
        return $datatables
                ->addIndexColumn()
                ->addColumn('aksi', function($data){
                     $aksi = "";
                     $aksi .= "<a title='Edit Data' href='/diklat/".$data->id_diklat."/edit' class='btn btn-md btn-primary' data-toggle='tooltip' data-placement='bottom' onclick='buttonsmdisable(this)'><i class='ti-pencil' ></i></a>";
                     $aksi .= "<a title='Delete Data' href='javascript:void(0)' onclick='deleteData(\"{$data->id_diklat}\",\"{$data->nama_diklat}\",this)' class='btn btn-md btn-danger' data-id_diklat='{$data->id_diklat}' data-nama_diklat='{$data->nama_diklat}'><i class='ti-trash' data-toggle='tooltip' data-placement='bottom' ></i></a> ";
                     return $aksi;
                })
                ->rawColumns(['aksi'])
                ->make(true);
    }

    public function deleteData(Request $request){
        if(Diklat::destroy($request->id)){
            $response = array('success'=>1,'msg'=>'Berhasil hapus data');
        }else{
            $response = array('success'=>2,'msg'=>'Gagal menghapus data');
        }
        return $response;
    }

    public function create(){
        $icon = 'ni ni-dashlite';
        $subtitle = 'Tambah Data Diklat';
        
        return view('cruddiklat.create',compact('subtitle','icon'));
    }

    public function edit(Request $request, $id){
        $data = Diklat::find($request->id);
        $icon = 'ni ni-dashlite';
        $subtitle = 'Edit Data Diklat';
        return view('cruddiklat.edit',compact('subtitle','icon','data'));
    }

    public function save(Request $request){
        if(Diklat::create($request->all())){
            $response = array('success'=>1,'msg'=>'Berhasil menambah data');
        }else{
            $response = array('success'=>2,'msg'=>'Gagal menambah data');
        }
        return $response;
    }

    public function update(Request $request, $id){
        $data = Diklat::find($id);
        if($data->fill($request->all())->save()){
            $response = array('success'=>1,'msg'=>'Berhasil mengedit data');
        }else{
            $response = array('success'=>2,'msg'=>'Gagal mengedit data');
        }
        return $response;
    }
}
