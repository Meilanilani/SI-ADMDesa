@extends('layouts.master')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        </div>
    </div>
</div>
<!-- Bagian content -->
<section class="content">
    <div class="card-group">
        <div class="card">
            <div class="card-body">
                <form action="{{ url('data-warga/update/'.$warga->id_warga)}}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="inputName">No KK</label>
                                <input type="text" name="no_kk" value="{{ $warga->no_kk }}" id="warga-no_kk"
                                    class="form-control @error('no_kk') is-invalid @enderror">
                                @error('no_kk')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="inputName">No NIK</label>
                                <input type="text" name="no_nik" value="{{ $warga->no_nik }}" id="warga-no_nik"
                                    class="form-control @error('no_nik') is-invalid @enderror">
                                @error('no_nik')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="inputName">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" value="{{ $warga->nama_lengkap }}"
                                    id="warga-nama_lengkap"
                                    class="form-control @error('nama_lengkap') is-invalid @enderror">
                                @error('nama_lengkap')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="inputName">Jenis Kelamin</label>
                                <select class="form-control custom-select" name="jenis_kelamin">
                                    <option <?= $warga->jenis_kelamin == 'Laki-Laki'? 'Selected' : 'Laki-Laki' ?>>
                                        Laki-Laki</option>
                                    <option <?= $warga->jenis_kelamin == 'Perempuan'? 'Selected' : 'Perempuan' ?>>
                                        Perempuan</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="inputName">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" value="{{ $warga->tempat_lahir }}"
                                    id="warga-tempat_lahir"
                                    class="form-control @error('tempat_lahir') is-invalid @enderror">
                                @error('tempat_lahir')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="inputName">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" value="{{ $warga->tanggal_lahir }}"
                                    id="warga-tanggal_lahir" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="inputName">Agama</label>
                                <select class="form-control custom-select" name="agama">
                                    <option <?= $warga->agama == 'Islam'? 'Selected' : 'Islam' ?>>Islam</option>
                                    <option <?= $warga->agama == 'Katolik'? 'Selected' : 'Katolik' ?>>Katolik</option>
                                    <option <?= $warga->agama == 'Protestan'? 'Selected' : 'Protestan' ?>>Protestan
                                    </option>
                                    <option <?= $warga->agama == 'Hindu'? 'Selected' : 'Hindu' ?>>Hindu</option>
                                    <option <?= $warga->agama == 'Buddha'? 'Selected' : 'Buddha' ?>>Buddha</option>
                                    <option <?= $warga->agama == 'Kong Hu Cu'? 'Selected' : 'Kong Hu Cu' ?>>Kong Hu Cu
                                    </option>
                                    <option <?= $warga->agama == 'Lain-lain'? 'Selected' : 'Lain-lain' ?>>Lain-lain
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="inputName">Pendidikan</label>
                                <select class="form-control custom-select" name="pendidikan">
                                    <option <?= $warga->pendidikan == 'Belum Sekolah'? 'Selected' : 'Belum Sekolah' ?>>
                                        Belum Sekolah</option>
                                    <option <?= $warga->pendidikan == 'SD/ MI'? 'Selected' : 'SD/ MI' ?>>SD/ MI</option>
                                    <option <?= $warga->pendidikan == 'SMP/MTs'? 'Selected' : 'SMP/MTs' ?>>SMP/MTs
                                    </option>
                                    <option <?= $warga->pendidikan == 'SMA/MA/SMK'? 'Selected' : 'SMA/MA/SMK' ?>>
                                        SMA/MA/SMK</option>
                                    <option <?= $warga->pendidikan == 'D3'? 'Selected' : 'D3' ?>>D3</option>
                                    <option <?= $warga->pendidikan == 'D4/S1'? 'Selected' : 'D4/S1' ?>>D4/S1
                                    </option>
                                    <option <?= $warga->pendidikan == 'S2'? 'Selected' : 'S2' ?>>S2
                                    </option>
                                    <option <?= $warga->pendidikan == 'S3'? 'Selected' : 'S3' ?>>S3
                                    </option>
                                </select>
                                </span></div>
                            <div class="col-md-6">
                                <label for="inputName">Pekerjaan</label>
                                <input type="text" name="pekerjaan" value="{{ $warga->pekerjaan }}" id="warga-pekerjaan"
                                    class="form-control @error('pekerjaan') is-invalid @enderror">
                                @error('pekerjaan')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="inputName">Status Perkawinan</label>
                                <select class="form-control custom-select" name="status_perkawinan">
                                    <option
                                        <?= $warga->status_perkawinan == 'Belum Menikah'? 'Selected' : 'Belum Menikah' ?>>
                                        Belum Menikah</option>
                                    <option <?= $warga->status_perkawinan == 'Menikah'? 'Selected' : 'Menikah' ?>>
                                        Menikah</option>
                                    <option <?= $warga->status_perkawinan == 'Cerai Mati'? 'Selected' : 'Cerai Mati' ?>>
                                        Cerai Mati
                                    </option>
                                    <option
                                        <?= $warga->status_perkawinan == 'Cerai Hidup'? 'Selected' : 'Cerai Hidup' ?>>
                                        Cerai Hidup</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="inputName">Status Hub Keluarga</label>
                                <select class="form-control custom-select" name="status_hub_keluarga">
                                    <option
                                        <?= $warga->status_hub_keluarga == 'Kepala Keluarga'? 'Selected' : 'Kepala Keluarga' ?>>
                                        Kepala Keluarga</option>
                                    <option <?= $warga->status_hub_keluarga == 'Istri'? 'Selected' : 'Istri' ?>>Istri
                                    </option>
                                    <option <?= $warga->status_hub_keluarga == 'Anak'? 'Selected' : 'Anak' ?>>Anak
                                    </option>
                                    <option <?= $warga->pendidikan == 'Famili Lain'? 'Selected' : 'Famili Lain' ?>>
                                        Famili Lain</option>
                                </select>

                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <label for="inputName">Nama Ayah</label>
                        <input type="text" name="nama_ayah" value="{{ $warga->nama_ayah }}" id="warga-nama_ayah"
                            class="form-control @error('nama_ayah') is-invalid @enderror">
                        @error('nama_ayah')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="inputName">Nama Ibu</label>
                        <input type="text" name="nama_ibu" value="{{ $warga->nama_ibu }}" id="warga-nama_ibu"
                            class="form-control @error('nama_ibu') is-invalid @enderror">
                        @error('nama_ibu')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-8">
                        <label for="inputDescription">Alamat</label>
                        <textarea name="alamat" id="warga-alamat"
                            class="form-control @error('alamat') is-invalid @enderror"
                            rows="4">{{ $warga->alamat }}</textarea>@error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success">Simpan</button>
                <a class="btn btn-success" href="{{route('warga.index')}}">Kembali</a>
            </div>
        </div>
    </div>
</section>
@endsection
