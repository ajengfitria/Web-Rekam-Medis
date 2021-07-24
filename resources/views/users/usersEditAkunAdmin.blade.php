@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Akun</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Navigasi</a></li>
          <li class="breadcrumb-item"><a href="{{route('users.view_profile', ['id' => Auth::user()->id])}}">Akun</a></li>
          <li class="breadcrumb-item active">Edit</li>
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
            <h3 class="card-title">Edit Akun</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="post" action="{{ route('users.update_admin_profile',['id' => $user->id]) }}" class="form-horizontal">
            @method('PUT')
          @csrf
            <div class="card-body">
              <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                  <input required type="text" name="nama" class="form-control" placeholder="Nama" value="{{ $admin->nama }}">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input required type="email" name="email" class="form-control" placeholder="Email" value="{{ $user->email }}">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                  <input required type="text" name="username" class="form-control" placeholder="Username" value="{{ $user->username }}">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputJenkel" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                  <select class="form-control" name="jenkel" required>
                    <option value="">Pilih Jenis Kelamin</option>
                    @foreach ($jenkel as $jk)
                    <option value="{{ $jk }}" {{ ($admin->jenkel == $jk) ? 'selected' : '' }}>{{ $jk }}</option>
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
                <label for="inputName" class="col-sm-2 col-form-label">Telp</label>
                <div class="col-sm-10">
                  <input required type="number" name="telp" class="form-control" placeholder="Telp" value="{{ $admin->telp }}">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                  <textarea value="{{ $admin->alamat }}" name="alamat" class="form-control" id="alamat">{{$admin->alamat}}</textarea>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                  <input required type="password" name="password" class="form-control" placeholder="Password">
                </div>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-info">Edit</button>
              <a href="{{route('users.view_profile', ['id' => Auth::user()->id])}}" class="btn btn-default float-right">Batal</a>
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