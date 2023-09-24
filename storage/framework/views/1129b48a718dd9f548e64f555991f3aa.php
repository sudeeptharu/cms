<?php $__env->startSection('content'); ?>

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Category</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/dashboard')); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Category</a></li>
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
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_category">
                                    Add Category
                                </button>
                            </div>
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-striped">
                                    <thead>
                                    <tr class="table-info text-center">
                                        <th>Title</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <tr class="text-center">
                                            <td><?php echo e($category->title); ?></td>
                                            <td>

                                                <div class="btn-group">
                                                    <a href="#" data-toggle="modal" data-target="#edit_category"
                                                       data-id="<?php echo e($category->id); ?>"
                                                       data-title="<?php echo e($category->title); ?>"
                                                       class="btn-primary btn-sm" title="Edit"><span class="fa fa-edit"></span></a>
                                                    <a href="<?php echo e(url('/category/delete/'.$category->id )); ?>"
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

    <div class="modal fade" id="add_category">
        <?php echo $__env->make('dashboard.pages.modals.add_edit_category', ['task' => 'save' ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
    </div>

    <div class="modal fade" id="edit_category">
        <?php echo $__env->make('dashboard.pages.modals.add_edit_category', ['task' => 'update' ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
    </div>

    
    
    

<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.app',['name' => 'Category'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wampp\www\unknown\resources\views/dashboard/pages/categories.blade.php ENDPATH**/ ?>