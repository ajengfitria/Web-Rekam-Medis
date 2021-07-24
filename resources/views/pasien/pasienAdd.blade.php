@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Pasien</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Navigasi</a></li>
          <li class="breadcrumb-item"><a href="{{route('pasien.index')}}">Pasien</a></li>
          <li class="breadcrumb-item active">Input</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-8">
        
        <!-- Horizontal Form -->
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Tambah Pasien</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="post" action="{{ route('pasien.store')}}" class="form-horizontal">
            {{-- @csrf --}}
            {{ csrf_field() }}
            <div class="card-body">
              <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">NIK</label>
                <div class="col-sm-10">
                  <input required type="number" name="nik" class="form-control" placeholder="NIK" value="{{ old('nik') }}">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                  <input required type="text" name="nama" class="form-control" placeholder="Nama" value="{{ old('nama') }}">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputJenkel" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                  <select class="form-control" name="jenkel" required>
                    <option value="">Pilih Jenis Kelamin</option>
                    @foreach ($jenkel as $jk)
                    <option value="{{ $jk }}" {{ (old('jenkel') == $jk) ? 'selected' : '' }}>{{ $jk }}</option>
                    @endforeach
                  </select>
                  @error('jenkel')
                  <div class="text-danger">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              </div>
              <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-10">
                  <input required type="date" name="tgl_lahir" class="form-control" placeholder="Tanggal Lahir" value="{{ old('tgl_lahir') }}">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                  <textarea value="{{ old('alamat') }}" name="alamat" class="form-control" id="alamat"></textarea>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Telp</label>
                <div class="col-sm-10">
                  <input required type="number" name="telp" class="form-control" placeholder="Telp" value="{{ old('telp') }}">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPekerjaan3" class="col-sm-2 col-form-label">Pekerjaan</label>
                <div class="col-sm-10">
                  <input required type="text" name="pekerjaan" class="form-control" id="inputPekerjaan3" placeholder="Pekerjaan" value="{{ old('pekerjaan') }}">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputKartuKesehatan" class="col-sm-2 col-form-label">Kartu Kesehatan</label>
                <div class="col-sm-10">
                  <select class="form-control" name="id_kartu" required>
                    <option value="">Pilih Kartu Kesehatan</option>
                    @foreach ($kartuKes as $rl)
                    <option value="{{ $rl->id }}" {{ (old('id_kartu') == $rl->id) ? 'selected' : '' }}>{{ $rl->nama }} - Kelas {{ $rl->kelas }}</option>
                    @endforeach
                  </select>
                  @error('id_kartu')
                  <div class="text-danger">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              </div>
              <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Nomor Kartu</label>
                <div class="col-sm-10">
                  <input required type="number" name="no_kartu" class="form-control" placeholder="Nomor Kartu" value="{{ old('no_kartu') }}">
                </div>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-info">Tambah</button>
              <a href="{{ route('pasien.index') }}" class="btn btn-default float-right">Batal</a>
            </div>
            <!-- /.card-footer -->
          </form>
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection