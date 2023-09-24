<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" > <?php echo e($task == 'save' ? 'Add Category' : 'Edit Category'); ?> </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <form class="form-horizontal" action="<?php echo e(url( $task == 'save' ? '/category/save' : '/category/update')); ?>" method="post">
            <div class="modal-body">

                <?php echo csrf_field(); ?>
                <?php echo e($task == 'save' ? '' : method_field('put')); ?>

                <input type="hidden" name="id" id="id">

                <div class="col-12">
                    <div class="form-group row">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Enter title" autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary"><?php echo e($task == 'save' ? 'Save' : 'Save changes'); ?></button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </form>

    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-District -->
<?php /**PATH D:\wampp\www\unknown\resources\views/dashboard/pages/modals/add_edit_category.blade.php ENDPATH**/ ?>