@extends('layouts.main')
@section('title','Disposisi')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Disposisi</h1>
    </div>
    @if (session('status'))
    <div class="alert shadow alert-success alert-dismissible fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if (session('warning'))
    <div class="alert shadow alert-danger alert-dismissible fade show" role="alert">
        {{ session('warning') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Data Disposisi Surat Masuk</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped" id="disposisi-surat-masuk" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Pengirim</th>
                                <th scope="col">No Surat</th>
                                <th scope="col">Tgl Surat</th>
                                <th scope="col">Tgl Disposisi</th>
                                <th scope="col">Diterima Oleh</th>
                                <th scope="col">status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($results as $result)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$result->pengirim}}</td>
                                    <td>{{$result->nomor_surat}}</td>
                                    <td>{{date('d-m-Y',strtotime($result->tanggal_surat))}}</td>
                                    <td>{{date('d-m-Y',strtotime($result->tanggal_disposisi))}}</td>
                                    <td>
                                        @php
                                        
                                        $user = DB::table('teruskan_disposisi_masuk')
                                            ->select('teruskan_disposisi_masuk.*', 'nama_pegawai','jabatan.id_jabatan','nama_jabatan','nama_staf_ahli','nama_asisten','nama_bagian','nama_sub_bagian')
                                            ->join('pegawai', 'pegawai.nip_pegawai', '=', 'teruskan_disposisi_masuk.id')
                                            ->join('jabatan', 'jabatan.id_jabatan', '=', 'pegawai.id_jabatan')
                                            ->join('unit_kerja', 'unit_kerja.nip_pegawai', '=', 'pegawai.nip_pegawai')
                                            ->join('staf_ahli', 'staf_ahli.id_staf_ahli', '=', 'unit_kerja.id_staf_ahli')
                                            ->join('asisten', 'asisten.id_asisten', '=', 'unit_kerja.id_asisten')
                                            ->join('bagian', 'bagian.id_bagian', '=', 'unit_kerja.id_bagian')
                                            ->join('sub_bagian', 'sub_bagian.id_sub_bagian', '=', 'unit_kerja.id_sub_bagian')
                                            ->where('id_disposisi_surat_masuk','=',$result->id_disposisi_surat_masuk)
                                            ->orderBy('id_teruskan_surat_masuk','DESC')
                                            ->take(1)
                                            ->get();
                                        if ($user->count() == 1) {
                                            foreach ($user as $usr) {
                                                if ( $usr->id_jabatan == 1) {
                                                    echo  $usr->nama_jabatan;
                                                } elseif ( $usr->id_jabatan == 2) {
                                                    echo  $usr->nama_jabatan;
                                                } elseif ( $usr->id_jabatan == 3) {
                                                    echo $usr->nama_staf_ahli;
                                                } elseif ( $usr->id_jabatan == 4) {
                                                    echo  $usr->nama_jabatan. ' ' .$usr->nama_asisten;
                                                } elseif ( $usr->id_jabatan == 5) {
                                                    echo  $usr->nama_jabatan. ' ' .$usr->nama_bagian;
                                                } elseif ( $usr->id_jabatan == 6) {
                                                    echo  $usr->nama_jabatan. ' ' .$usr->nama_sub_bagian;
                                                } 
                                            }
                                        } else {
                                            echo '-';
                                        }
                                        @endphp
                                    </td>
                                    <td>
                                        @if ($result->status == 0)
                                            {{ 'Terdaftar' }}
                                        @elseif($result->status == 3) 
                                            {{ 'Selesai' }}
                                        @else
                                            {{ 'Berjalan' }}
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                        @if ($result->status == 0)
                                            <a href="{{route('disposisi-surat-masuk.show',$result->id_disposisi_surat_masuk)}}" class="btn btn-success text-white btn-sm mx-1">
                                                <i class="fas fa-info"></i> Detail
                                            </a>
                                            <a href="{{route('disposisi-surat-masuk.forward',$result->id_disposisi_surat_masuk)}}" class="btn btn-primary btn-sm mx-1" >
                                                <i class="fas fa-angle-right"></i> Teruskan
                                            </a>
                                            <a href="{{route('disposisi-surat-masuk.edit',$result->id_disposisi_surat_masuk)}}" class="btn btn-warning text-white btn-sm mx-1" title="Edit">
                                                <i class="fas fa-pencil-alt"></i> Edit
                                            </a>
                                            <a href="#" class="btn btn-danger btn-sm mx-1 getIdSurat" data-toggle="modal" data-target="#deleteDisposisi" data-id="{{$result->id_surat_masuk}}" >
                                                <i class="fas fa-trash fa-sm"></i> Hapus
                                            </a>
                                        @else
                                            <a href="{{route('disposisi-surat-masuk.show',$result->id_disposisi_surat_masuk)}}" class="btn btn-success text-white btn-sm mx-1" title="Edit">
                                                <i class="fas fa-info"></i> Detail
                                            </a>
                                            @if ($result->status == 2)
                                            @php
                                        
                                            $user = DB::table('teruskan_disposisi_masuk')
                                                ->where('id_disposisi_surat_masuk','=',$result->id_disposisi_surat_masuk)
                                                ->orderBy('id_teruskan_surat_masuk','DESC')
                                                ->take(1)
                                                ->first();
                                            @endphp
                                            <a href="{{route('disposisi-surat-masuk.ingatkan',$user->id)}}" class="btn btn-warning text-white btn-sm mx-1" title="Edit">
                                                <i class="fa fa-bell" aria-hidden="true"></i> Ingatkan
                                            </a>
                                            @elseif ($result->status == 3)
                                                <a href="{{route('disposisi-surat-masuk.arsip',$result->id_surat_masuk)}}" class="btn btn-warning text-white btn-sm mx-1" title="Edit">
                                                    <i class="fas fa-archive"></i> Arsipkan
                                                </a>
                                                <a target="_blank" href="{{route('disposisi-surat-masuk.cetak',$result->id_disposisi_surat_masuk)}}" class="btn btn-primary text-white btn-sm mx-1" title="Edit">
                                                    <i class="fas fa-print"></i> Print
                                                </a>
                                            @endif
                                        @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- delete Modal-->
<div class="modal fade" id="deleteDisposisi" tabindex="-1" role="dialog" aria-labelledby="deleteDisposisiLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header justify-content-center">
            <h4 class="modal-title h4" id="deleteDisposisiLabel">Ingin menghapus data ?</h4>
            {{-- <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button> --}}
        </div>
        <div class="modal-body">
            <h5 class="h5 text-center alert-text">Tekan "hapus" untuk menghapus.</h5> 
            <div class="modal-footer d-flex justify-content-center">        
                <form action="" method="post"  class="d-inline">
                    @csrf
                    @method('delete')
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button class="btn btn-danger" type="submit">Hapus</button>
                </form> </td>
                
            </div>
        </div>
        </div>
    </div>
</div>
@endsection

@push('custom-js')
<script>
    $(document).ready( function () {
        $('#disposisi-surat-masuk').DataTable();
    } );
    //delete data unit kerja
    $('.getIdSurat').on('click',function(){
        var _id = $(this).data("id");
        $('.modal-footer form[action]').attr('action', 'disposisi-surat-masuk'+'/'+_id);
    })
</script>
@endpush