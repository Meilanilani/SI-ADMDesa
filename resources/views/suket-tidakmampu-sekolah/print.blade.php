<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>BigStore: Shopping Invoice</title>
    </head>
    <body>
        <style type="text/css">
            table tr td,
            table tr th {
                font-size: 9pt;
            }
        </style>
        
    
        <table class='table table-bordered'>
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIK Ayah</th>
                    <th>NIK Anak</th>
                    <th>Nama AYAH</th>
                    <th>Prodi</th>
                </tr>
            </thead>
            <tbody>
                
                
                <tr>
                    <td>{{ $sktmsekolah->no_surat }}</td>
                    <td>{{ $sktmsekolah->nik_orangtua }}</td>
                    <td>{{ $sktmsekolah->nik_anak }}</td>
                    <td>{{ $sktmsekolah->nama_lengkap }}</td>
                    <td>{{ $sktmsekolah->tgl_pembuatan }}</td>
                    <td>{{ $sktmsekolah->status_surat }}</td>
                    {{-- <td>{{ $post->nama }}</td> --}}
                </tr>
               
                    @foreach ($data_anak as $data)
                    <td>{{ $data->no_nik}}</td>
                    <td>{{ $data->nama_lengkap }}</td>
                    
                    @endforeach
                    
            </tbody>
        </table>
    
    </body>
    </html>