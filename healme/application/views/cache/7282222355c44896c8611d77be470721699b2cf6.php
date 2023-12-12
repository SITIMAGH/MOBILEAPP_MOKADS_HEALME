

<?php $__env->startSection('title', 'Refferal'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body p-2">
                <h6 class="text-center">Kode Undangan : <?php echo e($data->refferal); ?></h6>
            </div>
        </div>
        <img src="https://chart.apis.google.com/chart?cht=qr&chs=300x300&chl=<?php echo e($data->refferal); ?>" alt="">
        <button class="btn btn-primary w-100"
            onclick="onCopy('<?php echo e(base_url() . 'auth/daftar?invite=' . $data->refferal); ?>')">Copy</button>
        <div class="row mt-4">
            <div class="col-4">
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e(base_url()); ?>auth/daftar?invite=uM3Wj1" target="_blank" class="btn btn-sm btn-primary w-100 d-flex flex-column justify-content-center"><i
                        class="bi bi-facebook"></i> Facebook</a>
            </div>
            <div class="col-4">
                <a href="https://api.whatsapp.com/send?text=<?php echo e(base_url()); ?>auth/daftar?invite=uM3Wj1" target="_blank" class="btn btn-sm btn-success w-100 d-flex flex-column justify-content-center" data-action="share/whatsapp/share"><i
                    class="bi bi-whatsapp"></i> Whatsapp</a>
            </div>
            <div class="col-4">
                <a href="tg://msg_url?text=<?php echo e(base_url()); ?>auth/daftar?invite=uM3Wj1" target="_blank" class="btn btn-sm btn-info w-100 d-flex flex-column justify-content-center"><i
                    class="bi bi-telegram"></i> Telegram</a>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<script>
    function onCopy(value){
        var $temp = $("<input>");
          $("body").append($temp);
          $temp.val(value).select();
          document.execCommand("copy");
          $temp.remove();
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\newxampp2\htdocs\moneygame\application\views/refferal.blade.php ENDPATH**/ ?>