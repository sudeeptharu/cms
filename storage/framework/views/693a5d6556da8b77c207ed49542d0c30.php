<?php $__env->startSection('content'); ?>

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Link</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/dashboard')); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Link</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_link">
                                    Add Link
                                </button>
                            </div>
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-striped">
                                    <thead>
                                    <tr class="table-info text-center">
                                        <th>Social</th>
                                        <th>Icon </th>
                                        <th>Url</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php $__currentLoopData = $links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <tr class="text-center">
                                            <td><?php echo e($link->social); ?></td>
                                            <td><?php echo e($link->icon); ?></td>
                                            <td><?php echo e($link->url); ?></td>
                                            <td>

                                                <div class="btn-group">
                                                    <a href="#" data-toggle="modal" data-target="#edit_link"
                                                       data-id="<?php echo e($link->id); ?>"
                                                       data-social="<?php echo e($link->social); ?>"
                                                       data-icon="<?php echo e($link->icon); ?>"
                                                       data-url="<?php echo e($link->url); ?>"

                                                       class="btn-primary btn-sm" title="Edit"><span class="fa fa-edit"></span></a>
                                                    <a href="<?php echo e(url('/link/delete/'.$link->id )); ?>"
                                                       class="btn btn-danger btn-sm" title="Delete"><span class="fa fa-trash"></span>
                                                    </a>
                                                </div>

                                            </td>
                                        </tr>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>

                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

    </div>

    <div class="modal fade" id="add_link">
        <?php echo $__env->make('dashboard.pages.modals.add_edit_link', ['task' => 'save' ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
    </div>

    <div class="modal fade" id="edit_link">
        <?php echo $__env->make('dashboard.pages.modals.add_edit_link', ['task' => 'update' ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
    </div>

    
    
    

<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.app',['name' => 'Link'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wampp\www\unknown\resources\views/dashboard/pages/links.blade.php ENDPATH**/ ?>