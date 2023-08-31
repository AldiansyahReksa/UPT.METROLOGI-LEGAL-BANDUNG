<!DOCTYPE html>
<head>
    <title></title>
    <meta charset="utf-8">
    <style>
        @page{
            margin: 0px;
        }
        #judul{
            text-align: center;
            font-size: 28px;
            font-weight: bold;
        }

        #nomor{
            text-align: center;
            font-size: 12px;
        }

        #halaman{
           font-size: 16px;
            width: 34cm; 
            height: 20cm; 
            position: absolute; 
            border: 1px solid; 
            padding-top: 20px; 
            padding-left: 30px; 
            padding-right: 30px; 
            padding-bottom: 80px;
            font-family: Arial, Helvetica, sans-serif;
        }

        #translate{
            color: red;
            font-size: 8px;
            font-style: italic;
        }
        #spasi{
            font-size: 7px;
        }
        tab {
        display: inline-block;
        margin-left: 25px;
        }
        #top {
        vertical-align: top;
        }
        .outlined {
        border: 1px solid black;
        text-align: center;
        }

        .ttd{
            text-align: center;
        }

        .perhatian{
            border: 1px solid red;
            border-style: double;
            text-align: center;
            color: red;
        }
        
        .konten{
            text-align: center;
            border-collapse: collapse;
        }
        
        tr.td.konten{
            height: 20px;
        }

        .bottom-table {
            /* position: absolute; */
            bottom: 0;
            left: 0;
            right: 0;
        }
        
        .kop{
            font-size: 11px;
            font-family: 'Times New Roman', Times, serif;
        }
        
        #kopupt{
            font-size: 14px;
            font-weight: bold;
        }

        img{
            height: 80px;
            width: 95px;
        }
        
        
        </style>

</head>

<body>
    <div id=halaman>
        <table border="0"  width="100%">
            <tr>
                <td width="8.3%"> </td>
                <td width="8.3%"> </td>
                <td width="8.3%"> </td>
                <td width="8.3%"> </td>
                <td width="8.3%"> </td>
                <td width="8.3%"> </td>
                <td width="8.3%"> </td>
                <td width="8.3%"> </td>
                <td width="8.3%"> </td>
                <td width="8.3%"> </td>
                <td width="8.3%"> </td>
                <td width="8.3%"> </td>
                
            </tr>
            <tr>
                <!-- <td colspan="1" rowspan="2"> <img src="../../../public/img/logobw.png"></td> -->
                <td class="kop" colspan="9  " rowspan="2">
                    PEMERINTAH KOTA BANDUNG <br>
                    DINAS PERDAGANGAN DAN PERINDUSTRIAN <br>
                    <span id="kopupt">UPT METROLOGI KOTA BANDUNG</span> <br>
                    Jl. Pandu No. 32 Kota Bandung 40173 <br>
                    Telp. 022-20572330 <br>
                    e-mail : metrologi.kotabandung@gmail.com
                </td>
                <td colspan="3">NO ORDER</td>
            </tr>
            <tr>
                <td class="outlined" colspan="2">{{ $kartuorder->formatted_id }}</td>
                <td colspan="1" ></td>
            </tr>
            <tr>
                <td id="judul" colspan="12"> KARTU ORDER </td>
            </tr>
            <tr>
                <td colspan="3">Pemilik UTTP</td>
                <td colspan="5">:<tab>{{ $kartu->pemilik_uttp }} </td>
                <td colspan="4"> </td>
            </tr>
            <tr>
                <td colspan="3">Alamat</td>
                <td colspan="5">:<tab>{{ $kartu->alamat }} </td>
                <td colspan="4"> </td>
            </tr>
            <tr>
                <td colspan="3">No. Telp</td>
                <td colspan="5">:<tab>{{ $kartu->nomor_telepon }} </td>
                <td colspan="4"> </td>
            </tr>
            <tr>
                <td colspan="3">Kelurahan</td>
                <td colspan="5">:<tab>{{ $kartu->kelurahan }} </td>
                <td colspan="4"> </td>
            </tr>
            <tr>
                <td colspan="3">Kecamatan</td>
                <td colspan="5">:<tab>{{ $kartu->kecamatan }} </td>
                <td colspan="4"> </td>
            </tr>
            <tr id="spasi"><td colspan="12">&nbsp;</td></tr>
            
            </table>

            <table class="konten" border="1" width="100%">
                <tr>
                    <td width="3%">No</td>
                    <td width="15.4%">Jenis Alat UTTP</td>
                    <td width="15.4%">Merk </td>
                    <td width="15.4%">Tipe / Model </td>
                    <td width="15.4%">Nomor Seri</td>
                    <td width="15.4%">Kapasitas / e</td>
                    <td width="4%">Kelas</td>
                    <td width="8%">Tera / Tera Ulang</td>
                    <td width="4%">Jumlah AT</td>
                    <td width="4%">Ket</td>
                </tr>
                @php
                    $rowCount = 0;
                @endphp

                @foreach ($kartuorder->orders as $order)
                    @php
                        $rowCount++;
                    @endphp
                    <tr>
                        <th>{{ $rowCount }}</th>
                        <td>{{ $order->jenis_alat_uttp }}</td>
                        <td>{{ $order->merek }}</td>
                        <td>{{ $order->tipe_atau_model }}</td>
                        <td>{{ $order->nomor_seri }}</td>
                        <td>{{ $order->kapasitas }} x {{ $order->skala }} </td>
                        <td>
                            @php
                                $words = explode(' ', $order->kelas);
                                $lastWord = end($words);
                            @endphp
                            {{ $lastWord }}    
                        </td>
                        <td>{{ $order->jenis_pengukuran }}</td>
                        <td>{{ $order->jumlah_at }}</td>
                        <td>{{ $order->keterangan }}</td>
                    </tr>
                @endforeach

                @for ($i = $rowCount; $i < 8; $i++)
                    @php
                        $rowCount++;
                    @endphp
                    <tr>
                        <th>{{ $rowCount }}</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                @endfor

            </table>

            <table class="bottom-table" border="0" width="100%">
                <tr>
                    <td width="8.3%"> </td>
                    <td width="8.3%"> </td>
                    <td width="8.3%"> </td>
                    <td width="8.3%"> </td>
                    <td width="8.3%"> </td>
                    <td width="8.3%"> </td>
                    <td width="8.3%"> </td>
                    <td width="8.3%"> </td>
                    <td width="8.3%"> </td>
                    <td width="8.3%"> </td>
                    <td width="8.3%"> </td>
                    <td width="8.3%"> </td>  
                </tr>
            <tr id="spasi"><td colspan="12">&nbsp;</td></tr>
            <tr id="spasi"><td colspan="12">&nbsp;</td></tr>
            <tr id="spasi"><td colspan="12">&nbsp;</td></tr>
            <tr id="spasi"><td colspan="12">&nbsp;</td></tr>

            <tr>
                <td colspan="7"></td>
                <td class="ttd" colspan="5">Bandung, {{ $kartuorder->created_at ? $kartuorder->created_at->isoformat('D MMMM Y') : '' }}</td>
            </tr>
            <tr>
                <td class="ttd" colspan="5">Penera</td>
                <td colspan="2"></td>
                <td class="ttd" colspan="5">Pemohon</td>
            </tr>
            <tr id="spasi"><td colspan="12">&nbsp;</td></tr>
            <tr id="spasi"><td colspan="12">&nbsp;</td></tr>
            <tr id="spasi"><td colspan="12">&nbsp;</td></tr>
            <tr id="spasi"><td colspan="12">&nbsp;</td></tr>
            <tr id="spasi"><td colspan="12">&nbsp;</td></tr>
            <tr id="spasi"><td colspan="12">&nbsp;</td></tr>
            <tr id="spasi"><td colspan="12">&nbsp;</td></tr>
            <tr id="spasi"><td colspan="12">&nbsp;</td></tr>
            <tr>
                <td class="ttd" colspan="5">_______________________</td>
                <td colspan="2"></td>
                <td class="ttd" colspan="5">_______________________</td>
            </tr>
            <tr>
                <td class="ttd" colspan="5">NIP. </td>
                <td colspan="7"></td>
            </tr>
            
            
        </table>
</body>

</html>