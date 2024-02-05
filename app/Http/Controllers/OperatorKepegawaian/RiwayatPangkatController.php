<?php

namespace App\Http\Controllers\OperatorKepegawaian;

use App\Http\Controllers\Controller;
use App\Http\Requests\OperatorKepegawaian\RiwayatPangkatRequest;
use App\Models\Golongan;
use App\Models\RiwayatPangkat;
use Illuminate\Http\Request;

class RiwayatPangkatController extends Controller
{
    public function create()
    {
        //get data golongan
        $golongan = Golongan::where('status','=',0)->get();

        return view('operator-kepegawaian.riwayat-pangkat.riwayat-pangkat-create',compact('golongan'));
    }

    public function store(RiwayatPangkatRequest $request)
    {
        $data = $request->all();
        
        //pisahkan dan ambil nip pegawai saja
        $explode = explode(' - ',$request->nip_pegawai,-1);
        //timpa nip lama dengan nip baru yang sudah dipisahkan dari nama
        $data ['nip_pegawai'] = $explode[0];
        $data['tmt'] = date('Y-m-d H:i:s',strtotime($data['tmt'] ));
        $data['tanggal'] = date('Y-m-d H:i:s',strtotime($data['tanggal'] ));
        //cek data riwayatpangkat, jika ada data lama statusnya nonaktifkan 
        $data['batas_berlaku'] = date('Y-m-d',strtotime('+4 year', strtotime( $data['tmt'] )));
        $data_riwayat_pangkat = RiwayatPangkat::where('nip_pegawai',$data['nip_pegawai'])->where('status', 0)->orderBy('id_riwayat_pangkat','desc')->first();
                if ($data_riwayat_pangkat != null) {
                    //update status data sebelmunya dengan nonaktif
                    $data['status']=1;
                    $data_riwayat_pangkat->update([
                        'status' => $data['status']
                    ]);
                }
                
        $data ['status'] = 0;
        RiwayatPangkat::create($data);
        return redirect()->route('pegawai-riwayat-pangkat.create')->with('status','Data riwayat pangkat berhasil ditambah');
    }

    public function edit($id)
    {
        $pegawai = RiwayatPangkat::with(['golongan'])->findOrFail($id);
        //get data golongan
        $golongan = Golongan::where('status','=',0)->get();
        return view('operator-kepegawaian.riwayat-pangkat.riwayat-pangkat-edit',compact('golongan','pegawai'));
    }

    public function update(RiwayatPangkatRequest $request, $id)
    {
        $data           = $request->all();
        $data['tmt'] = date('Y-m-d H:i:s',strtotime($data['tmt'] ));
        $data['tanggal'] = date('Y-m-d H:i:s',strtotime($data['tanggal'] ));
        
        $item           = RiwayatPangkat::findOrFail($id);
        $data['status'] = $item->status;
        $item->update($data);
        return redirect()->route('data-pegawai.edit',$data['nip_pegawai'])->with('status',"Data riwayat pangkat berhasil diedit");
    }

    public function destroy($id)
    {
        $data = RiwayatPangkat::findOrFail($id);
        $data->delete();
        
        return redirect()->route('data-pegawai.edit',$data->nip_pegawai)->with('status',"Data riwayat pangkat berhasil dihapus");
    }
}
