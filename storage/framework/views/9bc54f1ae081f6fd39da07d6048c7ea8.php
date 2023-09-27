
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        
    </ul>

    
    <ul class="navbar-nav ml-auto">
        
        <li class="nav-item dropdown dropdown-notification">
            <?php echo csrf_field(); ?>
            <a class="nav-link" data-toggle="dropdown" href="#" id="notification-icon-dashboard">
                <i class="far fa-bell fa-lg"></i>
            </a>

            <div class="dropdown-menu dropdown-menu-xl dropdown-menu-left" id="notification-dropdown-dashboard">

            </div>

        </li>

    </ul>
</nav>

<?php /**PATH /var/www/unknown/resources/views/dashboard/layouts/nav.blade.php ENDPATH**/ ?>