

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
          <li class="breadcrumb-item"><a href="#">Navigasi</a></li>
          <li class="breadcrumb-item active">Pasien</li>
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
          <div class="invoice p-3 mb-3">
            <!-- title row -->
            <div class="row">
              <div class="col-12">
                <h4>
                  
                  <small class="float-right"><?php echo e(date("l jS \of F Y, h:i:s A")); ?></small>
                </h4>
              </div>
              <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
              
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
                <br>
                <b>NIK :</b> <?php echo e($pasien->nik); ?><br>
                <b>Nama :</b> <?php echo e($pasien->nama); ?><br>
                <b>Jenis Kelamin:</b> <?php echo e($pasien->jenkel); ?><br>
                <b>Tanggal Lahir:</b> <?php echo e($pasien->tgl_lahir); ?><br>
                <b>Pekerjaan :</b> <?php echo e($pasien->pekerjaan); ?><br>
              </div>
              <div class="col-sm-4 invoice-col">
                <br>
                <b>Kartu :</b> <?php echo e($pasien->nama); ?><br>
                <b>No Kartu :</b> <?php echo e($kartuKes->nama); ?><br>
                <b>Telepon :</b> <?php echo e($pasien->telp); ?><br>
                <b>Alamat :</b> <?php echo e($pasien->alamat); ?><br>
              </div>
              <!-- /.col -->
            </div><br>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
              <div class="col-12 table-responsive">
                  <h4>Daftar Rekam Medis</h4>
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>Pasien</th>
                      <th>Dokter</th>
                      <th>Jenis Pelayanan</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                    </tbody>
                    <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>Pasien</th>
                      <th>Dokter</th>
                      <th>Jenis Pelayanan</th>
                      <th>Aksi</th>
                    </tr>
                    </tfoot>
                  </table>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- this row will not appear when printing -->
            <div class="row no-print">
              <div class="col-12">
                <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
              </div>
            </div>
          </div>
          <!-- /.invoice -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
<!-- /.content -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<!-- Page specific script -->
<?php $__env->startSection('script'); ?>
<!-- Page specific script -->
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "processing": true,
        "serverSide": true,
        "ajax": "<?php echo e(route('pasien.show', ['id' => $pasien->id])); ?>",
        "columns": [
            {
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
            },
            {
                data: 'tgl_rekam',
                name: 'tgl_rekam',
            },
            {
                data: 'id_pasien',
                name: 'id_pasien',
            },
            {
                data: 'id_dokter',
                name: 'id_dokter',
            },
            {
                data: 'jenis_pelayanan',
                name: 'jenis_pelayanan',
            },
            {
                data: 'action',
                name: 'action',
            },
        ]
      });
    });
  </script>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rekam-medis\Web-Rekam-Medis\eHealth\resources\views/pasienDetail.blade.php ENDPATH**/ ?>