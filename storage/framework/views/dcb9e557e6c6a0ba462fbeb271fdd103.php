<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" > <?php echo e($task == 'save' ? 'Add Video' : 'Edit Video'); ?> </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <form class="form-horizontal" action="<?php echo e(url( $task == 'save' ? '/video/save' : '/video/update')); ?>" method="post">
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


                <div class="col-12">
                    <div class="form-group row">
                        <label for="url">URL</label>
                        <input type="url" class="form-control" name="url" id="url">
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
<?php /**PATH /var/www/unknown/resources/views/dashboard/pages/modals/add_edit_video.blade.php ENDPATH**/ ?>