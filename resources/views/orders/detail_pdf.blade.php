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
            font-size: 14px;
            font-weight: bold;
        }

        #nomor{
            text-align: center;
            font-size: 12px;
        }

        #halaman{
           font-size: 12px;
            width: 20cm; 
            height: 34.56cm; 
            position: absolute; 
            border: 1px solid; 
            padding-top: 200px; 
            padding-left: 30px; 
            padding-right: 30px; 
            padding-bottom: 80px;
            font-family: Arial, Helvetica, sans-serif;
        }

        #halaman2{
           font-size: 12px;
            width: 20cm; 
            height: 34.56cm; 
            position: absolute; 
            border: 1px solid; 
            padding-top: 30px; 
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
        vertical-align: middle;
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
        #notes{
            vertical-align: top;
            font-size: 10px;
        }
        .perhatian{
        border: 1px solid red;
        border-style: double;
        text-align: center;
        color: red;
        }

        .oval-border {
            display: inline-block;
            border: 1px solid #000;  /* Border color */
            border-radius: 50%;     /* Perfect oval shape */
            padding: 1px 10px;     /* Vertical and horizontal padding */
            text-align: center;     /* Center the text */
            font-size: 14px;        /* Font size */
            line-height: 1.5;       /* Adjust based on font size for vertical centering */
            vertical-align: middle;
        }

        #tengah{
            vertical-align: middle;
        }

        .pentagon {
    width: 40px;
    height: 36px;
    background: #3498db;  /* Color for the pentagon */
    clip-path: polygon(50% 0%, 100% 38%, 82% 100%, 18% 100%, 0% 38%);
    position: relative;
}

.year {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white; /* Color for the year text */
    font-size: 12px;
}

        

    </style>

</head>

<body>
    <div id=halaman>
        <div id="judul"><u>SURAT KETERANGAN HASIL PENGUJIAN</u></div>
        <div id="nomor">Nomor. PG.05.05/{{ $kartuorder->formatted_id }}.{{ $order->order_number }}/{{ $kartuorder->numberToRoman($kartuorder->created_at->month) }}/{{ $order->created_at ? $order->created_at->isoformat('Y') : '' }}</div>
        <br> <br> <br>
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
                <td colspan="3">Nama Alat <br> <div id="translate">Meassuring Instrument</div> </td>
                <td colspan="6">:<tab>{{ strtoupper($order->jenis_alat_uttp) }}</td>
                <td class="outlined" colspan="3">Nomor Order : {{ $kartuorder->formatted_id }}</td>
            </tr>
            <tr id="spasi"><td colspan="12">&nbsp;</td></tr>
            <tr>
                <td colspan="4"><tab>Merk / Buatan <br> <div id="translate">Trade Mark / Manufactured by</div> </td>
                <td colspan="4">:<tab>{{ strtoupper($order->merek) }} </td>
                <td colspan="4"> </td>
            </tr>
            <tr id="spasi"><td colspan="12">&nbsp;</td></tr>
            <tr>
                <td colspan="4"><tab>Model / Tipe <br> <div id="translate">Model / Type</div> </td>
                <td colspan="4">:<tab>{{ $order->tipe_atau_model }} </td>
                <td colspan="4"> </td>
            </tr>
            <tr id="spasi"><td colspan="12">&nbsp;</td></tr>
            <tr>
                <td colspan="4"><tab>Nomor Seri <br> <div id="translate">Serial Number</div> </td>
                <td colspan="4">:<tab>{{ $order->nomor_seri }}</td>
                <td colspan="2"><tab>Kelas<br> <div id="translate">Class</div> </td>
                <td colspan="2"><span id="tengah">:</span>&nbsp;
                    @php
                        $words = explode(' ', $order->kelas);
                        $lastWord = end($words);
                    @endphp
                    <span class="oval-border">{{ $lastWord }}</span>
                </td>
            </tr>
            <tr id="spasi"><td colspan="12">&nbsp;</td></tr>
            <tr>
                <td colspan="4"><tab>Kapasitas / Massa Nominal <br> <div id="translate">Capacity / Nominal Mass</div> </td>
                <td colspan="4">:<tab>{{ $order->kapasitas }} g</td>
                <td colspan="2"><tab>Daya Baca <br> <div id="translate">Readdabilty</div> </td>
                <td colspan="2">: {{ $order->skala }} g</td>
            </tr>
            <tr id="spasi"><td colspan="12">&nbsp;</td></tr>
            <tr>
                <td colspan="4"><tab>Pemakai<br> <div id="translate">Owner / User</div> </td>
                <td colspan="4">:<tab><b>{{ strtoupper($kartu->pemilik_uttp) }}</b> </td>
                <td colspan="4"> </td>
            </tr>
            <tr id="spasi"><td colspan="12">&nbsp;</td></tr>
            <tr>
                <td colspan="4"><tab>Alamat<br> <div id="translate">Address</div> </td>
                <td id="top" colspan="8" rowspan="2" >:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $kartu->alamat }} Kel. {{$kartu->kelurahan}}
                Kec. {{$kartu->kecamatan}} Kota Bandung</td>
            </tr>
            <tr>
                <td colspan="4">&nbsp;</td>
            </tr>

            <tr>
                <td colspan="8">METODA, STANDAR DAN TELUSURAN <br> <div id="translate">Method, Standart and Traceability</div> </td>
                <td colspan="4"></td>
            </tr>
            <tr id="spasi"><td colspan="12">&nbsp;</td></tr>
            <tr>
                <td colspan="3"><tab>Metoda<br> <div id="translate">Method</div> </td>
                <td colspan="9">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Keputusan Direktur Jenderal Standardisasi dan Perlindungan Konsumen Nomor :
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;131/SPK/KEP/10/2015  tentang Syarat Teknis Timbangan Bukan Otomatis </td>
            </tr>
            <tr id="spasi"><td colspan="12">&nbsp;</td></tr>
            <tr>
                <td colspan="3"><tab>Standar<br> <div id="translate">   Standard</div> </td>
                <td colspan="9">:<tab>Anak Timbangan Standar Kelas {{$kelas}}</td>
            </tr>
            <tr id="spasi"><td colspan="12">&nbsp;</td></tr>
            <tr>
                <td colspan="3"><tab>Telusuran<br> <div id="translate">   Traceability</div> </td>
                <td colspan="9">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hasil pengujian tera / tera ulang yang dilaporkan tertelusur ke satuan pengukran SI
                    melalui <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Direktorat Metrologi</td>
            </tr>
            <tr id="spasi"><td colspan="12">&nbsp;</td></tr>
            <tr id="spasi"><td colspan="12">&nbsp;</td></tr>
            <tr>
                <td colspan="3">Hasil Pengujian : <br> <div id="translate">Result of verification</div> </td>
                <td colspan="9"></td>
            </tr>
            <tr>
                <td colspan="12"><tab>Disahkan pada Tera Ulang Tahun {{ $order->created_at ? $order->created_at->isoformat('Y') : '' }} berdasarkan Undang-Undang Republik Indonesia Nomor 2
                    Tahun 1981 tentang Metrologi Legal, dengan dibubuhi tanda tera sah berupa angka {{ $order->created_at ? $order->created_at->format('y') : '' }} dalam segi lima
                    beraturan 
                    <svg width="40" height="36" viewBox="0 0 40 36" xmlns="http://www.w3.org/2000/svg">
                        <!-- Define only the stroke/border and no fill for the polygon -->
                        <polygon points="20,0 40,14 32,36 8,36 0,14" fill="none" stroke="#3498db" stroke-width="1"/>
                        <text x="50%" y="50%" font-size="12" fill="black" dy=".3em" text-anchor="middle">23</text>
                    </svg>
                </td>
            </tr>
            <tr id="spasi"><td colspan="12">&nbsp;</td></tr>
            <tr>
                <td colspan="6">Surat Keterangan Hasil Pengujian ini berlaku sampai dengan :<br> <div id="translate">This certivicate is valid until</div> </td>
                <td id="top" colspan="6"><b>{{ strtoupper($order->created_at->addYear()->isoformat('MMMM Y')) }}</b></td>
            </tr>
            <tr id="spasi"><td colspan="12">&nbsp;</td></tr>
            <tr id="spasi"><td colspan="12">&nbsp;</td></tr>
            <tr>
                <td colspan="7"></td>
                <td class="ttd" colspan="5">Bandung, {{ $kartuorder->created_at ? $kartuorder->created_at->isoformat('D MMMM Y') : '' }}</td>
            </tr>
            <tr>
                <td colspan="7"></td>
                <td class="ttd" colspan="5">KEPALA UPT METROLOGI LEGAL</td>
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
                <td colspan="7"></td>
                <td class="ttd" colspan="5"><u>TABRONI, S.T.,M.M</u></td>
            </tr>
            <tr>
                <td colspan="7"></td>
                <td class="ttd" colspan="5">Pembina</td>
            </tr>
            <tr>
                <td colspan="7"></td>
                <td class="ttd" colspan="5">NIP.19700212 200501 1 009</td>
            </tr>
            <tr id="spasi"><td colspan="12">&nbsp;</td></tr>
            <tr id="spasi"><td colspan="12">&nbsp;</td></tr>
            <tr>
                <td colspan="3">Catatan : <br> <div id="translate">Notes</div> </td>
                <td colspan="9"></td>
            </tr>
            <tr>
                <td id="notes" colspan="1"><tab>1.</td>
                <td id="notes" colspan="4">Surat Keterangan Hasil Pengujian ini tidak berlaku
                    apabila alat UTTP dan atau tanda teranya rusak.
                </td>
                <td colspan="1"></td>
                <td class="perhatian" colspan="6" rowspan="2">PERHATIAN <br> 
                    TANDA TERA RUSAK ATAU PUTUS DIANCAM PENJARA <br>
                    SATU TAHUN DAN ATAU DENDA Rp. 1.000.000,- <br>
                    <i>(Pasal 25 huruf c Ji. Pasal 32 UUML)</i>
                </td>
            </tr>
            <tr>
                <td id="notes" colspan="1"><tab>2.</td>
                <td id="notes" colspan="4">Penggandaan / foto copy Surat Keterangan Hasil 
                    Pengujian ini tidak berlaku tanpa ijin daru UPT.
                    Metrologi Legal Kota Bandung
                </td>
                <td colspan="1"></td>
            </tr>
            
        </table>
    </div>

<div style="page-break-after: always;"></div>

<div id="halaman2">
        <table border="0" width="100%">
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
                <td colspan="7"> </td>
                <td colspan="5">
                    Lampiran SKHP PG.05.05/{{ $kartuorder->formatted_id }}.{{ $order->order_number }}/{{
                    $kartuorder->numberToRoman($kartuorder->created_at->month) }}/{{ $order->created_at ?
                    $order->created_at->isoformat('Y') : '' }}
                </td>
            </tr>
            <tr id="spasi">
                <td colspan="12">&nbsp;</td>
            </tr>
            <tr id="spasi">
                <td colspan="12">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="8">DATA PENGUJIAN TERA / TERA ULANG <br>
                    <div id="translate">Verification Data</div>
                </td>
                <td colspan="4"></td>
            </tr>
            <tr id="spasi">
                <td colspan="12">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="3">
                    <tab>Tanggal ditera / tera ulang<br>
                </td>
                <td colspan="9">:<tab> {{ $hasilpengujian->created_at ? $hasilpengujian->created_at->isoformat('D MMMM Y') : '' }}
            </tr>
            <tr>
                <td colspan="3">
                    <tab>Diuji oleh<br>
                </td>
                <td colspan="9">:<tab> Indri Ratna P, S.T., M.AP.
            </tr>
            <tr>
                <td colspan="3">
                    <tab>Lokasi<br>
                </td>
                <td colspan="9">:<tab> Kantor UPT. Metrologi Legal Kota Bandung
            </tr>
            <tr id="spasi">
                <td colspan="12">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="3">
                    <tab>Kondisi Ruangan<br>
                </td>
                <td colspan="2">:<tab> Suhu </td>
                <td colspan="7">:<tab> Ambient C</td>
            </tr>
            <tr>
                <td colspan="3">

                </td>
                <td colspan="2">:<tab> Kelembaban </td>
                <td colspan="7">:<tab> Ambient %RH</td>
            </tr>
            <tr id="spasi">
                <td colspan="12">&nbsp;</td>
            </tr>
            <tr id="spasi">
                <td colspan="12">&nbsp;</td>
            </tr>

            <tr>
                <td colspan="8">Hasil Pengujian <br>
                    <div id="translate">Result</div>
                </td>
                <td colspan="4"></td>
            </tr>
            <tr id="spasi">
                <td colspan="12">&nbsp;</td>
            </tr>
            <tr id="spasi">
                <td colspan="12">&nbsp;</td>
            </tr>

        </table>

        <table class="outlined" align="center" border="1" cellspacing="0" cellpadding="10" width="360px">
            <tr bgcolor="lightgrey">
                <th width="130px">
                    Standar <br> (g)
                </th>
                <th width="130px">
                    Penunjukan Alat <br> (g)
                </th>
                <th width="130px">
                    Kesalahan Alat <br> (g)
                </th>
            </tr>
            <tr>
                <td width="130px">
                    {{ $hasilpengujian->zero }}
                </td>
                <td width="130px">
                    {{ $hasilpengujian->penunjukanzero}}
                </td>
                <td width="130px">
                    {{ $hasilpengujian->penunjukanzero - $hasilpengujian->zero}}
                </td>
            </tr>
            <tr>
                <td width="130px">
                    {{ $hasilpengujian->minimum }}
                </td>
                <td width="130px">
                    {{ $hasilpengujian->penunjukanminimum}}
                </td>
                <td width="130px">
                    {{ $hasilpengujian->penunjukanminimum - $hasilpengujian->minimum}}
                </td>
            </tr>
            <tr>
                <td width="130px">
                    {{ $hasilpengujian->bkd1 }}
                </td>
                <td width="130px">
                    {{ $hasilpengujian->penunjukanbkd1}}
                </td>
                <td width="130px">
                    {{ $hasilpengujian->penunjukanbkd1 - $hasilpengujian->bkd1}}
                </td>
            </tr>
            <tr>
                <td width="130px">
                    {{ $hasilpengujian->bkd2 }}
                </td>
                <td width="130px">
                    {{ $hasilpengujian->penunjukanbkd2}}
                </td>
                <td width="130px">
                    {{ $hasilpengujian->penunjukanbkd2 - $hasilpengujian->bkd2}}
                </td>
            </tr>
            <tr>
                <td width="130px">
                    {{ $hasilpengujian->bkd3 }}
                </td>
                <td width="130px">
                    {{ $hasilpengujian->penunjukanbkd3}}
                </td>
                <td width="130px">
                    {{ $hasilpengujian->penunjukanbkd3 - $hasilpengujian->bkd3}}
                </td>
            </tr>
        </table>
        <br><br><br>
        <div align="center">
            <b>Penera Muda</b>
            <div id="translate">Verification Officer</div>
            <br><br><br><br><br>
            Indri Ratna P, S.T., M.AP. <br>
            Penata Tk.I <br>
            NIP. 19830323 200902 2 003 <br>

        </div>
    </div>
</body>

</html>