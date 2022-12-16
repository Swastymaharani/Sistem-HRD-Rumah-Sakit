{{-- https://www.positronx.io/laravel-datatables-example/ --}}

@extends('layouts.app')
@section('action')

@endsection
@section('content')

@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
</div> 
@endif

<div class="nk-fmg-body-head d-none d-lg-flex">
    <div class="nk-fmg-search">
        <h4 class="card-title text-primary"><i class='{{$icon}}' data-toggle='tooltip' data-placement='bottom' title='Data {{$subtitle}}'></i>  {{strtoupper("Data ".$subtitle)}}</h4>
    </div>
    <div class="nk-fmg-actions">
        <div class="btn-group">
            <a href="{{ route('pegawai.create') }}" class="btn btn-sm btn-primary" onclick="buttondisable(this)"><em class="icon fas fa-plus"></em> <span>Add Data</span></a>
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
        <div class="row gy-3" >
            
        </div>
    </div>
</div>

<!-- <div class="nk-fmg-body-content"> -->
    <div class="nk-fmg-quick-list nk-block">
        <div class="card">
            <div class="card-body">
                {{-- <div class="table-responsive"> --}}
                <div>
                    <table id="{{$table_id}}" class="table table-striped table-bordered nowrap" style="width:100%">
                        <thead id="{{$table_id}}" style="color:#526484; font-size:11px;">
                            
                            <th>No.</th>
                            <th>ID</th>
                            <th>Kode</th>
                            <th>No. Induk</th>
                            <th>Absen</th>
                            <th>Kode BPJS</th>
                            <th>Nama</th>
                            <th>Nama Tercetak</th>
                            <th>Gelar Depan</th>
                            <th>Gelar Belakang</th>
                            <th>Status Pegawai ID</th>
                            <th>Jenis Profesi ID</th>
                            <th>Spesialisasi ID</th>
                            <th>Sub Spesialisasi ID</th>
                            <th>Qualifikasi ID</th>
                            <th>Pendidikan Terakhir ID</th>
                            <th>Jabatan Fungsional Terakhir</th>
                            <th>Jabatan Struktural ID</th>
                            <th>Unit ID</th>
                            <th>Subunit ID</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin ID</th>
                            <th>Agama ID</th>
                            <th>Bahasa Aktif ID</th>
                            <th>Alamat</th>
                            <th>Dusun</th>
                            <th>Desa ID</th>
                            <th>Kecamatan ID</th>
                            <th>Kabupaten ID</th>
                            <th>Provinsi ID</th>
                            <th>Kode Pos</th>
                            <th>NIK</th>
                            <th>NPWP</th>
                            <th>File Foto</th>
                            <th>File KTP</th>
                            <th>File KK</th>
                            <th>File NPWP</th>
                            <th>Status Nikah ID </th>
                            <th>Status Daftar ID</th>
                            <th>Aksi</th>
                        </thead>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection
@push('script')
<script>
    var table;
    
    
    $(document).ready(function() {
        table = $('#{{$table_id}}').DataTable({
        scrollX: true,
        processing:true,
        autoWidth: true,
        ordering: true,
        serverSide: true,
        dom: '<"row justify-between g-2 "<"col-7 col-sm-4 text-left"f><"col-5 col-sm-8 text-right"<"datatable-filter"<"d-flex justify-content-end g-2" l>>>><" my-3"t><"row align-items-center"<"col-5 col-sm-12 col-md-6 text-left text-md-left"i><"col-5 col-sm-12 col-md-6 text-md-right"<"d-flex justify-content-end "p>>>',
        ajax: {
            url: '{{ route("pegawai.listData") }}',
            type:"POST",
            data: function(params) {
                params._token = "{{ csrf_token() }}";
            }
        },
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },         
            {
                data: 'id',
                name: 'id',
                orderable: true,
                searchable: true,
                class: 'text-left'
            },
            {
                data: 'kode',
                name: 'kode',
                orderable: true,
                searchable: true,
                class: 'text-left'
            },
            {
                data: 'no_induk',
                name: 'no_induk',
                orderable: true,
                searchable: true,
                class: 'text-left'
            },
            {
                data: 'absen_id',
                name: 'absen_id',
                orderable: true,
                searchable: true,
                class: 'text-left'
            },
            {
                data: 'kode_bpjs',
                name: 'kode_bpjs',
                orderable: true,
                searchable: true,
                class: 'text-left'
            },
            {
                data: 'nama',
                name: 'nama',
                orderable: true,
                searchable: true,
                class: 'text-left'
            },
            {
                data: 'nama_tercetak',
                name: 'nama_tercetak',
                orderable: true,
                searchable: true,
                class: 'text-left'
            },
            {
                data: 'gelar_depan',
                name: 'gelar_depan',
                orderable: true,
                searchable: true,
                class: 'text-left'
            },
            {
                data: 'gelar_belakang',
                name: 'gelar_belakang',
                orderable: true,
                searchable: true,
                class: 'text-left'
            },
            {
                data: 'status_pegawai_id',
                name: 'status_pegawai_id',
                orderable: true,
                searchable: true,
                class: 'text-left'
            },
            {
                data: 'jenis_profesi_id',
                name: 'jenis_profesi_id',
                orderable: true,
                searchable: true,
                class: 'text-left'
            },
            {
                data: 'spesialisasi_id',
                name: 'spesialisasi_id',
                orderable: true,
                searchable: true,
                class: 'text-left'
            },
            {
                data: 'sub_spesialisasi_id',
                name: 'sub_spesialisasi_id',
                orderable: true,
                searchable: true,
                class: 'text-left'
            },
            {
                data: 'qualifikasi_id',
                name: 'qualifikasi_id',
                orderable: true,
                searchable: true,
                class: 'text-left'
            },
            {
                data: 'pendidikan_terakhir_id',
                name: 'pendidikan_terakhir_id',
                orderable: true,
                searchable: true,
                class: 'text-left'
            },
            {
                data: 'jabatan_fungsional_terakhir',
                name: 'jabatan_fungsional_terakhir',
                orderable: true,
                searchable: true,
                class: 'text-left'
            },
            {
                data: 'jabatan_struktural_id',
                name: 'jabatan_struktural_id',
                orderable: true,
                searchable: true,
                class: 'text-left'
            },
            {
                data: 'unit_id',
                name: 'unit_id',
                orderable: true,
                searchable: true,
                class: 'text-left'
            },
            {
                data: 'subunit_id',
                name: 'subunit_id',
                orderable: true,
                searchable: true,
                class: 'text-left'
            },
            {
                data: 'tempat_lahir',
                name: 'tempat_lahir',
                orderable: true,
                searchable: true,
                class: 'text-left'
            },
            {
                data: 'tanggal_lahir',
                name: 'tanggal_lahir',
                orderable: true,
                searchable: true,
                class: 'text-left'
            },
            {
                data: 'jeniskelamin_id',
                name: 'jeniskelamin_id',
                orderable: true,
                searchable: true,
                class: 'text-left'
            },
            {
                data: 'agama_id',
                name: 'agama_id',
                orderable: true,
                searchable: true,
                class: 'text-left'
            },
            {
                data: 'bahasa_aktif_id',
                name: 'bahasa_aktif_id',
                orderable: true,
                searchable: true,
                class: 'text-left'
            },
            {
                data: 'alamat',
                name: 'alamat',
                orderable: true,
                searchable: true,
                class: 'text-left'
            },
            {
                data: 'dusun',
                name: 'dusun',
                orderable: true,
                searchable: true,
                class: 'text-left'
            },
            {
                data: 'desa_id',
                name: 'desa_id',
                orderable: true,
                searchable: true,
                class: 'text-left'
            },
            {
                data: 'kecamatan_id',
                name: 'kecamatan_id',
                orderable: true,
                searchable: true,
                class: 'text-left'
            },
            {
                data: 'kabupaten_id',
                name: 'kabupaten_id',
                orderable: true,
                searchable: true,
                class: 'text-left'
            },
            {
                data: 'provinsi_id',
                name: 'provinsi_id',
                orderable: true,
                searchable: true,
                class: 'text-left'
            },
            {
                data: 'kodepos',
                name: 'kodepos',
                orderable: true,
                searchable: true,
                class: 'text-left'
            },
            {
                data: 'nik',
                name: 'nik',
                orderable: true,
                searchable: true,
                class: 'text-left'
            },
            {
                data: 'npwp',
                name: 'npwp',
                orderable: true,
                searchable: true,
                class: 'text-left'
            },
            {
                data: 'file_photo',
                name: 'file_photo',
                orderable: true,
                searchable: true,
                class: 'text-left'
            },
            {
                data: 'file_ktp',
                name: 'file_ktp',
                orderable: true,
                searchable: true,
                class: 'text-left'
            },
            {
                data: 'file_kk',
                name: 'file_kk',
                orderable: true,
                searchable: true,
                class: 'text-left'
            },
            {
                data: 'file_npwp',
                name: 'file_npwp',
                orderable: true,
                searchable: true,
                class: 'text-left'
            },
            {
                data: 'status_nikah_id',
                name: 'status_nikah_id',
                orderable: true,
                searchable: true,
                class: 'text-left'
            },
            {
                data: 'status_daftar_id',
                name: 'status_daftar_id',
                orderable: true,
                searchable: true,
                class: 'text-left'
            },
            {
                data: 'aksi',
                name: 'aksi',
                orderable: false,
                searchable: false,
                class: 'text-center'
            }
        ],
    });
    
    $('.dataTables_filter').html('<div><div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><em class="ti ti-search"></em></span></div><input type="search" class="form-control form-control-sm" placeholder="Type in to Search" aria-controls="tbtariflayanan"></div></div>');
});


function deleteData(id,name,elm){
    buttonsmdisable(elm);
    CustomSwal.fire({
        icon:'question',
        text: 'Hapus Data '+name+' ?',
        showCancelButton: true,
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Batal',
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax({
                url:"{{url('pegawai')}}/"+id,
                data:{
                    _method:"DELETE",
                    _token:"{{csrf_token()}}"
                },
                type:"POST",
                dataType:"JSON",
                beforeSend:function(){
                    block("#{{$table_id}}");
                },
                success:function(data){
                    if(data.success == 1){
                        CustomSwal.fire('Sukses', data.msg, 'success');
                    }else{
                        CustomSwal.fire('Gagal', data.msg, 'error');
                    }
                    unblock("#{{$table_id}}");
                    RefreshTable('{{$table_id}}',0);
                },
                error:function(error){
                    CustomSwal.fire('Gagal', 'terjadi kesalahan sistem', 'error');
                    console.log(error.XMLHttpRequest);
                    unblock("#{{$table_id}}");
                    RefreshTable('{{$table_id}}',0);
                }
            });
        }else{
            RefreshTable('{{$table_id}}',0);
        }
    });
}



</script>
@endpush