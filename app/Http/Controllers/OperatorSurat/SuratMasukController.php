<?php

namespace App\Http\Controllers\OperatorSurat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;
use App\Models\SuratMasuk;
use App\Models\User;
use App\Http\Requests\OperatorSurat\SuratMasukRequest;
use App\Http\Requests\OperatorSurat\DisposisiMasukRequest;
use App\Http\Requests\OperatorSurat\TeruskanDisposisiMasukRequest;
use App\Models\DisposisiSuratMasuk as DisposisiMasuk;
use App\Models\Pegawai;
use App\Models\TeruskanDisposisiMasuk;

class SuratMasukController extends Controller
{
    //method data surat masuk
    public function index()
    {   
        $results = SuratMasuk::where('status',null)->orderBy('id_surat_masuk','DESC')->get();
        return view('operator-surat.surat-masuk.surat-masuk',\compact('results'));
    }
    //method create surat masuk
    public function create()
    {
        return view('operator-surat.surat-masuk.surat-masuk-add');
    }
    //method store surat masuk
    public function store(SuratMasukRequest $request)
    {
        $this->validate($request,[
            'file_surat' => 'required'
        ],[
            'file_surat.required' => 'File Surat Tidak Boleh Kosong',
        ]);

        $data = $request->all();
        $data['file_surat'] = $request->file('file_surat')->store(
            'assets/surat-masuk','public'
        );
        $data['tanggal_surat'] = date('Y-m-d H:i:s',strtotime($data['tanggal_surat'] ));
        $create=SuratMasuk::create($data);
        return redirect()->route('surat-masuk.index')->with('status',"Data surat masuk berhasil ditambah");
    }

    //method detail surat masuk
    public function show($id){
        $result = SuratMasuk::findOrFail($id);
        return view('operator-surat.surat-masuk.surat-masuk-detail',\compact('result'));
    }

    //method form edit surat masuk
    public function edit($id){
        $result = SuratMasuk::findOrFail($id);
        return view('operator-surat.surat-masuk.surat-masuk-edit',\compact('result'));
    }

    //method update surat masuk
    public function update(SuratMasukRequest $request,$id){
        $data = $request->all();
        $data['tanggal_surat'] = date('Y-m-d H:i:s',strtotime($data['tanggal_surat'] ));
        $surat = SuratMasuk::findOrFail($id);
        if ($request->hasFile('file_surat')) {
            // jika file surat ada
            if ($surat->file_surat) {
                // hapus file surat masuk di folder public
                Storage::delete('public/'.$surat->file_surat);
            }
            // simpan file yang diupload ke folder assets/surat-masuk yang ada di public lalu simpan dalam variable data[foto]
            $data['file_surat'] = $request->file('file_surat')->store(
                'assets/surat-masuk','public'
            );
        }
        //update data surat
        $surat->update($data);
        return redirect()->route('surat-masuk.index')->with('status',"Data Surat Masuk berhasil diubah");
    }
    //method hapus surat masuk
    public function destroy(SuratMasuk $data){
        SuratMasuk::destroy($data->id_surat_masuk);
        Storage::delete('public/'.$data->file_surat);
        return redirect()->route('surat-masuk.index')->with('status','Data Surat Masuk Berhasil Dihapus');
    }
    
    public function cetak_laporan_surat_masuk()
    {
        return view('operator-surat.surat-masuk.cetak_surat_masuk');
    }

    public function search_tujuan(Request $request)
    {

        $data = [];

        if($request->has('q')){
            $search = $request->q;
            $data = User::select('users.*','jabatan.id_jabatan','nama_pegawai','nama_jabatan','nama_staf_ahli','nama_asisten','nama_bagian','nama_sub_bagian')
            ->join('pegawai', 'nip_pegawai', '=', 'users.id')
            ->join('jabatan', 'jabatan.id_jabatan', '=', 'pegawai.id_jabatan')
            ->join('unit_kerja', 'unit_kerja.nip_pegawai', '=', 'pegawai.nip_pegawai')
            ->join('staf_ahli', 'staf_ahli.id_staf_ahli', '=', 'unit_kerja.id_staf_ahli')
            ->join('asisten', 'asisten.id_asisten', '=', 'unit_kerja.id_asisten')
            ->join('bagian', 'bagian.id_bagian', '=', 'unit_kerja.id_bagian')
            ->join('sub_bagian', 'sub_bagian.id_sub_bagian', '=', 'unit_kerja.id_sub_bagian')
            ->where('nama_pegawai', 'LIKE' ,'%' . $search . '%')
            ->orWhere('nama_jabatan', 'LIKE' ,'%' . $search . '%')
            ->orWhere('nama_staf_ahli', 'LIKE' ,'%' . $search . '%')
            ->orWhere('nama_asisten', 'LIKE' ,'%' . $search . '%')
            ->orWhere('nama_bagian', 'LIKE' ,'%' . $search . '%')
            ->orWhere('nama_sub_bagian', 'LIKE' ,'%' . $search . '%')
            ->get();
        }
        return response()->json($data);
    }
}
