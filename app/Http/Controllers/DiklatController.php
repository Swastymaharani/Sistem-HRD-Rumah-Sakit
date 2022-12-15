<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diklat;
use Yajra\DataTables\Facades\DataTables;

class DiklatController extends Controller
{
    public function index(){
        $icon = 'ni ni-dashlite';
        $subtitle = 'Diklat';
        $table_id = 'm_diklat';
        return view('cruddiklat.crud',compact('subtitle','table_id','icon'));
    }

    public function listData(Request $request){
        $data = Diklat::all();
        $datatables = DataTables::of($data);
        return $datatables
                ->addIndexColumn()
                ->addColumn('aksi', function($data){
                    $aksi = "";
                    // $aksi .= "<a title='Edit Data' href='/crud/".$data->id."/edit' class='btn btn-md btn-primary' data-toggle='tooltip' data-placement='bottom' onclick='buttonsmdisable(this)'><i class='ti-pencil' ></i></a>";
                    // $aksi .= "<a title='Delete Data' href='javascript:void(0)' onclick='deleteData(\"{$data->id}\",\"{$data->nim}\",this)' class='btn btn-md btn-danger' data-id='{$data->id}' data-nim='{$data->nim}'><i class='ti-trash' data-toggle='tooltip' data-placement='bottom' ></i></a> ";
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
