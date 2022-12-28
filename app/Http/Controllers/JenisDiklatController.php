<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisDiklat;
use Illuminate\Support\Facades\File;
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
        // $data = JenisDiklat::all()->sortDesc();
        $datatables = DataTables::of($data);

        return $datatables
                ->addIndexColumn()
                ->addColumn('gambar1', function($data){
                    $url= asset('uploads/jenisdiklat/'.$data->gambar1);
                    return '<img src="'.$url.'" border="0" width="100" class="img-rounded" align="center" />';
                })
                ->addColumn('aksi', function($data){
                    $aksi = "";
                    $aksi .= "<a title='Edit Data' href='/jenisdiklat/".$data->jenis_diklat_id."/edit' class='btn btn-md btn-primary' data-toggle='tooltip' data-placement='bottom' onclick='buttonsmdisable(this)'><i class='ti-pencil' ></i></a>";
                    $aksi .= "<a title='Detail Diklat' href='/".$data->jenis_diklat_id."/diklat' class='btn btn-md btn-info' data-toggle='tooltip' data-placement='bottom' onclick='buttonsmdisable(this)'><i class='ti-book' ></i></a>";
                    // $aksi .= "<a title='Edit Data' href=('/jenisdiklat/".$data->jenis_diklat_id."/edit' class='btn btn-md btn-primary' data-toggle='tooltip' data-placement='bottom' onclick='buttonsmdisable(this)'><i class='ti-pencil' ></i></a>";
                    // $aksi .= "<a title='Edit Data' href={ route('jenisDiklat.edit', $data->jenis_diklat_id) } class='btn btn-md btn-primary data-toggle='tooltip' data-placement='bottom' onclick='buttonsmdisable(this)'><i class='ti-pencil' ></i></a>";
                    $aksi .= "<a title='Delete Data' href='javascript:void(0)' onclick='deleteData(\"{$data->jenis_diklat_id}\",\"{$data->nama_jenis_diklat}\",this)' class='btn btn-md btn-danger' data-jenis_diklat_id='{$data->jenis_diklat_id}' data-nama_jenis_diklat='{$data->nama_jenis_diklat}'><i class='ti-trash' data-toggle='tooltip' data-placement='bottom' ></i></a> ";
                    return $aksi;
                })
                ->rawColumns(['gambar1', 'aksi'])
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
        $tidakUnik = 0;
        $request->validate([
            'gambar1' => 'image|max:2048|mimes:jpg,jpeg,png'
        ]);

        $jenisDiklat = JenisDiklat::all();
        foreach (JenisDiklat::all() as $jenisDiklat) {
            if($jenisDiklat->nama_jenis_diklat==$request->input('nama_jenis_diklat')){
                $tidakUnik = 1;
            }
        }
        if($tidakUnik == 1){
            $response = array('success'=>2,'msg'=>'Nama Jenis Diklat harus Unik');
        }else{
            $jenisDiklat = new JenisDiklat;
            $jenisDiklat->nama_jenis_diklat = $request-> input('nama_jenis_diklat');
            if($request->hasFile('gambar1')){
                $file = $request->file('gambar1');
                $extension = $file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $file->move('uploads/jenisdiklat/', $filename);
                $jenisDiklat->gambar1 = $filename;
            }
            $jenisDiklat->save();

            $response = array('success'=>1,'msg'=>'Berhasil menambah data');
        }
        return $response;
    }

    public function update(Request $request, $jenis_diklat_id){
        $tidakUnik = 0;
        $request->validate([
            'gambar1' => 'image|max:2048|mimes:jpg,jpeg,png'
        ]);

        $jenisDiklat = JenisDiklat::all();
        foreach (JenisDiklat::all() as $jenisDiklat) {
            if($jenisDiklat->jenis_diklat_id==$jenis_diklat_id){
                continue;
            }else{
                if($jenisDiklat->nama_jenis_diklat==$request->input('nama_jenis_diklat')){
                    $tidakUnik = 1;
                }    
            }
        }
        if($tidakUnik == 1){
            $response = array('success'=>2,'msg'=>'Nama Jenis Diklat harus Unik');
        }else{
            $jenisDiklat = JenisDiklat::find($jenis_diklat_id);
            $jenisDiklat->nama_jenis_diklat = $request-> input('nama_jenis_diklat');
            if($request->hasFile('gambar1')){
                $path = 'uploads/jenisdiklat/'.$jenisDiklat->gambar1;
                if(File::exists($path)){
                    File::delete($path);
                }
                $file = $request->file('gambar1');
                $extension = $file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $file->move('uploads/jenisdiklat/', $filename);
                $jenisDiklat->gambar1 = $filename;
            }
            $jenisDiklat->save();

            $response = array('success'=>1,'msg'=>'Berhasil mengedit data');
        }
        return $response;

        // if($jenisDiklat){
        //     $response = array('success'=>1,'msg'=>'Berhasil mengedit data');
        // }else{
        //     $response = array('success'=>2,'msg'=>'Gagal mengedit data');
        // }
        // return $response;
    }
}
