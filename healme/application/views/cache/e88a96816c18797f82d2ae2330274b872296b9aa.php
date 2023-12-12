<?php
$CI =&get_instance();
if ($CI->session->userdata('login_admin') == null) {
    redirect(base_url() . ADMINPATH . '/auth/login');
}else{
    $log = $CI->session->userdata('login_admin');
    if(model('Musers')->get(['id' => $log->id])->row()->password != $log->password){
        $CI->session->unset_userdata('login_admin');
        redirect(base_url() . ADMINPATH . '/auth/login');
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?= base_url() ?>assets/img/logo.png">
    <title><?php echo $__env->yieldContent('title'); ?> | AK HOTELS</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/adminui/css/simplebar.css">
    <!-- Fonts CSS -->
    <link
        href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/adminui/css/feather.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/adminui/css/select2.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/adminui/css/dropzone.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/adminui/css/uppy.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/adminui/css/jquery.steps.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/adminui/css/jquery.timepicker.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/adminui/css/quill.snow.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/adminui/css/daterangepicker.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/adminui/css/dataTables.bootstrap4.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/adminui/css/app-light.css" id="lightTheme">
    <link rel="stylesheet" href="<?= base_url() ?>assets/adminui/css/app-dark.css" id="darkTheme" disabled>
</head>

<body class="vertical  light" style="height: 90vh;">
    <div class="wrapper">
        <!-- Header -->
        <nav class="topnav navbar navbar-light bg-white border-bottom shadow"
            style="position: sticky; top: 0; z-index: 11;">
            <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
                <i class="fe fe-menu navbar-toggler-icon"></i>
            </button>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="light">
                        <i class="fe fe-sun fe-16"></i>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink"
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="avatar avatar-sm mt-2">
                            <img src="<?= base_url() ?>assets/adminui/assets/avatars/face-1.jpg" alt="..."
                                class="avatar-img rounded-circle">
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <!-- <a class="dropdown-item" href="#">Profile</a> -->
                        <a class="dropdown-item" href="<?php echo e(base_url() . ADMINPATH . '/auth/logout'); ?>">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- End Header -->


        <!-- Sidebar -->
        <?php echo $__env->make('admin.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- End Sidebar -->


        <main role="main" class="main-content mt-2">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="row align-items-center mb-2">
                            <div class="col">
                                <h2 class="h5 page-title"><?php echo $__env->yieldContent('page_title'); ?></h2>
                            </div>
                            <div class="col-auto">
                                <span><?php echo $__env->yieldContent('page_desc'); ?></span>
                            </div>
                        </div>

                        <!-- Content -->
                        <?php echo $__env->yieldContent('content'); ?>
                        <!-- ENd Content -->

                    </div> <!-- .container-fluid -->
                    <div class="modal fade modal-notif modal-slide" tabindex="-1" role="dialog"
                        aria-labelledby="defaultModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="defaultModalLabel">Notifications</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="list-group list-group-flush my-n3">
                                        <div class="list-group-item bg-transparent">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <span class="fe fe-box fe-24"></span>
                                                </div>
                                                <div class="col">
                                                    <small><strong>Package has uploaded successfull</strong></small>
                                                    <div class="my-0 text-muted small">Package is zipped and uploaded
                                                    </div>
                                                    <small class="badge badge-pill badge-light text-muted">1m
                                                        ago</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item bg-transparent">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <span class="fe fe-download fe-24"></span>
                                                </div>
                                                <div class="col">
                                                    <small><strong>Widgets are updated successfull</strong></small>
                                                    <div class="my-0 text-muted small">Just create new layout Index,
                                                        form, table</div>
                                                    <small class="badge badge-pill badge-light text-muted">2m
                                                        ago</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item bg-transparent">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <span class="fe fe-inbox fe-24"></span>
                                                </div>
                                                <div class="col">
                                                    <small><strong>Notifications have been sent</strong></small>
                                                    <div class="my-0 text-muted small">Fusce dapibus, tellus ac cursus
                                                        commodo</div>
                                                    <small class="badge badge-pill badge-light text-muted">30m
                                                        ago</small>
                                                </div>
                                            </div> <!-- / .row -->
                                        </div>
                                        <div class="list-group-item bg-transparent">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <span class="fe fe-link fe-24"></span>
                                                </div>
                                                <div class="col">
                                                    <small><strong>Link was attached to menu</strong></small>
                                                    <div class="my-0 text-muted small">New layout has been attached to
                                                        the menu</div>
                                                    <small class="badge badge-pill badge-light text-muted">1h
                                                        ago</small>
                                                </div>
                                            </div>
                                        </div> <!-- / .row -->
                                    </div> <!-- / .list-group -->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Clear
                                        All</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade modal-shortcut modal-slide" tabindex="-1" role="dialog"
                        aria-labelledby="defaultModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="defaultModalLabel">Shortcuts</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body px-5">
                                    <div class="row align-items-center">
                                        <div class="col-6 text-center">
                                            <div class="squircle bg-success justify-content-center">
                                                <i class="fe fe-cpu fe-32 align-self-center text-white"></i>
                                            </div>
                                            <p>Control area</p>
                                        </div>
                                        <div class="col-6 text-center">
                                            <div class="squircle bg-primary justify-content-center">
                                                <i class="fe fe-activity fe-32 align-self-center text-white"></i>
                                            </div>
                                            <p>Activity</p>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-6 text-center">
                                            <div class="squircle bg-primary justify-content-center">
                                                <i class="fe fe-droplet fe-32 align-self-center text-white"></i>
                                            </div>
                                            <p>Droplet</p>
                                        </div>
                                        <div class="col-6 text-center">
                                            <div class="squircle bg-primary justify-content-center">
                                                <i class="fe fe-upload-cloud fe-32 align-self-center text-white"></i>
                                            </div>
                                            <p>Upload</p>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-6 text-center">
                                            <div class="squircle bg-primary justify-content-center">
                                                <i class="fe fe-users fe-32 align-self-center text-white"></i>
                                            </div>
                                            <p>Users</p>
                                        </div>
                                        <div class="col-6 text-center">
                                            <div class="squircle bg-primary justify-content-center">
                                                <i class="fe fe-settings fe-32 align-self-center text-white"></i>
                                            </div>
                                            <p>Settings</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </main> <!-- main -->
    </div> <!-- .wrapper -->
    <script src="<?= base_url() ?>assets/adminui/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/adminui/js/popper.min.js"></script>
    <script src="<?= base_url() ?>assets/adminui/js/moment.min.js"></script>
    <script src="<?= base_url() ?>assets/adminui/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/adminui/js/simplebar.min.js"></script>
    <script src="<?= base_url() ?>assets/adminui/js/daterangepicker.js"></script>
    <script src="<?= base_url() ?>assets/adminui/js/jquery.stickOnScroll.js"></script>
    <script src="<?= base_url() ?>assets/adminui/js/tinycolor-min.js"></script>
    <script src="<?= base_url() ?>assets/adminui/js/config.js"></script>
    <script src="<?= base_url() ?>assets/adminui/js/d3.min.js"></script>
    <script src="<?= base_url() ?>assets/adminui/js/topojson.min.js"></script>
    <script src="<?= base_url() ?>assets/adminui/js/datamaps.all.min.js"></script>
    <script src="<?= base_url() ?>assets/adminui/js/datamaps-zoomto.js"></script>
    <script src="<?= base_url() ?>assets/adminui/js/datamaps.custom.js"></script>
    <script src="<?= base_url() ?>assets/adminui/js/Chart.min.js"></script>
    <script>
        /* defind global options */
  Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
  Chart.defaults.global.defaultFontColor = colors.mutedColor;
    </script>
    <script src="<?= base_url() ?>assets/adminui/js/gauge.min.js"></script>
    <script src="<?= base_url() ?>assets/adminui/js/jquery.sparkline.min.js"></script>
    <script src="<?= base_url() ?>assets/adminui/js/apexcharts.min.js"></script>
    <!-- <script src="<?= base_url() ?>assets/adminui/js/apexcharts.custom.js"></script> -->
    <script src="<?= base_url() ?>assets/adminui/js/jquery.mask.min.js"></script>
    <script src="<?= base_url() ?>assets/adminui/js/select2.min.js"></script>
    <script src="<?= base_url() ?>assets/adminui/js/jquery.steps.min.js"></script>
    <script src="<?= base_url() ?>assets/adminui/js/jquery.validate.min.js"></script>
    <script src="<?= base_url() ?>assets/adminui/js/jquery.timepicker.js"></script>
    <script src="<?= base_url() ?>assets/adminui/js/dropzone.min.js"></script>
    <script src="<?= base_url() ?>assets/adminui/js/uppy.min.js"></script>
    <script src="<?= base_url() ?>assets/adminui/js/quill.min.js"></script>
    <script src="<?= base_url() ?>assets/adminui/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/adminui/js/dataTables.bootstrap4.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?= base_url() ?>assets/adminui/js/apps.js"></script>
    <!-- Footer -->
    <script>
        $("#datatable").DataTable();
    </script>
    <?php echo $__env->yieldContent('footer'); ?>
</body>

</html><?php /**PATH C:\newxampp2\htdocs\ponselkita\application\views/admin/layouts/app.blade.php ENDPATH**/ ?>