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
        return $datatables
                ->addIndexColumn()
                ->addColumn('aksi', function($data){
                    $aksi = "";
                    $aksi .= "<a title='Edit Data' href='/jenisdiklat/".$data->jenis_diklat_id."/edit' class='btn btn-md btn-primary' data-toggle='tooltip' data-placement='bottom' onclick='buttonsmdisable(this)'><i class='ti-pencil' ></i></a>";
                    // $aksi .= "<a title='Edit Data' href=('/jenisdiklat/".$data->jenis_diklat_id."/edit' class='btn btn-md btn-primary' data-toggle='tooltip' data-placement='bottom' onclick='buttonsmdisable(this)'><i class='ti-pencil' ></i></a>";
                    // $aksi .= "<a title='Edit Data' href={ route('jenisDiklat.edit', $data->jenis_diklat_id) } class='btn btn-md btn-primary data-toggle='tooltip' data-placement='bottom' onclick='buttonsmdisable(this)'><i class='ti-pencil' ></i></a>";
                    $aksi .= "<a title='Delete Data' href='javascript:void(0)' onclick='deleteData(\"{$data->jenis_diklat_id}\",\"{$data->nama_jenis_diklat}\",this)' class='btn btn-md btn-danger' data-jenis_diklat_id='{$data->jenis_diklat_id}' data-nama_jenis_diklat='{$data->nama_jenis_diklat}'><i class='ti-trash' data-toggle='tooltip' data-placement='bottom' ></i></a> ";
                    return $aksi;
                })
                ->rawColumns(['aksi'])
                ->make(true);
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
        $subtitle = 'Tambah Data Jenis Diklat';

        return view('crudjenisdiklat.create',compact('subtitle','icon'));
    }

    public function edit(Request $request, $jenis_diklat_id){
        $data = JenisDiklat::find($jenis_diklat_id);
        $icon = 'ni ni-dashlite';
        $subtitle = 'Edit Data Jenis Diklat';
        return view('crudjenisdiklat.edit',compact('subtitle','icon','data'));
    }

    public function save(Request $request){
        $jenisDiklat = JenisDiklat::all();
        $tidakUnik = 0;
        foreach (JenisDiklat::all() as $jenisDiklat) {
            if($jenisDiklat->nama_jenis_diklat==$request->input('nama_jenis_diklat')){
                $tidakUnik = 1;
            }
        }
        if($tidakUnik == 1){
            $response = array('success'=>2,'msg'=>'Nama Jenis Diklat harus Unik');
        }else{
            $response = array('success'=>1,'msg'=>'Berhasil menambah data');
            JenisDiklat::create([
                'nama_jenis_diklat' => $request-> input('nama_jenis_diklat'),
            ]);
        }
        return $response;
    }

    public function update(Request $request, $jenis_diklat_id){
        $data = JenisDiklat::find($jenis_diklat_id);
        // $data = JenisDiklat::where('jenis_diklat_id', '=', $id)->get();
        if($data->fill(
            [
            // $request->all()
                'nama_jenis_diklat' => $request-> input('nama_jenis_diklat'),
            ]
            )->save()){
                $response = array('success'=>1,'msg'=>'Berhasil mengedit data');
            }else{
                $response = array('success'=>2,'msg'=>'Gagal mengedit data');
            }
        return $response;
    }
}
