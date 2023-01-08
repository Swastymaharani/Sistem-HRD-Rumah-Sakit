{{-- https://www.positronx.io/laravel-datatables-example/ --}}

@extends('layouts.authapp')
@section('action')
@endsection
@section('content')
    <div class="nk-fmg-body-head d-none d-lg-flex">
        <div class="nk-fmg-search">
            <!-- <em class="icon ni ni-search"></em> -->
            <!-- <input type="text" class="form-control border-transparent form-focus-none" placeholder="Search files, folders"> -->
            <h4 class="card-title text-primary"><i class='{{ $icon }}' data-toggle='tooltip' data-placement='bottom'
                    title='{{ $subtitle }}'></i> {{ strtoupper($subtitle) }}</h4>
        </div>
        <div class="nk-fmg-actions">
            <div class="btn-group">
                <!-- <a href="#" target="_blank" class="btn btn-sm btn-success"><em class="icon ti-files"></em> <span>Export Data</span></a> -->
                <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalDefault">Modal Default</button> -->
                <!-- <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalDefault"><em class="icon ti-file"></em> <span>Filter Data</span></a> -->
                <!-- <a href="javascript:void(0)" class="btn btn-sm btn-success" onclick="filtershow()"><em class="icon ti-file"></em> <span>Filter Data</span></a> -->
                <a href="{{ url()->previous() }}" class="btn btn-sm btn-primary" onclick="buttondisable(this)"><em
                        class="icon fas fa-arrow-left"></em> <span>Kembali</span></a>
            </div>
        </div>

    </div>
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
            <div class="row gy-3">

            </div>
        </div>
        <!-- <div class="card-footer" style="background:#fff" align="right"> -->
        <div class="card-footer" style="background:#f7f9fd; padding-top:0px !important;">
            <div class="btn-group">
                <!-- <a href="javascript:void(0)" class="btn btn-sm btn-dark" onclick="filterclear()"><em class="icon ti-eraser"></em> <span>Clear Filter</span></a> -->
                <a href="javascript:void(0)" class="btn btn-sm btn-primary" onclick="filterdata()"><em
                        class="icon ti-reload"></em> <span>Submit Filter</span></a>
            </div>
        </div>
    </div>

    <!-- <div class="nk-fmg-body-content"> -->
    <div class="nk-fmg-quick-list nk-block">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3 row">
                        <label for="diklat_id" class="col-sm-2 col-form-label">Nama Diklat</label>
                        <input type="text" class="form-control" name='diklat_id' id="diklat_id" value="{{ $data->diklat->nama_diklat }}" readonly>
                    </div>

                    <div class="mb-3 row">
                        <label for="nama_kursus" class="col-sm-2 col-form-label">Nama Kursus</label>
                        <input type="text" class="form-control" name='nama_kursus' value="{{ $data->nama_kursus }}" id="nama_kursus" readonly>
                    </div>

                    <div class="mb-3 row">
                        <label for="tempat" class="col-sm-2 col-form-label">Tempat Pelaksanaan</label>
                        <input type="text" class="form-control" name="tempat" value="{{ $data->tempat }}" id="tempat" readonly>
                    </div>
                   
                    <div class="mb-3 row">
                        <label for="jumlah_jam" class="col-sm-2 col-form-label">Lama Diklat (jam)</label>
                        <input type="text" class="form-control" name='jumlah_jam' value="{{ $data->jumlah_jam }}" id="jumlah_jam" readonly>
                    </div>

                    <div class="mb-3 row">
                        <label for="tanggal_kursus" class="col-sm-2 col-form-label">Tanggal Kursus</label>
                        <input type="date" class="form-control" name='tanggal_kursus' value="{{ $data->tanggal_kursus }}" id="tanggal_kursus" readonly>
                    </div>
                    <div class="mb-3 row">
                        <label for="institusi_penyelenggara" class="col-sm-2 col-form-label">Institusi Penyelenggara</label>
                        <input type="text" class="form-control" name="institusi_penyelenggara" value="{{ $data->institusi_penyelenggara }}" id="institusi_penyelenggara" readonly>
                    </div>
                   
                    <div class="mb-3 row">
                        <label for="nomor_sertifikat" class="col-sm-2 col-form-label">Nomor Sertifikat</label>
                        <input type="text" class="form-control" name='nomor_sertifikat' value="{{ $data->nomor_sertifikat }}" id="nomor_sertifikat" readonly>
                    </div>

                    <div class="mb-3 row">
                        <label for="tgl_sertifikat" class="col-sm-2 col-form-label">Tanggal Sertifikat</label>
                        <input type="text" class="form-control" name='tgl_sertifikat' value="{{ $data->tgl_sertifikat }}" id="tgl_sertifikat" readonly>
                    </div>
                    
                    <div class="mb-3 row">
                        <label for="tanggal_selesai_kursus" class="col-sm-2 col-form-label">Tempat Selesai Kursus</label>
                        <input type="text" class="form-control" name="tanggal_selesai_kursus" value="{{ $data->tanggal_selesai_kursus }}" id="tanggal_selesai_kursus" readonly>
                    </div>
                   
                    <div class="mb-3 row">
                        <label for="jabatan_ttd_sertifikat" class="col-sm-2 col-form-label">Jabatan TTD Sertifikat</label>
                        <input type="text" class="form-control" name='jabatan_ttd_sertifikat' value="{{ $data->jabatan_ttd_sertifikat }}" id="jabatan_ttd_sertifikat" readonly>
                    </div>

                    <div class="mb-3 row">
                        <label for="is_aktif" class="col-sm-2 col-form-label">Status aktif</label>
                        <input type="text" class="form-control" name='is_aktif' id="is_aktif" value="@if($data->is_aktif==1)<?php echo"aktif"?>@else<?php echo"tidak aktif"?>@endif" readonly>       
                    </div>
                    
                    <div class="mb-3 row">
                        <label for="is_valid" class="col-sm-2 col-form-label">Status Valid</label>
                        <input type="text" class="form-control" name='is_valid' id="is_valid" value="@if($data->is_valid==1)<?php echo"valid"?>@else<?php echo"tidak valid"?>@endif" readonly>       
                    </div>
                   
                    <div class="mb-3 row">
                        <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                        <input type="text" class="form-control" name='keterangan' value="{{ $data->keterangan }}" id="keterangan" readonly>
                    </div>

                    <div class="mb-3 row">
                        <label for="file_sertifikat" class="col-sm-2 col-form-label">File Sertifikat</label>
                        <img src=<?php echo "uploads/riwayatdiklat/filesertifikat/".$data->file_sertifikat ?> style="width: 300px; height: 200px; align: center">
                    </div>

                </div>
            </div>
    </div>
@endsection