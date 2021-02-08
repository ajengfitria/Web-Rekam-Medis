@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Rekam Medis</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Navigasi</a></li>
          <li class="breadcrumb-item"><a href="{{route('rekamMedis.index')}}">Rekam Medis</a></li>
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
            <h3 class="card-title">Tambah Rekam Medis</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="post" action="{{ route('rekamMedis.store')}}" class="form-horizontal">
            @csrf
            <div class="card-body">
              <div class="form-group row">
                <label for="inputKartuKesehatan" class="col-sm-2 col-form-label">Pasien</label>
                <div class="col-sm-10">
                  <select class="form-control" name="id_pasien" required>
                    <option value="">Pilih Pasien</option>
                    @foreach ($pasien as $pasienDt)
                    <option value="{{ $pasienDt->id }}" {{ (old('id_pasien') == $pasienDt->id) ? 'selected' : '' }}>{{ $pasienDt->nik }} - {{ $pasienDt->nama }}</option>
                    @endforeach
                  </select>
                  @error('id_pasien')
                  <div class="text-danger">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              </div>
              <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Jenis Pelayanan</label>
                <div class="col-sm-10">
                  <textarea value="{{ old('jenis_pelayanan') }}" name="jenis_pelayanan" class="form-control" id="jenis_pelayanan"></textarea>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Keluhan</label>
                <div class="col-sm-10">
                  <textarea value="{{ old('keluhan') }}" name="keluhan" class="form-control" id="keluhan"></textarea>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Diagnosa</label>
                <div class="col-sm-10">
                  <textarea value="{{ old('diagnosa') }}" name="diagnosa" class="form-control" id="diagnosa"></textarea>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Tindakan</label>
                <div class="col-sm-10">
                  <textarea value="{{ old('tindakan') }}" name="tindakan" class="form-control" id="tindakan"></textarea>
                </div>
              </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-info">Tambah</button>
              <a href="{{ route('rekamMedis.index') }}" class="btn btn-default float-right">Batal</a>
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