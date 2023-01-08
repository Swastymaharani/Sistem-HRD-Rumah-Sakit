{{-- https://www.positronx.io/laravel-datatables-example/ --}}

@extends('layouts.authapp')
{{-- @section('action')

@endsection --}}
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Beranda</title>
</head>
<body>

{{-- @if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
</div> 
@endif --}}

<div class="row gy-3 d-none" id="loaderspin">
    <div class="col-md-12">
        <div class="col-md-12" align="center">
            &nbsp;
        </div>
        <div class="d-flex align-items-center">
          <div class="col-md-12" align="center">
            <div class="spinner-border ms-auto" role="status" aria-hidden="true"></div>
          </div>
        </div>
        <div class="col-md-12" align="center">
            <strong>Loading...</strong>
        </div>
    </div>
</div>
<div class="card d-none" id="filterrow">
    <div class="card-body" style="background:#f7f9fd">
        <div class="row gy-3" >
            
        </div>
    </div>
</div>

<!-- <div class="nk-fmg-body-content"> -->
    <div class="nk-fmg-quick-list nk-block">
        {{-- <div class="card">
            <div class="card-body">
                <div>
                    <table id="{{$table_id}}" class="table table-striped table-bordered nowrap" style="width:100%">
                        <thead style="color:#526484; font-size:11px;">
                            
                            <th width="1%">No</th>
                            <th width="10%">No. Induk</th>
                            <th width="10%">Nama</th>
                            <th width="10%">Status Pegawai</th>
                            <th width="10%">Profesi</th>
                            <th width="10%">Alamat</th>
                            <th width="10%">Aksi</th>
                        </thead>
                        
                    </table>
                </div>
            </div>
        </div> --}}
        <h1>Selamat datang, </h1>
    </div>
    
</body>
</html>
@endsection