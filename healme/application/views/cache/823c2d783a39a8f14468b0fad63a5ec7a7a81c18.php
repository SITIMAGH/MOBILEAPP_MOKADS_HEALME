<?php
$CI =&get_instance();
if ($CI->session->userdata('login') == null) {
    redirect(base_url() . 'auth/login');
}else{
    $log = $CI->session->userdata('login');
    if(model('Musers')->get(['id' => $log->id])->row()->password != $log->password){
        $CI->session->unset_userdata('login');
        redirect(base_url() . 'auth/login');
    }
}

$popup = model('Mpopup');
$popupData = $popup->get(['status' => '1'])->row();
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo e(base_url()); ?>assets/main/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.0/font/bootstrap-icons.css">
    <style>
        .app::before {
            content: "";
            /* background: url('<?php echo e(base_url()); ?>assets/bg.jpeg') no-repeat;
            background-position: center;
            background-size: cover; */
            /* opacity: .5; */
            background: linear-gradient(220deg, #ffc107d2, #ffffef, #ffffff);
            width: 100%;
            height: 100%;
            display: block;
            position: absolute;
            z-index: -1;
        }
    </style>
    <title><?php echo $__env->yieldContent('title'); ?> | PONSEL KITA</title>
    <?php echo $__env->yieldContent('header'); ?>
</head>

<body>

    <div class="app">
        <div class="navbar--top">
            <i class="bi bi-list m-3"
                style="position: absolute; left: 0; font-size: 25px; color: white; cursor: pointer;"
                id="toggle-sidebar"></i>
            <span class="navbar--top-title text-white">PONSEL KITA</span>
        </div>
        <div class="container container-app py-3">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
        <div class="navbar--bottom">
            <a href="<?php echo e(base_url()); ?>" class="text-decoration-none">ponselkita.org</a>
        </div>

        <div class="sidebar">
            <div class="sidebar-profile">
                <img src="<?php echo e(base_url()); ?>assets/<?php echo e(json_decode(file_get_contents('assets/logo.json'))->image); ?>" alt=""
                    class="sidebar-profile-img">
                <p class="text-truncate sidebar-profile-username"><?php echo e(get_instance()->session->userdata('login')->name .
                    ' ('
                    .get_instance()->session->userdata('login')->phone. ')'); ?></p>
            </div>
            <div class="sidebar-menu">
                <a href="<?php echo e(base_url()); ?>" class="sidebar-menu-item text-truncate text-decoration-none">Home</a>
                
                <a href="<?php echo e(base_url()); ?>information"
                    class="sidebar-menu-item text-truncate text-decoration-none">Informasi</a>
                <a href="<?php echo e(base_url()); ?>profile"
                    class="sidebar-menu-item text-truncate text-decoration-none">Profile</a>
                <a href="<?php echo e(base_url() . 'auth/logout'); ?>"
                    class="sidebar-menu-item text-truncate text-decoration-none">Keluar</a>
            </div>

        </div>

        <!-- Modal -->
        <div class="modal fade" id="modalPopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered overflow-hidden" role="document">
                <div class="modal-content overflow-hidden">
                    <div class="modal-body p-0 overflow-hidden">
                        
                        <button type="button" class="close position-absolute"
                            style="top: 0; right: 0; margin-right: 15px; margin-top: 5px;" onclick="closePopup()">
                            <span aria-hidden="true" style="color: #ffffff; font-size: 35px;">&times;</span>
                        </button>
                        <img src="<?php echo e(base_url()); ?>files/popup/<?php echo e($popupData ? $popupData->image : ''); ?>" alt=""
                            class="img-fluid w-100">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"
        integrity="sha512-odNmoc1XJy5x1TMVMdC7EMs3IVdItLPlCeL5vSUPN2llYKMJ2eByTTAIiiuqLg+GdNr9hF6z81p27DArRFKT7A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    
    <script>
        $('#toggle-sidebar').click(function(e){
            e.preventDefault();
            $('.sidebar').toggleClass('active');
        })

        <?php if($CI->session->flashdata('popup') == '1'): ?>
        localStorage.removeItem('popup')
        <?php endif; ?>

        <?php if($popupData): ?>
        if(localStorage.popup == undefined){
            $('#modalPopup').modal('show');
        }
        <?php endif; ?>

        function closePopup(){
            localStorage.setItem('popup', true)
            $('#modalPopup').modal('hide')
        }
    </script>

    <?php echo $__env->yieldContent('footer'); ?>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->


</body>

</html><?php /**PATH C:\newxampp2\htdocs\ponselkita\application\views/layouts/app.blade.php ENDPATH**/ ?>