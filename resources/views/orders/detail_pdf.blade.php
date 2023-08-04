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
            font-size: 5px;
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

        

    </style>

</head>

<body>
    <div id=halaman>
        <div id="judul"><u>SURAT KETERANGAN HASIL PENGUJIAN</u></div>
        <div id="nomor">Nomor. PG.05.05/2535/VI/2023</div>
        <br>
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
                <td colspan="6">:<tab>{{ $order->jenis_alat_uttp }}</td>
                <td class="outlined" colspan="3">Nomor Order : 01089</td>
            </tr>
            <tr id="spasi"><td colspan="12">&nbsp;</td></tr>
            <tr>
                <td colspan="4"><tab>Merk / Buatan <br> <div id="translate">Trade Mark / Manufactured by</div> </td>
                <td colspan="4">:<tab>{{ $order->merek }} </td>
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
                <td colspan="4">:<tab>-</td>
                <td colspan="2"><tab>Kelas<br> <div id="translate">Class</div> </td>
                <td colspan="2">:  II </td>
            </tr>
            <tr id="spasi"><td colspan="12">&nbsp;</td></tr>
            <tr>
                <td colspan="4"><tab>Kapasitas / Massa Nominal <br> <div id="translate">Capacity / Nominal Mass</div> </td>
                <td colspan="4">:<tab>3600 g</td>
                <td colspan="2"><tab>Daya Baca <br> <div id="translate">Readdabilty</div> </td>
                <td colspan="2">: 0.1 g </td>
            </tr>
            <tr id="spasi"><td colspan="12">&nbsp;</td></tr>
            <tr>
                <td colspan="4"><tab>Pemakai<br> <div id="translate">Owner / User</div> </td>
                <td colspan="4">:<tab>{{ $kartu->pemilik_uttp }} </td>
                <td colspan="4"> </td>
            </tr>
            <tr id="spasi"><td colspan="12">&nbsp;</td></tr>
            <tr>
                <td colspan="4"><tab>Alamat<br> <div id="translate">Address</div> </td>
                <td id="top" colspan="8" rowspan="2" >:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Jl. Pasundan, Kel. Balong Gede, Kec. Regol, Kota Bandung</td>
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
                <td colspan="9">:<tab>Anak Timbangan Standar Kelas M1</td>
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
                <td colspan="12"><tab>Disahkan pada Tera Ulang Tahun 2023 berdasarkan Undang-Undang Republik Indonesia Nomor 2
                    Tahun 1981 tentang Metrologi Legal, dengan dibubuhi tanda tera sah berupa angka 23 dalam segi lima
                    beraturan</td>
            </tr>
            <tr id="spasi"><td colspan="12">&nbsp;</td></tr>
            <tr>
                <td colspan="7">Surat Keterangan Hasil Pengujian ini berlaku sampai dengan :<br> <div id="translate">This certivicate is valid until</div> </td>
                <td colspan="5">Juni 2024</td>
            </tr>
            <tr id="spasi"><td colspan="12">&nbsp;</td></tr>
            <tr>
                <td colspan="7"></td>
                <td class="ttd" colspan="5">Bandung, 27 Juni 2023</td>
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
</body>

</html>