@extends('layouts.main')
@section('title','Edit Pegawai')
@section('content')
<section class="section">
    <div class="section-header">
        <ol class="breadcrumb justify-content-end h4">
            <li class="breadcrumb-item"><a href="{{route('data-pegawai.index')}}">Pegawai</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit data pegawai</li>
        </ol>
    </div>
    @if (session('status'))
    <div class="alert shadow alert-success alert-dismissible fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <a href="{{ route('data-pegawai.index') }}" class="btn btn-sm btn-warning mt-1 mb-3 ml-3">Kembali</a>
    <div class="section-body ">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                    <a class="nav-link active" id="pegawai-tab" data-toggle="tab" href="#pegawai" role="tab" aria-controls="pegawai" aria-selected="true">Pegawai</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" id="hobi-tab" data-toggle="tab" href="#hobi" role="tab" aria-controls="hobi" aria-selected="false">Hobi</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" id="alamat-tab" data-toggle="tab" href="#alamat" role="tab" aria-controls="alamat" aria-selected="false">Alamat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="keterangan-tab" data-toggle="tab" href="#keterangan" role="tab" aria-controls="keterangan" aria-selected="false">Keterangan Badan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="riwayat-tab" data-toggle="tab" href="#riwayat" role="tab" aria-controls="riwayat" aria-selected="false">Pendidikan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="keluarga-tab" data-toggle="tab" href="#keluarga" role="tab" aria-controls="keluarga" aria-selected="false">Keluarga</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="kepegawaian-tab" data-toggle="tab" href="#kepegawaian" role="tab" aria-controls="kepegawaian" aria-selected="false">Kepegawaian</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="mutasi-tab" data-toggle="tab" href="#mutasi" role="tab" aria-controls="mutasi" aria-selected="false">Mutasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="dokumen-tab" data-toggle="tab" href="#dokumen" role="tab" aria-controls="dokumen" aria-selected="false">Dokumen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pangkat_cpns-tab" data-toggle="tab" href="#pangkat_cpns" role="tab" aria-controls="pangkat_cpns" aria-selected="false">Pangkat CPNS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pangkat_pns-tab" data-toggle="tab" href="#pangkat_pns" role="tab" aria-controls="pangkat_pns" aria-selected="false">Pangkat PNS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pangkat-tab" data-toggle="tab" href="#pangkat" role="tab" aria-controls="pangkat" aria-selected="false">Pangkat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="kgb-tab" data-toggle="tab" href="#kgb" role="tab" aria-controls="kgb" aria-selected="false">Kenaikan Gaji Berkala</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="pegawai" role="tabpanel" aria-labelledby="pegawai-tab">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card shadow ">
                                    <div class="card-header">
                                        <h4>Edit Data Pegawai - <code>{{ $pegawai->nama_pegawai }}</code></h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{route('data-pegawai.update',$result->nip_pegawai)}}" method="POST">
                                            @method('PUT')
                                            @csrf
                                            <div class="form-group">
                                                <label for="nip_pegawai">NIP Pegawai</label>
                                                <input type="number" id="nip_pegawai" name="nip_pegawai"  class="form-control @error('nip_pegawai') is-invalid @enderror" placeholder="Masukan NIP Pegawai" value="{{$result->nip_pegawai}}" >
                                                @error('nip_pegawai')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                
                                            <div class="form-group">
                                                <label for="nomor_karpeg">Nomor Kartu Pegawai</label>
                                                <input type="text" id="nomor_karpeg" name="nomor_karpeg"  class="form-control @error('nomor_karpeg') is-invalid @enderror" placeholder="Masukan Nomor kartu Pegawai" value="{{$result->nomor_karpeg}}" >
                                                @error('nomor_karpeg')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                
                                            <div class="form-group">
                                                <label for="nama_pegawai">Nama Pegawai</label>
                                                <input type="text" id="nama_pegawai" name="nama_pegawai"  class="form-control @error('nama_pegawai') is-invalid @enderror" placeholder="Masukan Nama Pegawai" value="{{$result->nama_pegawai}}" >
                                                @error('nama_pegawai')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                
                                            <div class="form-group">
                                                <label for="tempat_lahir">Tempat Lahir</label>
                                                <input type="text" id="tempat_lahir" name="tempat_lahir"  class="form-control @error('tempat_lahir') is-invalid @enderror" placeholder="Masukan tempat lahir" value="{{$result->tempat_lahir}}" >
                                                @error('tempat_lahir')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                
                                            <div class="form-group">
                                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                                <input type="text" id="tanggal_lahir" name="tanggal_lahir" autocomplete="off" class="form-control datepicker @error('tanggal_lahir') is-invalid @enderror" value="{{date('d-m-Y',strtotime($result->tanggal_lahir))}}" >
                                                @error('tanggal_lahir')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                
                                            <div class="form-group">
                                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                                <select class="form-control @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" name="jenis_kelamin">
                                                    <option selected value="{{$result->jenis_kelamin}}"> {{$result->jenis_kelamin}} </option>
                                                    <option disabled> --Pilih Jenis Kelamin-- </option>
                                                    <option value="Laki-laki"> Laki-laki </option>
                                                    <option value="Perempuan"> Perempuan </option>
                                                </select>
                                                @error('jenis_kelamin')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                
                                            <div class="form-group">
                                                <label for="agama">Agama</label>
                                                <select class="form-control @error('agama') is-invalid @enderror" id="agama" name="agama">
                                                    <option selected value="{{$result->agama}}"> {{$result->agama}} </option>
                                                    <option disabled> --Pilih Agama-- </option>
                                                    <option value="Islam"> Islam </option>
                                                    <option value="Katolik"> Katolik </option>
                                                    <option value="Protestan">Protestan</option>
                                                    <option value="Hindu">Hindu</option>
                                                    <option value="Buddha">Buddha</option>
                                                    <option value="Konghucu">Konghucu</option>
                                                </select>
                                                @error('agama')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                
                                            <div class="form-group">
                                                <label for="status_perkawinan">Status Perkawinan</label>
                                                <select class="form-control @error('status_perkawinan') is-invalid @enderror" id="status_perkawinan" name="status_perkawinan">
                                                    <option selected value="{{$result->status_perkawinan}}"> {{$result->status_perkawinan}} </option>
                                                    <option disabled> --Pilih Status Perkawinan-- </option>
                                                    <option value="Belum kawin">Belum Kawin</option>
                                                    <option value="Kawin"> Kawin </option>
                                                    <option value="Cerai Hidup">Cerai Hidup</option>
                                                    <option value="Cerai Mati">Cerai Mati</option>
                                                </select>
                                                @error('status_perkawinan')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                
                                            
                                            <div class="form-group">
                                                <label for="jabatan">Jabatan</label>
                                                <select class="form-control data-jabatan @error('id_jabatan') is-invalid @enderror" id="id_jabatan" name="id_jabatan">
                                                    <option selected value="{{$result->id_jabatan}}"> {{$result->nama_jabatan}} </option>
                                                    <option disabled> --Pilih Jabatan-- </option>
                                                    @foreach ($jabatan as $jb)
                                                    <option value="{{$jb->id_jabatan}}"> {{$jb->nama_jabatan}} </option>
                                                    @endforeach
                                                </select>
                                                @error('id_jabatan')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div id="field-staf" class="form-group">
                                                <label for="staf_ahli">Staf Ahli</label>
                                                <select class="form-control data-staf" id="id_staf_ahli" name="id_staf_ahli">
                                                    <option selected value="{{$result->id_staf_ahli}}"> {{$result->nama_staf_ahli}} </option>
                                                    <option disabled> --Pilih Staf Ahli-- </option>
                                                    @foreach ($staf_ahli as $item)
                                                    <option value="{{$item->id_staf_ahli}}"> {{$item->nama_staf_ahli}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                
                                            <div id="field-asisten" class="form-group">
                                                <label for="asisten">Asisten</label>
                                                <select class="form-control data-asisten" id="id_asisten" name="id_asisten">
                                                    <option selected value="{{$result->id_asisten}}"> {{$result->nama_asisten}} </option>
                                                    <option disabled> --Pilih Asisten-- </option>
                                                    @foreach ($asisten as $item)
                                                    <option value="{{$item->id_asisten}}"> {{$item->nama_asisten}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                
                                            <div id="field-bagian" class="form-group">
                                                <label for="bagian">Bagian</label>
                                                <select class="form-control data-bagian" id="id_bagian" name="id_bagian">
                                                    <option selected value="{{$result->id_bagian}}"> {{$result->nama_bagian}} </option>
                                                    <option disabled> --Pilih Bagian-- </option>
                                                    @foreach ($bagian as $item)
                                                    <option value="{{$item->id_bagian}}"> {{$item->nama_bagian}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                
                                            <div id="field-sub-bagian" class="form-group">
                                                <label for="sub_bagian">Sub Bagian</label>
                                                <select class="form-control data-sub-bagian" id="id_sub_bagian" name="id_sub_bagian">
                                                    <option selected value="{{$result->id_sub_bagian}}"> {{$result->nama_sub_bagian}} </option>
                                                    <option disabled> --Pilih Sub Bagian-- </option>
                                                    @foreach ($sub_bagian as $item)
                                                    <option value="{{$item->id_sub_bagian}}"> {{$item->nama_sub_bagian}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            
                                            <a href="{{ route('admin-pegawai.index') }}" class="btn btn-warning"><i class="fas fa-chevron-left"></i> Kembali</a>
                                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                                        </form> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="hobi" role="tabpanel" aria-labelledby="hobi-tab">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card shadow">
                                    <div class="card-header">
                                        <h4>Hobi - <code>{{ $pegawai->nama_pegawai }}</code></h4>
                                    </div>
                                    <div class="card-body">
                                        @if ($pegawai->hobi->count() > 0)
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover table-striped" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr class="text-center">
                                                            <th scope="col">Hobi</th>
                                                            <th scope="col">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($pegawai->hobi as $item)
                                                            <tr class="text-center">
                                                                <td>{{ $item->hobi }}</td>
                                                                <td>
                                                                    <form action="{{ route('data-hobi.destroy',$item->id_hobi) }}" method="post">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin menghapus hobi ini?')" type="submit"> <i class="fas fa-trash fa-sm"></i> Hapus</button>
                                                                    </form> 
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            @else
                                            <p class="text-muted">Anda belum inputkan Hobi, Inputkan Hobi dengan BENAR.!</p>
                                            <form action="{{route('data-hobi.store')}}" method="POST">
                                                @csrf
                                                <div class="form-group row left-items-center">
                                                    <label for="Hobi" class="form-control-label col-sm-3 text-md-right">Hobi</label>
                                                    <div class="col-sm-6 col-md-9">
                                                        <input type="hidden" name="nip_pegawai" value="{{ $pegawai->nip_pegawai }}">
                                                        <input type="text" id="hobi" name="hobi[]"  class="form-control @error('hobi') is-invalid @enderror" >
                                                        @error('hobi')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group text-right">
                                                    <a href="#" class="tambahhobi btn bt-sm btn-primary text-right"><i class="fa fa-plus"></i></a>
                                                </div>
                                                <div class="hobii"></div>
                                                <button type="submit" type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                                            </form> 
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="alamat" role="tabpanel" aria-labelledby="alamat-tab">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card shadow">
                                    <div class="card-header">
                                        <h4>Alamat - <code>{{ $pegawai->nama_pegawai }} </code></h4>
                                    </div>
                                    <div class="card-body">
                                        @if ($pegawai->alamat != null)
                                        <form id="setting-form" method="POST" action="{{ route('data-alamat.update',$pegawai->alamat->id_alamat) }}">
                                            @method('PUT')
                                            @csrf
                                              <p class="text-muted">Masukan data Alamat pegawai dengan benar dan tepat.!</p>
                                                
                                                    <input type="hidden" name="nip_pegawai" value="{{ $pegawai->alamat->nip_pegawai }}">
                                                    <div class="form-group row left-items-center">
                                                        <label for="jalan" class="form-control-label col-sm-3 text-md-right">Jalan</label>
                                                        <div class="col-sm-6 col-md-9">
                                                            <input type="text" id="jalan" name="jalan" value="{{ $pegawai->alamat->jalan }}"  class="form-control @error('jalan') is-invalid @enderror" >
                                                            @error('jalan')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row left-items-center">
                                                        <label for="kelurahan_desa" class="form-control-label col-sm-3 text-md-right">Kelurahan / Desa</label>
                                                        <div class="col-sm-6 col-md-9">
                                                            <input type="text" id="kelurahan_desa" name="kelurahan_desa" value="{{ $pegawai->alamat->kelurahan_desa }}"  class="form-control @error('kelurahan_desa') is-invalid @enderror" >
                                                            @error('kelurahan_desa')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row left-items-center">
                                                        <label for="kecamatan" class="form-control-label col-sm-3 text-md-right">Kecamatan</label>
                                                        <div class="col-sm-6 col-md-9">
                                                            <input type="text" id="kecamatan" name="kecamatan" value="{{ $pegawai->alamat->kecamatan }}"  class="form-control @error('kecamatan') is-invalid @enderror" >
                                                            @error('kecamatan')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row left-items-center">
                                                        <label for="kabupaten_kota" class="form-control-label col-sm-3 text-md-right">Kabupaten / Kota</label>
                                                        <div class="col-sm-6 col-md-9">
                                                            <input type="text" id="kabupaten_kota" name="kabupaten_kota" value="{{ $pegawai->alamat->kabupaten_kota }}" class="form-control @error('kabupaten_kota') is-invalid @enderror" >
                                                            @error('kabupaten_kota')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row left-items-center">
                                                        <label for="provinsi" class="form-control-label col-sm-3 text-md-right">Provinsi</label>
                                                        <div class="col-sm-6 col-md-9">
                                                            <input type="text" id="provinsi" name="provinsi" value="{{ $pegawai->alamat->provinsi }}" class="form-control @error('provinsi') is-invalid @enderror" >
                                                            @error('provinsi')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                            <div class="card-footer bg-whitesmoke">
                                              <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Edit</button>
                                            </div>
                                        </form>   
                                        @else
                                        <p class="text-muted">Anda belum inputkan alamat, Inputkan Alamat dengan BENAR.!</p>
                                        <form action="{{route('data-alamat.store')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="nip_pegawai" value="{{ $pegawai->nip_pegawai }}">
                                            <div class="form-group row left-items-center">
                                                <label for="jalan" class="form-control-label col-sm-3 text-md-right">Jalan</label>
                                                <div class="col-sm-6 col-md-9">
                                                    <input type="text" id="jalan" name="jalan"  class="form-control @error('jalan') is-invalid @enderror" >
                                                    @error('jalan')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row left-items-center">
                                                <label for="kelurahan_desa" class="form-control-label col-sm-3 text-md-right">Kelurahan / Desa</label>
                                                <div class="col-sm-6 col-md-9">
                                                    <input type="text" id="kelurahan_desa" name="kelurahan_desa"  class="form-control @error('kelurahan_desa') is-invalid @enderror" >
                                                    @error('kelurahan_desa')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row left-items-center">
                                                <label for="kecamatan" class="form-control-label col-sm-3 text-md-right">Kecamatan</label>
                                                <div class="col-sm-6 col-md-9">
                                                    <input type="text" id="kecamatan" name="kecamatan"  class="form-control @error('kecamatan') is-invalid @enderror" >
                                                    @error('kecamatan')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row left-items-center">
                                                <label for="kabupaten_kota" class="form-control-label col-sm-3 text-md-right">Kabupaten / Kota</label>
                                                <div class="col-sm-6 col-md-9">
                                                    <input type="text" id="kabupaten_kota" name="kabupaten_kota"  class="form-control @error('kabupaten_kota') is-invalid @enderror" >
                                                    @error('kabupaten_kota')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row left-items-center">
                                                <label for="provinsi" class="form-control-label col-sm-3 text-md-right">Provinsi</label>
                                                <div class="col-sm-6 col-md-9">
                                                    <input type="text" id="provinsi" name="provinsi"  class="form-control @error('provinsi') is-invalid @enderror" >
                                                    @error('provinsi')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <button type="submit" type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                                        </form> 
                                        @endif
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="keterangan" role="tabpanel" aria-labelledby="keterangan-tab">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card shadow ">
                                    <div class="card-header">
                                        <h4>Keterangan Badan - <code>{{ $pegawai->nama_pegawai }}</code></h4>
                                    </div>
                                    <div class="card-body">
                                        @if ($pegawai->keterangan_badan != null)
                                        <form action="{{ route('data-keterangan-badan.update',$pegawai->keterangan_badan->id_ketbadan) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="nip_pegawai" value="{{ $pegawai->keterangan_badan->nip_pegawai }}">
                                            <div class="form-group row left-items-center">
                                                <label for="tinggi" class="form-control-label col-sm-3 text-md-right">Tingggi Badan</label>
                                                <div class="col-sm-6 col-md-9">
                                                    <input type="number" id="tinggi" name="tinggi"  class="form-control @error('tinggi') is-invalid @enderror"  value="{{ $pegawai->keterangan_badan->tinggi }}" >
                                                    @error('tinggi')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row left-items-center">
                                                <label for="berat_badan" class="form-control-label col-sm-3 text-md-right">Berat Badan</label>
                                                <div class="col-sm-6 col-md-9">
                                                    <input type="number" id="berat_badan" name="berat_badan"  class="form-control @error('berat_badan') is-invalid @enderror"  value="{{ $pegawai->keterangan_badan->berat_badan }}" >
                                                    @error('berat_badan')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row left-items-center">
                                                <label for="rambut" class="form-control-label col-sm-3 text-md-right">Tipe Rambut</label>
                                                <div class="col-sm-6 col-md-9">
                                                    <input type="text" id="rambut" name="rambut"  class="form-control @error('rambut') is-invalid @enderror"  value="{{ $pegawai->keterangan_badan->rambut }}" >
                                                    @error('rambut')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div> 
                                            <div class="form-group row left-items-center">
                                                <label for="bentuk_muka" class="form-control-label col-sm-3 text-md-right">Bentuk Muka</label>
                                                <div class="col-sm-6 col-md-9">
                                                    <select class="form-control @error('bentuk_muka') is-invalid @enderror" id="bentuk_muka" name="bentuk_muka">
                                                        <option value="{{ $pegawai->keterangan_badan->bentuk_muka }}"> {{ $pegawai->keterangan_badan->bentuk_muka }} </option>
                                                        <option value="Bulat"> Bulat </option>
                                                        <option value="Persegi"> Persegi </option>
                                                        <option value="Diamond">Diamond</option>
                                                        <option value="Oval">Oval</option>
                                                        <option value="Hati">Hati</option>
                                                        <option value="Persegi Panjang">Persegi Panjang</option>
                                                        <option value="Segi Tiga">Segi Tiga</option>
                                                    </select>
                                                    @error('bentuk_muka')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row left-items-center">
                                                <label for="warna_kulit" class="form-control-label col-sm-3 text-md-right">Warna Kulit</label>
                                                <div class="col-sm-6 col-md-9">
                                                    <input type="text" id="warna_kulit" name="warna_kulit"  class="form-control @error('warna_kulit') is-invalid @enderror"  value="{{ $pegawai->keterangan_badan->warna_kulit }}" >
                                                    @error('warna_kulit')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row left-items-center">
                                                <label for="ciri_khas" class="form-control-label col-sm-3 text-md-right">Ciri Khas</label>
                                                <div class="col-sm-6 col-md-9">
                                                    <input type="text" id="ciri_khas" name="ciri_khas"  class="form-control @error('ciri_khas') is-invalid @enderror"  value="{{ $pegawai->keterangan_badan->ciri_khas }}" >
                                                    @error('ciri_khas')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row left-items-center">
                                                <label for="cacat_tubuh" class="form-control-label col-sm-3 text-md-right">Cacat Tubuh</label>
                                                <div class="col-sm-6 col-md-9">
                                                    <input type="text" id="cacat_tubuh" name="cacat_tubuh"  class="form-control @error('cacat_tubuh') is-invalid @enderror"  value="{{ $pegawai->keterangan_badan->cacat_tubuh }}" >
                                                    @error('cacat_tubuh')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Edit</button>
                                        </form>
                                        @else
                                        <p class="text-muted">Anda belum inputkan Keterangan Badan, Inputkan Keterangan Badan dengan BENAR.!</p>
                                        <form action="{{ route('data-keterangan-badan.store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="nip_pegawai" value="{{ $pegawai->nip_pegawai }}">
                                            <div class="form-group row left-items-center">
                                                <label for="tinggi" class="form-control-label col-sm-3 text-md-right">Tingggi Badan</label>
                                                <div class="col-sm-6 col-md-9">
                                                    <input type="number" id="tinggi" name="tinggi"  class="form-control @error('tinggi') is-invalid @enderror"  value="{{ old('tinggi') }}" >
                                                    @error('tinggi')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row left-items-center">
                                                <label for="berat_badan" class="form-control-label col-sm-3 text-md-right">Berat Badan</label>
                                                <div class="col-sm-6 col-md-9">
                                                    <input type="number" id="berat_badan" name="berat_badan"  class="form-control @error('berat_badan') is-invalid @enderror"  value="{{ old('berat_badan') }}" >
                                                    @error('berat_badan')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row left-items-center">
                                                <label for="rambut" class="form-control-label col-sm-3 text-md-right">Tipe Rambut</label>
                                                <div class="col-sm-6 col-md-9">
                                                    <input type="text" id="rambut" name="rambut"  class="form-control @error('rambut') is-invalid @enderror"  value="{{ old('rambut') }}" >
                                                    @error('rambut')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div> 
                                            <div class="form-group row left-items-center">
                                                <label for="bentuk_muka" class="form-control-label col-sm-3 text-md-right">Bentuk Muka</label>
                                                <div class="col-sm-6 col-md-9">
                                                    <select class="form-control @error('bentuk_muka') is-invalid @enderror" id="bentuk_muka" name="bentuk_muka">
                                                        <option selected disabled> --Pilih-- </option>
                                                        <option value="Bulat"> Bulat </option>
                                                        <option value="Persegi"> Persegi </option>
                                                        <option value="Diamond">Diamond</option>
                                                        <option value="Oval">Oval</option>
                                                        <option value="Hati">Hati</option>
                                                        <option value="Persegi Panjang">Persegi Panjang</option>
                                                        <option value="Segi Tiga">Segi Tiga</option>
                                                    </select>
                                                    @error('bentuk_muka')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row left-items-center">
                                                <label for="warna_kulit" class="form-control-label col-sm-3 text-md-right">Warna Kulit</label>
                                                <div class="col-sm-6 col-md-9">
                                                    <input type="text" id="warna_kulit" name="warna_kulit"  class="form-control @error('warna_kulit') is-invalid @enderror"  value="{{ old('warna_kulit') }}" >
                                                    @error('warna_kulit')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row left-items-center">
                                                <label for="ciri_khas" class="form-control-label col-sm-3 text-md-right">Ciri Khas</label>
                                                <div class="col-sm-6 col-md-9">
                                                    <input type="text" id="ciri_khas" name="ciri_khas"  class="form-control @error('ciri_khas') is-invalid @enderror"  value="{{ old('ciri_khas') }}" >
                                                    @error('ciri_khas')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row left-items-center">
                                                <label for="cacat_tubuh" class="form-control-label col-sm-3 text-md-right">Cacat Tubuh</label>
                                                <div class="col-sm-6 col-md-9">
                                                    <input type="text" id="cacat_tubuh" name="cacat_tubuh"  class="form-control @error('cacat_tubuh') is-invalid @enderror"  value="{{ old('cacat_tubuh') }}" >
                                                    @error('cacat_tubuh')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                                        </form> 
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="riwayat" role="tabpanel" aria-labelledby="riwayat-tab">
                        <div class="row justify-content-center">
                                    @if ($pegawai->riwayat_pendidikan->count() > 0)
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Riwayat Pendidikan</label>
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-hover table-striped" width="100%" cellspacing="0">
                                                        <thead>
                                                                <tr class="text-center">
                                                                    <th scope="col">Jenis</th>
                                                                    <th scope="col">Nama</th>
                                                                    <th scope="col">Jurusan</th>
                                                                    <th scope="col">No STTB</th>
                                                                    <th scope="col">Tgl STTB</th>
                                                                    <th scope="col">Tempat</th>
                                                                    <th scope="col">Kepsek/Rektor</th>
                                                                    <th scope="col">Mulai</th>
                                                                    <th scope="col">Sampai</th>
                                                                    <th scope="col">Tanda Lulus</th>
                                                                    <th scope="col">Aksi</th>
                                                                </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($pegawai->riwayat_pendidikan as $item)
                                                                <tr class="text-center">
                                                                    <td>{{ $item->jenis_pendidikan }}</td>
                                                                    <td>{{ $item->nama_pendidikan }}</td>
                                                                    <td>{{ $item->jurusan }}</td>
                                                                    <td>{{ $item->no_sttb }}</td>
                                                                    <td>{{ date('d/m/Y', strtotime($item->tgl_sttb)) }}</td>
                                                                    <td>{{ $item->tempat }}</td>
                                                                    <td>{{ $item->nama_kepsek }}</td>
                                                                    <td> {{ $item->mulai == null ? '-' : date('d/m/Y', strtotime($item->mulai)) }}</td>
                                                                    <td> {{ $item->sampai == null ? '-' : date('d/m/Y', strtotime($item->sampai)) }}</td>
                                                                    <td>{{ $item->tanda_lulus }}</td>
                                                                    <td>
                                                                        <div class="btn-group">
                                                                            <a href="{{ route('riwayat-pendidikan.edit',$item->id_riwayatpendidikan) }}" class="btn btn-warning text-white btn-sm mr-1" title="Edit">
                                                                                <i class="fas fa-pencil-alt"></i>
                                                                            </a>
                                                                            <form action="{{ route('riwayat-pendidikan.destroy',$item->id_riwayatpendidikan) }}" method="post" class="d-inline">
                                                                                @csrf
                                                                                @method('delete')
                                                                                <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin menghapus riwayat pendidikan ini?')" type="submit"><i class="fas fa-trash fa-sm"></i></button>
                                                                            </form> 
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Riwayat Pendidikan - <code>{{ $pegawai->nama_pegawai }}</code></label>
                                            <p class="border-bottom text-gray-800">
                                                - Riwayat Pendidikan belum diisi, lengkapi di menu Riwayat pendidikan -
                                            </p>
                                        </div>
                                    </div>
                                    @endif
                        </div>
                        <div class="row justify-content-center">
                            @if ($pegawai->kursusataupelatihan->count() > 0)
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Riwayat Kursus/ Pelatihan - <code>{{ $pegawai->nama_pegawai }}</code></label>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover table-striped" width="100%" cellspacing="0">
                                                <thead>
                                                        <tr class="text-center">
                                                            <th scope="col">Nama Kursus/Pelatihan</th>
                                                            <th scope="col">Mulai s/d Selesai</th>
                                                            <th scope="col">Tanda Lulus</th>
                                                            <th scope="col">Tempat</th>
                                                            <th scope="col">Keterangan</th>
                                                            <th scope="col">Aksi</th>
                                                        </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($pegawai->kursusataupelatihan as $item)
                                                        <tr class="text-center">
                                                            <td>{{ $item->nama_kursus }}</td>
                                                            <td>{{ date('d/m/Y', strtotime($item->mulai)) }} s/d {{ date('d/m/Y', strtotime($item->selesai)) }}</td>
                                                            <td>{{ $item->tanda_lulus }}</td>
                                                            <td>{{ $item->tempat }}</td>
                                                            <td>{{ $item->keterangan }}</td>
                                                            <td>
                                                                <div class="btn-group">
                                                                    <a href="{{ route('kursus-atau-pelatihan.edit',$item->id_kursus) }}" class="btn btn-warning text-white btn-sm mr-1" title="Edit">
                                                                        <i class="fas fa-pencil-alt"></i>
                                                                    </a>
                                                                    <form action="{{ route('kursus-atau-pelatihan.destroy',$item->id_kursus) }}" method="post" class="d-inline">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin menghapus riwayat kursus/pelatihan ini?')" type="submit"><i class="fas fa-trash fa-sm"></i></button>
                                                                    </form> 
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            @else
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Riwayat Kursus/ Pelatihan - <code> {{ $pegawai->nama_pegawai }}</code></label>
                                    <p class="border-bottom text-gray-800">
                                        - Riwayat Kursus/ Pelatihan belum diisi, lengkapi di menu Riwayat Kursus/ Pelatihan -
                                    </p>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="row justify-content-center">
                            @if ($pegawai->organisasi->count() > 0)
                                @if ($organisasi1->count() > 0)
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Riwayat Organisasi - <code>Semasa SLTA ke bawah</code></label>
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover table-striped" width="100%" cellspacing="0">
                                                    <thead>
                                                            <tr class="text-center">
                                                                <th scope="col">Nama Organisasi</th>
                                                                <th scope="col">Kedudukan dalam Organisasi</th>
                                                                <th scope="col">Tahun Mulai</th>
                                                                <th scope="col">Tahun Selesai</th>
                                                                <th scope="col">Tempat</th>
                                                                <th scope="col">Pimpinan Organisasi</th>
                                                                <th scope="col">Aksi</th>
                                                            </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($organisasi1 as $item)
                                                            <tr class="text-center">
                                                                <td>{{ $item->nama }}</td>
                                                                <td>{{ $item->kedudukan }}</td>
                                                                <td>{{ $item->tahun_mulai }}</td>
                                                                <td>{{ $item->tahun_selesai }}</td>
                                                                <td>{{ $item->tempat }}</td>
                                                                <td>{{ $item->pimpinan }}</td>
                                                                <td>
                                                                    <div class="btn-group">
                                                                        <a href="{{ route('pegawai-organisasi.edit',$item->id_organisasi) }}" class="btn btn-warning text-white btn-sm mr-1" title="Edit">
                                                                            <i class="fas fa-pencil-alt"></i>
                                                                        </a>
                                                                        <form action="{{ route('pegawai-organisasi.destroy',$item->id_organisasi) }}" method="post" class="d-inline">
                                                                            @csrf
                                                                            @method('delete')
                                                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin menghapus riwayat organisasi ini?')" type="submit"><i class="fas fa-trash fa-sm"></i></button>
                                                                        </form> 
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Riwayat Organisasi - <code>Semasa SLTA ke bawah</code></label>
                                            <p class="border-bottom text-gray-800">
                                                - Organisasi Semasa SLTA ke bawah belum diisi, lengkapi dimenu Riwayat pendidikan -
                                            </p>
                                        </div>
                                    </div>
                                @endif

                                @if ($organisasi2->count() > 0)
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Riwayat Organisasi - <code>Semasa Perguruan Tinggi</code></label>
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover table-striped" width="100%" cellspacing="0">
                                                    <thead>
                                                            <tr class="text-center">
                                                                <th scope="col">Nama Organisasi</th>
                                                                <th scope="col">Kedudukan dalam Organisasi</th>
                                                                <th scope="col">Tahun Mulai</th>
                                                                <th scope="col">Tahun Selesai</th>
                                                                <th scope="col">Tempat</th>
                                                                <th scope="col">Pimpinan Organisasi</th>
                                                                <th scope="col">Aksi</th>
                                                            </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($organisasi2 as $item)
                                                            <tr class="text-center">
                                                                <td>{{ $item->nama }}</td>
                                                                <td>{{ $item->kedudukan }}</td>
                                                                <td>{{ $item->tahun_mulai }}</td>
                                                                <td>{{ $item->tahun_selesai }}</td>
                                                                <td>{{ $item->tempat }}</td>
                                                                <td>{{ $item->pimpinan }}</td>
                                                                <td>
                                                                    <a href="{{ route('pegawai-organisasi.edit',$item->id_organisasi) }}" class="btn btn-warning text-white btn-sm" title="Edit">
                                                                        <i class="fas fa-pencil-alt"></i>
                                                                    </a>
                                                                    <form action="{{ route('pegawai-organisasi.destroy',$item->id_organisasi) }}" method="post" class="d-inline">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin menghapus riwayat organisasi ini?')" type="submit"><i class="fas fa-trash fa-sm"></i></button>
                                                                    </form> 
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Riwayat Organisasi - <code>Semasa Perguruan Tinggi</code></label>
                                            <p class="border-bottom text-gray-800">
                                                - Organisasi Semasa Perguruan Tinggi belum diisi, lengkapi dimenu Riwayat pendidikan -
                                            </p>
                                        </div>
                                    </div>
                                @endif
                                
                                @if ($organisasi3->count() > 0)
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Riwayat Organisasi - <code>Selesai Pendidikan atau Selama Menjadi PNS</code></label>
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover table-striped" width="100%" cellspacing="0">
                                                    <thead>
                                                            <tr class="text-center">
                                                                <th scope="col">Nama Organisasi</th>
                                                                <th scope="col">Kedudukan dalam Organisasi</th>
                                                                <th scope="col">Tahun Mulai</th>
                                                                <th scope="col">Tahun Selesai</th>
                                                                <th scope="col">Tempat</th>
                                                                <th scope="col">Pimpinan Organisasi</th>
                                                                <th scope="col">Aksi</th>
                                                            </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($organisasi3 as $item)
                                                            <tr class="text-center">
                                                                <td>{{ $item->nama }}</td>
                                                                <td>{{ $item->kedudukan }}</td>
                                                                <td>{{ $item->tahun_mulai }}</td>
                                                                <td>{{ $item->tahun_selesai }}</td>
                                                                <td>{{ $item->tempat }}</td>
                                                                <td>{{ $item->pimpinan }}</td>
                                                                <td>
                                                                    <a href="{{ route('pegawai-organisasi.edit',$item->id_organisasi) }}" class="btn btn-warning text-white btn-sm" title="Edit">
                                                                        <i class="fas fa-pencil-alt"></i>
                                                                    </a>
                                                                    <form action="{{ route('pegawai-organisasi.destroy',$item->id_organisasi) }}" method="post" class="d-inline">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin menghapus riwayat organisasi ini?')" type="submit"><i class="fas fa-trash fa-sm"></i></button>
                                                                    </form> 
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Riwayat Organisasi - <code>Selesai Pendidikan atau Selama Menjadi PNS</code></label>
                                            <p class="border-bottom text-gray-800">
                                                - Organisasi Selesai Pendidikan atau Selama Menjadi PNS belum diisi, lengkapi dimenu Riwayat pendidikan -
                                            </p>
                                        </div>
                                    </div>
                                @endif
                            @else
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Riwayat Organisasi - <code>{{ $pegawai->nama_pegawai }}</code></label>
                                    <p class="border-bottom text-gray-800">
                                        - Riwayat Organisasi belum diisi, lengkapi dimenu Riwayat pendidikan -
                                    </p>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane fade" id="keluarga" role="tabpanel" aria-labelledby="keluarga-tab">
                        <div class="row justify-content-center">
                            @if ($pegawai->keterangan_keluarga->count() > 0)
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Keterangan Keluarga - <code>{{ $pegawai->nama_pegawai }}</code></label>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover table-striped" width="100%" cellspacing="0">
                                                <thead>
                                                        <tr class="text-center">
                                                            <th scope="col">Status</th>
                                                            <th scope="col">Nama</th>
                                                            <th scope="col">Jenis Kelamin</th>
                                                            <th scope="col">Tempat Lahir</th>
                                                            <th scope="col">Tanggal Lahir</th>
                                                            <th scope="col">Tanggal Nikah</th>
                                                            <th scope="col">Pekerjaan</th>
                                                            <th scope="col">Keterangan</th>
                                                            <th scope="col">Aksi</th>
                                                        </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($pegawai->keterangan_keluarga as $item)
                                                        <tr class="text-center">
                                                            <td>{{ $item->status }}</td>
                                                            <td>{{ $item->nama }}</td>
                                                            <td>{{ $item->jenis_kelamin }}</td>
                                                            <td>{{ $item->tempat_lahir }}</td>
                                                            <td>{{ date('d/m/Y', strtotime($item->tgl_lahir)) }}</td>
                                                            @if ($item->tgl_nikah == null)
                                                                <td>-</td>
                                                            @else
                                                                <td>{{ date('d/m/Y', strtotime($item->tgl_nikah)) }}</td> 
                                                            @endif
                                                            <td>{{ $item->pekerjaan }}</td>
                                                            <td>{{ $item->keterangan }}</td>
                                                            <td>
                                                                <div class="btn-group">
                                                                    <a href="{{ route('pegawai-keterangan-keluarga.edit',$item->id_ketKeluarga) }}" class="btn btn-warning text-white btn-sm mr-1" title="Edit">
                                                                        <i class="fas fa-pencil-alt"></i>
                                                                    </a>
                                                                    <form action="{{ route('pegawai-keterangan-keluarga.destroy',$item->id_ketKeluarga) }}" method="post" class="d-inline">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin menghapus data keterangan keluarga ini?')" type="submit"><i class="fas fa-trash fa-sm"></i></button>
                                                                    </form> 
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            @else
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Keterangan Keluarga - <code>{{ $pegawai->nama_pegawai }}</code></label>
                                    <p class="border-bottom text-gray-800">
                                        - Keterangan keluarga belum diisi, lengkapi terlebih dahulu dimenu riwayat keluarga -
                                    </p>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="row justify-content-center">
                            @if ($pegawai->orangtua_kandung->count() > 0)
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Orang Tua Kandung- <code>{{ $pegawai->nama_pegawai }}</code></label>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover table-striped" width="100%" cellspacing="0">
                                                <thead>
                                                        <tr class="text-center">
                                                            <th scope="col">Status</th>
                                                            <th scope="col">Nama</th>
                                                            <th scope="col">Tanggal Lahir</th>
                                                            <th scope="col">Pekerjaan</th>
                                                            <th scope="col">Keterangan</th>
                                                            <th scope="col">Aksi</th>
                                                        </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($pegawai->orangtua_kandung as $item)
                                                        <tr class="text-center">
                                                            <td>{{ $item->status }}</td>
                                                            <td>{{ $item->nama }}</td>
                                                            <td>{{ date('d/m/Y', strtotime($item->tgl_lahir)) }}</td>
                                                            <td>{{ $item->pekerjaan }}</td>
                                                            <td>{{ $item->keterangan }}</td>
                                                            <td>
                                                                <div class="btn-group">
                                                                    <a href="{{ route('pegawai-orangtua-kandung.edit',$item->id_orangtua) }}" class="btn btn-warning text-white btn-sm mr-1" title="Edit">
                                                                        <i class="fas fa-pencil-alt"></i>
                                                                    </a>
                                                                    <form action="{{ route('pegawai-orangtua-kandung.destroy',$item->id_orangtua) }}" method="post" class="d-inline">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin menghapus data Orang tua kandung ini?')" type="submit"><i class="fas fa-trash fa-sm"></i></button>
                                                                    </form> 
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            @else
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Orang Tua Kandung - <code>{{ $pegawai->nama_pegawai }}</code></label>
                                    <p class="border-bottom text-gray-800">
                                        - Orang Tua Kandung belum diisi, lengkapi terlebih dahulu dimenu riwayat keluarga -
                                    </p>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="row justify-content-center">
                            @if ($pegawai->saudara_kandung->count() > 0)
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Saudara Kandung - <code>{{ $pegawai->nama_pegawai }}</code></label>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover table-striped" width="100%" cellspacing="0">
                                                <thead>
                                                        <tr class="text-center">
                                                            <th scope="col">Nama</th>
                                                            <th scope="col">Jenis Kelamin</th>
                                                            <th scope="col">Tanggal Lahir</th>
                                                            <th scope="col">Pekerjaan</th>
                                                            <th scope="col">Keterangan</th>
                                                            <th scope="col">Aksi</th>
                                                        </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($pegawai->saudara_kandung as $item)
                                                        <tr class="text-center">
                                                            <td>{{ $item->nama }}</td>
                                                            <td>{{ $item->jenis_kelamin }}</td>
                                                            <td>{{ date('d/m/Y', strtotime($item->tgl_lahir)) }}</td>
                                                            <td>{{ $item->pekerjaan }}</td>
                                                            <td>{{ $item->keterangan }}</td>
                                                            <td>
                                                                <div class="btn-group">
                                                                    <a href="{{ route('pegawai-saudara-kandung.edit',$item->id_saudarakandung) }}" class="btn btn-warning text-white btn-sm mr-1" title="Edit">
                                                                        <i class="fas fa-pencil-alt"></i>
                                                                    </a>
                                                                    <form action="{{ route('pegawai-saudara-kandung.destroy',$item->id_saudarakandung) }}" method="post" class="d-inline">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin menghapus data saudara kandung ini?')" type="submit"><i class="fas fa-trash fa-sm"></i></button>
                                                                    </form> 
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            @else
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Saudara Kandung - <code>{{ $pegawai->nama_pegawai }}</code></label>
                                    <p class="border-bottom text-gray-800">
                                        - Saudara Kandung belum diisi, lengkapi terlebih dahulu dimenu riwayat keluarga -
                                    </p>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="row justify-content-center">
                            @if ($pegawai->mertua->count() > 0)
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Mertua - <code>{{ $pegawai->nama_pegawai }}</code></label>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover table-striped" width="100%" cellspacing="0">
                                                <thead>
                                                        <tr class="text-center">
                                                            <th scope="col">Status</th>
                                                            <th scope="col">Nama</th>
                                                            <th scope="col">Tanggal Lahir</th>
                                                            <th scope="col">Pekerjaan</th>
                                                            <th scope="col">Keterangan</th>
                                                            <th scope="col">Aksi</th>
                                                        </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($pegawai->mertua as $item)
                                                        <tr class="text-center">
                                                            <td>{{ $item->status }}</td>
                                                            <td>{{ $item->nama }}</td>
                                                            <td>{{ date('d/m/Y', strtotime($item->tgl_lahir)) }}</td>
                                                            <td>{{ $item->pekerjaan }}</td>
                                                            <td>{{ $item->keterangan }}</td>
                                                            <td>
                                                               <div class="btn-group">
                                                                <a href="{{ route('pegawai-mertua.edit',$item->id_mertua) }}" class="btn btn-warning text-white btn-sm mr-1" title="Edit">
                                                                    <i class="fas fa-pencil-alt"></i>
                                                                </a>
                                                                <form action="{{ route('pegawai-mertua.destroy',$item->id_mertua) }}" method="post" class="d-inline">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin menghapus data Mertua ini?')" type="submit"><i class="fas fa-trash fa-sm"></i></button>
                                                                </form> 
                                                               </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            @else
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Mertua - <code>{{ $pegawai->nama_pegawai }}</code></label>
                                    <p class="border-bottom text-gray-800">
                                        - Mertua belum diisi, lengkapi terlebih dahulu dimenu riwayat keluarga -
                                    </p>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane fade" id="kepegawaian" role="tabpanel" aria-labelledby="kepegawaian-tab">
                        <div class="row justify-content-center">
                            @if ($pegawai->diklat_penjenjangan->count() > 0)
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Riwayat Diklat Penjenjangan - <code>{{ $pegawai->nama_pegawai }}</code></label>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover table-striped" width="100%" cellspacing="0">
                                                <thead>
                                                        <tr class="text-center">
                                                            <th scope="col">Nama Diklat</th>
                                                            <th scope="col">Tahun</th>
                                                            <th scope="col">Nomor</th>
                                                            <th scope="col">Tanggal</th>
                                                            <th scope="col">Aksi</th>
                                                        </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($pegawai->diklat_penjenjangan as $item)
                                                        <tr class="text-center">
                                                            <td>{{ $item->nama_diklat }}</td>
                                                            <td>{{ $item->tahun }}</td>
                                                            <td>{{ $item->nomor }}</td>
                                                            <td>{{ date('d/m/Y', strtotime($item->tanggal)) }}</td>
                                                            <td>
                                                                <div class="btn-group">
                                                                    <a href="{{ route('pegawai-diklat-penjenjangan.edit',$item->id_diklat) }}" class="btn btn-warning text-white btn-sm mr-1" title="Edit">
                                                                        <i class="fas fa-pencil-alt"></i>
                                                                    </a>
                                                                    <form action="{{ route('pegawai-diklat-penjenjangan.destroy',$item->id_diklat) }}" method="post" class="d-inline">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin menghapus data Diklat Penjenjangan ini?')" type="submit"><i class="fas fa-trash fa-sm"></i></button>
                                                                    </form> 
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            @else
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Riwayat Diklat Penjenjangan - <code>{{ $pegawai->nama_pegawai }}</code></label>
                                    <p class="border-bottom text-gray-800">
                                        - Riwayat Diklat Penjenjangan belum diisi, lengkapi dimenu Kepegawaian -
                                    </p>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="row justify-content-center">
                            @if ($pegawai->penghargaan->count() > 0)
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Riwayat Bintang/Penghargaan - <code>{{ $pegawai->nama_pegawai }}</code></label>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover table-striped" width="100%" cellspacing="0">
                                                <thead>
                                                        <tr class="text-center">
                                                            <th scope="col">Nama Bintang/ Penghargaan</th>
                                                            <th scope="col">Tahun Perolehan</th>
                                                            <th scope="col">Nama Negara/ Instansi</th>
                                                            <th scope="col">Aksi</th>
                                                        </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($pegawai->penghargaan as $item)
                                                        <tr class="text-center">
                                                            <td>{{ $item->nama_penghargaan }}</td>
                                                            <td>{{ $item->tahun }}</td>
                                                            <td>{{ $item->negara_instansi }}</td>
                                                            <td>
                                                                <div class="btn-group">
                                                                    <a href="{{ route('pegawai-penghargaan.edit',$item->id_penghargaan) }}" class="btn btn-warning text-white btn-sm mr-1" title="Edit">
                                                                        <i class="fas fa-pencil-alt"></i>
                                                                    </a>
                                                                    <form action="{{ route('pegawai-penghargaan.destroy',$item->id_penghargaan) }}" method="post" class="d-inline">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin menghapus data bintang/penghargaan ini?')" type="submit"><i class="fas fa-trash fa-sm"></i></button>
                                                                    </form> 
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            @else
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Riwayat Bintang/Penghargaan - <code>{{ $pegawai->nama_pegawai }}</code></label>
                                    <p class="border-bottom text-gray-800">
                                        - Riwayat Bintang/Penghargaan Belum Diisi, lengkapi di menu Kepegawaian -
                                    </p>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="row justify-content-center">
                            @if ($pegawai->pengalaman_keluar_negeri->count() > 0)
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Riwayat Pengalaman Keluar Negeri - <code>{{ $pegawai->nama_pegawai }}</code></label>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover table-striped" width="100%" cellspacing="0">
                                                <thead>
                                                        <tr class="text-center">
                                                            <th scope="col">Negara</th>
                                                            <th scope="col">Tujuan Kunjungan</th>
                                                            <th scope="col">Lama Kunjungan</th>
                                                            <th scope="col">Yang Membiayai</th>
                                                            <th scope="col">Aksi</th>
                                                        </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($pegawai->pengalaman_keluar_negeri as $item)
                                                        <tr class="text-center">
                                                            <td>{{ $item->negara }}</td>
                                                            <td>{{ $item->tujuan }}</td>
                                                            <td>{{ $item->lama }}</td>
                                                            <td>{{ $item->membiayai }}</td>
                                                            <td>
                                                                <div class="btn-group">
                                                                    <a href="{{ route('pegawai-pengalaman-keluar-negeri.edit',$item->id_keluarnegri) }}" class="btn btn-warning text-white btn-sm mr-1" title="Edit">
                                                                        <i class="fas fa-pencil-alt"></i>
                                                                    </a>
                                                                    <form action="{{ route('pegawai-pengalaman-keluar-negeri.destroy',$item->id_keluarnegri) }}" method="post" class="d-inline">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin menghapus data pengalaman keluar negeri ini?')" type="submit"><i class="fas fa-trash fa-sm"></i></button>
                                                                    </form> 
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            @else
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Riwayat Pengalaman Keluar Negeri - <code>{{ $pegawai->nama_pegawai }}</code></label>
                                    <p class="border-bottom text-gray-800">
                                        - Riwayat Pengalaman Keluar Negeri belum diisi, lengkapi dimenu Kepegawaian -
                                    </p>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="row justify-content-center">
                            @if ($pegawai->keterangan_lain->count() > 0)
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Riwayat Keterangan lain - <code>{{ $pegawai->nama_pegawai }}</code></label>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover table-striped" width="100%" cellspacing="0">
                                                <thead>
                                                        <tr class="text-center">
                                                            <th scope="col">Jenis</th>
                                                            <th scope="col">Pejabat</th>
                                                            <th scope="col">Nomor</th>
                                                            <th scope="col">Tanggal</th>
                                                            <th scope="col">Aksi</th>
                                                        </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($pegawai->keterangan_lain as $item)
                                                        <tr class="text-center">
                                                            <td>{{ $item->jenis }}</td>
                                                            <td>{{ $item->penjabat }}</td>
                                                            <td>{{ $item->nomor }}</td>
                                                            <td>{{ date('d/m/Y', strtotime($item->tanggal)) }}</td>
                                                            <td>
                                                                <div class="btn-group">
                                                                    <a href="{{ route('pegawai-keterangan-lain.edit',$item->id_ketlain) }}" class="btn btn-warning text-white btn-sm mr-1" title="Edit">
                                                                        <i class="fas fa-pencil-alt"></i>
                                                                    </a>
                                                                    <form action="{{ route('pegawai-keterangan-lain.destroy',$item->id_ketlain) }}" method="post" class="d-inline">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin menghapus data keterangan lain ini?')" type="submit"><i class="fas fa-trash fa-sm"></i></button>
                                                                    </form> 
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            @else
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Riwayat Keterangan lain - <code>{{ $pegawai->nama_pegawai }}</code></label>
                                    <p class="border-bottom text-gray-800">
                                        - Riwayat Keterangan lain belum diisi, lengkapi dimenu Kepegawaian -
                                    </p>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane fade" id="mutasi" role="tabpanel" aria-labelledby="mutasi-tab">
                        <div class="row justify-content-center">
                            @if ($pegawai->mutasi->count() > 0)
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Riwayat Mutasi - <code>{{ $pegawai->nama_pegawai }}</code></label>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover table-striped" width="100%" cellspacing="0">
                                                <thead>
                                                        <tr class="text-center">
                                                            <th scope="col">Jenis Mutasi</th>
                                                            <th scope="col">Asal</th>
                                                            <th scope="col">Tujuan Mutasi</th>
                                                            <th scope="col">Tanggal</th>
                                                            <th scope="col">Aksi</th>
                                                        </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($pegawai->mutasi as $item)
                                                        <tr class="text-center">
                                                            <td>{{ $item->jenis_mutasi }}</td>
                                                            <td>{{ $item->asal }}</td>
                                                            <td>{{ $item->tujuan }}</td>
                                                            <td>{{ date('d/m/Y', strtotime($item->tanggal)) }}</td>
                                                            <td>
                                                                <div class="btn-group">
                                                                    <a href="{{ route('pegawai-mutasi.edit',$item->id_mutasi) }}" class="btn btn-warning text-white btn-sm mr-1" title="Edit">
                                                                        <i class="fas fa-pencil-alt"></i>
                                                                    </a>
                                                                    <form action="{{ route('pegawai-mutasi.destroy',$item->id_mutasi) }}" method="post" class="d-inline">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin menghapus data mutasi ini?')" type="submit"><i class="fas fa-trash fa-sm"></i></button>
                                                                    </form> 
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            @else
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Riwayat Mutasi - <code>{{ $pegawai->nama_pegawai }}</code></label>
                                    <p class="border-bottom text-gray-800">
                                        - Riwayat Mutasi belum diisi, lengkapi dimenu Mutasi -
                                    </p>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane fade" id="dokumen" role="tabpanel" aria-labelledby="dokumen-tab">
                        <div class="row justify-content-center">
                            @if ($pegawai->dokumen_pegawai->count() > 0)
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Riwayat File Dokumen - <code>{{ $pegawai->nama_pegawai }}</code></label>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover table-striped" width="100%" cellspacing="0">
                                                <thead>
                                                        <tr class="text-center">
                                                            <th scope="col">Nama File</th>
                                                            <th scope="col">Keterangan</th>
                                                            <th scope="col">File Dokumen</th>
                                                            <th scope="col">Aksi</th>
                                                        </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($pegawai->dokumen_pegawai as $item)
                                                        <tr class="text-center">
                                                            <td>{{ $item->nama_dokumen }}</td>
                                                            <td>{{ $item->keterangan }}</td>
                                                            <td><a href='{{ asset('/storage/file_dokumen/'.$item->file_dokumen)}}' target='_blank' title='download'><h4><i class='fa fa-file'></i></h4></a></td>
                                                            <td>
                                                                <div class="btn-group">
                                                                    <a href="{{ route('dokumen-pegawai.edit',$item->id_dokpegawai) }}" class="btn btn-warning text-white btn-sm mr-1" title="Edit">
                                                                        <i class="fas fa-pencil-alt"></i>
                                                                    </a>
                                                                    <form action="{{ route('dokumen-pegawai.destroy',$item->id_dokpegawai) }}" method="post" class="d-inline">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin menghapus Dokumen ini?')" type="submit"><i class="fas fa-trash fa-sm"></i></button>
                                                                    </form> 
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            @else
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Riwayat File Dokumen - <code>{{ $pegawai->nama_pegawai }}</code></label>
                                    <p class="border-bottom text-gray-800">
                                        - Riwayat File Dokumen belum diisi, lengkapi dimenu Dokumen Pegawai -
                                    </p>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pangkat_cpns" role="tabpanel" aria-labelledby="pangkat_cpns-tab">
                        <div class="row justify-content-center">
                            @if ($pegawai->pangkat_cpns !=null)
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Riwayat Pangkat CPNS Pegawai - <code>{{ $pegawai->nama_pegawai }}</code></label>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover table-striped" width="100%" cellspacing="0">
                                                <thead>
                                                        <tr class="text-center">
                                                            <th scope="col">Pangkat Golongan</th>
                                                            <th scope="col">TMT</th>
                                                            <th scope="col">Gaji Pokok</th>
                                                            <th scope="col">Pejabat</th>
                                                            <th scope="col">Nomor</th>
                                                            <th scope="col">Tanggal</th>
                                                            <th scope="col">Aksi</th>
                                                        </tr>
                                                </thead>
                                                <tbody>
                                                        <tr class="text-center">
                                                            <td>{{ $pangkat_cpns->golongan->pangkat }}</td>
                                                            <td>{{ date('d/m/Y', strtotime($pangkat_cpns->tmt)) }}</td>
                                                            <td>{{ $pangkat_cpns->gaji_pokok }}</td>
                                                            <td>{{ $pangkat_cpns->penjabat }}</td>
                                                            <td>{{ $pangkat_cpns->nomor }}</td>
                                                            <td>{{ date('d/m/Y', strtotime($pangkat_cpns->tanggal)) }}</td>
                                                            <td>
                                                                <div class="btn-group">
                                                                    <a href="{{ route('pegawai-pangkat-cpns.edit',$pangkat_cpns->id_pangkat_cpns) }}" class="btn btn-warning text-white btn-sm mr-1" title="Edit">
                                                                        <i class="fas fa-pencil-alt"></i>
                                                                    </a>
                                                                    <form action="{{ route('pegawai-pangkat-cpns.destroy',$pangkat_cpns->id_pangkat_cpns) }}" method="post" class="d-inline">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin menghapus data riwayat pangkat cpns ini?')" type="submit"><i class="fas fa-trash fa-sm"></i></button>
                                                                    </form> 
                                                                </div>
                                                            </td>
                                                        </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            @else
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Riwayat Pangkat CPNS Pegawai - <code>{{ $pegawai->nama_pegawai }}</code></label>
                                    <p class="border-bottom text-gray-800">
                                        - Riwayat Pangkat CPNS Pegawai belum diisi, lengkapi dimenu Kepegawaian -
                                    </p>
                                </div>
                            </div>
                            @endif
                        </div>   
                    </div>
                    <div class="tab-pane fade" id="pangkat_pns" role="tabpanel" aria-labelledby="pangkat_pns-tab">
                        <div class="row justify-content-center">
                            @if ($pegawai->pangkat_pns !=null)
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Riwayat Pangkat PNS Pegawai - <code>{{ $pegawai->nama_pegawai }}</code></label>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover table-striped" width="100%" cellspacing="0">
                                                <thead>
                                                        <tr class="text-center">
                                                            <th scope="col">Pangkat Golongan</th>
                                                            <th scope="col">TMT</th>
                                                            <th scope="col">Pejabat</th>
                                                            <th scope="col">Nomor</th>
                                                            <th scope="col">Tanggal</th>
                                                            <th scope="col">Aksi</th>
                                                        </tr>
                                                </thead>
                                                <tbody>
                                                        <tr class="text-center">
                                                            <td>{{ $pangkat_pns->golongan->pangkat }}</td>
                                                            <td>{{ date('d/m/Y', strtotime($pangkat_pns->tmt)) }}</td>
                                                            <td>{{ $pangkat_pns->penjabat }}</td>
                                                            <td>{{ $pangkat_pns->nomor }}</td>
                                                            <td>{{ date('d/m/Y', strtotime($pangkat_pns->tanggal)) }}</td>
                                                            <td>
                                                                <div class="btn-group">
                                                                    <a href="{{ route('pegawai-pangkat-pns.edit',$pangkat_pns->id_pangkat_pns) }}" class="btn btn-warning text-white btn-sm mr-1" title="Edit">
                                                                        <i class="fas fa-pencil-alt"></i>
                                                                    </a>
                                                                    <form action="{{ route('pegawai-pangkat-pns.destroy',$pangkat_pns->id_pangkat_pns) }}" method="post" class="d-inline">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin menghapus data riwayat pangkat pns ini?')" type="submit"><i class="fas fa-trash fa-sm"></i></button>
                                                                    </form> 
                                                                </div>
                                                            </td>
                                                        </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            @else
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Riwayat Pangkat PNS Pegawai - <code>{{ $pegawai->nama_pegawai }}</code></label>
                                    <p class="border-bottom text-gray-800">
                                        - Riwayat Pangkat PNS Pegawai belum diisi, lengkapi dimenu Kepegawaian -
                                    </p>
                                </div>
                            </div>
                            @endif
                        </div>   
                    </div>
                    <div class="tab-pane fade" id="pangkat" role="tabpanel" aria-labelledby="pangkat-tab">
                        <div class="row justify-content-center">
                            @if ($pegawai->riwayat_pangkat->count() > 0)
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Riwayat Pangkat Pegawai - <code>{{ $pegawai->nama_pegawai }}</code></label>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover table-striped" width="100%" cellspacing="0">
                                                <thead>
                                                        <tr class="text-center">
                                                            <th scope="col">Golongan</th>
                                                            <th scope="col">TMT</th>
                                                            <th scope="col">Pejabat</th>
                                                            <th scope="col">Nomor</th>
                                                            <th scope="col">Tanggal</th>
                                                            <th scope="col">Aksi</th>
                                                        </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($pegawai->riwayat_pangkat as $item)
                                                        <tr class="text-center">
                                                            <td>{{ $item->golongan->nama_golongan }}</td>
                                                            <td>{{ date('d/m/Y', strtotime($item->tmt)) }}</td>
                                                            <td>{{ $item->penjabat }}</td>
                                                            <td>{{ $item->nomor }}</td>
                                                            <td>{{ date('d/m/Y', strtotime($item->tanggal)) }}</td>
                                                            <td>
                                                                <div class="btn-group">
                                                                    <a href="{{ route('pegawai-riwayat-pangkat.edit',$item->id_riwayat_pangkat) }}" class="btn btn-warning text-white btn-sm mr-1" title="Edit">
                                                                        <i class="fas fa-pencil-alt"></i>
                                                                    </a>
                                                                    <form action="{{ route('pegawai-riwayat-pangkat.destroy',$item->id_riwayat_pangkat) }}" method="post" class="d-inline">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin menghapus data riwayat pangkat ini?')" type="submit"><i class="fas fa-trash fa-sm"></i></button>
                                                                    </form> 
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            @else
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Riwayat Pangkat Pegawai - <code>{{ $pegawai->nama_pegawai }}</code></label>
                                    <p class="border-bottom text-gray-800">
                                        - Riwayat Pangkat Pegawai belum diisi, lengkapi dimenu Kepegawaian -
                                    </p>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane fade" id="kgb" role="tabpanel" aria-labelledby="kgb-tab">
                        <div class="row justify-content-center">
                            @if ($pegawai->riwayat_kgb->count() > 0)
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Riwayat Kenaikan Gaji Berkala - <code>{{ $pegawai->nama_pegawai }}</code></label>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover table-striped" width="100%" cellspacing="0">
                                                <thead>
                                                        <tr class="text-center">
                                                            <th scope="col">Gol</th>
                                                            <th scope="col">Gaji</th>
                                                            <th scope="col">Dari-Sampai</th>
                                                            <th scope="col">Pejabat</th>
                                                            <th scope="col">Nomor</th>
                                                            <th scope="col">Tanggal</th>
                                                            <th scope="col">Peraturan</th>
                                                            <th scope="col">Status</th>
                                                            <th scope="col">Aksi</th>
                                                        </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($kgb as $item)
                                                        <tr class="text-center">
                                                            <td>{{ $item->golongan->nama_golongan }}</td>
                                                            <td>{{ $item->jumlah_gaji }}</td>
                                                            <td>{{ date('d/m/Y', strtotime($item->mulai_berlaku)) }} - {{ date('d/m/Y', strtotime($item->batas_berlaku)) }}</td>
                                                            <td>{{ $item->penjabat }}</td>
                                                            <td>{{ $item->nomor }}</td>
                                                            <td>{{ date('d/m/Y', strtotime($item->tanggal)) }}</td>
                                                            <td>{{ $item->peraturan }}</td>
                                                            <td> {{ $item->status == '0' ? 'Aktif' : 'Nonaktif' }}</td>
                                                            <td>
                                                                <div class="btn-group">
                                                                    <a href="{{ route('pegawai-riwayat-kgb.edit',$item->id_riwayat_kgb) }}" class="btn btn-warning text-white btn-sm mr-1" title="Edit">
                                                                        <i class="fas fa-pencil-alt"></i>
                                                                    </a>
                                                                    <form action="{{ route('pegawai-riwayat-kgb.destroy',$item->id_riwayat_kgb) }}" method="post" class="d-inline">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin menghapus data kenaikan gaji berkala ini?')" type="submit"><i class="fas fa-trash fa-sm"></i></button>
                                                                    </form> 
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            @else
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Riwayat Kenaikan Gaji Berkala - <code>{{ $pegawai->nama_pegawai }}</code></label>
                                    <p class="border-bottom text-gray-800">
                                        - Riwayat Kenaikan Gaji Berkala belum diisi, lengkapi dimenu Dokumen Kepegawaian -
                                    </p>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('script-tambahanakhir')
    <script type="text/javascript">
    $('.data-jabatan').on('change',function(){
    //ambil nilai id jabatan
    var _id = $(this).val();
    // console.log(_id);
    //sembunyikan field jika id jabatan kecil dari 3
    if (_id < 3) {
        $('#field-staf').hide();
        $('#field-asisten').hide();
        $('#field-asisten').hide();
        $('#field-bagian').hide();
        $('#field-sub-bagian').hide();
    } else 
    //jika id jabatan = 3 tampilkan field staf ahli
    if (_id == 3) {
        var element = document.getElementById("field-staf");
        element.classList.remove("d-none");
        $.ajax({
                url: '{{route('op-unit_kerja.staf-ahli')}}',
                data:{
                    data:_id
                },
                method : 'GET',
                beforeSend:function(){
                    $('.data-staf').html('mohon tunggu');
                },
                success:function(res){
                    // tampilkan field staf
                    $('#field-staf').show();
                    $('.data-staf').html(res);
                    //sembunyikan field asisten
                    $('#field-asisten').hide();
                    //sembunyikan field bagian
                    $('#field-bagian').hide();
                    //sembunyikan field sub bagian
                    $('#field-sub-bagian').hide();
                    
                },
            })
    } else 
    //jika id jabatan besar dari 3
    if(_id > 3){
        //tampilkan filed asisten
        var element = document.getElementById("field-asisten");
        element.classList.remove("d-none");
        //jika id jabatan 5 tampilkan field bagian
        if (_id == 6 || _id == 7) {
            $('#field-bagian').show();
            var element = document.getElementById("field-bagian");
            element.classList.remove("d-none");
            $('#field-sub-bagian').show();
            var element = document.getElementById("field-sub-bagian");
            element.classList.remove("d-none");
        } else 
        if (_id == 5) {
            $('#field-sub-bagian').hide();
            $('#field-bagian').show();
            var element = document.getElementById("field-bagian");
            element.classList.remove("d-none");

        } else 
        if(_id == 4){
            //sembunyikan field staf bagian
            $('#field-bagian').hide();
            //sembunyikan field sub bagian
            $('#field-sub-bagian').hide();
        }
        var _id = 4;
        $.ajax({
                url: '{{route('op-unit_kerja.asisten')}}',
                data:{
                    data:_id
                },
                method : 'GET',
                beforeSend:function(){
                    $('.data-asisten').html('mohon tunggu');
                },
                success:function(res){
                    // tampilkan filed asiseten
                    $('#field-asisten').show();
                    $('.data-asisten').html(res);
                    //sembunyikan field staf ahli
                    $('#field-staf').hide();
                    
                },
            })
    }
})
//tampilkan unit bagian berdasarkan data asisten
$('.data-asisten').on('change',function(){
    var element = document.getElementById("field-bagian");
        element.classList.remove("d-none");
    var _id = $(this).val();
    // console.log(_id);
    $.ajax({
        url: '{{route('op-unit_kerja.bagian')}}',
        data:{
            data:_id
        },
        method : 'GET',
        beforeSend:function(){
            $('.data-bagian').html('mohon tunggu');
        },
        success:function(res){
            // console.log(res);
            // $('#field-asisten').fadeIn();
            $('.data-bagian').html(res);
            // $('#field-staf').fadeOut();
        },
    })
    
})

$('.data-bagian').on('change',function(){
    var _id = $(this).val();
    $.ajax({
        url: '{{route('op-unit_kerja.sub-bagian')}}',
        data:{
            data:_id
        },
        method : 'GET',
        beforeSend:function(){
            $('.data-sub-bagian').html('mohon tunggu');
        },
        success:function(res){
            // console.log(res);
            // $('#field-asisten').fadeIn();
            $('.data-sub-bagian').html(res);
            // $('#field-staf').fadeOut();
        },
    })
})
    //javascript untuk tambah hobi
        $('.tambahhobi').on('click',function(e){
            tambahHobi();
            e.preventDefault();
        });
        function tambahHobi(){
            var hobii = '<div class="datahobi"><div class="form-group row left-items-center"><label for="Hobi" class="form-control-label col-sm-3 text-md-right"></label><div class="col-sm-6 col-md-9"><input type="text" id="hobi" name="hobi[]"  class="form-control @error('hobi') is-invalid @enderror" placeholder="Masukan hobi" value="{{old('hobi')}}" >@error('hobi')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</div></div><div class="form-group text-right"><a href="#" class="remove btn bt-sm btn-warning text-right"><i class="fa fa-minus"></i></a></div></div>';
            $('.hobii').append(hobii);
        };
        $(document).on('click', '.remove', function(e) {
            e.preventDefault();
            $(this).parent().parent().remove();
        })
    </script>
@endpush