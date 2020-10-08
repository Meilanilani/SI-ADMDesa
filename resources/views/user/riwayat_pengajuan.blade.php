@extends('user.layouts.master')
@section('content')
          
 <div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content">
  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">
        <h3 class="card-title">
          <h3 class="card-title">Riwayat Pengajuan Surat</h3>
          <div class="card-tools">
      </div>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-12">
        </div>
      </div>
  
    @if($message = Session::get('success'))
      <div class="card bg-gradient-success">
        <div class="card-header border-0">
          
          <h3 class="card-title">{{$message}}</h3>
          
            <!-- tools card -->
        <div class="card-tools">
          <!-- button with a dropdown -->
          <div class="btn-group">
          <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
            <i class="fas fa-times"></i>
          </button>
          </div>
        </div>
        <!-- /. tools -->
      </div>
      <!-- /.card-header -->
      <div class="card-body pt-0">
        <!--The calendar -->
        <div id="calendar" style="width: 100%"></div>
      </div>
      </div>
      <!-- /.card-body -->
    @endif
      <br>
    <div class="card-body">
      <div class="table-responsive">
        <table id="pengajuan-sktmsekolah" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
            <thead>
                <tr>
                    <th colspan="4"><center>Pengajuan Surat Keterangan Tidak Mampu Sekolah</center></th>
                </tr>
                <tr>
                    <th> No </th>
                    <th> Tanggal Pembuatan </th>
                    <th> Status Surat </th>
                </tr>
            </thead>
            <tbody> 
              @php
            $no=1  
            @endphp
            @foreach($sktmsekolah as $post)
            <tr>
              <th scope="row">{{$no}}
                </th>
                @php $no++ @endphp
                <td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->created_at)->isoFormat('DD MMMM Y') }}</td>
                <td>{{ $post->status_surat }}</td>
                </td>
              </tr>
            </form>
              @endforeach
                    </tbody>
              </table>
              <br>
              <div class="table-responsive">
                <table id="pengajuan-sktmrs" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th colspan="4"><center>Pengajuan Surat Keterangan Tidak Mampu RS</center></th>
                        </tr>
                        <tr>
                            <th> No </th>
                            <th> Tanggal Pembuatan </th>
                            <th> Status Surat </th>
                        </tr>
                    </thead>
                    <tbody> 
                      @php
                    $no=1  
                    @endphp
                    @foreach($sktmrs as $post)
                    <tr>
                      <th scope="row">{{$no}}
                        </th>
                        @php $no++ @endphp
                        <td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->created_at)->isoFormat('DD MMMM Y') }}</td>
                        <td>{{ $post->status_surat }}</td>
                        </td>
                      </tr>
                    </form>
                      @endforeach
                            </tbody>
                      </table>
                      <br>
              <div class="table-responsive">
                <table id="pengajuan-lahir" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th colspan="4"><center>Pengajuan Surat Kelahiran</center></th>
                        </tr>
                        <tr>
                            <th> No </th>
                            <th> Tanggal Pembuatan </th>
                            <th> Status Surat </th>
                        </tr>
                    </thead>
                    <tbody> 
                      @php
                    $no=1  
                    @endphp
                    @foreach($lahir as $post)
                    <tr>
                      <th scope="row">{{$no}}
                        </th>
                        @php $no++ @endphp
                        <td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->created_at)->isoFormat('DD MMMM Y') }}</td>
                        <td>{{ $post->status_surat }}</td>
                        </td>
                      </tr>
                    </form>
                      @endforeach
                            </tbody>
                      </table>
                      <br>
              <div class="table-responsive">
                <table id="pengajuan-kematian" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th colspan="4"><center>Pengajuan Surat Kematian</center></th>
                        </tr>
                        <tr>
                            <th> No </th>
                            <th> Tanggal Pembuatan </th>
                            <th> Status Surat </th>
                        </tr>
                    </thead>
                    <tbody> 
                      @php
                    $no=1  
                    @endphp
                    @foreach($kematian as $post)
                    <tr>
                      <th scope="row">{{$no}}
                        </th>
                        @php $no++ @endphp
                        <td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->created_at)->isoFormat('DD MMMM Y') }}</td>
                        <td>{{ $post->status_surat }}</td>
                        </td>
                      </tr>
                    </form>
                      @endforeach
                            </tbody>
                      </table>
                      <br>
              <div class="table-responsive">
                <table id="pengajuan-pnikah" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th colspan="4"><center>Pengajuan Surat Pengantar Nikah</center></th>
                        </tr>
                        <tr>
                            <th> No </th>
                            <th> Tanggal Pembuatan </th>
                            <th> Status Surat </th>
                        </tr>
                    </thead>
                    <tbody> 
                      @php
                    $no=1  
                    @endphp
                    @foreach($pnikah as $post)
                    <tr>
                      <th scope="row">{{$no}}
                        </th>
                        @php $no++ @endphp
                        <td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->created_at)->isoFormat('DD MMMM Y') }}</td>
                        <td>{{ $post->status_surat }}</td>
                        </td>
                      </tr>
                    </form>
                      @endforeach
                            </tbody>
                      </table>
                      <br>
              <div class="table-responsive">
                <table id="pengajuan-skck" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th colspan="4"><center>Pengajuan Surat Pengantar SKCK</center></th>
                        </tr>
                        <tr>
                            <th> No </th>
                            <th> Tanggal Pembuatan </th>
                            <th> Status Surat </th>
                        </tr>
                    </thead>
                    <tbody> 
                      @php
                    $no=1  
                    @endphp
                    @foreach($skck as $post)
                    <tr>
                      <th scope="row">{{$no}}
                        </th>
                        @php $no++ @endphp
                        <td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->created_at)->isoFormat('DD MMMM Y') }}</td>
                        <td>{{ $post->status_surat }}</td>
                        </td>
                      </tr>
                    </form>
                      @endforeach
                            </tbody>
                      </table>
                      <br>
              <div class="table-responsive">
                <table id="pengajuan-ktp" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th colspan="4"><center>Pengajuan Surat KTP Sementara</center></th>
                        </tr>
                        <tr>
                            <th> No </th>
                            <th> Tanggal Pembuatan </th>
                            <th> Status Surat </th>
                        </tr>
                    </thead>
                    <tbody> 
                      @php
                    $no=1  
                    @endphp
                    @foreach($ktp as $post)
                    <tr>
                      <th scope="row">{{$no}}
                        </th>
                        @php $no++ @endphp
                        <td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->created_at)->isoFormat('DD MMMM Y') }}</td>
                        <td>{{ $post->status_surat }}</td>
                        </td>
                      </tr>
                    </form>
                      @endforeach
                            </tbody>
                      </table>
                      <br>
              <div class="table-responsive">
                <table id="pengajuan-usaha" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th colspan="4"><center>Pengajuan Surat Keterangan Usaha</center></th>
                        </tr>
                        <tr>
                            <th> No </th>
                            <th> Tanggal Pembuatan </th>
                            <th> Status Surat </th>
                        </tr>
                    </thead>
                    <tbody> 
                      @php
                    $no=1  
                    @endphp
                    @foreach($usaha as $post)
                    <tr>
                      <th scope="row">{{$no}}
                        </th>
                        @php $no++ @endphp
                        <td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->created_at)->isoFormat('DD MMMM Y') }}</td>
                        <td>{{ $post->status_surat }}</td>
                        </td>
                      </tr>
                    </form>
                      @endforeach
                            </tbody>
                      </table>
                      <br>
              <div class="table-responsive">
                <table id="pengajuan-pindah" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th colspan="4"><center>Pengajuan Surat Keterangan Pindah</center></th>
                        </tr>
                        <tr>
                            <th> No </th>
                            <th> Tanggal Pembuatan </th>
                            <th> Status Surat </th>
                        </tr>
                    </thead>
                    <tbody> 
                      @php
                    $no=1  
                    @endphp
                    @foreach($pindah as $post)
                    <tr>
                      <th scope="row">{{$no}}
                        </th>
                        @php $no++ @endphp
                        <td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->created_at)->isoFormat('DD MMMM Y') }}</td>
                        <td>{{ $post->status_surat }}</td>
                        </td>
                      </tr>
                    </form>
                      @endforeach
                            </tbody>
                      </table>
                      <br>
              <div class="table-responsive">
                <table id="pengajuan-domisili" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th colspan="4"><center>Pengajuan Surat Domisili</center></th>
                        </tr>
                        <tr>
                            <th> No </th>
                            <th> Tanggal Pembuatan </th>
                            <th> Status Surat </th>
                        </tr>
                    </thead>
                    <tbody> 
                      @php
                    $no=1  
                    @endphp
                    @foreach($domisili as $post)
                    <tr>
                      <th scope="row">{{$no}}
                        </th>
                        @php $no++ @endphp
                        <td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->created_at)->isoFormat('DD MMMM Y') }}</td>
                        <td>{{ $post->status_surat }}</td>
                        </td>
                      </tr>
                    </form>
                      @endforeach
                            </tbody>
                      </table>
                      <br>
              <div class="table-responsive">
                <table id="pengajuan-kk" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th colspan="4"><center>Pengajuan Surat Pengantar KK</center></th>
                        </tr>
                        <tr>
                            <th> No </th>
                            <th> Tanggal Pembuatan </th>
                            <th> Status Surat </th>
                        </tr>
                    </thead>
                    <tbody> 
                      @php
                    $no=1  
                    @endphp
                    @foreach($kk as $post)
                    <tr>
                      <th scope="row">{{$no}}
                        </th>
                        @php $no++ @endphp
                        <td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->created_at)->isoFormat('DD MMMM Y') }}</td>
                        <td>{{ $post->status_surat }}</td>
                        </td>
                      </tr>
                    </form>
                      @endforeach
                            </tbody>
                      </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </section>
        <!-- /.content -->
      @endsection