
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    
    <a href="<?php echo e(url('/dashboard/')); ?>" class="brand-link">
        <img src="<?php echo e(url('https://ui-avatars.com/api/?name='.config('app.name') . '&background=d6d8d9&color=343a40&length=4&size=256&font-size=0.33&bold=true')); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Dashboard</span>
    </a>

    
    <div class="sidebar">

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


                <li class="nav-item">
                    <a href="" class="nav-link" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt nav-icon"></i> <p>Logout</p>
                    </a>
                </li >

                <li class="nav-item" >
                    <a href="<?php echo e(url('slider')); ?>"  class="nav-link">
                        <i class="fas fa-sign-out-alt nav-icon"></i> <p>Slider</p>
                    </a>
                </li >

                <li class="nav-item">
                    <a href="<?php echo e(url('category')); ?>"  class="nav-link">
                        <i class="fas fa-sign-out-alt nav-icon"></i> <p>Category</p>
                    </a>
                </li >
                <li class="nav-item">
                    <a href="<?php echo e(url('scroller')); ?>"  class="nav-link">
                        <i class="fas fa-sign-out-alt nav-icon"></i> <p>Scroller</p>
                    </a>
                </li >
                <li class="nav-item">
                    <a href="<?php echo e(url('service')); ?>"  class="nav-link">
                        <i class="fas fa-sign-out-alt nav-icon"></i> <p>Service</p>
                    </a>
                </li >
                <li class="nav-item">
                    <a href="<?php echo e(url('gallery')); ?>"  class="nav-link">
                        <i class="fas fa-sign-out-alt nav-icon"></i> <p>Gallery</p>
                    </a>
                </li ><li class="nav-item">
                    <a href="<?php echo e(url('video')); ?>"  class="nav-link">
                        <i class="fas fa-sign-out-alt nav-icon"></i> <p>Video</p>
                    </a>
                </li ><li class="nav-item">
                    <a href="<?php echo e(url('post')); ?>"  class="nav-link">
                        <i class="fas fa-sign-out-alt nav-icon"></i> <p>Post</p>
                    </a>
                </li >
                </li ><li class="nav-item">
                    <a href="<?php echo e(url('page')); ?>"  class="nav-link">
                        <i class="fas fa-sign-out-alt nav-icon"></i> <p>Page</p>
                    </a>
                </li >

                </li ><li class="nav-item">
                    <a href="<?php echo e(url('webSetting')); ?>"  class="nav-link">
                        <i class="fas fa-sign-out-alt nav-icon"></i> <p>Web Setting</p>
                    </a>
                </li >
                </li ><li class="nav-item">
                    <a href="<?php echo e(url('mediaManager')); ?>"  class="nav-link">
                        <i class="fas fa-sign-out-alt nav-icon"></i> <p>Media Manager</p>
                    </a>
                </li >
                </li ><li class="nav-item">
                    <a href="<?php echo e(url('link')); ?>"  class="nav-link">
                        <i class="fas fa-sign-out-alt nav-icon"></i> <p>Link</p>
                    </a>
                </li >

            </ul>
        </nav>
        
    </div>
    
</aside>
<?php /**PATH /var/www/unknown/resources/views/dashboard/layouts/sidebar.blade.php ENDPATH**/ ?>