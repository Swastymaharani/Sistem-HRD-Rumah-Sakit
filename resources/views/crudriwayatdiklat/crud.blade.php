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
            <a href="{{ route('riwayatDiklat.create') }}" class="btn btn-sm btn-primary" onclick="buttondisable(this)"><em class="icon fas fa-plus"></em> <span>Add Riwayat diklat</span></a>
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
                    <table id="{{$table_id}}" class="display nowrap" style="width:100%">
                        <thead style="color:#526484; font-size:11px;">
                            
                            <th>No.</th>
                            <th>Id Riwayat Diklat</th>
                            <th>Id Pegawai</th>
                            <th>Id Diklat</th>
                            <th>Nama Kursus</th>
                            <th>Tempat</th>
                            <th>Jumlah Jam</th>
                            <th>Tanggal Kursus</th>
                            <th>Institusi Penyelenggara</th>
                            <th>Nomor Sertifikat</th>
                            <th>Tanggal Sertifikat</th>
                            <th>Tanggal Selesai Kursus</th>
                            <th>Jabatan TTD Sertifikat</th>
                            <th>Riwayat Aktif</th>
                            <th>Riwayat Validasi</th>
                            <th>Keterangan</th>
                            <th>File Sertifikat</th>
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
            url: '{{ route("riwayatDiklat.listData") }}',
            type:"POST",
            data: function(params) {
                params._token = "{{ csrf_token() }}";
            }
        },
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },         
            {
                data: 'id_t_diklat',
                name: 'id_t_diklat',
                orderable: true,
                searchable: true,
                class: 'text-left'
            },
            {
                data: 'pegawai_id',
                name: 'pegawai_id',
                orderable: true,
                searchable: true,
                class: 'text-left'
            },
            {
                data: 'diklat_id',
                name: 'diklat_id',
                orderable: true,
                searchable: true,
                class: 'text-left'
            },
            {
                data: 'nama_kursus',
                name: 'nama_kursus',
                orderable: true,
                searchable: true,
                class: 'text-left'
            },
            {
                data: 'tempat',
                name: 'tempat',
                orderable: true,
                searchable: true,
                class: 'text-left'
            },
            {
                data: 'jumlah_jam',
                name: 'jumlah_jam',
                orderable: true,
                searchable: true,
                class: 'text-left'
            },
            {
                data: 'tanggal_kursus',
                name: 'tanggal_kursus',
                orderable: true,
                searchable: true,
                class: 'text-left'
            },
            {
                data: 'institusi_penyelenggara',
                name: 'institusi_penyelenggara',
                orderable: true,
                searchable: true,
                class: 'text-left'
            },
            {
                data: 'nomor_sertifikat',
                name: 'nomor_sertifikat',
                orderable: true,
                searchable: true,
                class: 'text-left'
            },
            {
                data: 'tgl_sertifikat',
                name: 'tgl_sertifikat',
                orderable: true,
                searchable: true,
                class: 'text-left'
            },
            {
                data: 'tanggal_selesai_kursus',
                name: 'tanggal_selesai_kursus',
                orderable: true,
                searchable: true,
                class: 'text-left'
            },
            {
                data: 'jabatan_ttd_sertifikat',
                name: 'jabatan_ttd_sertifikat',
                orderable: true,
                searchable: true,
                class: 'text-left'
            },
            {
                data: 'is_aktif',
                name: 'is_aktif',
                orderable: true,
                searchable: true,
                class: 'text-left'
            },
            {
                data: 'is_valid',
                name: 'is_valid',
                orderable: true,
                searchable: true,
                class: 'text-left'
            },
            {
                data: 'keterangan',
                name: 'keterangan',
                orderable: true,
                searchable: true,
                class: 'text-left'
            },
            {
                data: 'file_sertifikat',
                name: 'file_sertifikat',
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
                url:"{{url('riwayatdiklat')}}/"+id,
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