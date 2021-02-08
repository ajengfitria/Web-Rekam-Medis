

<?php $__env->startSection('content'); ?>
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
          <li class="breadcrumb-item"><a href="<?php echo e(route('users.showAkun', ['id' => Auth::user()->id])); ?>">Akun</a></li>
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
          <form method="post" action="<?php echo e(route('users.updateAkunAdmin',['id' => $user->id])); ?>" class="form-horizontal">
            <?php echo method_field('PUT'); ?>
          <?php echo csrf_field(); ?>
            <div class="card-body">
              <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                  <input required type="text" name="nama" class="form-control" placeholder="Nama" value="<?php echo e($admin->nama); ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input required type="email" name="email" class="form-control" placeholder="Email" value="<?php echo e($user->email); ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                  <input required type="text" name="username" class="form-control" placeholder="Username" value="<?php echo e($user->username); ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputJenkel" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                  <select class="form-control" name="jenkel" required>
                    <option value="">Pilih Jenis Kelamin</option>
                    <?php $__currentLoopData = $jenkel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($jk); ?>" <?php echo e(($admin->jenkel == $jk) ? 'selected' : ''); ?>><?php echo e($jk); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                  <?php $__errorArgs = ['jenkel'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <div class="text-danger">
                    <?php echo e($message); ?>

                  </div>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Telp</label>
                <div class="col-sm-10">
                  <input required type="number" name="telp" class="form-control" placeholder="Telp" value="<?php echo e($admin->telp); ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                  <textarea value="<?php echo e($admin->alamat); ?>" name="alamat" class="form-control" id="alamat"><?php echo e($admin->alamat); ?></textarea>
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
              <a href="<?php echo e(route('users.showAkun', ['id' => Auth::user()->id])); ?>" class="btn btn-default float-right">Batal</a>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rekam-medis\Web-Rekam-Medis\eHealth\resources\views/usersEditAkunAdmin.blade.php ENDPATH**/ ?>