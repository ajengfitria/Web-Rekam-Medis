

<?php $__env->startSection('content'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Obat</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Obat</a></li>
          <li class="breadcrumb-item active">Data</li>
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

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">DataTable with default features</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>No</th>
                <th>Nama Ruang</th>
                <th>No Ruang</th>
                <th>Kelas</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
              </thead>
              <tbody>
              
              </tbody>
              <tfoot>
              <tr>
                <th>No</th>
                <th>Nama Ruang</th>
                <th>No Ruang</th>
                <th>Kelas</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
              </tfoot>
            </table>
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

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<!-- Page specific script -->
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
        "processing": true,
        "serverSide": true,
        "ajax": "<?php echo e(route('obat.index')); ?>",
        "columns": [
            {
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
            },
            {
                data: 'nama',
                name: 'nama',
            },
            {
                data: 'kategori',
                name: 'kategori',
            },
            {
                data: 'tgl_masuk',
                name: 'tgl_masuk',
            },
            {
                data: 'stok',
                name: 'stok',
            },
            {
                data: 'action',
                name: 'action',
            },
        ]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
  </script>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rekam-medis\Web-Rekam-Medis\eHealth\resources\views/obat.blade.php ENDPATH**/ ?>