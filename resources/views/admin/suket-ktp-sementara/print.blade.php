<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<style type="text/css">
    hr.style{
    overflow: visible; /* For IE */
    width: 620px;
    margin-top: 0px ;
    border: none;
    border-top: medium double #333;
    color: #333;
    text-align: center;
}
hr.style2{
    overflow: visible; /* For IE */
    width: 130px;
    margin-top: 0px ;
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
            <td><img src="https://1.bp.blogspot.com/-YgXg-1ZdyBM/VMXbTrXIu3I/AAAAAAAABds/zGuB2V46qVI/s280/logo%2Bkabupaten%2Bbandung%2Bbarat.png" width="120" height="90"> </td>
            <td align="center">
                <font size="4">PEMERINTAH KABUPATEN BANDUNG BARAT</font><br>
                KECAMATAN CIHAMPELAS<br><strong> KANTOR DESA CIHAMPELAS </strong><br><small> Jln. Raya Cihampelas No.157 Tlp.(022) 6865856 Kode Pos 40767</small></p></td>
        </tr>
    </table>
        <table align="center">
        <tr>
            <td ><hr class="style"></td>
        </tr>
        </table>
       
    </table>
    <table align="center">
        <tr>
            <td align="center"><strong><u>SURAT KETERANGAN KTP SEMENTARA</u></strong></td>
        </tr>
        <tr>
        <td align="center">Nomor : {{$ktp->no_surat}}</td>
        </tr>
    </table><br>
    <table align="center">
        <tr>
            <td align="left" width="566px">
                <font size="2">Yang bertanda tangan dibawah ini Kepala Desa Cihampelas Kecamatan Cihampelas Kabupaten Bandung, Barat menerangkan dengan sesungguhnya bahwa :</font>
            </td>
        </tr>
    </table>
    <br>
    <table align="center">
        <tr>
            @foreach($data_warga as $post)
            <td><font size="2">Nama</font></td>
        <td ><font size="2"> : {{$post->nama_lengkap}}</font></td>
        </tr>
        <tr>
            <td><font size="2">Tempat/ Tanggal lahir</td>
            <td width="350px"><font size="2"> : {{$post->tempat_lahir}}, {{ Carbon\Carbon::createFromFormat('Y-m-d', $post->tanggal_lahir)->isoFormat('DD-MM-Y') }}</font></td>
        </tr>
        <tr>
            <td><font size="2">Pekerjaan</td>
            <td width="350px"><font size="2"> : {{$post->pekerjaan}}</td>
        </tr>
        <tr>
            <td><font size="2">Agama</td>
            <td width="350px"><font size="2"> : {{$post->agama}}</td>
        </tr>
        <tr>
            <td><font size="2">Status Perkawinan</td>
            <td width="350px"><font size="2"> : {{$post->status_perkawinan}}</td>
        </tr>
        <tr>
            <td><font size="2">NIK</td>
            <td width="350px"><font size="2"> : {{$ktp->nik_yg_bersangkutan}}</td>
        </tr>
        <tr>
            <td><font size="2">Kewarganegaraan</td>
            <td width="350px"><font size="2"> : Indonesia</td>
        </tr>        
        
        <tr>
            <td><font size="2">Alamat</td>
            <td width="350px"><font size="2"> : {{$post->alamat}} </td>
        </tr>

    </table>
    <br>
    <table align="center">
        <tr>
            <td align="left" width="566px">
                <font size="2">Berdasarkan Catatan yang ada pada kantor kami Desa Cihampelas Kecamatan Cihampelas Kabupaten Bandung Barat. Dan Sampai di keluarkannya surat keterangan ini yang bersangkutan dalam keadaan sehat dan berkelakuan baik.</font>
            </td>
        </tr>
    </table>
    <table align="center">
        <tr>
            <td align="center">
                <font size="2"><strong><u> Sampai Dengan Tanggal, {{ Carbon\Carbon::createFromFormat('Y-m-d', $ktp->tgl_masa_berlaku)->isoFormat('DD MMMM Y') }}</u></strong>
                </font>
            </td>
            <td width="60px">
            </td>
        </tr>
    </table>
    <table align="center">
        <tr>
            <td align="left" width="566px">
                <font size="2">Surat keterangan ini di buat di karenakan E-KTP orang tersebut sedang dalam proses pencetakan di DISDUK CAPIL Kabupaten Bandung Barat.</font>
            </td>
        </tr>
    </table>
    <br>
    <table align="center">
        <tr>
            <td align="left" width="566px">
                <font size="2">Demikian Surat Keterangan ini di  buat atas dasar yang sebenarnya, dan dapat untuk dipergunakan  sebagaimana mestinya.</strong></font>
            </td>
        </tr>
    </table>
    <table align="center">
        <tr>
            <td width="340px"> </td>
            <td><font size="2">Cihampelas, {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $ktp->updated_at)->isoFormat('DD MMMM Y') }}</font></td>
        </tr>
    </table>
        <table align="center">
        <tr>
            <td><font size="2">YANG BERSANGKUTAN</font></td>
            <td width="170px"> </td>
            <td align="center"><font size="2"> a.n KEPALA DESA CIHAMPELAS <br>KASI PELAYANAN </font></td>    
        </tr>
    </table>
    <br><br> <br><br> 
    <table align="center">
        <tr>
        <td><font size="2"><strong><u>{{$post->nama_lengkap}}</u></strong></font></td>
            <td width="280px"> </td>
            <td align="center"><strong><u><font size="2">ACENG KURNIA</font></u></strong></td>    
        </tr>
        @endforeach
    </table>
</body>
</html>