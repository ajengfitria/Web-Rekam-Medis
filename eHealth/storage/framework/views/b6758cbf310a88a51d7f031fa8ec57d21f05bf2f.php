

<?php $__env->startSection('content'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>User</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
          <li class="breadcrumb-item"><a href="#">User</a></li>
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
            <h3 class="card-title">Tambah User</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="post" action="<?php echo e(route('users.store')); ?>" class="form-horizontal">
            
            <?php echo e(csrf_field()); ?>

            <div class="card-body">
              <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                  <input required type="text" name="name" class="form-control" placeholder="Nama" value="<?php echo e(old('name')); ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                  <input required type="text" name="username" class="form-control" id="inputName" placeholder="Username" value="<?php echo e(old('username')); ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input required type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email" value="<?php echo e(old('email')); ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputRole" class="col-sm-2 col-form-label">Role</label>
                <div class="col-sm-10">
                  <select class="form-control" name="roles" required>
                    <option value="">Pilih role</option>
                    <?php $__currentLoopData = $role; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($rl->name); ?>" <?php echo e((old('role') == $rl->name) ? 'selected' : ''); ?>><?php echo e($rl->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                  <?php $__errorArgs = ['role'];
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
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-info">Tambah</button>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rekam-medis\Web-Rekam-Medis\eHealth\resources\views/usersAdd.blade.php ENDPATH**/ ?>