<?php $__env->startSection('content'); ?>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add/Edit Page</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/dashboard')); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Add/Edit Page</a></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form action="<?php echo e(url('/page/save')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="id" value="<?php echo e($page->id); ?>">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="news_title">Title</label>
                                        <input type="text" value="<?php echo e($page->title); ?>" name="title" id="title" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="subtitle">Subtitle</label>
                                        <input type="text" value="<?php echo e($page->subtitle); ?>" name="subtitle" id="subtitle" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="slug">Slug</label>
                                        <input type="text" value="<?php echo e($page->slug); ?>" name="slug" id="slug" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea name="description" id="description" class="editor" >
                                            <?php echo e($page->description); ?>

                                        </textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="quote">Quote</label>
                                        <textarea name="quote" id="quote"class="form-control editor" >
                                            <?php echo e($page->quote); ?>

                                    </textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="excerpt">Excerpt</label>
                                        <textarea name="excerpt" id="excerpt"class="form-control editor" >
                                            <?php echo e($page->excerpt); ?>

                                    </textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card card-info">
                                        <div class="card-header">
                                            <h3 class="card-title">Status</h3>
                                        </div>
                                        <div class="card-body">
                                            <p ><b>Draft:</b>
                                                <input type="checkbox"
                                                       name="draft"
                                                       id="draft"
                                                       value="1"
                                                       <?php if($page->draft=='1'): ?> checked <?php endif; ?>>
                                            </p>
                                            <button type="submit" class="btn btn-sm btn-primary btn-block">Publish</button>
                                        </div>
                                    </div>



                                    <div class="card card-info">
                                        <div class="card-header">
                                            <h3 class="card-title">Featured Image</h3>
                                        </div>
                                        <div class="card-body">
                                            <input id="image" name="image" type="hidden" >
                                            <a href="#"
                                               data-toggle="modal"
                                               data-target="#modal-default-upload-image"
                                               data-bs-dismiss="modal"
                                               class="btn set"
                                               type="button">Click here to select Image</a>
                                            <a href="#" class="btn text-red reset hidden" type="button">Reset Image</a>
                                            <div id="cont-img"><img id="image_preview" <?php if(!empty($page)): ?> src="<?php echo e($page->image); ?>" width="200"  <?php else: ?> src="" style="display:none;" width="200" <?php endif; ?> /></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>
    
    
    
    
    
    
    
    

    
    

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

    
    
    
    

    
    
    
    
    
    
    

    
    
    
    
    
    
    

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

    
    

    

    
    
    
    

    

    
    
    
    <!-- /.modal-District -->
        <div class="modal fade" id="modal-default-upload-image">
            <?php echo $__env->make('dashboard.pages.modals.add_media', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <script>
            $('#modal-default-upload-image').on('shown.bs.modal', function () {
                var polyfillAmdUrl =
                    "https://cdn.jsdelivr.net/npm/intersection-observer-amd@2.0.1/intersection-observer.amd.min.js";
                var dependencies = [
                    "IntersectionObserver" in window ? null : polyfillAmdUrl,
                    "backend/dist/js/lazyload.amd.min.js"
                ];
                require(dependencies, function(_, LazyLoad) {
                    window.ll = new LazyLoad({
                        elements_selector: ".lazy"
                    });

                });
            });


        </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.app',['name' => 'Add Page'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/unknown/resources/views/dashboard/pages/modals/add_edit_page.blade.php ENDPATH**/ ?>