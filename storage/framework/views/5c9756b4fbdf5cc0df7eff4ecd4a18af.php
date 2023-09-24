<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo e($name); ?></title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    
    <link rel="stylesheet" href="<?php echo e(url('/backend/plugins/fontawesome-free/css/all.min.css')); ?>">
    
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    
    <link rel="stylesheet"
          href="<?php echo e(url('/backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')); ?>">
    
    <link rel="stylesheet" href="<?php echo e(url('/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css')); ?>">
    
    <link rel="stylesheet" href="<?php echo e(url('/backend/plugins/jqvmap/jqvmap.min.css')); ?>">
    
    
    
    <link rel="stylesheet" href="<?php echo e(url('/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('/backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('/backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')); ?>">
    
    <link rel="stylesheet" href="<?php echo e(url('/backend/plugins/select2/css/select2.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('/backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')); ?>">
    
    <link rel="stylesheet" href="<?php echo e(url('/backend/plugins/daterangepicker/daterangepicker.css')); ?>">

    <?php if($name == "Report"): ?>
    <script src="<?php echo e(url("/backend/plugins/google-chart/loader.js")); ?>"></script>
    <script>google.charts.load('current', { 'packages': ['corechart'] });</script>
    <?php endif; ?>





    
    <script src="<?php echo e(url('/backend/plugins/jquery/jquery.min.js')); ?>"></script>

    
    <script src="<?php echo e(url('/backend/plugins/toastr/toastr.min.js')); ?>"></script>
    <script src="<?php echo e(url('/backend/plugins/sweetalert2/sweetalert2.min.js')); ?>"></script>
    <link rel="stylesheet" href="<?php echo e(url('/backend/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('/backend/plugins/toastr/toastr.min.css')); ?>">

    
    <link rel="stylesheet" href="<?php echo e(url('/backend/dist/css/custom-style.css')); ?>">

    
    <link rel="stylesheet" href="<?php echo e(url('/backend/dist/css/adminlte.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('/backend/dist/css/custom-style.css')); ?>">

    
    <script src="<?php echo e(url('/backend/plugins/jquery-ui/jquery-ui.min.js')); ?>"></script>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
    <script src="<?php echo e(url('tinymce/tinymce.min.js')); ?>"></script>
    <script src="<?php echo e(url('tinymce/jquery.tinymce.min.js')); ?>"></script>
    <script src="<?php echo e(url('tinymce/plugins/code/plugin.min.js')); ?>"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed sidebar-collapse">
<div class="wrapper">

<?php /**PATH D:\wampp\www\unknown\resources\views/dashboard/layouts/header.blade.php ENDPATH**/ ?>