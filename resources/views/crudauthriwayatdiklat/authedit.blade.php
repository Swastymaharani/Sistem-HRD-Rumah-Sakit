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
        {{-- Elemen form edit data mahasiswa "{{ $data->nama }}" --}}
        <form name="formPendaftaran" id="formPendaftaran" action="{{ route('authriwayatDiklat.update', $data->id_t_diklat)}}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- @method('PUT') --}}
            <div class="card">
                <div class="card-body">
                    <div class="mb-3 row">
                        <label for="diklat_id" class="col-sm-2 col-form-label">Nama Diklat</label>
                        <select type="text" class="form-control" name='diklat_id' id="diklat_id">
                            <option value="{{ $data->diklat_id }}" disabled>Pilih Diklat</option>
                            @foreach ($diklats as $diklat)
                                <option value= {{ $diklat->id_diklat }} 
                                    @if ($data->diklat_id === $diklat->id_diklat)
                                        SELECTED
                                    @endif>{{ $diklat->nama_diklat }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama_kursus" class="col-sm-2 col-form-label">Nama Kursus</label>
                        <input type="text" class="form-control" name='nama_kursus' value="{{ $data->nama_kursus }}" id="nama_kursus">
                    </div>
                    <div class="mb-3 row">
                        <label for="tempat" class="col-sm-2 col-form-label">Tempat Pelaksanaan</label>
                        <input type="text" class="form-control" name="tempat" value="{{ $data->tempat }}" id="tempat" >
                    </div>
                   
                    <div class="mb-3 row">
                        <label for="jumlah_jam" class="col-sm-2 col-form-label">Lama Diklat (jam)</label>
                        <input type="text" class="form-control" name='jumlah_jam' value="{{ $data->jumlah_jam }}" id="jumlah_jam" >
                    </div>

                    <div class="mb-3 row">
                        <label for="tanggal_kursus" class="col-sm-2 col-form-label">Tanggal Kursus</label>
                        <input type="date" class="form-control" name='tanggal_kursus' value="{{ $data->tanggal_kursus }}" id="tanggal_kursus" >
                    </div>
                    <div class="mb-3 row">
                        <label for="institusi_penyelenggara" class="col-sm-2 col-form-label">Institusi Penyelenggara</label>
                        <input type="text" class="form-control" name="institusi_penyelenggara" value="{{ $data->institusi_penyelenggara }}" id="institusi_penyelenggara" >
                    </div>
                   
                    <div class="mb-3 row">
                        <label for="nomor_sertifikat" class="col-sm-2 col-form-label">Nomor Sertifikat</label>
                        <input type="text" class="form-control" name='nomor_sertifikat' value="{{ $data->nomor_sertifikat }}" id="nomor_sertifikat" >
                    </div>

                    <div class="mb-3 row">
                        <label for="tgl_sertifikat" class="col-sm-2 col-form-label">Tanggal Sertifikat</label>
                        <input type="text" class="form-control" name='tgl_sertifikat' value="{{ $data->tgl_sertifikat }}" id="tgl_sertifikat" >
                    </div>
                    
                    <div class="mb-3 row">
                        <label for="tanggal_selesai_kursus" class="col-sm-2 col-form-label">Tempat Selesai Kursus</label>
                        <input type="text" class="form-control" name="tanggal_selesai_kursus" value="{{ $data->tanggal_selesai_kursus }}" id="tanggal_selesai_kursus" >
                    </div>
                   
                    <div class="mb-3 row">
                        <label for="jabatan_ttd_sertifikat" class="col-sm-2 col-form-label">Jabatan TTD Sertifikat</label>
                        <input type="text" class="form-control" name='jabatan_ttd_sertifikat' value="{{ $data->jabatan_ttd_sertifikat }}" id="jabatan_ttd_sertifikat" >
                    </div>

                   
                    {{-- <div class="mb-3 row">
                        <label for="is_aktif" class="col-sm-2 col-form-label">Status aktif</label>
                        <select class="form-control" aria-label="Default select example" name="is_aktif" value="{{ $data->is_aktif }}" id="is_aktif >
                            <option value="#">Pilih Status Aktif</option>
                            <option value="0">Tidak Aktif</option>
                            <option value="1">Aktif</option>
                        </select>
                    </div>
                    
                    <div class="mb-3 row">
                        <label for="is_valid" class="col-sm-2 col-form-label">Status Valid</label>
                        <select class="form-control" aria-label="Default select example" name="is_valid" value="{{ $data->is_valid }}" id="is_valid>
                            <option value="#">Pilih Status Valid</option>
                            <option value="0">Tidak Valid</option>
                            <option value="1">Valid</option>
                        </select>
                    </div> --}}
                   
                    <div class="mb-3 row">
                        <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                        <input type="text" class="form-control" name='keterangan' value="{{ $data->keterangan }}" id="keterangan" >
                    </div>

                    <div class="mb-3 row">
                        <label for="file_sertifikat" class="col-sm-2 col-form-label">File Sertifikat</label>
                        <input type="file" class="form-control" name='file_sertifikat' value="{{ $data->file_sertifikat }}" id="file_sertifikat" >
                        <label for="notebook" class="col-sm-5 col-form-label" style="color: red">* : Biarkan kosong jika tidak ingin mengganti gambar</label>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-sm-5"><a title='Tambah Data' href='javascript:void(0)' onclick='update("","")' class='btn btn-primary'>Simpan</a></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- </div> -->
@endsection
@push('script')
<script>

function update(){
    if (document.forms["formPendaftaran"]["diklat_id"].value == "") {
        CustomSwal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Nama Diklat Tidak Boleh Kosong',
        })
        document.forms["formPendaftaran"]["diklat_id"].focus();
        return false;
    }
    if (document.forms["formPendaftaran"]["nama_kursus"].value == "") {
        CustomSwal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Nama Kursus Tidak Boleh Kosong',
        })
        document.forms["formPendaftaran"]["nama_kursus"].focus();
        return false;
    }
    if (document.forms["formPendaftaran"]["tempat"].value == "") {
        CustomSwal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Tempat Tidak Boleh Kosong',
        })
        document.forms["formPendaftaran"]["tempat"].focus();
        return false;
    }
    if (document.forms["formPendaftaran"]["jumlah_jam"].value == "") {
        CustomSwal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Jumlah Jam Tidak Boleh Kosong',
        })
        document.forms["formPendaftaran"]["jumlah_jam"].focus();
        return false;
    }
    if (document.forms["formPendaftaran"]["tanggal_kursus"].value == "") {
        CustomSwal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Tanggal Kursus Tidak Boleh Kosong',
        })
        document.forms["formPendaftaran"]["tanggal_kursus"].focus();
        return false;
    }
    if (document.forms["formPendaftaran"]["institusi_penyelenggara"].value == "") {
        CustomSwal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Institusi Penyelenggara Tidak Boleh Kosong',
        })
        document.forms["formPendaftaran"]["institusi_penyelenggara"].focus();
        return false;
    }
    if (document.forms["formPendaftaran"]["nomor_sertifikat"].value == "") {
        CustomSwal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Nomor Sertifikat Tidak Boleh Kosong',
        })
        document.forms["formPendaftaran"]["nomor_sertifikat"].focus();
        return false;
    }
    if (document.forms["formPendaftaran"]["tgl_sertifikat"].value == "") {
        CustomSwal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Tanggal Sertifikat Tidak Boleh Kosong',
        })
        document.forms["formPendaftaran"]["tgl_sertifikat"].focus();
        return false;
    }
    if (document.forms["formPendaftaran"]["tanggal_selesai_kursus"].value == "") {
        CustomSwal.fire({
            icon: 'error',
            title: 'Oops...',
            text: ' Tanggal Selesai Tidak Boleh Kosong',
        })
        document.forms["formPendaftaran"]["tanggal_selesai_kursus"].focus();
        return false;
    }
    if (document.forms["formPendaftaran"]["jabatan_ttd_sertifikat"].value == "") {
        CustomSwal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Jabatan TTD Sertifikat Tidak Boleh Kosong',
        })
        document.forms["formPendaftaran"]["jabatan_ttd_sertifikat"].focus();
        return false;
    }
    // if (document.forms["formPendaftaran"]["is_aktif"].value == "") {
    //     CustomSwal.fire({
    //         icon: 'error',
    //         title: 'Oops...',
    //         text: 'Riwayat Aktif Sertifikat Tidak Boleh Kosong',
    //     })
    //     document.forms["formPendaftaran"]["is_aktif"].focus();
    //     return false;
    // }
    // if (document.forms["formPendaftaran"]["is_valid"].value == "") {
    //     CustomSwal.fire({
    //         icon: 'error',
    //         title: 'Oops...',
    //         text: 'Riwayat Valid Sertifikat Tidak Boleh Kosong',
    //     })
    //     document.forms["formPendaftaran"]["is_valid"].focus();
    //     return false;
    // }
    // if (document.forms["formPendaftaran"]["keterangan"].value == "") {
    //     CustomSwal.fire({
    //         icon: 'error',
    //         title: 'Oops...',
    //         text: 'Keterangan Tidak Boleh Kosong',
    //     })
    //     document.forms["formPendaftaran"]["keterangan"].focus();
    //     return false;
    // }

    // buttonsmdisable(elm);
    CustomSwal.fire({
        icon:'question',
        text: 'Apakah data yang diinput sudah benar?',
        showCancelButton: true,
        confirmButtonText: 'Submit',
        cancelButtonText: 'Batal',
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            let formData = new FormData($('#formPendaftaran')[0]);
            $.ajax({
                url:"{{route('authriwayatDiklat.update', $data->id_t_diklat)}}/",
                data: formData,
                contentType: false,
                processData: false,
                type:"POST",
                dataType:"JSON",
                success:function(data){
                    if(data.success == 1){
                        CustomSwal.fire('Sukses', data.msg, 'success').then((result) => {
                            if (result.isConfirmed) {
                                window.location.replace("{{ url()->previous() }}");
                            }
                        });
                    }else{
                        CustomSwal.fire('Gagal', data.msg, 'error');
                    }
                },
                error:function(error){
                    CustomSwal.fire('Gagal', 'terjadi kesalahan sistem', 'error');
                    console.log(error.XMLHttpRequest);
                }
            });
        }
    });
}
</script>
@endpush
