<?php $__env->startSection('content'); ?>

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Page</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/dashboard')); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Page</a></li>
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
                                <a type="button"
                                        class="btn btn-primary"


                                href="page/add"
                                >
                                    Add Page
                                </a>
                            </div>
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-striped">
                                    <thead>
                                    <tr class="table-info text-center">
                                        <th>Title</th>
                                        <th>Description </th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <tr class="text-center">
                                            <td><?php echo e($page->title); ?></td>
                                            <td><?php echo e($page->description); ?></td>
                                            <td><?php echo e($page->image); ?></td>
                                            <td>

                                                <div class="btn-group">
                                                    <a href="page/add/<?php echo e($page->id); ?>"










                                                       class="btn-primary btn-sm" title="Edit"><span class="fa fa-edit"></span></a>
                                                    <a href="<?php echo e(url('/page/delete/'.$page->id )); ?>"
                                                       class="btn btn-danger btn-sm" title="Delete"><span class="fa fa-trash"></span>
                                                    </a>
                                                </div>

                                            </td>
                                        </tr>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>

                                </table>
                                <?php echo e($pages->onEachSide(0)->links()); ?>


                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

    </div>









    
    
    

<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.app',['name' => 'Page'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/unknown/resources/views/dashboard/pages/pages.blade.php ENDPATH**/ ?>