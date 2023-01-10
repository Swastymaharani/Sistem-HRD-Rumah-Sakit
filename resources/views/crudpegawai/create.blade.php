{{-- https://www.positronx.io/laravel-datatables-example/ --}}

@extends('layouts.app')
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
        <form name="formPendaftaran" id="formPendaftaran" action="{{ url('/admin/pegawai/save') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="mb-3 row">
                        <label for="kode" class="col-sm-2 col-form-label">Kode</label>
                        <input type="text" class="form-control" name='kode' value="{{ old('kode') }}" id="kode" >
                    </div>

                    <div class="mb-3 row">
                        <label for="no_induk" class="col-sm-2 col-form-label">No. Induk</label>
                        <input type="text" class="form-control" name='no_induk' value="{{ old('no_induk') }}" id="no_induk" >
                    </div>

                    <div class="mb-3 row"> <!--ada tabel absen gak?-->
                        <label for="absen_id" class="col-sm-2 col-form-label">Absen</label>
                        <input type="text" class="form-control" name='absen_id' value="{{ old('absen_id') }}" id="absen_id" >
                    </div>

                    <div class="mb-3 row">
                        <label for="kode_bpjs" class="col-sm-2 col-form-label">Kode BPJS</label>
                        <input type="text" class="form-control" name='kode_bpjs' value="{{ old('kode_bpjs') }}" id="kode_bpjs" >
                    </div>

                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <input type="text" class="form-control" name='nama' value="{{ old('nama') }}" id="nama" >
                    </div>

                    <div class="mb-3 row">
                        <label for="nama_tercetak" class="col-sm-2 col-form-label">Nama Tercetak</label>
                        <input type="text" class="form-control" name='nama_tercetak' value="{{ old('nama_tercetak') }}" id="nama_tercetak" >
                    </div>

                    <div class="mb-3 row">
                        <label for="gelar_depan" class="col-sm-2 col-form-label">Gelar Depan</label>
                        <input type="text" class="form-control" name='gelar_depan' value="{{ old('gelar_depan') }}" id="gelar_depan" >
                    </div>

                    <div class="mb-3 row">
                        <label for="gelar_belakang" class="col-sm-2 col-form-label">Gelar Belakang</label>
                        <input type="text" class="form-control" name='gelar_belakang' value="{{ old('gelar_belakang') }}" id="gelar_belakang" >
                    </div>

                    <div class="mb-3 row">
                        <label for="status_pegawai_id" class="col-sm-2 col-form-label">Status Pegawai</label>
                        <select type="text" class="form-control" name='status_pegawai_id' id="status_pegawai_id">
                            <option value="{{ old('status_pegawai_id') }}">Pilih Status Pegawai</option>
                            @foreach ($statusPegawai as $sp)
                                <option value= {{ $sp->id }} >{{ $sp->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3 row">
                        <label for="jenis_profesi_id" class="col-sm-2 col-form-label">Jenis Profesi</label>
                        <select type="text" class="form-control" name='jenis_profesi_id' id="jenis_profesi_id">
                            <option value="{{ old('jenis_profesi_id') }}">Pilih Jenis Profesi</option>
                            @foreach ($jenisProfesi as $jp)
                                <option value= {{ $jp->id }} >{{ $jp->nama_profesi }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3 row">
                        <label for="spesialisasi_id" class="col-sm-2 col-form-label">Spesialisasi</label>
                        <select type="text" class="form-control formselect required" name='spesialisasi_id' id="spesialisasi_id">
                            <option value="{{ old('spesialisasi_id') }}">Pilih Spesialisasi</option>
                            @foreach ($spesialisasi as $sp)
                                <option value= {{ $sp->id }} >{{ $sp->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3 row">
                        <label for="sub_spesialisasi_id" class="col-sm-2 col-form-label">Sub Spesialisasi</label>
                        <select type="text" class="form-control formselect required" name='sub_spesialisasi_id' id="sub_spesialisasi_id">
                            <option value="{{ old('sub_spesialisasi_id') }}">Pilih Spesialisasi Dulu</option>
                            {{-- @foreach ($subSpesialisasi as $sS)
                                <option value= {{ $sS->id }} >{{ $sS->nama }}</option>
                            @endforeach --}}
                        </select>
                    </div>

                    <div class="mb-3 row">
                        <label for="qualifikasi_id" class="col-sm-2 col-form-label">Qualifikasi</label>
                        <select type="text" class="form-control" name='qualifikasi_id' id="qualifikasi_id">
                            <option value="{{ old('qualifikasi_id') }}">Pilih Qualifikasi</option>
                            @foreach ($kualifikasi as $ku)
                                <option value= {{ $ku->id }} >{{ $ku->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3 row">
                        <label for="pendidikan_terakhir_id" class="col-sm-5 col-form-label">Pendidikan Terakhir</label>
                        <select type="text" class="form-control" name='pendidikan_terakhir_id' id="pendidikan_terakhir_id">
                            <option value="{{ old('pendidikan_terakhir_id') }}">Pilih Pendidikan Terakhir</option>
                            @foreach ($pendidikan as $pe)
                                <option value= {{ $pe->id }} >{{ $pe->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3 row"> <!--ada tabel relasinya ato gmna ni-->
                        <label for="jabatan_fungsional_terakhir" class="col-sm-5 col-form-label">Jabatan Fungsional Terakhir</label>
                        <select type="text" class="form-control" name='jabatan_fungsional_terakhir' id="jabatan_fungsional_terakhir">
                            <option value="{{ old('jabatan_fungsional_terakhir') }}">Pilih Jabatan Fungsional</option>
                            @foreach ($jabatanFungsional as $jF)
                                <option value= {{ $jF->jabatan_fungsional_id }} >{{ $jF->jabatan_kum}}</option>
                            @endforeach
                        </select>
                    </div> 

                    <div class="mb-3 row">
                        <label for="jabatan_struktural_id" class="col-sm-2 col-form-label">Jabatan Struktural</label>
                        <select type="text" class="form-control" name='jabatan_struktural_id' id="jabatan_struktural_id">
                            <option value="{{ old('jabatan_struktural_id') }}">Pilih Jabatan Struktural</option>
                            @foreach ($jabatanStruktural as $jS)
                                <option value= {{ $jS->jabatan_id }} >{{ $jS->nama_jabatan_singkat }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3 row">
                        <label for="unit_id" class="col-sm-2 col-form-label">Unit</label>
                        <select type="text" class="form-control formselect required" name='unit_id' id="unit_id">
                            <option value="{{ old('unit_id') }}">Pilih Unit</option>
                            @foreach ($unit as $un)
                                <option value= {{ $un->id }} >{{ $un->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3 row">
                        <label for="subunit_id" class="col-sm-2 col-form-label">Sub Unit</label>
                        <select type="text" class="form-control formselect required" name='subunit_id' id="subunit_id">
                            <option value="{{ old('subunit_id') }}">Pilih Unit Dulu</option>
                            {{-- @foreach ($subUnit as $sU)
                                <option value= {{ $sU->id }} >{{ $sU->nama_subunit }}</option>
                            @endforeach --}}
                        </select>
                    </div>

                    <div class="mb-3 row">
                        <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                        <input type="text" class="form-control" name='tempat_lahir' value="{{ old('tempat_lahir') }}" id="tempat_lahir" >
                    </div>

                    <div class="mb-3 row">
                        <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" name='tanggal_lahir' value="{{ old('tanggal_lahir') }}" id="tanggal_lahir" >
                    </div>

                    <div class="mb-3 row">
                        <label for="jeniskelamin_id" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <select type="text" class="form-control" name='jeniskelamin_id' id="jeniskelamin_id">
                            <option value="{{ old('jeniskelamin_id') }}">Pilih Jenis Kelamin</option>
                            @foreach ($jenisKelamin as $jK)
                                <option value= {{ $jK->id }} >{{ $jK->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3 row">
                        <label for="agama_id" class="col-sm-2 col-form-label">Agama</label>
                        <select type="text" class="form-control" name='agama_id' id="agama_id">
                            <option value="{{ old('agama_id') }}">Pilih Agama</option>
                            @foreach ($agama as $ag)
                                <option value= {{ $ag->id }} >{{ $ag->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3 row">
                        <label for="bahasa_aktif_id" class="col-sm-2 col-form-label">Bahasa Aktif</label>
                        <select type="text" class="form-control" name='bahasa_aktif_id' id="bahasa_aktif_id">
                            <option value="{{ old('bahasa_aktif_id') }}">Pilih Bahasa Aktif</option>
                            @foreach ($bahasaAktif as $bA)
                                <option value= {{ $bA->id }} >{{ $bA->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3 row"> 
                        <label for="provinsi_id" class="col-sm-2 col-form-label">Provinsi</label>
                        <select type="text" class="form-control formselect required" name='provinsi_id' id="provinsi_id">
                            <option value="{{ old('provinsi_id') }}">Pilih Provinsi</option>
                            @foreach ($provinsi as $prov)
                                <option value= {{ $prov->id }} >{{ $prov->nama_provinsi }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3 row"> 
                        <label for="kabupaten_id" class="col-sm-2 col-form-label">Kabupaten</label>
                        <select type="text" class="form-control formselect required" name='kabupaten_id' id="kabupaten_id">
                            <option value="{{ old('kabupaten_id') }}">Pilih Provinsi Dulu</option>
                            {{-- @foreach ($kabupaten as $kab)
                                <option value= {{ $kab->id }} >{{ $kab->nama_kabupaten }}</option>
                            @endforeach --}}
                        </select>
                    </div>

                    <div class="mb-3 row"> 
                        <label for="kecamatan_id" class="col-sm-2 col-form-label">Kecamatan</label>
                        <select type="text" class="form-control formselect required" name='kecamatan_id' id="kecamatan_id">
                            <option value="{{ old('kecamatan_id') }}">Pilih Kabupaten Dulu</option>
                            {{-- @foreach ($kecamatan as $kec)
                                <option value= {{ $kec->id }} >{{ $kec->nama_kecamatan }}</option>
                            @endforeach --}}
                        </select>
                    </div>

                    <div class="mb-3 row">
                        <label for="desa_id" class="col-sm-2 col-form-label">Desa</label>
                        <input type="text" class="form-control" name='desa_id' value="{{ old('desa_id') }}" id="desa_id" >
                    </div>

                    <div class="mb-3 row">
                        <label for="dusun" class="col-sm-2 col-form-label">Dusun</label>
                        <input type="text" class="form-control" name='dusun' value="{{ old('dusun') }}" id="dusun" >
                    </div>


                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <input type="text" class="form-control" name='alamat' value="{{ old('alamat') }}" id="alamat" >
                    </div>

                    <div class="mb-3 row">
                        <label for="kodepos" class="col-sm-2 col-form-label">Kode Pos</label>
                        <input type="text" class="form-control" name='kodepos' value="{{ old('kodepos') }}" id="kodepos" >
                    </div>

                    <div class="mb-3 row">
                        <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                        <input type="text" class="form-control" name='nik' value="{{ old('nik') }}" id="nik" >
                    </div>

                    <div class="mb-3 row">
                        <label for="npwp" class="col-sm-2 col-form-label">NPWP</label>
                        <input type="text" class="form-control" name='npwp' value="{{ old('npwp') }}" id="npwp" >
                    </div>

                    <div class="mb-3 row">
                        <label for="file_photo" class="col-sm-2 col-form-label">File Foto</label>
                        <input type="file" class="form-control" name='file_photo' value="{{ old('file_photo') }}" id="file_photo" >
                    </div>

                    <div class="mb-3 row">
                        <label for="file_ktp" class="col-sm-2 col-form-label">File KTP</label>
                        <input type="file" class="form-control" name='file_ktp' value="{{ old('file_ktp') }}" id="file_ktp" >
                    </div>

                    <div class="mb-3 row">
                        <label for="file_kk" class="col-sm-2 col-form-label">File KK</label>
                        <input type="file" class="form-control" name='file_kk' value="{{ old('file_kk') }}" id="file_kk" >
                    </div>

                    <div class="mb-3 row">
                        <label for="file_npwp" class="col-sm-2 col-form-label">File NPWP</label>
                        <input type="file" class="form-control" name='file_npwp' value="{{ old('file_npwp') }}" id="file_npwp" >
                    </div>

                    <div class="mb-3 row"> 
                        <label for="status_nikah_id" class="col-sm-2 col-form-label">Status Nikah</label>
                        <select type="text" class="form-control" name='status_nikah_id' id="status_nikah_id">
                            <option value="{{ old('status_nikah_id') }}">Pilih Status Nikah</option>
                            @foreach ($statusNikah as $sN)
                                <option value= {{ $sN->id }} >{{ $sN->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3 row">
                        <label for="status_daftar_id" class="col-sm-2 col-form-label">Status Daftar</label>
                        <select type="text" class="form-control" name='status_daftar_id' id="status_daftar_id">
                            <option value="{{ old('status_daftar_id') }}">Pilih Status Daftar</option>
                            @foreach ($statusDaftar as $sD)
                                <option value= {{ $sD->id }} >{{ $sD->status }}</option>
                            @endforeach
                        </select>
                    </div> 

                    <div class="mb-3 row">
                        <div class="col-sm-5"><a title='Tambah Data' href='javascript:void(0)' onclick='store()' class='btn btn-primary'>Simpan</a></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- </div> -->
@endsection
@push('script')
<script>

$(document).ready(function () {
    $('#spesialisasi_id').on('change', function () {
    let spesialisasi_id = $(this).val();
    $('#sub_spesialisasi_id').empty();
    $('#sub_spesialisasi_id').append('<option value="0" disabled selected>Processing...</option>');
    $.ajax({
        type: 'GET',
        url: '/admin/getSubspesialisasi/' + spesialisasi_id,
        success: function (response) {
            var response = JSON.parse(response);
            console.log(response);   
            $('#sub_spesialisasi_id').empty();
            $('#sub_spesialisasi_id').append(`<option value="0" disabled selected>Pilih Sub Spesialisasi</option>`);
            response.forEach(element => {
                $('#sub_spesialisasi_id').append(`<option value="${element['id']}">${element['nama']}</option>`);
                });
            }
        });
    });
});

$(document).ready(function () {
    $('#unit_id').on('change', function () {
    let unit_id = $(this).val();
    $('#subunit_id').empty();
    $('#subunit_id').append('<option value="0" disabled selected>Processing...</option>');
    $.ajax({
        type: 'GET',
        url: '/admin/getSubunit/' + unit_id,
        success: function (response) {
            var response = JSON.parse(response);
            console.log(response);   
            $('#subunit_id').empty();
            $('#subunit_id').append(`<option value="0" disabled selected>Pilih Sub Unit</option>`);
            response.forEach(element => {
                $('#subunit_id').append(`<option value="${element['id']}">${element['nama_subunit']}</option>`);
                });
            }
        });
    });
});

$(document).ready(function () {
    $('#provinsi_id').on('change', function () {
    let provinsi_id = $(this).val();
    $('#kabupaten_id').empty();
    $('#kabupaten_id').append('<option value="0" disabled selected>Processing...</option>');
    $.ajax({
        type: 'GET',
        url: '/admin/getKabupaten/' + provinsi_id,
        success: function (response) {
            var response = JSON.parse(response);
            console.log(response);   
            $('#kabupaten_id').empty();
            $('#kabupaten_id').append(`<option value="0" disabled selected>Pilih Kabupaten</option>`);
            response.forEach(element => {
                $('#kabupaten_id').append(`<option value="${element['id']}">${element['nama_kabupaten']}</option>`);
                });
            }
        });
    });
});

$(document).ready(function () {
    $('#kabupaten_id').on('change', function () {
    let kabupaten_id = $(this).val();
    $('#kecamatan_id').empty();
    $('#kecamatan_id').append('<option value="0" disabled selected>Processing...</option>');
    $.ajax({
        type: 'GET',
        url: '/admin/getKecamatan/' + kabupaten_id,
        success: function (response) {
            var response = JSON.parse(response);
            console.log(response);   
            $('#kecamatan_id').empty();
            $('#kecamatan_id').append(`<option value="0" disabled selected>Pilih Kecamatan</option>`);
            response.forEach(element => {
                $('#kecamatan_id').append(`<option value="${element['id']}">${element['nama_kecamatan']}</option>`);
                });
            }
        });
    });
});

function store(){
    if (document.forms["formPendaftaran"]["kode"].value == "") {
        CustomSwal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Kode Tidak Boleh Kosong',
        })
        document.forms["formPendaftaran"]["kode"].focus();
        return false;
    }
    if (document.forms["formPendaftaran"]["no_induk"].value == "") {
        CustomSwal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'No. Induk Tidak Boleh Kosong',
        })
        document.forms["formPendaftaran"]["no_induk"].focus();
        return false;
        }
    if (document.forms["formPendaftaran"]["absen_id"].value == "") {
        CustomSwal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Absen Tidak Boleh Kosong',
        })
        document.forms["formPendaftaran"]["absen_id"].focus();
        return false;
        }
    if (document.forms["formPendaftaran"]["kode_bpjs"].value =="") {
        CustomSwal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Kode BPJS Tidak Boleh Kosong',
        })
        document.forms["formPendaftaran"]["kode_bpjs"].focus();
        return false;
    }  
    if (document.forms["formPendaftaran"]["nama"].value == "") {
        CustomSwal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Nama Tidak Boleh Kosong',
        })
        document.forms["formPendaftaran"]["nama"].focus();
        return false;
    }
    if (document.forms["formPendaftaran"]["nama_tercetak"].value == "") {
    CustomSwal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Nama Tercetak Tidak Boleh Kosong',
        })
        document.forms["formPendaftaran"]["nama_tercetak"].focus();
        return false;
    }
        if (document.forms["formPendaftaran"]["gelar_depan"].value == "") {
            CustomSwal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Gelar Depan Tidak Boleh Kosong',
            })
            document.forms["formPendaftaran"]["gelar_depan"].focus();
            return false;
        }
        if (document.forms["formPendaftaran"]["gelar_belakang"].value == "") {
            CustomSwal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Gelar Belakang Tidak Boleh Kosong',
            })
            document.forms["formPendaftaran"]["gelar_belakang"].focus();
            return false;
        }
        if (document.forms["formPendaftaran"]["status_pegawai_id"].value == "") {
            CustomSwal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Status Pegawai Tidak Boleh Kosong',
            })
            document.forms["formPendaftaran"]["status_pegawai_id"].focus();
            return false;
        }
        if (document.forms["formPendaftaran"]["jenis_profesi_id"].value == "") {
            CustomSwal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Jenis Profesi Tidak Boleh Kosong',
            })
            document.forms["formPendaftaran"]["jenis_profesi_id"].focus();
            return false;
        }
        if (document.forms["formPendaftaran"]["spesialisasi_id"].value == "") {
            CustomSwal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Spesialisasi Tidak Boleh Kosong',
            })
            document.forms["formPendaftaran"]["spesialisasi_id"].focus();
            return false;
        }
        if (document.forms["formPendaftaran"]["sub_spesialisasi_id"].value == "") {
            CustomSwal.fire({
                icon: 'error',
                title: 'Oops...',
                text: ' Sub Spesialisasi Tidak Boleh Kosong',
            })
            document.forms["formPendaftaran"]["sub_spesialisasi_id"].focus();
            return false;
        }
        if (document.forms["formPendaftaran"]["qualifikasi_id"].value == "") {
            CustomSwal.fire({
                icon: 'error',
                title: 'Oops...',
                text: ' Qualifikasi Tidak Boleh Kosong',
            })
            document.forms["formPendaftaran"]["qualifikasi_id"].focus();
            return false;
        }
        if (document.forms["formPendaftaran"]["pendidikan_terakhir_id"].value == "") {
            CustomSwal.fire({
                icon: 'error',
                title: 'Oops...',
                text: ' Pendidikan Terakhir Tidak Boleh Kosong',
            })
            document.forms["formPendaftaran"]["pendidikan_terakhir_id"].focus();
            return false;
        }
        if (document.forms["formPendaftaran"]["jabatan_fungsional_terakhir"].value == "") {
            CustomSwal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Jabatan Fungsional Terakhir Tidak Boleh Kosong',
            })
            document.forms["formPendaftaran"]["jabatan_fungsional_terakhir"].focus();
            return false;
        }
        if (document.forms["formPendaftaran"]["jabatan_struktural_id"].value == "") {
            CustomSwal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Jabatan Struktural Tidak Boleh Kosong',
            })
            document.forms["formPendaftaran"]["jabatan_struktural_id"].focus();
            return false;
        }
        if (document.forms["formPendaftaran"]["unit_id"].value == "") {
            CustomSwal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Unit Tidak Boleh Kosong',
            })
            document.forms["formPendaftaran"]["unit_id"].focus();
            return false;
        }
        if (document.forms["formPendaftaran"]["subunit_id"].value == "") {
            CustomSwal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Sub Unit Tidak Boleh Kosong',
            })
            document.forms["formPendaftaran"]["subunit_id"].focus();
            return false;
        }
        if (document.forms["formPendaftaran"]["tempat_lahir"].value == "") {
            CustomSwal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Tempat Lahir Tidak Boleh Kosong',
            })
            document.forms["formPendaftaran"]["tempat_lahir"].focus();
            return false;
        }
        if (document.forms["formPendaftaran"]["tanggal_lahir"].value == "") {
            CustomSwal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Tanggal Lahir Tidak Boleh Kosong',
            })
            document.forms["formPendaftaran"]["tanggal_lahir"].focus();
            return false;
        }
        if (document.forms["formPendaftaran"]["jeniskelamin_id"].value == "") {
            CustomSwal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Jenis Kelamin Tidak Boleh Kosong',
            })
            document.forms["formPendaftaran"]["jeniskelamin_id"].focus();
            return false;
        }
        if (document.forms["formPendaftaran"]["agama_id"].value == "") {
            CustomSwal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Agama Tidak Boleh Kosong',
            })
            document.forms["formPendaftaran"]["agama_id"].focus();
            return false;
        }
        if (document.forms["formPendaftaran"]["bahasa_aktif_id"].value == "") {
            CustomSwal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Bahasa Aktif Tidak Boleh Kosong',
            })
            document.forms["formPendaftaran"]["bahasa_aktif_id"].focus();
            return false;
        }
                
        if (document.forms["formPendaftaran"]["provinsi_id"].value == "") {
            CustomSwal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Provinsi Tidak Boleh Kosong',
            })
            document.forms["formPendaftaran"]["provinsi_id"].focus();
            return false;
        }
        if (document.forms["formPendaftaran"]["kabupaten_id"].value == "") {
            CustomSwal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Kabupaten Tidak Boleh Kosong',
            })
            document.forms["formPendaftaran"]["kabupaten_id"].focus();
            return false;
        }
        if (document.forms["formPendaftaran"]["kecamatan_id"].value == "") {
            CustomSwal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Kecamatan Tidak Boleh Kosong',
            })
            document.forms["formPendaftaran"]["kecamatan_id"].focus();
            return false;
        }
        if (document.forms["formPendaftaran"]["desa_id"].value == "") {
            CustomSwal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Desa Tidak Boleh Kosong',
            })
            document.forms["formPendaftaran"]["desa_id"].focus();
            return false;
        }
        if (document.forms["formPendaftaran"]["dusun"].value == "") {
            CustomSwal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Dusun Tidak Boleh Kosong',
            })
            document.forms["formPendaftaran"]["dusun"].focus();
            return false;
        }
        if (document.forms["formPendaftaran"]["alamat"].value == "") {
            CustomSwal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Alamat Tidak Boleh Kosong',
            })
            document.forms["formPendaftaran"]["alamat"].focus();
            return false;
        }
        if (document.forms["formPendaftaran"]["kodepos"].value == "") {
            CustomSwal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Kode Pos Tidak Boleh Kosong',
            })
            document.forms["formPendaftaran"]["kodepos"].focus();
            return false;
        }
        if (document.forms["formPendaftaran"]["nik"].value == "") {
            CustomSwal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'NIK Tidak Boleh Kosong',
            })
            document.forms["formPendaftaran"]["nik"].focus();
            return false;
        }
        if (document.forms["formPendaftaran"]["npwp"].value == "") {
            CustomSwal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'NPWP Tidak Boleh Kosong',
            })
            document.forms["formPendaftaran"]["npwp"].focus();
            return false;
        }
        if (document.forms["formPendaftaran"]["file_photo"].value == "") {
            CustomSwal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'File Foto Tidak Boleh Kosong',
            })
            document.forms["formPendaftaran"]["file_photo"].focus();
            return false;
        }
        if (document.forms["formPendaftaran"]["file_ktp"].value == "") {
            CustomSwal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'File KTP Tidak Boleh Kosong',
            })
            document.forms["formPendaftaran"]["file_ktp"].focus();
            return false;
        }
        if (document.forms["formPendaftaran"]["file_kk"].value == "") {
            CustomSwal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'File KK Tidak Boleh Kosong',
            })
            document.forms["formPendaftaran"]["file_kk"].focus();
            return false;
        }
        if (document.forms["formPendaftaran"]["file_npwp"].value == "") {
            CustomSwal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'File NPWP Tidak Boleh Kosong',
            })
            document.forms["formPendaftaran"]["file_npwp"].focus();
            return false;
        }
        if (document.forms["formPendaftaran"]["status_nikah_id"].value == "") {
            CustomSwal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Status Nikah Tidak Boleh Kosong',
            })
            document.forms["formPendaftaran"]["status_nikah_id"].focus();
            return false;
        }
        if (document.forms["formPendaftaran"]["status_daftar_id"].value == "") {
            CustomSwal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Status Daftar Tidak Boleh Kosong',
            })
            document.forms["formPendaftaran"]["status_daftar_id"].focus();
            return false;
        }

    // buttonsmdisable(elm);
    CustomSwal.fire({
        icon:'question',
        text: 'Apakah Data Sudah Benar, '+document.forms["formPendaftaran"]["nama"].value+' ?',
        showCancelButton: true,
        confirmButtonText: 'Submit',
        cancelButtonText: 'Batal',
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        // var kode = $(this).find('input[name=kode]').val();
        if (result.isConfirmed) {
            let formData = new FormData($('#formPendaftaran')[0]);
            $.ajax({
                url:"{{url('/admin/pegawai/save')}}",
                data:formData,
                contentType: false,
                processData: false,
                type:"POST",
                dataType:"JSON",
                success:function(data){
                    if(data.success == 1){
                        CustomSwal.fire('Sukses', data.msg, 'success').then((result) => {
                            if (result.isConfirmed) {
                                window.location.replace("{{ url('/admin/pegawai') }}");
                            }
                        });
                    }
                    else
                    {
                        CustomSwal.fire('Gagal', data.msg, 'error');
                    }
                },
                error:function(error){
                    CustomSwal.fire('Gagal', 'terjadi kesalahan sistem', 'error');
                    console.log(error.XMLHttpRequest);
                },
            });
        }
    });
}
</script>
@endpush

