<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisDiklat;
use Yajra\DataTables\Facades\DataTables;

class JenisDiklatController extends Controller
{
    public function index(){
        $icon = 'ni ni-dashlite';
        $subtitle = 'Jenis Diklat';
        $table_id = 'm_jenis_diklat';
        return view('crudjenisdiklat.crud',compact('subtitle','table_id','icon'));
    }

    public function listData(Request $request){
        $data = JenisDiklat::all();
        $datatables = DataTables::of($data);
        return $datatables;
                // ->addIndexColumn()
                // ->addColumn('aksi', function($data){
                //     $aksi = "";
                //     // $aksi .= "<a title='Edit Data' href='/crud/".$data->id."/edit' class='btn btn-md btn-primary' data-toggle='tooltip' data-placement='bottom' onclick='buttonsmdisable(this)'><i class='ti-pencil' ></i></a>";
                //     // $aksi .= "<a title='Delete Data' href='javascript:void(0)' onclick='deleteData(\"{$data->id}\",\"{$data->nim}\",this)' class='btn btn-md btn-danger' data-id='{$data->id}' data-nim='{$data->nim}'><i class='ti-trash' data-toggle='tooltip' data-placement='bottom' ></i></a> ";
                //     return $aksi;
                // })
                // ->rawColumns(['aksi'])
                // ->make(true);
    }

    public function deleteData(Request $request){
        if(JenisDiklat::destroy($request->id)){
            $response = array('success'=>1,'msg'=>'Berhasil hapus data');
        }else{
            $response = array('success'=>2,'msg'=>'Gagal menghapus data');
        }
        return $response;
    }

    public function create(){
        $icon = 'ni ni-dashlite';
        $subtitle = 'Tambah Jenis Data Diklat';
        return view('crudjenisdiklat.create',compact('subtitle','icon'));
    }

    public function edit(Request $request, $id){
        $data = JenisDiklat::find($request->id);
        $icon = 'ni ni-dashlite';
        $subtitle = 'Edit Jenis Data Diklat';
        return view('crudjenisdiklat.edit',compact('subtitle','icon','data'));
    }

    public function save(Request $request){
        if(JenisDiklat::create($request->all())){
            $response = array('success'=>1,'msg'=>'Berhasil menambah data');
        }else{
            $response = array('success'=>2,'msg'=>'Gagal menambah data');
        }
        return $response;
    }

    public function update(Request $request, $id){
        $data = JenisDiklat::find($id);
        if($data->fill($request->all())->save()){
            $response = array('success'=>1,'msg'=>'Berhasil mengedit data');
        }else{
            $response = array('success'=>2,'msg'=>'Gagal mengedit data');
        }
        return $response;
    }
}

