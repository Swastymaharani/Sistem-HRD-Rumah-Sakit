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
                <a href="{{ route('crud.list') }}" class="btn btn-sm btn-primary" onclick="buttondisable(this)"><em
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
        <form name="formInputRiwayatDiklat" action="{{ url('/crud4/save') }}" method="POST">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="mb-3 row">
                        <label for="nim" class="col-sm-2 col-form-label">Id Pegawai</label>
                        <input type="text" class="form-control @error("pegawai_id") is-invalid @enderror" name="pegawai_id" value="{{ old("pegawai_id") }}" id="pegawai_id" >
                        @error('pegawai_id')
                             <div class="invalid-feedback"> {{ $message }}</div>
                        @enderror
                    </div>
                   
                    <div class="mb-3 row">
                        <label for="diklat_id" class="col-sm-2 col-form-label">Id Diklat</label>
                        <input type="text" class="form-control @error("diklat_id") is-invalid @enderror" name='diklat_id' value="{{ old('diklat_id') }}" id="diklat_id" >
                        @error('diklat_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3 row">
                        <label for="nama_kursus" class="col-sm-2 col-form-label">Nama Kursus</label>
                        <input type="text" class="form-control @error('nama_kursus') is-invalid @enderror" name='nama_kursus' value="{{ old('nama_kursus') }}" id="nama_kursus" >
                        @error('nama_kursus')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 row">
                        <label for="tempat" class="col-sm-2 col-form-label">Tempat Pelaksanaan</label>
                        <input type="text" class="form-control @error("tempat") is-invalid @enderror" name="tempat" value="{{ old("tempat") }}" id="tempat" >
                        @error('tempat')
                             <div class="invalid-feedback"> {{ $message }}</div>
                        @enderror
                    </div>
                   
                    <div class="mb-3 row">
                        <label for="jumlah_jam" class="col-sm-2 col-form-label">Lama Diklat (jam)</label>
                        <input type="text" class="form-control @error("jumlah_jam") is-invalid @enderror" name='jumlah_jam' value="{{ old('jumlah_jam') }}" id="jumlah_jam" >
                        @error('jumlah_jam')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3 row">
                        <label for="tanggal_kursus" class="col-sm-2 col-form-label">Tanggal Kursus</label>
                        <input type="date" class="form-control @error('tanggal_kursus') is-invalid @enderror" name='tanggal_kursus' value="{{ old('tanggal_kursus') }}" id="tanggal_kursus" >
                        @error('tanggal_kursus')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 row">
                        <label for="institusi_penyelenggara" class="col-sm-2 col-form-label">Institusi Penyelenggara</label>
                        <input type="text" class="form-control @error("institusi_penyelenggara") is-invalid @enderror" name="institusi_penyelenggara" value="{{ old("institusi_penyelenggara") }}" id="institusi_penyelenggara" >
                        @error('institusi_penyelenggara')
                             <div class="invalid-feedback"> {{ $message }}</div>
                        @enderror
                    </div>
                   
                    <div class="mb-3 row">
                        <label for="nomor_sertifikat" class="col-sm-2 col-form-label">Nomor Sertifikat</label>
                        <input type="text" class="form-control @error("nomor_sertifikat") is-invalid @enderror" name='nomor_sertifikat' value="{{ old('nomor_sertifikat') }}" id="nomor_sertifikat" >
                        @error('nomor_sertifikat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3 row">
                        <label for="tgl_sertifikat" class="col-sm-2 col-form-label">Tanggal Sertifikat</label>
                        <input type="date" class="form-control @error('tgl_sertifikat') is-invalid @enderror" name='tgl_sertifikat' value="{{ old('tgl_sertifikat') }}" id="tgl_sertifikat" >
                        @error('tgl_sertifikat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3 row">
                        <label for="tanggal_selesai_kursus" class="col-sm-2 col-form-label">Tempat Selesai Kursus</label>
                        <input type="text" class="form-control @error("tanggal_selesai_kursus") is-invalid @enderror" name="tanggal_selesai_kursus" value="{{ old("tanggal_selesai_kursus") }}" id="tanggal_selesai_kursus" >
                        @error('tanggal_selesai_kursus')
                             <div class="invalid-feedback"> {{ $message }}</div>
                        @enderror
                    </div>
                   
                    <div class="mb-3 row">
                        <label for="jabatan_ttd_sertifikat" class="col-sm-2 col-form-label">Jabatan TTD Sertifikat</label>
                        <input type="text" class="form-control @error("jabatan_ttd_sertifikat") is-invalid @enderror" name='jabatan_ttd_sertifikat' value="{{ old('jabatan_ttd_sertifikat') }}" id="jabatan_ttd_sertifikat" >
                        @error('jabatan_ttd_sertifikat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3 row">
                        <label for="is_aktif" class="col-sm-2 col-form-label">Riwayat aktif</label>
                        <input type="text" class="form-control @error('is_aktif') is-invalid @enderror" name='is_aktif' value="{{ old('is_aktif') }}" id="is_aktif" >
                        @error('is_aktif')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3 row">
                        <label for="is_valid" class="col-sm-2 col-form-label">Riwayat Valid</label>
                        <input type="text" class="form-control @error("is_valid") is-invalid @enderror" name="is_valid" value="{{ old("is_valid") }}" id="is_valid" >
                        @error('is_valid')
                             <div class="invalid-feedback"> {{ $message }}</div>
                        @enderror
                    </div>
                   
                    <div class="mb-3 row">
                        <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                        <input type="text" class="form-control @error("keterangan") is-invalid @enderror" name='keterangan' value="{{ old('keterangan') }}" id="keterangan" >
                        @error('keterangan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3 row">
                        <label for="file_sertifikat" class="col-sm-2 col-form-label">File Sertifikat</label>
                        <input type="text" class="form-control @error('file_sertifikat') is-invalid @enderror" name='file_sertifikat' value="{{ old('file_sertifikat') }}" id="file_sertifikat" >
                        @error('file_sertifikat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
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


function store(){
        // var nim = document.getElementById("nim").value;
        if (document.forms["formPendaftaran"]["nim"].value == "") {
                CustomSwal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'NIM Tidak Boleh Kosong',
                })
                document.forms["formPendaftaran"]["nim"].focus();
                return false;
            }
        if (document.forms["formPendaftaran"]["nim"].value =="") {
                CustomSwal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'NIM Sudah Ada',
                })
                document.forms["formPendaftaran"]["nim"].focus();
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
            if (document.forms["formPendaftaran"]["alamat"].value == "") {
                CustomSwal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Alamat Tidak Boleh Kosong',
                })
                document.forms["formPendaftaran"]["alamat"].focus();
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
        if (result.isConfirmed) {
            $.ajax({
                url:"{{url('/crud/save')}}",
                data:{
                    _method:"POST",
                    _token:"{{csrf_token()}}",
                    nim:$("#nim").val(),
                    nama:$("#nama").val(),
                    alamat:$("#alamat").val(),
                },
                type:"POST",
                dataType:"JSON",
                success:function(data){
                    if(data.success == 1){
                        CustomSwal.fire('Sukses', data.msg, 'success').then((result) => {
                            if (result.isConfirmed) {
                                window.location.replace("{{ url('crud') }}");
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