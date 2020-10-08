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
            <td align="center"><strong><u>SURAT KETERANGAN PEMBUATAN KK BARU </u></strong></td>
        </tr>
        
        <tr>
        <td align="center">Nomor : {{$kk->no_surat}}</td>
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
            <td><font size="2">No KK</font></td>
            <td ><font size="2"> : {{$kk->no_kk}}</font></td>
        </tr>
        <tr>
            <td><font size="2">No NIK</font></td>
            <td ><font size="2"> : {{$kk->no_nik}}</font></td>
        </tr>
        <tr>
            <td><font size="2">Nama Kepala Keluarga</font></td>
            <td ><font size="2"> : {{$kk->nama_lengkap}}</font></td>
        </tr>
        <tr>
            <td><font size="2">Tempat/ Tanggal lahir</font></td>
            <td width="350px"><font size="2"> : {{$kk->tempat_lahir}}, {{ Carbon\Carbon::createFromFormat('Y-m-d', $kk->tanggal_lahir)->isoFormat('DD-MM-Y') }}</font></td>
        </tr>
        <tr>
            <td><font size="2">Jenis Kelamin</font></td>
            <td width="350px"><font size="2"> : {{$kk->tempat_lahir}}</font></td>
        </tr>
        <tr>
            <td><font size="2">Agama</font></td>
            <td width="350px"><font size="2"> : {{$kk->agama}}</font></td>
        </tr>
        <tr>
            <td><font size="2">Kewarganegaraan</td>
            <td width="350px"><font size="2"> : Indonesia</td>
        </tr> 
        <tr>
            <td><font size="2">Pekerjaan</font></td>
            <td width="350px"><font size="2"> : {{$kk->pekerjaan}}</font></td>
        </tr> 
        <tr>
            <td><font size="2">Status Perkawinan</font></td>
            <td width="350px"><font size="2"> : {{$kk->status_perkawinan}}</font></td>
        </tr>
        <tr>
            <td><font size="2">Alamat</td>
            <td width="350px"><font size="2"> : {{$kk->alamat}} </td>
            </tr>
    </table>
    <br>
    <table align="center">
        <tr>
            <td align="justify" width="566px">
                <font size="2">Orang tersebut di atas berdasarkan data yang ada pada Kami, adalah betul-betul penduduk/warga masyarakat Kami Desa Cihampelas yang  mana yang bersangkutan tersebut  menetap sesuai pada alamat  yang tercantum di atas tersebut.

                </font>
            </td>
        </tr>
    </table>
    <table align="center">
        <tr>
            <td align="center" width="566px">
                <font size="2">
                    Surat Keterangan Ini dipergunakan untuk pengantar : Membuat KK Baru/ Merubah Data KK</strong></font>
            </td>
        </tr>
    </table>
    <table align="center">
        <tr>
            <td align="justify" width="566px">
                <font size="2">
                    Demikian Surat Keterangan ini Kami buat atas dasar yang sebenarnya dan di berikan untuk di pergunakan sebagaimana mestinya.</strong></font>
            </td>
        </tr>
    </table>
    <br>
    
   
    <table align="center">
        <tr>
            <td width="400px"> </td>
            <td><font size="2">Cihampelas, {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $kk->updated_at)->isoFormat('DD MMMM Y') }}</td>
        </tr>
    </table>
        <table align="center">
        <tr>
            <td><font size="2"></td>
            <td width="380px"> </td>
            <td align="center"><font size="2">KEPALA DESA CIHAMPELAS
            </td>   
        </tr>
    </table>
    <br><br> <br><br> 
    <table align="center">
        <tr>
            <td align="center"></td>
            <td width="380px"> </td>
            <td align="center"><font size="2"><strong><u>ASEP MULYADI</u></strong></font></td> 
        </tr>
    </table>
</body>
</html>