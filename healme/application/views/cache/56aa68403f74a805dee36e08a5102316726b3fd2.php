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
    <title><?php echo $__env->yieldContent('title'); ?> | AK HOTELS</title>
</head>

<body>

    <div class="app">
        <div class="navbar--top">
            <span class="navbar--top-title text-white">AK HOTELS</span>
        </div>
        <div class="container container-app py-3">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
        <div class="navbar--bottom">
            <a href="<?php echo e(base_url()); ?>" class="navbar--bottom-item text-decoration-none active">
                <i class="bi bi-shop"></i>
                <span>Market</span>
            </a>
            <a href="<?php echo e(base_url()); ?>refferal" class="navbar--bottom-item text-decoration-none">
                <i class="bi bi-qr-code-scan"></i>
                <span>Undang</span>
            </a>
            <a href="<?php echo e(base_url()); ?>information" class="navbar--bottom-item text-decoration-none">
                <i class="bi bi-megaphone"></i>
                <span>Informasi</span>
            </a>
            <a href="<?php echo e(base_url()); ?>profile" class="navbar--bottom-item text-decoration-none">
                <i class="bi bi-person-fill"></i>
                <span>Profile</span>
            </a>
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

    <script src="<?php echo e(base_url()); ?>assets/main/js/chat.js"></script>

    <?php echo $__env->yieldContent('footer'); ?>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->


</body>

</html><?php /**PATH /home/akhotel1/public_html/application/views/layouts/app.blade.php ENDPATH**/ ?>