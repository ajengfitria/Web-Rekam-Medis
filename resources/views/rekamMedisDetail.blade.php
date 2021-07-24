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
                    <li class="breadcrumb-item"><a href="{{route('rekamMedis.index')}}">Rekam Medis</a></li>
                    <li class="breadcrumb-item active">Detail Rekam Medis</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                
                <!-- Main content -->
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Detail Rekam Medis</h3>
                        
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body"> 
                        
                        <div class="row">
                            <div class="col-6">
                                <div class="post">
                                    <div class="user-block">
                                        <img class="img-circle img-bordered-sm" src="{{ asset('dist/img/user1-128x128.jpg')}}" alt="user image">
                                        <span class="username">
                                            <a href="#">Nama Pasien : {{ $pasien->nama }}</a>
                                        </span>
                                        <span class="description">{{ $pasien->tgl_lahir }}</span>
                                    </div>
                                    <!-- /.user-block -->
                                    <p>
                                        Tanggal Rekam : {{ $rekamMedis->tgl_rekam }}
                                    </p>
                                </div>
                                <div class="post"></div>
                            </div>
                            <div class="col-6">
                                <div class="post">
                                    <div class="user-block">
                                        <img class="img-circle img-bordered-sm" src="{{ asset('dist/img/user1-128x128.jpg')}}" alt="user image">
                                        <span class="username">
                                            <a href="#">Nama Dokter : {{ $dokter->name }}</a>
                                        </span>
                                        <span class="description">{{ $dokter->email }}</span>
                                    </div>
                                    <!-- /.user-block -->
                                    <p style="color: white">
                                       Tanggal {{ $rekamMedis->nama }}
                                    </p>
                                </div>
                                <div class="post"></div>
                            </div>
                            <div class="col-6">
                                <div class="post">
                                    <a href="#">NIK Pasien : {{ $pasien->nik }}</a>
                                    
                                </div>
                                <div class="post">
                                    <a href="#">Tanggal Lahir : {{ $pasien->tgl_lahir }}</a>
                                </div>
                                <div class="post">
                                    <a href="#">Pekerjaan : {{ $pasien->pekerjaan }}</a>
                                </div>
                                <div class="post">
                                    <a href="#">Jenis Pelayanan</a>
                                    <p>
                                        {{ $rekamMedis->jenis_pelayanan }}
                                    </p>
                                </div>
                                <div class="post">
                                    <a href="#">Diagnosa</a>
                                    <p>
                                        {{ $rekamMedis->diagnosa }}
                                    </p>
                                </div>
                                <div class="post"></div>
                            </div>
                            <div class="col-6">
                                <div class="post">
                                    <a href="#">Jenis Kelamin : {{ $pasien->jenkel }}</a>
                                </div>
                                <div class="post">
                                    <a href="#">Telp : {{ $pasien->telp }}</a>
                                </div>
                                <div class="post">
                                    <a href="#">Alamat : {{ $pasien->alamat }}</a>
                                </div>
                                <div class="post">
                                    <a href="#">Keluhan</a>
                                    <p>
                                        {{ $rekamMedis->keluhan }}
                                    </p>
                                </div>
                                <div class="post">
                                    <a href="#">Tindakan</a>
                                    <p>
                                        {{ $rekamMedis->tindakan }}
                                    </p>
                                </div>
                                <div class="post"></div>
                            </div>
                        </div>
                        <!-- this row will not appear when printing -->
                        <div class="row no-print">
                            <div class="col-12">
                                <a href="#" onclick="window.print()" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<!-- /.content -->

@endsection
