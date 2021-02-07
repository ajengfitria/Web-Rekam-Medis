<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    
    <title><?php echo e(config('app.name', 'eHealth')); ?></title>
    
    <!-- Scripts -->
    
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/fontawesome-free/css/all.min.css')); ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')); ?>">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(asset('dist/css/adminlte.min.css')); ?>">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')); ?>">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/daterangepicker/daterangepicker.css')); ?>">
    <!-- summernote -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/summernote/summernote-bs4.min.css')); ?>">
    
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')); ?>">
    
    <!-- Styles -->
    <!-- <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet"> -->
</head>
<?php if(auth()->guard()->guest()): ?>
<?php if(Route::has('login')): ?>
<body class="hold-transition login-page">
    <?php echo $__env->yieldContent('content'); ?>
</body>
<?php endif; ?>
<?php else: ?>
<body class="hold-transition sidebar-mini layout-fixed">
    <div id="app">
        <div id="wrapper">
            
            <!-- Navbar Layout -->
            <?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- End Navbar -->
            
            <!-- ========== Left Sidebar Start ========== -->
            <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- Left Sidebar End -->
            
            <div class="content-wrapper">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
            <!-- End Content -->
            
            <!-- Footer Start -->
            <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- end Footer -->
            
            <!-- Control sidebar content goes here -->
            <aside class="control-sidebar control-sidebar-dark">
            </aside>
        
        
    </div>
</div>
<?php endif; ?>
<!-- jQuery -->
<script src="<?php echo e(asset('plugins/jquery/jquery.min.js')); ?>"></script>

<!-- jQuery UI 1.11.4 -->
<script src="<?php echo e(asset('plugins/jquery-ui/jquery-ui.min.js')); ?>"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>

<!-- Bootstrap 4 -->
<script src="<?php echo e(asset('plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>

<!-- daterangepicker -->
<script src="<?php echo e(asset('plugins/moment/moment.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/daterangepicker/daterangepicker.js')); ?>"></script>

<!-- Summernote -->
<script src="<?php echo e(asset('plugins/summernote/summernote-bs4.min.js')); ?>"></script>

<!-- overlayScrollbars -->
<script src="<?php echo e(asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')); ?>"></script>

<!-- AdminLTE App -->
<script src="<?php echo e(asset('dist/js/adminlte.min.js')); ?>"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?php echo e(asset('dist/js/demo.js')); ?>"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo e(asset('dist/js/pages/dashboard.js')); ?>"></script>

<!-- DataTables  & Plugins -->
<script src="<?php echo e(asset('plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/jszip/jszip.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/pdfmake/pdfmake.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/pdfmake/vfs_fonts.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/datatables-buttons/js/buttons.html5.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/datatables-buttons/js/buttons.print.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/datatables-buttons/js/buttons.colVis.min.js')); ?>"></script>

<?php echo $__env->yieldContent('script'); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\rekam-medis\Web-Rekam-Medis\eHealth\resources\views/layouts/app.blade.php ENDPATH**/ ?>