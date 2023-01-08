{{-- https://www.positronx.io/laravel-datatables-example/ --}}

@extends('layouts.app')
@section('action')
@endsection
@section('content')
{{-- <div class="nk-fmg-body-head d-none d-lg-flex">
    <div class="nk-fmg-search">
        <h4 class="card-title text-primary"><i class='{{$icon}}' data-toggle='tooltip' data-placement='bottom' title='Data {{$subtitle}}'></i>  {{strtoupper("Data ".$subtitle)}}</h4>
    </div>
    <div class="nk-fmg-actions">
        <div class="btn-group">
            <a href="{{ route('pegawai.create') }}" class="btn btn-sm btn-primary" onclick="buttondisable(this)"><em class="icon fas fa-plus"></em> <span>Add Pegawai</span></a>
        </div>
    </div>
</div> --}}
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
                <a href="{{ route('pegawai.list') }}" class="btn btn-sm btn-primary" onclick="buttondisable(this)"><em
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
                    <label for="kode" class="col-sm-2 col-form-label">Kode</label>
                    <input type="text" class="form-control" name='kode' value="{{ $data->kode }}" id="kode" readonly>
                </div>

                <div class="mb-3 row">
                    <label for="no_induk" class="col-sm-2 col-form-label">No. Induk</label>
                    <input type="text" class="form-control" name='no_induk' value="{{ $data->no_induk }}" id="no_induk" readonly>
                </div>

                <div class="mb-3 row"> <!--ada tabel absen gak?-->
                    <label for="absen_id" class="col-sm-2 col-form-label">Absen</label>
                    <input type="text" class="form-control" name='absen_id' value="{{ $data->absen_id }}" id="absen_id" readonly>
                </div>

                <div class="mb-3 row">
                    <label for="kode_bpjs" class="col-sm-2 col-form-label">Kode BPJS</label>
                    <input type="text" class="form-control" name='kode_bpjs' value="{{ $data->kode_bpjs }}" id="kode_bpjs" readonly>
                </div>

                <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <input type="text" class="form-control" name='nama' value="{{ $data->nama }}" id="nama" readonly>
                </div>

                <div class="mb-3 row">
                    <label for="nama_tercetak" class="col-sm-2 col-form-label">Nama Tercetak</label>
                    <input type="text" class="form-control" name='nama_tercetak' value="{{ $data->nama_tercetak }}" id="nama_tercetak" readonly>
                </div>

                <div class="mb-3 row">
                    <label for="gelar_depan" class="col-sm-2 col-form-label">Gelar Depan</label>
                    <input type="text" class="form-control" name='gelar_depan' value="{{ $data->gelar_depan }}" id="gelar_depan" readonly>
                </div>

                <div class="mb-3 row">
                    <label for="gelar_belakang" class="col-sm-2 col-form-label">Gelar Belakang</label>
                    <input type="text" class="form-control" name='gelar_belakang' value="{{ $data->gelar_belakang }}" id="gelar_belakang" readonly>
                </div>

                <div class="mb-3 row">
                    <label for="status_pegawai_id" class="col-sm-2 col-form-label">Status Pegawai</label>
                    <input type="text" class="form-control" name='status_pegawai_id' id="status_pegawai_id" readonly value="{{ $data->statusPegawai->nama }}">
                </div>

                <div class="mb-3 row">
                    <label for="jenis_profesi_id" class="col-sm-2 col-form-label">Jenis Profesi</label>
                    <input type="text" class="form-control" name='jenis_profesi_id' id="jenis_profesi_id" readonly value="{{ $data->jenisProfesi->nama_profesi }}">
                </div>

                <div class="mb-3 row">
                    <label for="spesialisasi_id" class="col-sm-2 col-form-label">Spesialisasi</label>
                    <input type="text" class="form-control" name='spesialisasi_id' id="spesialisasi_id" value="{{ $data->spesialisasi->nama }}" readonly>
                </div>

                <div class="mb-3 row">
                    <label for="sub_spesialisasi_id" class="col-sm-2 col-form-label">Sub Spesialisasi</label>
                    <input type="text" class="form-control" name='sub_spesialisasi_id' id="sub_spesialisasi_id" value="{{ $data->subSpesialisasi->nama }}" readonly>
                </div>

                <div class="mb-3 row">
                    <label for="qualifikasi_id" class="col-sm-2 col-form-label">Qualifikasi</label>
                    <input type="text" class="form-control" name='qualifikasi_id' id="qualifikasi_id" value="{{ $data->kualifikasi->nama }}" readonly>
                </div>

                <div class="mb-3 row">
                    <label for="pendidikan_terakhir_id" class="col-sm-5 col-form-label">Pendidikan Terakhir</label>
                    <input type="text" class="form-control" name='pendidikan_terakhir_id' id="pendidikan_terakhir_id" value="{{ $data->pendidikan->nama }}" readonly>
                </div>

                <div class="mb-3 row"> 
                    <label for="jabatan_fungsional_terakhir" class="col-sm-5 col-form-label">Jabatan Fungsional Terakhir</label>
                    <input type="text" class="form-control" name='jabatan_fungsional_terakhir' id="jabatan_fungsional_terakhir" value="{{ $data->jabatanFungsional->jabatan_kum }}" readonly> 
                </div> 

                <div class="mb-3 row">
                    <label for="jabatan_struktural_id" class="col-sm-2 col-form-label">Jabatan Struktural</label>
                    <input type="text" class="form-control" name='jabatan_struktural_id' id="jabatan_struktural_id" value="{{ $data->jabatanStruktural->nama_jabatan_singkat}}" readonly>
                </div>

                <div class="mb-3 row">
                    <label for="unit_id" class="col-sm-2 col-form-label">Unit</label>
                    <input type="text" class="form-control" name='unit_id' id="unit_id" value="{{ $data->unit->nama }}" readonly>
                </div>

                <div class="mb-3 row">
                    <label for="subunit_id" class="col-sm-2 col-form-label">Sub Unit</label>
                    <input type="text" class="form-control" name='subunit_id' id="subunit_id" value="{{ $data->subUnit->nama_subunit }}" readonly>
                </div>

                <div class="mb-3 row">
                    <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                    <input type="text" class="form-control" name='tempat_lahir' value="{{ $data->tempat_lahir }}" id="tempat_lahir" readonly>
                </div>

                <div class="mb-3 row">
                    <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" name='tanggal_lahir' value="{{ $data->tanggal_lahir }}" id="tanggal_lahir" readonly>
                </div>

                <div class="mb-3 row">
                    <label for="jeniskelamin_id" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <input type="text" class="form-control" name='jeniskelamin_id' id="jeniskelamin_id" value="{{ $data->jenisKelamin->nama }}" readonly>
                </div>

                <div class="mb-3 row">
                    <label for="agama_id" class="col-sm-2 col-form-label">Agama</label>
                    <input type="text" class="form-control" name='agama_id' id="agama_id" value="{{ $data->agama->nama }}" readonly>
                </div>

                <div class="mb-3 row">
                    <label for="bahasa_aktif_id" class="col-sm-2 col-form-label">Bahasa Aktif</label>
                    <input type="text" class="form-control" name='bahasa_aktif_id' id="bahasa_aktif_id"  value="{{ $data->bahasaAktif->nama }}" readonly>
                </div>

                <div class="mb-3 row">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <input type="text" class="form-control" name='alamat' value="{{ $data->alamat }}" id="alamat" readonly>
                </div>

                <div class="mb-3 row">
                    <label for="dusun" class="col-sm-2 col-form-label">Dusun</label>
                    <input type="text" class="form-control" name='dusun' value="{{ $data->dusun }}" id="dusun" readonly>
                </div>

                <div class="mb-3 row">
                    <label for="desa_id" class="col-sm-2 col-form-label">Desa</label>
                    <input type="text" class="form-control" name='desa_id' value="{{ $data->desa_id }}" id="desa_id" readonly>
                </div>

                <div class="mb-3 row"> 
                    <label for="kecamatan_id" class="col-sm-2 col-form-label">Kecamatan</label>
                    <input type="text" class="form-control" name='kecamatan_id' id="kecamatan_id" value="{{ $data->kecamatan->nama_kecamatan }}" readonly>
                </div>

                <div class="mb-3 row"> 
                    <label for="kabupaten_id" class="col-sm-2 col-form-label">Kabupaten</label>
                    <input type="text" class="form-control" name='kabupaten_id' id="kabupaten_id" value="{{ $data->kabupaten->nama_kabupaten }}" readonly>
                </div>

                <div class="mb-3 row"> 
                    <label for="provinsi_id" class="col-sm-2 col-form-label">Provinsi</label>
                    <input type="text" class="form-control" name='provinsi_id' id="provinsi_id" value="{{ $data->provinsi->nama_provinsi }}" readonly>
                </div>

                <div class="mb-3 row">
                    <label for="kodepos" class="col-sm-2 col-form-label">Kode Pos</label>
                    <input type="text" class="form-control" name='kodepos' value="{{ $data->kodepos }}" id="kodepos" readonly>
                </div>

                <div class="mb-3 row">
                    <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                    <input type="text" class="form-control" name='nik' value="{{ $data->nik }}" id="nik" readonly>
                </div>

                <div class="mb-3 row">
                    <label for="npwp" class="col-sm-2 col-form-label">NPWP</label>
                    <input type="text" class="form-control" name='npwp' value="{{ $data->npwp }}" id="npwp" readonly>
                </div>

                <div class="mb-3 row">
                    <label for="file_photo" class="col-sm-2 col-form-label">File Foto : </label>
                    <img src=<?php echo "uploads/pegawai/photo/".$data->file_photo ?> style="width: 300px; height: 200px; align: center">
                </div>

                <div class="mb-3 row">
                    <label for="file_ktp" class="col-sm-2 col-form-label">File KTP : </label>
                    <img src=<?php echo "uploads/pegawai/ktp/".$data->file_ktp ?> style="width: 300px; height: 200px; align: center">
                </div>

                <div class="mb-3 row">
                    <label for="file_kk" class="col-sm-2 col-form-label">File KK : </label>
                    <img src=<?php echo "uploads/pegawai/kk/".$data->file_kk ?> style="width: 300px; height: 200px; align: center">
                </div>

                <div class="mb-3 row">
                    <label for="file_npwp" class="col-sm-2 col-form-label">File NPWP : </label>
                    <img src=<?php echo "uploads/pegawai/npwp/".$data->file_npwp ?> style="width: 300px; height: 200px; align: center">
                    
                </div>

                <div class="mb-3 row"> 
                    <label for="status_nikah_id" class="col-sm-2 col-form-label">Status Nikah</label>
                    <input type="text" class="form-control" name='status_nikah_id' id="status_nikah_id" value="{{ $data->statusNikah->nama }}" readonly>
                </div>

                <div class="mb-3 row">
                    <label for="status_daftar_id" class="col-sm-2 col-form-label">Status Daftar</label>
                    <input type="text" class="form-control" name='status_daftar_id' id="status_daftar_id" value="{{ $data->statusDaftar->status }}" readonly>
                </div> 
            </div>
        </div>
    </div>
@endsection
