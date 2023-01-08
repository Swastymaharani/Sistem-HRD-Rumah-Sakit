<?php

// use App\Http\Controllers\CrudController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\JenisDiklatController;
use App\Http\Controllers\DiklatController;
use App\Http\Controllers\RiwayatDiklatController;
use App\Http\Controllers\UserRiwayatDiklatController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\LogInController;
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

//Route CRUD pegawai biasa
Route::get('/',function(){
    return redirect('/login')->middleware('guest');
});
Route::get('/logout', [LogInController::class, 'logout'])->name('user-logout')->middleware('auth');
Route::get('/login', [LogInController::class, 'index'])->name('user-login')->middleware('guest');
Route::post('/authlogin', [LogInController::class, 'authenticate'])->name('user-auth-login');
Route::get('/signup', [SignUpController::class, 'index'])->name('user-signup')->middleware('guest');
Route::post('/savesignup', [SignUpController::class, 'savesignup'])->name('user-simpan-tamu')->middleware('guest');

Route::group(['middleware' =>'auth'], function(){
    Route::get('/pegawai',[UserController::class,'index'])->name('authpegawai.list');

    // Route Detail & Edit
    Route::get('/pegawai/{id}/detail',[UserController::class,'detail'])->name('authpegawai.detail');
    Route::get('/pegawai/{id}/edit',[UserController::class,'edit'])->name('authpegawai.edit');
    // Route::delete('/pegawai/{id}',[UserController::class,'deleteData'])->name('authpegawai.delete');
    Route::post('/pegawai/{id}/update',[UserController::class,'update'])->name('authpegawai.update');

    // Route CRUD RiwayatDiklat
    Route::get('/authriwayatdiklat/{id}',[UserRiwayatDiklatController::class,'index'])->name('authriwayatDiklat.list');
    Route::get('/{id}/authriwayatdiklat',[UserRiwayatDiklatController::class,'riwayatdiklatDetail'])->name('authriwayatdiklatDetail.list');
    Route::post('/{id}/authriwayatdiklat/listdata',[UserRiwayatDiklatController::class,'listData'])->name('authriwayatDiklat.listData');
    Route::get('/{id}/authriwayatdiklat/create',[UserRiwayatDiklatController::class,'create'])->name('authriwayatDiklat.create');
    Route::get('/authriwayatdiklat/{id}/edit',[UserRiwayatDiklatController::class,'edit'])->name('authriwayatDiklat.edit');
    Route::delete('/authriwayatdiklat/{id}',[UserRiwayatDiklatController::class,'deleteData'])->name('authriwayatDiklat.delete');
    Route::post('/authriwayatdiklat/save/{id}', [UserRiwayatDiklatController::class,'save'])->name('authriwayatDiklat.save');
    Route::post('/authriwayatdiklat/{id}/update',[UserRiwayatDiklatController::class,'update'])->name('authriwayatDiklat.update');
    Route::get('/authriwayatdiklat/{id}/detail',[UserRiwayatDiklatController::class,'detail'])->name('authriwayatDiklat.detail');
});

Route::group(['middleware' =>['admin', 'auth']], function(){
    Route::prefix('/admin')->group(function() {
        //Route CRUD pegawai admin
        Route::get('/pegawai',[PegawaiController::class,'index'])->name('pegawai.list');
        Route::post('/pegawai/listData',[PegawaiController::class,'listData'])->name('pegawai.listData');
        Route::get('/pegawai/create',[PegawaiController::class,'create'])->name('pegawai.create');
        Route::get('/pegawai/{id}/edit',[PegawaiController::class,'edit'])->name('pegawai.edit');
        Route::delete('/pegawai/{id}',[PegawaiController::class,'deleteData'])->name('pegawai.delete');
        Route::post('/pegawai/save', [PegawaiController::class,'save'])->name('pegawai.save');
        Route::post('/pegawai/{id}/update',[PegawaiController::class,'update'])->name('pegawai.update');
        Route::get('/pegawai/{id}/detail',[PegawaiController::class,'detail'])->name('pegawai.detail');
        Route::get('/getSubspesialisasi/{id}',[PegawaiController::class,'getSubspesialisasi']);

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
        Route::post('/riwayatdiklat/save/{id}', [RiwayatDiklatController::class,'save'])->name('riwayatDiklat.save');
        Route::post('/riwayatdiklat/{id}/update',[RiwayatDiklatController::class,'update'])->name('riwayatDiklat.update');
        Route::get('/riwayatdiklat/{id}/detail',[RiwayatDiklatController::class,'detail'])->name('riwayatDiklat.detail');
    });
});