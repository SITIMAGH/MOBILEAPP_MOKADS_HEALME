

<?php $__env->startSection('title', 'Edit Voucher'); ?>

<?php $__env->startSection('page_title', 'Edit Voucher'); ?>

<?php $__env->startSection('content'); ?>
<div class="row justify-content-center">
    <div class="col-12 col-md-6">
        <div class="card shadow">
            <form class="card-body" action="<?php echo e(base_url()); ?>voucher/update/<?php echo e($data->id); ?>" method="POST">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" id="" class="form-control" placeholder="PAKET HEMAT" value="<?php echo e($data->name); ?>" required>
                </div>
                <div class="form-group">
                    <label for="">Harga</label>
                    <input type="number" name="price" id="" class="form-control" placeholder="200000" value="<?php echo e($data->price); ?>" required>
                </div>
                <div class="form-group">
                    <label for="">Diskon</label>
                    <input type="number" name="discon" id="" class="form-control" placeholder="50" value="<?php echo e($data->discon); ?>" required>
                </div>
                <div class="form-group">
                    <label for="">Durasi</label>
                    <input type="number" name="time" id="" class="form-control" placeholder="2" value="<?php echo e($data->time); ?>" required>
                </div>
                <div class="form-group text-center">
                    <input type="submit" value="Simpan" class="btn btn-primary mt-2">
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\newxampp2\htdocs\healme\application\views/voucher/edit.blade.php ENDPATH**/ ?>