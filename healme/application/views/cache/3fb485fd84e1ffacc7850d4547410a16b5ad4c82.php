

<?php $__env->startSection('title', 'Akun Suspend'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-12 text-center">
        <h5>AKUN ANDA</h5>
        <h1>TER-SUSPEND</h1>
        <a href="<?php echo e(base_url() . 'auth/logout'); ?>">Logout</a>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/akhotel1/public_html/application/views/suspend.blade.php ENDPATH**/ ?>