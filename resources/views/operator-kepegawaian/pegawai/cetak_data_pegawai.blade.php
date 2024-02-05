<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        table.static{
            position: relative;
            border: 1px solid black;
        }
        td {
            padding: 10px;
            text-align: left;
            font-size: 10px;
        }
    </style>
    <title>Cetak semua data pegawai</title>
</head>
<body>
    <div class="form-group" style="padding-top: 0px">
        <center>
            <p><strong>DAFTAR URUT KEPEGAWAIAN (DUK)</strong></p>
        <p style="line-height: 0px"><strong>SEKRETARIAT DAERAH KABUPATEN KAMPAR</strong></p>
        </center>
        <table class="static" align="center" rules="all" border="1px" style="width:95%;">
            <tr>
                <td rowspan="2" style="text-align: center">NO</td>
                <td rowspan="2" style="text-align: center">NAMA/ NIP/ TEMPAT LAHIR</td>
                <td colspan="3" style="text-align: center">GOLRU PENGANGKATAN CPNS</td>
                <td colspan="2" style="text-align: center">SK PNS</td>
                <td colspan="2" style="text-align: center">GOLONGAN RUANG</td>
                <td rowspan="2" style="text-align: center">JABATAN TERAKHIR</td>
                <td rowspan="2" style="text-align: center">DIKLAT PENJENJANGAN (TAHUN)</td>
                <td rowspan="2" style="text-align: center">JENJANG/ SEKOLAH/ UNIV/ JURUSAN/ TAHUN LULUS</td>
                <td rowspan="2" style="text-align: center">NOMOR KARPEG</td>
                <td rowspan="2" style="text-align: center">KGB TERAKHIR</td>
            </tr>
            <tr>
                <td style="text-align: center">GOL AWAL</td>
                <td style="text-align: center">TMT</td>
                <td style="text-align: center">NO SK/ TGL</td>
                <td style="text-align: center">TMT</td>
                <td style="text-align: center">NO SK/ TGL</td>
                <td style="text-align: center">GOL/ TMT</td>
                <td style="text-align: center">NO SK/ TGL</td>
            </tr>
            @php
                $no =1;
            @endphp
            @forelse ($pangkatgolongan as $item)
                @if ($item->pegawai->status == 0)
                <tr>
                    <td>{{ $no++ }}</td>
                    {{-- -----------cpns--------------- --}}

                    {{-- -------------NAMA/ NIP/ TEMPAT LAHIR------------ --}}
                    <td>
                        {{ $item->pegawai->nama_pegawai }}/ {{ $item->pegawai->nip_pegawai }}/ {{ $item->pegawai->tempat_lahir }}
                    </td>

                    @foreach ($pegawai as $pk)
                        @if ($item->pegawai->nip_pegawai == $pk->nip_pegawai)
                                {{-- ------------jika dia bukan cpns makan data  cpnsnya tidak ditampilkan------------ --}}
                                @if ($pk->pangkat_cpns==null)
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                @else
                                    @foreach ($gol as $gl)
                                        @if ($pk->pangkat_cpns['id_golongan'] == $gl->id_golongan)
                                        {{-- ---------GOL AWAL----------- --}}
                                        <td> 
                                            {{ $gl->nama_golongan }}
                                        </td>
                                        @endif
                                    @endforeach
                                    {{-- -----------	TMT----------- --}}
                                    
                                    <td>
                                        {{ date('d/m/Y',strtotime($pk->pangkat_cpns['tmt'])) }}
                                    </td>
                                        {{-- ----------NO SK/ TGL--------- --}}
                                    <td>
                                    {{ $pk->pangkat_cpns['nomor'] }}/ {{ date('d/m/Y',strtotime($pk->pangkat_cpns['tanggal'])) }}
                                    </td>
                                 @endif

                            
                        @endif
                    @endforeach
                    {{-- ------------pns-------------- --}}
                    @foreach ($pegawai as $pk)
                        @if ($item->pegawai->nip_pegawai == $pk->nip_pegawai)
                                {{-- ------------TMT------------------- --}}
                                @if ($item->tmt==null)
                                    <td>-</td>                                    
                                @else
                                <td>
                                    {{ date('d/m/Y',strtotime($item->tmt)) }}
                                </td>
                                 @endif
                            <td>
                                {{-- ----------NO SK/ TGL---------- --}}
                                {{ $item->nomor }}/ {{ date('d/m/Y',strtotime($item->tanggal)) }}
                            </td>
                        @endif
                    @endforeach


                    {{-- -------------pangkat golongan------------ --}}
                            {{-- ----------GOL/ TMT----------------- --}}
                    <td>
                        {{ $item->golongan->nama_golongan }}/ {{ date('d/m/Y',strtotime($item->tmt))  }}
                    </td>
                    <td>
                        {{ $item->nomor }}/ {{ date('d/m/Y',strtotime($item->tanggal)) }}
                    </td>

                    @foreach ($pegawai as $pk)
                        @if ($item->pegawai->nip_pegawai == $pk->nip_pegawai)
                            <td>
                                {{ $pk->jabatan->nama_jabatan }}
                            </td>
                        @endif
                    @endforeach

                    {{-- -----------diklat--------------- --}}
                    @foreach ($pegawai as $pk)
                        @if ($item->pegawai->nip_pegawai == $pk->nip_pegawai)
                            <td>
                                @foreach ($pk->diklat_penjenjangan as $diklat)
                                {{ $diklat->tahun }}
                                @endforeach
                            </td>
                        @endif
                    @endforeach
                    {{-- ---------------------pendidikan----------------- --}}
                    @foreach ($pegawai as $pk)
                        @if ($item->pegawai->nip_pegawai == $pk->nip_pegawai)
                           
                                @php
                                    $data = [];
                                @endphp
                                @foreach ($pk->riwayat_pendidikan as $pendidikan)
                                    @php
                                        $data[]=$pendidikan->id_riwayatpendidikan;
                                        $id=max($data);
                                    @endphp
                                @endforeach
                                @forelse ($pk->riwayat_pendidikan as $pd)
                                    @if ($pd->id_riwayatpendidikan == $id)
                                        <td>{{ $pd->jenis_pendidikan }}/ {{ $pd->nama_pendidikan }}/ {{ $pd->jurusan }}/ {{ date('Y',strtotime($pd->tgl_sttb)) }}</td> 
                                    @endif
                                @empty
                                    <td>-</td>
                                @endforelse
                            
                        @endif
                    @endforeach
    
                    <td>{{ $item->pegawai->nomor_karpeg }}</td>
                    {{-- --------------KGB----------- --}}
                    @foreach ($pegawai as $pk)
                        @if ($item->pegawai->nip_pegawai == $pk->nip_pegawai)

                                @if ($pk->riwayat_kgb->count() > 0 )
                                    @foreach ($pk->riwayat_kgb as $pkkgb)

                                        @foreach ($riwayatkgb as $kgb)
                                            @if ($pkkgb->id_riwayat_kgb == $kgb->id_riwayat_kgb && $kgb->status==0)
                                            <td> {{ date('d/m/Y', strtotime($kgb->mulai_berlaku)) }}</td>
                                            @endif
                                        @endforeach

                                    @endforeach
                                @else
                                    <td>-</td>
                                @endif
                            
                        @endif
                    @endforeach
                </tr> 
                @endif
            @empty
            <tr>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr> 
            @endforelse
            
        </table>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>