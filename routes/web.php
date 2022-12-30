<?php

// use App\Http\Controllers\CrudController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\JenisDiklatController;
use App\Http\Controllers\DiklatController;
use App\Http\Controllers\RiwayatDiklatController;
use App\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Route CRUD mahasiswa
Route::get('/crud',[CrudController::class,'index'])->name('crud.list');
Route::get('/crud/create',[CrudController::class,'create'])->name('crud.create');
Route::get('/crud/{id}/edit',[CrudController::class,'edit'])->name('crud.edit');
Route::delete('/crud/{id}',[CrudController::class,'deleteData'])->name('crud.delete');
Route::post('/crud/save', [CrudController::class,'save'])->name('crud.save');
Route::post('/crud/{id}/update',[CrudController::class,'update'])->name('crud.update');
Route::post('/crud/listData',[CrudController::class,'listData'])->name('crud.listData');

//Route CRUD pegawai
Route::get('/',function(){
    return redirect('/pegawai');
});
Route::get('/pegawai',[PegawaiController::class,'index'])->name('pegawai.list');
Route::post('/pegawai/listData',[PegawaiController::class,'listData'])->name('pegawai.listData');
Route::get('/pegawai/create',[PegawaiController::class,'create'])->name('pegawai.create');
Route::get('/pegawai/{id}/edit',[PegawaiController::class,'edit'])->name('pegawai.edit');
Route::delete('/pegawai/{id}',[PegawaiController::class,'deleteData'])->name('pegawai.delete');
Route::post('/pegawai/save', [PegawaiController::class,'save'])->name('pegawai.save');
Route::post('/pegawai/{id}/update',[PegawaiController::class,'update'])->name('pegawai.update');

// Route CRUD Jenis Diklat
Route::get('/jenisdiklat',[JenisDiklatController::class,'index'])->name('jenisDiklat.list');
Route::post('/jenisdiklat/listdata',[JenisDiklatController::class,'listData'])->name('jenisDiklat.listData');
Route::get('/jenisdiklat/create',[JenisDiklatController::class,'create'])->name('jenisDiklat.create');
Route::get('/jenisdiklat/{id}/edit',[JenisDiklatController::class,'edit'])->name('jenisDiklat.edit');
Route::delete('/jenisdiklat/{id}',[JenisDiklatController::class,'deleteData'])->name('jenisDiklat.delete');
Route::post('/jenisdiklat/save', [JenisDiklatController::class,'save'])->name('jenisDiklat.store');
Route::post('/jenisdiklat/{id}/update',[JenisDiklatController::class,'update'])->name('jenisDiklat.update');

// Route CRUD Diklat
Route::get('/diklat',[DiklatController::class,'index'])->name('diklat.list');
Route::get('/{id}/diklat',[DiklatController::class,'diklatDetail'])->name('diklatDetail.list');
Route::post('/{id}/diklat/listdata',[DiklatController::class,'listData'])->name('diklat.listData');
Route::get('/diklat/create',[DiklatController::class,'create'])->name('diklat.create');
Route::get('/diklat/{id}/edit',[DiklatController::class,'edit'])->name('diklat.edit');
Route::delete('/diklat/{id}',[DiklatController::class,'deleteData'])->name('diklat.delete');
Route::post('/diklat/save', [DiklatController::class,'save'])->name('diklat.save');
Route::post('/diklat/{id}/update',[DiklatController::class,'update'])->name('diklat.update');

// Route CRUD RiwayatDiklat
Route::get('/riwayatdiklat',[RiwayatDiklatController::class,'index'])->name('riwayatDiklat.list');
Route::get('/{id}/riwayatdiklat',[RiwayatDiklatController::class,'riwayatdiklatDetail'])->name('riwayatdiklatDetail.list');
Route::post('/{id}/riwayatdiklat/listdata',[RiwayatDiklatController::class,'listData'])->name('riwayatDiklat.listData');
Route::get('/{id}/riwayatdiklat/create',[RiwayatDiklatController::class,'create'])->name('riwayatDiklat.create');
Route::get('/riwayatdiklat/{id}/edit',[RiwayatDiklatController::class,'edit'])->name('riwayatDiklat.edit');
Route::delete('/riwayatdiklat/{id}',[RiwayatDiklatController::class,'deleteData'])->name('riwayatDiklat.delete');
Route::post('/riwayatdiklat/save', [RiwayatDiklatController::class,'save'])->name('riwayatDiklat.save');
Route::post('/riwayatdiklat/{id}/update',[RiwayatDiklatController::class,'update'])->name('riwayatDiklat.update');