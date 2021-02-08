

<?php $__env->startSection('content'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Setting Akun</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Navigasi</a></li>
            <li class="breadcrumb-item active">Akun Saya</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  
  <?php if(Auth::user()->hasRole('Admin')): ?>
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
                         src="<?php echo e(asset('dist/img/user4-128x128.jpg')); ?>"
                         alt="User profile picture">
                  </div>
  
                  <h3 class="profile-username text-center"><?php echo e($user->name); ?></h3>
  
                  <p class="text-muted text-center">@administrator</p>
  
                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b>Email</b> <a class="float-right"><?php echo e($user->email); ?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Username</b> <a class="float-right"><?php echo e(@$user->username); ?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Jenis Kelamin</b> <a class="float-right"><?php echo e($admin->jenkel); ?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Telp</b> <a class="float-right"><?php echo e($admin->telp); ?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Alamat</b> <a class="float-right"><?php echo e($admin->alamat); ?></a>
                    </li>
                  </ul>
  
                  <a href="<?php echo e(route('users.editAkun',['id' => $user->id])); ?>" class="btn btn-primary btn-block"><b>Edit</b></a>
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
  <?php endif; ?>

  <?php if(Auth::user()->hasRole('Dokter')): ?>
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
                         src="<?php echo e(asset('dist/img/user4-128x128.jpg')); ?>"
                         alt="User profile picture">
                  </div>
  
                  <h3 class="profile-username text-center"><?php echo e($user->name); ?></h3>
  
                  <p class="text-muted text-center">@dokter</p>
  
                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b>Email</b> <a class="float-right"><?php echo e($user->email); ?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Username</b> <a class="float-right"><?php echo e(@$user->username); ?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Jenis Kelamin</b> <a class="float-right"><?php echo e($dokter->jenkel); ?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Telp</b> <a class="float-right"><?php echo e($dokter->telp); ?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Alamat</b> <a class="float-right"><?php echo e($dokter->alamat); ?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Spesialis</b> <a class="float-right"><?php echo e($dokter->spesialis); ?></a>
                    </li>
                  </ul>
  
                  <a href="<?php echo e(route('users.editAkunDokter',['id' => $user->id])); ?>" class="btn btn-primary btn-block"><b>Edit</b></a>
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
  <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rekam-medis\Web-Rekam-Medis\eHealth\resources\views/showAkun.blade.php ENDPATH**/ ?>