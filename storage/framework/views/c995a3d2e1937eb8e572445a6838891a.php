<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Media Manager</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/dashboard')); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Media Manager</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                            <div class="col-md-12">
                                <button type="button" id="AddNewUploads" class="btn btn-success btn-sm pull-right">Add New</button>
                            </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <?php if(count($errors) > 0): ?>
                                <div class="alert alert-danger">
                                    <ul>
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($error); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            <?php endif; ?>

                                <form action="<?php echo e(url('/mediaManager/uploadmedia')); ?>" id="fm_dropzone_main" enctype="multipart/form-data" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <a id="closeDZ1"><i class="fa fa-times"></i></a>
                                    <div class="dz-message"><i class="fa fa-cloud-upload"></i><br>Drop files here to upload</div>
                                </form>

                            <div class="box box-success" style="overflow:auto; height:500px;"  >
                                <!--<div class="box-header"></div>-->
                                <div class="box-body" >
                                    <ul class="files_container">

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <script>
        var bsurl = '<?php echo e(Storage::url('gallery')); ?>';
        console.log(bsurl)
        var fm_dropzone_main = null;
        var cntFiles = null;
        $(function () {
            fm_dropzone_main = new Dropzone("#fm_dropzone_main", {
                maxFilesize: 2,
                acceptedFiles: "image/*,application/pdf",
                init: function() {
                    this.on("complete", function(file) {
                        this.removeFile(file);
                    });
                    this.on("success", function(file) {
                        console.log("addedfile");
                        console.log(file);
                        loadUploadedFiles();
                    });
                }
            });


            $("body").on("click", "ul.files_container .fm_file_sel", function() {
                var upload = $(this).attr("title");

                $("body").find('#image_preview').attr('src','<?php echo e(Storage::url('gallery')."/"); ?>'+upload).show();
                $('body').find('#fieldID').val('<?php echo e(Storage::url('gallery')."/"); ?>'+upload);
                $('#modal-default-upload-image').modal('hide');

            });

            loadUploadedFiles();


            $('#image_name').on('input',function () {
                var search_text = $(this).val();
                var newFiles = cntFiles.filter(function (file) {
                    return file.name.includes(search_text);
                });
                showLoadedImages(newFiles);

            });

            $("#fm_dropzone_main").slideUp();
            $("#AddNewUploads").on("click", function() {
                $("#fm_dropzone_main").slideDown();
            });
            $("#closeDZ1").on("click", function() {
                $("#fm_dropzone_main").slideUp();
            });

            $("#modal-default-upload-image").on('hide.bs.modal', function(){
                $('.set').hide();
                $('.reset').removeClass('hidden');
            });
            $('.reset').on('click',function () {
                $('#image_preview').attr('src','');
                $('.set').show();
                $('.reset').addClass('hidden');
            });




        });

        function loadUploadedFiles() {
            // load folder files
            $.ajax({
                dataType: 'json',
                url: "<?php echo e(url('/mediaManager/image')); ?>",
                success: function ( json ) {
                    cntFiles = json.uploads;
                    showLoadedImages(cntFiles)
                }
            });
        }

        function showLoadedImages(files) {
            $("ul.files_container").empty();
            if(files.length) {
                for (var index = 0; index < 16; index++) {
                    var element = files[index];
                    var li = formatFile(element,"");
                    $("ul.files_container").append(li);
                }
                for(var index = 16; index < files.length; index++)
                {
                    var element = files[index];
                    console.log(element)
                    var li = formatFile(element,"data-");
                    $("ul.files_container").append(li);
                }
            } else {
                $("ul.files_container").html("<div class='text-center text-danger' style='margin-top:40px;'>No Files</div>");
            }
            setLazyLoad();
        }
        function formatFile(upload,data) {
            var image = '';
            if($.inArray(upload.extension, ["jpg", "jpeg", "png", "gif", "bmp"]) > -1) {
                image = '<img class="lazy"'+data+'src="'+bsurl+'/'+upload+'?s=130">';
            } else {
                image = '<img class="lazy"'+data+'src="'+bsurl+'/'+upload+'?s=130">';

                // switch (upload.extension) {
                //     case "pdf":
                //         image = '<i class="fa fa-file-pdf-o"></i>';
                //         break;
                //     default:
                //         image = '<i class="fa fa-file-text-o"></i>';
                //         break;
                // }

            }
            // return '<li><a class="fm_file_sel" data-toggle="tooltip" data-placement="top" title="'+upload.name+'"\>'+image+'</a></li>';
            return '<li ><a class="fm_file_sel" style="position: relative;"  data-toggle="tooltip" data-placement="top"  upload=\''+JSON.stringify(upload)+'\'>'
                +image+'<span class="badge badge-pill badge-danger badge-up" style="top: 0px !important;right: 0px !important; position: absolute;">x</span></a></li>';
        }
    </script>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('dashboard.layouts.app',['name' => 'Media Manager'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wampp\www\unknown\resources\views/dashboard/pages/mediamanager.blade.php ENDPATH**/ ?>