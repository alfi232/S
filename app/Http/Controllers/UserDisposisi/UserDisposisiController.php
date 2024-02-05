<?php

namespace App\Http\Controllers\UserDisposisi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\SuratMasuk;
use App\Models\Notifikasi;
use App\Models\SuratKeluar;
use Illuminate\Support\Facades\Auth;

class UserDisposisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        //cek level surat user yang login
        $level = User::select('users.*','urutan_level','nama_level')
                ->join('level_surat','level_surat.id_level_surat','=','users.id_level_surat')
                ->where('id',$id)
                ->first();
        //tampilkan disposisi surat masuk berdasarkan id user
        $disposisi = SuratMasuk::select('surat_masuk.*','id_teruskan_surat_masuk','indeks','disposisi_surat_masuk.id_disposisi_surat_masuk','tanggal_disposisi','teruskan_disposisi_masuk.id','teruskan_disposisi_masuk.status as status_teruskan','urutan_level')
                ->join('disposisi_surat_masuk', 'disposisi_surat_masuk.id_surat_masuk', '=', 'surat_masuk.id_surat_masuk')
                ->join('teruskan_disposisi_masuk', 'teruskan_disposisi_masuk.id_disposisi_surat_masuk', '=', 'disposisi_surat_masuk.id_disposisi_surat_masuk')
                ->join('users','users.id','=','teruskan_disposisi_masuk.id')
                ->join('level_surat','level_surat.id_level_surat','=','users.id_level_surat')
                ->where('urutan_level',$level->urutan_level)
                ->where('surat_masuk.status','2')
                ->where('teruskan_disposisi_masuk.status','0')
                ->where('users.id',$id)
                ->count();

        $approval = SuratKeluar::select('surat_keluar.*','id_teruskan_effort_surat','indeks','effort_surat_keluar.id_effort_surat','tanggal_effort','teruskan_effort_surat.id','teruskan_effort_surat.status as status_teruskan','urutan_level')
        ->join('effort_surat_keluar', 'effort_surat_keluar.id_surat_keluar', '=', 'surat_keluar.id_surat_keluar')
        ->join('teruskan_effort_surat', 'teruskan_effort_surat.id_effort_surat', '=', 'effort_surat_keluar.id_effort_surat')
        ->join('users','users.id','=','teruskan_effort_surat.id')
        ->join('level_surat','level_surat.id_level_surat','=','users.id_level_surat')
        ->where('urutan_level',$level->urutan_level)
        ->where('surat_keluar.status','2')
        ->where('teruskan_effort_surat.status','0')
        ->where('users.id',$id)
        ->count();
        // dd($approval);
        return \view('user-disposisi.dashboard',compact('disposisi','approval'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function search_tujuan_disposisi(Request $request){
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

    public function search_tujuan_approval(Request $request){
        $data = [];
        $level = Auth::user()->id_level_surat;
        if($request->has('q')){
            $search = $request->q;
            if ($level == 5) {
                $data = User::select('users.*','nama_pegawai','jabatan.id_jabatan','nama_jabatan','nama_staf_ahli','nama_asisten')
                ->join('pegawai', 'nip_pegawai', '=', 'users.id')
                ->join('jabatan', 'jabatan.id_jabatan', '=', 'pegawai.id_jabatan')
                ->join('unit_kerja', 'unit_kerja.nip_pegawai', '=', 'pegawai.nip_pegawai')
                ->join('staf_ahli', 'staf_ahli.id_staf_ahli', '=', 'unit_kerja.id_staf_ahli')
                ->join('asisten', 'asisten.id_asisten', '=', 'unit_kerja.id_asisten')
                ->join('bagian', 'bagian.id_bagian', '=', 'unit_kerja.id_bagian')
                ->join('sub_bagian', 'sub_bagian.id_sub_bagian', '=', 'unit_kerja.id_sub_bagian')   
                ->where('nama_pegawai', 'LIKE' ,'%' . $search . '%')
                ->orWhere('nama_staf_ahli', 'LIKE' ,'%' . $search . '%')
                ->orWhere('nama_asisten', 'LIKE' ,'%' . $search . '%')
                ->where(function($q) {
                    $q->where('jabatan.id_jabatan',3)
                    ->orWhere('jabatan.id_jabatan',4);
                })
                ->get();
            } else
            if ($level == 6) {
                $data = User::select('users.*','nama_pegawai','jabatan.id_jabatan','nama_jabatan','nama_staf_ahli','nama_asisten','nama_bagian','nama_sub_bagian')
                ->join('pegawai', 'nip_pegawai', '=', 'users.id')
                ->join('jabatan', 'jabatan.id_jabatan', '=', 'pegawai.id_jabatan')
                ->join('unit_kerja', 'unit_kerja.nip_pegawai', '=', 'pegawai.nip_pegawai')
                ->join('staf_ahli', 'staf_ahli.id_staf_ahli', '=', 'unit_kerja.id_staf_ahli')
                ->join('asisten', 'asisten.id_asisten', '=', 'unit_kerja.id_asisten')
                ->join('bagian', 'bagian.id_bagian', '=', 'unit_kerja.id_bagian')
                ->join('sub_bagian', 'sub_bagian.id_sub_bagian', '=', 'unit_kerja.id_sub_bagian')
                ->where(function($q) use ($search) {
                    $q->where('nama_pegawai', 'LIKE' ,'%' . $search . '%')
                    ->orWhere('nama_bagian', 'LIKE' ,'%' . $search . '%')
                    ->orWhere('nama_jabatan', 'LIKE' ,'%' . $search . '%');
                })
                ->where('jabatan.id_jabatan',5)
                ->get();
            }
        }
        return response()->json($data);
    }
}
