<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    <style type="text/css">
        hr.style {
            overflow: visible;
            /* For IE */
            width: 620px;
            margin-top: 0px;
            border: none;
            border-top: medium double #333;
            color: #333;
            text-align: center;
        }

        hr.style2 {
            overflow: visible;
            /* For IE */
            width: 130px;
            margin-top: 0px;
            border: none;
            color: #333;
            border-top: medium double #333;
            text-align: center;
        }

    </style>
</head>

<body>
    <table align="center">
        <tr>
            <td><img src="https://1.bp.blogspot.com/-YgXg-1ZdyBM/VMXbTrXIu3I/AAAAAAAABds/zGuB2V46qVI/s280/logo%2Bkabupaten%2Bbandung%2Bbarat.png"
                    width="120" height="90"> </td>
            <td align="center">
                <font size="4">PEMERINTAH KABUPATEN BANDUNG BARAT</font><br>
                KECAMATAN CIHAMPELAS<br><strong> KANTOR DESA CIHAMPELAS </strong><br><small> Jln. Raya Cihampelas No.157
                    Tlp.(022) 6865856 Kode Pos 40767</small></p>
            </td>
        </tr>
    </table>
    <table align="center">
        <tr>
            <td>
                <hr class="style">
            </td>
        </tr>
    </table>
    </table>
    <table align="center">
        <tr>
            <td align="center"><strong><u>SURAT KETERANGAN PERNYATAAN KELAHIRAN</u></strong></td>
        </tr>
        <tr>
            <td align="center">Nomor : {{$lahir->no_surat}}</td>
        </tr>
    </table><br>
    <table align="center">
        <tr>
            <td align="left" width="500px">
                <font size="2">Yang bertanda tangan dibawah ini Kepala Desa Cihampelas Kecamatan Cihampelas Kabupaten
                    Bandung Barat menerangkan dengan sesungguhnya bahwa :</font>
            </td>
        </tr>  
    </table>
    <br>
    <table align="center">
        <tr>
            <td width="130px">
                <font size="2">Nama
            </td>

            <td>
                <font size="2"> : {{$lahir->nama_lengkap}}
            </td>
            <td></td>
            <td width="80px">
                <font size="2">Anak ke : {{$lahir->anak_ke}}
            </td>
        </tr>
        <tr>
            <td>
                <font size="2">Tempat/ Tanggal lahir
            </td>
            <td width="350px">
                <font size="2"> : {{$lahir->tempat_lahir_anak}},
                    {{ Carbon\Carbon::createFromFormat('Y-m-d', $lahir->tanggal_lahir_anak)->isoFormat('D-MM-Y') }}
            </td>
        </tr>
        <tr>
            <td>
                <font size="2">Jenis Kelamin
            </td>
            <td width="350px">
                <font size="2"> : {{$lahir->jenis_kelamin}}
            </td>
        </tr>
        <tr>
            <td width="80px">
                <font size="2">Pukul/ hari
            </td>
            <td width="350px">
                <font size="2"> : {{ Carbon\Carbon::createFromFormat('H:i:s', $lahir->jam_lahir)
                ->isoFormat('HH:mm') }} Wib
            </td>
            <td></td>
            <td>
                <font size="2">Hari :
                    {{ Carbon\Carbon::createFromFormat('Y-m-d', $lahir->tanggal_lahir_anak)->isoFormat('dddd') }}
            </td>

        </tr>
    </table>
    <br>
    <table align="center">
        <tr>
            <td align="left">
                <font size="2">Adalah benar anak pasangan suami istri :</font>
            </td>
            <td width="340px">
            </td>
        </tr>
    </table>
    <br>
    <table align="center">
       @foreach ($data_ibu as $data)
        <tr>
            <td width="130px">
                <font size="2">Nama</font>
            </td>
            <td>
                <font size="2"> : {{$data->nama_lengkap}}</font>
            </td>
            <td></td>
            @php
            $dbDate = \Carbon\Carbon::parse($data->tanggal_lahir); 
            $diffYears = \Carbon\Carbon::now()->diffInYears($dbDate);
            @endphp
            <td width="80px"> <font size="2">Umur : {{ $diffYears}}</font></td>
        </tr>
        <tr>
            <td>
                <font size="2">Agama
            </td>
            <td width="350px">
                <font size="2"> : {{$data->agama}}
            </td>
        </tr> 
        <tr>
            <td>
                <font size="2">Pekerjaan
            </td>
            <td width="350px">
                <font size="2"> : {{$data->pekerjaan}}
            </td>
        </tr>
        <tr>
            <td>
                <font size="2">Alamat
            </td>
            <td width="350px">
                <font size="2"> :  {{$data->alamat}}
            </td>
        </tr>
        @endforeach
    </table>
    <br>
    <table align="center">
        <tr>
            <td width="130px">
                <font size="2">Nama</font>
            </td>
            <td>
                <font size="2"> : {{$lahir->nama_lengkap}}</font>
            </td>
            <td></td>
            @php
            $dbDate = \Carbon\Carbon::parse($lahir->tanggal_lahir); 
            $diffYears = \Carbon\Carbon::now()->diffInYears($dbDate);
            @endphp
            <td width="80px"> <font size="2">Umur : {{ $diffYears}}</font></td>
        </tr>
        <tr>
            <td>
                <font size="2">Agama
            </td>
            <td width="350px">
                <font size="2"> : {{$lahir->agama}}
            </td>
        </tr> 
        <tr>
            <td>
                <font size="2">Pekerjaan
            </td>
            <td width="350px">
                <font size="2"> : {{$lahir->pekerjaan}}
            </td>
        </tr>
        <tr>
            <td>
                <font size="2">Alamat
            </td>
            <td width="350px">
                <font size="2"> :  {{$lahir->alamat}}
            </td>
        </tr>
    </table>
    <br>
    <table align="center">
        <tr>
            <td align="left" width="500px">
                <font size="2">Demikian surat pengantar ini di buat dengan mengingat sumpah jabatan dan untuk di
                    pergunakan sebagaimana mestinya.</strong></font>
            </td>
        </tr>
    </table>

    </table>
    <table align="center">
        <tr>
            <td width="400px"> </td>
            <td>
                <font size="2">Cihampelas, {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $lahir->updated_at)->isoFormat('D MMMM Y') }} </font>
            </td>
        </tr>
    </table>
    <table align="center">
        <tr>
            <td>
                <font size="2">
            </td>
            <td width="380px"> </td>
            <td align="center">
                <font size="2"> KEPALA DESA CIHAMPELAS
            </td>
        </tr>
    </table>
    <br><br> <br><br>
    <table align="center">
        <tr>
            <td align="center"></td>
            <td width="380px"> </td>
            <td align="center">
                <font size="2"><strong><u>ASEP MULYADI</u></strong></font>
            </td>
        </tr>
    </table>
</body>

</html>
