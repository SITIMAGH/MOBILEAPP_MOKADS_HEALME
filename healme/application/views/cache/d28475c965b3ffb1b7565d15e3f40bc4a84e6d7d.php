

<?php $__env->startSection('title', 'Detail Transaksi Chat'); ?>

<?php $__env->startSection('page_title', 'Detail Transaksi Chat'); ?>

<?php $__env->startSection('content'); ?>
<div class="row justify-content-center">
    <div class="col-12 col-md-6">
        <div class="card shadow">
            <form class="card-body" action="<?php echo e(base_url()); ?>transaksi/chat/status/<?php echo e($data->trxId); ?>" method="POST">
                <div class="form-group">
                    <img src="<?php echo e(base_url() . 'files/' . $data->proof_img); ?>" alt="" class="img-fluid">
                    <select name="status" id="" class="form-control">
                        <?php $__currentLoopData = ['0' => 'Pending', '1' => 'Disetujui', '-1' => 'Dibatalkan']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($key); ?>" <?php echo e($key == $data->status ? 'selected' : ''); ?>><?php echo e($val); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-group text-center">
                    <input type="submit" value="Simpan" class="btn btn-primary mt-2">
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\newxampp2\htdocs\healme\application\views/transaksi/chat/detail.blade.php ENDPATH**/ ?>