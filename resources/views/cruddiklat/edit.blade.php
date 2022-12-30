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
        <form name="formPendaftaran" id="formPendaftaran" action="{{ route('diklat.update', $data->id_diklat)}}" method="POST">
            @csrf
            {{-- @method('PUT') --}}
            <div class="card">
                <div class="card-body">
                    <div class="mb-3 row">
                        <label for="jenis_diklat_id" class="col-sm-2 col-form-label">Jenis Diklat</label>
                        <select type="text" class="form-control" name='jenis_diklat_id' id="jenis_diklat_id">
                            <option disabled>Pilih Jenis Diklat</option>
                            <option selected value= {{ $diklat->jenisdiklat->jenis_diklat_id }} >{{ $diklat->jenisdiklat->nama_jenis_diklat }}</option>
                            @foreach ($jenisdiklats as $jenisdiklat)
                                @if($diklat->jenisdiklat->nama_jenis_diklat==$jenisdiklat->nama_jenis_diklat){
                                    @continue;
                                }
                                @endif
                                <option value= {{ $jenisdiklat->jenis_diklat_id }} >{{ $jenisdiklat->nama_jenis_diklat }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3 row">
                        <label for="no_urut" class="col-sm-2 col-form-label">No. Urut</label>
                        <input type="text" class="form-control" name='no_urut' value="{{ $data->no_urut }}" id="no_urut" >
                    </div>

                    <div class="mb-3 row">
                        <label for="nama_diklat" class="col-sm-2 col-form-label">Nama Diklat</label>
                        <input type="text" class="form-control" name='nama_diklat' value="{{ $data->nama_diklat }}" id="nama_diklat" >
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
        if (document.forms["formPendaftaran"]["no_urut"].value =="") {
                CustomSwal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'No Urut Tidak Boleh Kosong',
                })
                document.forms["formPendaftaran"]["no_urut"].focus();
                return false;
        }  
            if (document.forms["formPendaftaran"]["nama_diklat"].value == "") {
                CustomSwal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Nama Diklat Tidak Boleh Kosong',
                })
                document.forms["formPendaftaran"]["nama_diklat"].focus();
                return false;
            }
            if (document.forms["formPendaftaran"]["jenis_diklat_id"].value == "") {
                CustomSwal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Jenis Diklat Tidak Boleh Kosong',
                })
                document.forms["formPendaftaran"]["jenis_diklat_id"].focus();
                return false;
            }

    // buttonsmdisable(elm);
    CustomSwal.fire({
        icon:'question',
        text: 'Apakah Data Sudah Benar, '+document.forms["formPendaftaran"]["nama_diklat"].value+' ?',
        showCancelButton: true,
        confirmButtonText: 'Submit',
        cancelButtonText: 'Batal',
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            let formData = new FormData($('#formPendaftaran')[0]);
            $.ajax({
                url:"{{route('diklat.update', $data->id_diklat)}}/",
                data:formData,
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
