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
                                <select name="jenis_kelamin" value="{{ old('jenis_kelamin') }}" id="warga-jenis_kelamin"
                                    class="form-control">
                                    <option>Laki-Laki</option>
                                    <option>Perempuan</option>
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
                                <select name="agama" value="{{ old('agama') }}" id="warga-agama" class="form-control">
                                    <option>Islam</option>
                                    <option>Katolik</option>
                                    <option>Protestan</option>
                                    <option>Hindu</option>
                                    <option>Buddha</option>
                                    <option>Kong Hu Cu</option>
                                    <option>Lain-lain</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="inputName">Pendidikan</label>
                                <select name="pendidikan" value="{{ old('pendidikan') }}" id="warga-pendidikan"
                                    class="form-control">
                                    <option>Belum Sekolah</option>
                                    <option>SD/ MI</option>
                                    <option>SMP/MTs</option>
                                    <option>SMA/MA/SMK</option>
                                    <option>D3</option>
                                    <option>D4/S1</option>
                                    <option>S2</option>
                                    <option>S3</option>
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
                                <select name="status_perkawinan" value="{{ old('status_perkawinan') }}"
                                    id="warga-status_perkawinan" class="form-control" class="form-control">
                                    <option>Belum Menikah</option>
                                    <option>Menikah</option>
                                    <option>Cerai Mati</option>
                                    <option>Cerai Hidup</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="inputName">Status Hub Keluarga</label>
                                <select name="status_hub_keluarga" value="{{ old('status_hub_keluarga') }}"
                                    id="warga-status_hub_keluarga" class="form-control" class="form-control">
                                    <option>Kepala Keluarga</option>
                                    <option>Istri</option>
                                    <option>Anak</option>
                                    <option>Famili Lain</option>
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
                <a class="btn btn-success" href="{{route('sktmsekolah.index')}}">Kembali</a>
            </div>
        </div>
    </div>
</section>
@endsection
