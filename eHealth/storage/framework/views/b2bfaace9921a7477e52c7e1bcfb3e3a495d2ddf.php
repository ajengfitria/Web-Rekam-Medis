

<?php $__env->startSection('content'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Pasien</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Pasien</a></li>
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
          <form method="post" action="<?php echo e(route('pasien.store')); ?>" class="form-horizontal">
            
            <?php echo e(csrf_field()); ?>

            <div class="card-body">
              <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">NIK</label>
                <div class="col-sm-10">
                  <input required type="number" name="nik" class="form-control" placeholder="NIK" value="<?php echo e(old('nik')); ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                  <input required type="text" name="nama" class="form-control" placeholder="Nama" value="<?php echo e(old('nama')); ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputJenkel" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                  <select class="form-control" name="jenkel" required>
                    <option value="">Pilih Jenis Kelamin</option>
                    <?php $__currentLoopData = $jenkel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($jk); ?>" <?php echo e((old('jenkel') == $jk) ? 'selected' : ''); ?>><?php echo e($jk); ?></option>
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
                <label for="inputName" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-10">
                  <input required type="date" name="tgl_lahir" class="form-control" placeholder="Tanggal Lahir" value="<?php echo e(old('tgl_lahir')); ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                  <textarea value="<?php echo e(old('alamat')); ?>" name="alamat" class="form-control" id="alamat"></textarea>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Telp</label>
                <div class="col-sm-10">
                  <input required type="number" name="telp" class="form-control" placeholder="Telp" value="<?php echo e(old('telp')); ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPekerjaan3" class="col-sm-2 col-form-label">Pekerjaan</label>
                <div class="col-sm-10">
                  <input required type="text" name="pekerjaan" class="form-control" id="inputPekerjaan3" placeholder="Pekerjaan" value="<?php echo e(old('pekerjaan')); ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputKartuKesehatan" class="col-sm-2 col-form-label">Kartu Kesehatan</label>
                <div class="col-sm-10">
                  <select class="form-control" name="id_kartu" required>
                    <option value="">Pilih Kartu Kesehatan</option>
                    <?php $__currentLoopData = $kartuKes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($rl->id); ?>" <?php echo e((old('id_kartu') == $rl->id) ? 'selected' : ''); ?>><?php echo e($rl->nama); ?> - Kelas <?php echo e($rl->kelas); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                  <?php $__errorArgs = ['id_kartu'];
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
                <label for="inputName" class="col-sm-2 col-form-label">Nomor Kartu</label>
                <div class="col-sm-10">
                  <input required type="number" name="no_kartu" class="form-control" placeholder="Nomor Kartu" value="<?php echo e(old('no_kartu')); ?>">
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rekam-medis\Web-Rekam-Medis\eHealth\resources\views/pasienAdd.blade.php ENDPATH**/ ?>