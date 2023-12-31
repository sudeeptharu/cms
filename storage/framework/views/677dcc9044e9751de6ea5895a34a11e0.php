<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" > <?php echo e($task == 'save' ? 'Add Web Setting' : 'Edit  Web Setting'); ?> </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <form class="form-horizontal" action="<?php echo e(url( $task == 'save' ? '/websetting/save' : '/websetting/update')); ?>" method="post">
            <div class="modal-body">

                <?php echo csrf_field(); ?>
                <?php echo e($task == 'save' ? '' : method_field('put')); ?>

                <input type="hidden" name="id" id="id">

                <div class="col-12">
                    <div class="form-group row">
                        <label for="key">Key</label>
                        <input type="text" class="form-control" name="key" id="key" placeholder="Enter title" autocomplete="off">
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group row">
                        <label for="value">Value</label>
                        <textarea name="value" id="value"class="form-control" >

                        </textarea>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group row">
                        <label for="description">Image</label>
                        <input type="text" class="form-control"  name="image" id="image">
                    </div>
                </div>


                <div class="col-12">
                    <div class="form-group row">
                        <label for="align">Align</label>
                        <input type="text" class="form-control" name="align" id="align">
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
<?php /**PATH D:\wampp\www\unknown\resources\views/dashboard/pages/modals/add_edit_web_setting.blade.php ENDPATH**/ ?>