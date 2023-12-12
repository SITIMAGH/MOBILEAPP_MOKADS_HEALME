

<?php $__env->startSection('title', 'Detail Bonus'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-12 mb-4">
        <div class="card text-decoration-none text-dark">
            <div class="card-header text-center">Bonus Refferal</div>
            <div class="card-body d-flex flex-column align-items-center justify-content-center" style="padding: 5px;">
                <i class="bi bi-cash" style="font-size: 2rem;"></i>
                <span class="text-center">Rp <?php echo e(number_format($data->refferal_bonus)); ?></span>
            </div>
        </div>
    </div>
    <div class="col-12 mb-4">
        <div class="card text-decoration-none text-dark">
            <div class="card-header text-center">Poin</div>
            <div class="card-body d-flex flex-column align-items-center justify-content-center" style="padding: 5px;">
                <i class="bi bi-coin" style="font-size: 2rem;"></i>
                <span class="text-center"><?php echo e(number_format($data->poin)); ?></span>
            </div>
        </div>
    </div>
    <div class="col-12 mb-4">
        <a href="<?php echo e(base_url()); ?>bonusredeem" class="btn btn-primary w-100">Tukar Bonus</a>
    </div>
    <iframe src="/spin.mp4" width="500" height="425" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/akhotel1/public_html/application/views/bonus_detail.blade.php ENDPATH**/ ?>