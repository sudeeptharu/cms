<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4 class="m-0">
                        </h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard /</a></li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <?php ($totalTicketCount = $openTicketCount + $closedTicketCount + $rejectedTicketCount + $processingTicketCount); ?>

                
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-info elevation-1">
                                <i class="fa fa-envelope-open" aria-hidden="true"></i>
                            </span>

                            <div class="info-box-content">
                                <span class="info-box-text">Open</span>
                                <span class="info-box-number">
                                    <?php echo e($openTicketCount); ?>

                                    (<?php if($openTicketCount > 0): ?>
                                        <?php echo e(round(($openTicketCount / $totalTicketCount ) *100, 2)); ?>

                                    <?php else: ?>
                                        <?php echo e($openTicketCount); ?>

                                    <?php endif; ?><small>%</small>)
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-danger elevation-1">
                                <i class="fa fa-spinner nav-icon"></i>
                            </span>

                            <div class="info-box-content">
                                <span class="info-box-text">Processing</span>
                                <span class="info-box-number">
                                     <?php echo e($processingTicketCount); ?>

                                    (<?php if($processingTicketCount > 0): ?>
                                    <?php echo e(round(($processingTicketCount / $totalTicketCount ) *100, 2)); ?>

                                    <?php else: ?>
                                        <?php echo e($processingTicketCount); ?>

                                    <?php endif; ?><small>%</small>)
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <!-- fix for small devices only -->
                    <div class="clearfix hidden-md-up"></div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1">
                                <i class="fa fa-check" aria-hidden="true"></i>
                            </span>

                            <div class="info-box-content">
                                <span class="info-box-text">Resolved</span>
                                <span class="info-box-number">
                                     <?php echo e($closedTicketCount); ?>

                                    (<?php if($closedTicketCount > 0): ?>
                                    <?php echo e(round(($closedTicketCount / $totalTicketCount ) *100, 2)); ?>

                                    <?php else: ?>
                                    <?php echo e($closedTicketCount); ?>

                                    <?php endif; ?><small>%</small> )
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-warning elevation-1">
                                <i class="fa fa-eject" aria-hidden="true"></i>
                            </span>

                            <div class="info-box-content">
                                <span class="info-box-text">Rejected</span>
                                <span class="info-box-number">
                                    <?php echo e($rejectedTicketCount); ?>

                                    (<?php if($rejectedTicketCount > 0): ?>
                                    <?php echo e(round(($rejectedTicketCount / $totalTicketCount ) *100, 2)); ?>

                                    <?php else: ?>
                                    <?php echo e($rejectedTicketCount); ?>

                                    <?php endif; ?><small>%</small> )
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>
                


                <div class="row">

                    <div class="col-lg-6">
                        <div class="card">

                            <div class="card-header border-0">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title">Mediums</h3>
                                </div>
                            </div>

                            <div class="card-body">

                                <div class="position-relative mb-4">
                                    <canvas id="medium-chart" height="200"></canvas>
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header border-0">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title">Categories</h3>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="position-relative mb-4">
                                    <canvas id="categories-chart" height="200"></canvas>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header border-0">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title">Departments</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="position-relative mb-4">
                                    <canvas id="departments-chart" height="200"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header border-transparent">
                                <h3 class="card-title">Processing Tickets</h3>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table m-0">
                                        <thead>
                                        <tr>
                                            <th class="text-center">#Ticket</th>
                                            <th class="text-center">Subject</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $processingTickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $processingTicket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="text-center">
                                                <td><a href="<?php echo e(url('/dashboard/ticket/processing/details/'.$processingTicket->id)); ?>"><?php echo e($processingTicket->ticket_number); ?></a></td>
                                                <td ><?php echo e($processingTicket->subject); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer clearfix">
                                <a href="<?php echo e(url('/dashboard/ticket/processing')); ?>"
                                   class="btn btn-sm btn-info float-left">View All</a>
                            </div>
                        </div>

                    </div>

                </div>


            </div>
        </section>
        <!-- /.content -->
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.app',['name' => 'Dashboard'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wampp\www\unknown\resources\views/dashboard/pages/dashboard.blade.php ENDPATH**/ ?>