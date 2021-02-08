@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Setting Akun</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active">Akun</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  
  @if (Auth::user()->hasRole('Admin'))
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-6">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                  <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle"
                         src="{{asset('dist/img/user4-128x128.jpg')}}"
                         alt="User profile picture">
                  </div>
  
                  <h3 class="profile-username text-center">{{$user->name}}</h3>
  
                  <p class="text-muted text-center">@administrator</p>
  
                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b>Email</b> <a class="float-right">{{$user->email}}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Username</b> <a class="float-right">{{@$user->username}}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Jenis Kelamin</b> <a class="float-right">{{$admin->jenkel}}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Telp</b> <a class="float-right">{{$admin->telp}}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Alamat</b> <a class="float-right">{{$admin->alamat}}</a>
                    </li>
                  </ul>
  
                  <a href="{{ route('users.editAkunAdmin',['id' => $user->id]) }}" class="btn btn-primary btn-block"><b>Edit</b></a>
                </div>
                <!-- /.card-body -->
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
  @endif

  @if (Auth::user()->hasRole('Dokter'))
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-6">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                  <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle"
                         src="{{asset('dist/img/user4-128x128.jpg')}}"
                         alt="User profile picture">
                  </div>
  
                  <h3 class="profile-username text-center">{{$user->name}}</h3>
  
                  <p class="text-muted text-center">@dokter</p>
  
                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b>Email</b> <a class="float-right">{{$user->email}}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Username</b> <a class="float-right">{{@$user->username}}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Jenis Kelamin</b> <a class="float-right">{{$dokter->jenkel}}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Telp</b> <a class="float-right">{{$dokter->telp}}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Alamat</b> <a class="float-right">{{$dokter->alamat}}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Spesialis</b> <a class="float-right">{{$dokter->spesialis}}</a>
                    </li>
                  </ul>
  
                  <a href="{{ route('users.editAkunDokter',['id' => $user->id]) }}" class="btn btn-primary btn-block"><b>Edit</b></a>
                </div>
                <!-- /.card-body -->
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
  @endif
@endsection