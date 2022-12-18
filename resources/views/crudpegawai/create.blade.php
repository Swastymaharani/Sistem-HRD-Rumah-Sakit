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
        <form name="formPendaftaran" action="{{ url('/pegawai/save') }}" method="POST" >
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
                        <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                        <input type="text" class="form-control" name='tempat_lahir' value="{{ old('tempat_lahir') }}" id="tempat_lahir" >
                    </div>

                    <div class="mb-3 row">
                        <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" name='tanggal_lahir' value="{{ old('tanggal_lahir') }}" id="tanggal_lahir" >
                    </div>

                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <input type="text" class="form-control" name='alamat' value="{{ old('alamat') }}" id="Alamat" >
                    </div>

                    <div class="mb-3 row">
                        <label for="dusun" class="col-sm-2 col-form-label">Dusun</label>
                        <input type="text" class="form-control" name='dusun' value="{{ old('dusun') }}" id="dusun" >
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
        if (document.forms["formPendaftaran"]["jabatan_fungsional_terakhir"].value == "") {
            CustomSwal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Jabatan Fungsional Terakhir Tidak Boleh Kosong',
            })
            document.forms["formPendaftaran"]["jabatan_fungsional_terakhir"].focus();
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
        if (document.forms["formPendaftaran"]["alamat"].value == "") {
            CustomSwal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Alamat Tidak Boleh Kosong',
            })
            document.forms["formPendaftaran"]["alamat"].focus();
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

    // buttonsmdisable(elm);
    CustomSwal.fire({
        icon:'question',
        text: 'Apakah Data Sudah Benar, '+document.forms["formPendaftaran"]["kode"].value+' ?',
        showCancelButton: true,
        confirmButtonText: 'Submit',
        cancelButtonText: 'Batal',
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        // var kode = $(this).find('input[name=kode]').val();
        if (result.isConfirmed) {
            $.ajax({
                url:"{{url('/pegawai/save')}}",
                data:{
                    _method:"POST",
                    _token:"{{csrf_token()}}",
                    kode:           $("#kode").val(),
                    no_induk:       $("#no_induk").val(),
                    kode_bpjs:      $("#kode_bpjs").val(),
                    nama:           $("#nama").val(),
                    nama_tercetak:  $("#nama_tercetak").val(),
                    gelar_depan:    $("#gelar_depan").val(),
                    gelar_belakang: $("#gelar_belakang").val(),
                    tempat_lahir:   $("#tempat_lahir").val(),
                    tanggal_lahir:  $("#tanggal_lahir").val(),
                    alamat:         $("#alamat").val(),
                    dusun:          $("#dusun").val(),
                    kodepos:        $("#kodepos").val(),
                    nik:            $("#nik").val(),
                    npwp:           $("#npwp").val(),
                    file_photo:     $("#file_photo").val(),
                    file_kk:        $("#file_kk").val(),
                    file_npwp:      $("#file_npwp").val()
                },
                type:"POST",
                dataType:"JSON",
                success:function(data){
                    if(data.success == 1){
                        CustomSwal.fire('Sukses', data.msg, 'success').then((result) => {
                            if (result.isConfirmed) {
                                window.location.replace("{{ url('pegawai') }}");
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