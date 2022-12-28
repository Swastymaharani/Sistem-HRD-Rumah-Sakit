<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisDiklat;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\View;

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
            // $file_gambar1_nama = time().'.'.$request->gambar1->extension();

            // $request->gambar1->move(public_path('images'), $file_gambar1_nama);
            // JenisDiklat::create([

                //     'gambar1'           => $request-> input('gambar1'),
                // ]);
                // $path = 'images/';
                // $file_gambar1 = $request->file('gambar1');
                // $file_gambar1_name = time().'_'.$file_gambar1->getClientOriginalName();
                // $upload_gambar1 = $file_gambar1->storeAs($path, $file_gambar1_name, 'public');

                // JenisDiklat::insert([
                //     'nama_jenis_diklat' => $request-> input('nama_jenis_diklat'),
                //     'gambar1'           => $request->file('gambar1'),
                // ]);
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
