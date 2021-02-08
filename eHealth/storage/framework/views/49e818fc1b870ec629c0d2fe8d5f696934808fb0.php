

<?php $__env->startSection('content'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Rekam Medis</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Rekam Medis</a></li>
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
          <form method="post" action="<?php echo e(route('rekamMedis.store')); ?>" class="form-horizontal">
            <?php echo csrf_field(); ?>
            <div class="card-body">
              <div class="form-group row">
                <label for="inputKartuKesehatan" class="col-sm-2 col-form-label">Pasien</label>
                <div class="col-sm-10">
                  <select class="form-control" name="id_pasien" required>
                    <option value="">Pilih Pasien</option>
                    <?php $__currentLoopData = $pasien; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pasienDt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($pasienDt->id); ?>" <?php echo e((old('id_pasien') == $pasienDt->id) ? 'selected' : ''); ?>><?php echo e($pasienDt->nik); ?> - <?php echo e($pasienDt->nama); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                  <?php $__errorArgs = ['id_pasien'];
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
                <label for="inputName" class="col-sm-2 col-form-label">Jenis Pelayanan</label>
                <div class="col-sm-10">
                  <textarea value="<?php echo e(old('jenis_pelayanan')); ?>" name="jenis_pelayanan" class="form-control" id="jenis_pelayanan"></textarea>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Keluhan</label>
                <div class="col-sm-10">
                  <textarea value="<?php echo e(old('keluhan')); ?>" name="keluhan" class="form-control" id="keluhan"></textarea>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Diagnosa</label>
                <div class="col-sm-10">
                  <textarea value="<?php echo e(old('diagnosa')); ?>" name="diagnosa" class="form-control" id="diagnosa"></textarea>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Tindakan</label>
                <div class="col-sm-10">
                  <textarea value="<?php echo e(old('tindakan')); ?>" name="tindakan" class="form-control" id="tindakan"></textarea>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rekam-medis\Web-Rekam-Medis\eHealth\resources\views/rekamMedisAdd.blade.php ENDPATH**/ ?>