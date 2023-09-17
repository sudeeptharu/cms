<footer class="main-footer">
    <strong>Copyright &copy; 2021-<?php echo e(now()->format('Y')); ?> <a href="http://innovations.prabidhee.com" target="_blank">Prabidhee Innovations</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
    </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">

</aside>

</div>






<script src="<?php echo e(url('/backend/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>

<script src="<?php echo e(url('/backend/plugins/chart.js/Chart.min.js')); ?>"></script>


<script src="<?php echo e(url('/backend/plugins/xlsx/xlsx.full.min.js')); ?>"></script>


<script src="<?php echo e(url('/backend/plugins/moment/moment.min.js')); ?>"></script>
<script src="<?php echo e(url('/backend/plugins/daterangepicker/daterangepicker.js')); ?>"></script>


<script src="<?php echo e(url('/backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')); ?>"></script>


<script src="<?php echo e(url('/backend/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(url('/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(url('/backend/plugins/datatables-responsive/js/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(url('/backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(url('/backend/plugins/datatables-buttons/js/dataTables.buttons.min.js')); ?>"></script>

<script src="<?php echo e(url('/backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(url('/backend/plugins/select2/js/select2.full.min.js')); ?>"></script>







<script src="<?php echo e(url('/backend/plugins/bootstrap-switch/js/bootstrap-switch.min.js')); ?>"></script>




<script src="<?php echo e(url('/backend/dist/js/adminlte.js')); ?>"></script>


<script src="<?php echo e(url('/backend/dist/js/sweetalert.min.js')); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/requirejs@2.3.6/require.js"></script>

<script src="<?php echo e(url('backend/dist/js/shared.js')); ?>"></script>
<script>
    $(function () {
        tinymce.init({ selector:'.editor',theme: "modern",height: 300,width:800,
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
                "table contextmenu directionality emoticons paste textcolor responsivefilemanager code", "autoresize"
            ],
            toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
            toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
            image_advtab: true ,
            relative_urls:false,
            remove_script_host:false,
            
            
            
            
            autoresize_overflow_padding: 50,
            paste_data_images: true,
            content_style: '.mce-content-body {padding: 5px !important}'
        });

        $(".toggle-password").click(function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") === "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    })
    function setLazyLoad()
    {
        var polyfillAmdUrl =
            "https://cdn.jsdelivr.net/npm/intersection-observer-amd@2.0.1/intersection-observer.amd.min.js";

        var dependencies = [
            "IntersectionObserver" in window ? null : polyfillAmdUrl,
            "<?php echo e(url('/backend/dist/js/lazyload.amd.min.js')); ?>"
        ];


        require(dependencies, function(_, LazyLoad) {
            window.ll = new LazyLoad({
                elements_selector: ".lazy"

            });
        });
    }

    <?php if(Session::has('success')): ?>
    toastr.success("<?php echo e(Session::get('success')); ?>");
    <?php
        Session::forget('success');
    ?>
    <?php endif; ?>

    <?php if(Session::has('customError')): ?>
    toastr.error("<?php echo e(Session::get('customError')); ?>");
    <?php
        Session::forget('CustomError');
    ?>
    <?php endif; ?>

    <?php if(Session::has('update')): ?>
    toastr.success("<?php echo e(Session::get('update')); ?>");
    <?php
        Session::forget('update');
    ?>
    <?php endif; ?>

    <?php if(Session::has('destroy')): ?>
    toastr.success("<?php echo e(Session::get('destroy')); ?>");
    <?php
        Session::forget('destroy');
    ?>
    <?php endif; ?>

    <?php if($errors->any()): ?>
    <?php $__currentLoopData = array_reverse($errors->all()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    toastr.error("<?php echo e($error); ?>");
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

</script>

</body>
</html>
<?php /**PATH /var/www/unknown/resources/views/dashboard/layouts/footer.blade.php ENDPATH**/ ?>