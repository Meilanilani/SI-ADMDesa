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
    </table><br>
        <table align="center">
        <tr>
            <td ><hr class="style"></td>
        </tr>
        </table>
       
    </table>
    <table align="center">
        <tr>
            <td align="center">SURAT KETERANGAN TIDAK MAMPU</td>
        </tr>
        <tr>
            <td align="center">Nomor : {{ $sktmrs->no_surat }}</td>
        </tr>
    </table><br>
    <table align="center">
        <tr>
            <td align="left">
                <font size="2">Yang bertanda tangan dibawah ini, ketua Rt /Rw Desa Cihampelas Kecamatan 
                Cihampelas  <br> Kabupaten Bandung Barat dengan ini menerangkan  :</font>
            </td>
        </tr>
    </table>
    <br>
    <table align="center">
        <tr>
            <td><font size="2">Nama</font></td>
            <td width="350px"><font size="2"> : {{ $sktmrs->nama_lengkap }}</font></td>
        </tr>
        <tr>
            <td><font size="2">Tempat/ Tanggal Lahir </font> </td>
            <td width="350px"><font size="2"> : {{ $sktmrs->tempat_lahir }} , {{ Carbon\Carbon::createFromFormat('Y-m-d', $sktmrs->tanggal_lahir)->isoFormat('D-MM-Y') }} </font></td>
        </tr>
        
        <tr>
            <td><font size="2">Pekerjaan</font></td>
            <td width="350px"><font size="2"> : {{ $sktmrs->pekerjaan }}</font></td>
        </tr>
        <tr>
            <td><font size="2">No NIK</font></td>
            <td width="350px"><font size="2"> : {{ $sktmrs->nik_pemohon }}</font></td>
        </tr>
        <tr>
            <td><font size="2">No Kartu Keluarga</font></td>
            <td width="350px"><font size="2"> : {{ $sktmrs->no_kk }}</font></td>
        </tr>
        <tr>
            <td><font size="2">Alamat</font></td>
            <td width="350px"><font size="2"> : {{ $sktmrs->alamat }}</font></td>
        </tr>

    </table>
    <br>
    
    <br>
    <table align="center">
        <tr>
            <td align="left" width="566px">
                <font size="2">Orang tersebut diatas tersebut adalah betul warga kami berdasarkan data yang ada pada kami  
                    bahwa betul orang tersebut diatas termasuk Golongan Pra-KS/KS-1 atau <strong> Keluarga Tidak Mampu </strong> dan surat keterangan ini dipergunakan untuk <strong> {{ $sktmrs->ket_keperluan_surat }} @foreach ($data as $row) Atas nama {{ $row->nama_lengkap }} ({{ $row->tempat_lahir }}, {{ Carbon\Carbon::createFromFormat('Y-m-d', $row->tanggal_lahir)->isoFormat('D-MM-Y') }} )@endforeach
                    </strong></font>
            </td>
        </tr>
    </table>
    <br>
    <table align="center">
        <tr>
            <td width="400px"> </td>
            <td><font size="2">Cihampelas, {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $sktmrs->updated_at)->isoFormat('D MMMM Y') }} </td>
        </tr>
        <tr>
            <td align="center" colspan="2"><font size="2">Mengetahui</td>
        </tr>
    </table>
        <table align="center">
        <tr>
            <td><font size="2">Ketua RW</td>
            <td width="330px"> </td>
            <td><font size="2">Ketua RT</td>
                
        </tr>
    </table>
    <br><br> <br><br> 
    <table align="center">
        <tr>
            <td align="center"><hr class="style2"></td>
            <td width="250px"> </td>
            <td align="center"><hr class="style2"></td>
                
        </tr>
    </table>
    <table align="center">
        <tr>
            <td><font size="2">Reg.No..............................</td>
            <td width="200px"> </td>
            <td><font size="2">Reg.No..............................</td>
                
        </tr>
        <tr>
            <td><font size="2">Ka.UPT BPPPAKB Kec. Cihampelas</td>
            <td width="200px"> </td>
            <td><font size="2">KEPALA DESA CIHAMPELAS </td>
                
        </tr>
    </table>
    <br><br> <br><br> 
    <table align="center">
        <tr>
            <td align="center"><hr class="style2"></td>
            <td width="250px"> </td>
            <td align="center"><hr class="style2"></td>
                
        </tr>
        <tr>
            <td><font size="2">NIP.</td>
            <td width="250px"> </td>
            <td><font size="2">NIP.</td>
                
        </tr>
    </table>
    <table align="center">
        <tr>
            <td align="center" colspan="2"><font size="2">Mengetahui</td>
        </tr>
    </table>
   
    <table align="center">
        <tr>
        <td><font size="2">Reg.No........................................</td>
        </tr>
            <tr>
            <td align="center" colspan="2"><font size="2">CAMAT CIHAMPELAS</td>
        </tr>
    </table><br><br><br>
        <table align="center">
            <tr>
                <td align="center"><hr class="style2"></td>
               
            </tr>
            <tr>
                <td><font size="2">NIP.</td>
                    
            </tr>
    </table>
    
</body>
</html>