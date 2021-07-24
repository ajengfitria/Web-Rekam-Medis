@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Ruang</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Navigasi</a></li>
          <li class="breadcrumb-item"><a href="{{route('ruang.index')}}">Ruang</a></li>
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
            <h3 class="card-title">Tambah Ruang</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="post" action="{{ route('ruang.store')}}" class="form-horizontal">
            @csrf
            <div class="card-body">
              <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                  <input type="text" name="nama" class="form-control" placeholder="Nama" value="{{ old('nama') }}">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Nomor Ruang</label>
                <div class="col-sm-10">
                  <input type="number" name="no" class="form-control" id="inputName" placeholder="Nomor Ruang" value="{{ old('no') }}">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Kelas</label>
                <div class="col-sm-10">
                  <input type="text" name="kelas" class="form-control" id="inputName" placeholder="Kelas" value="{{ old('kelas') }}">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputstatus" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                  <select class="form-control" name="status" required>
                    <option value="">Pilih status</option>
                    @foreach ($status as $rl)
                    <option value="{{ $rl }}" {{ (old('status') == $rl) ? 'selected' : '' }}>{{ $rl }}</option>
                    @endforeach
                  </select>
                  @error('status')
                  <div class="text-danger">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-info">Tambah</button>
              <a href="{{ route('ruang.index') }}" class="btn btn-default float-right">Batal</a>
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