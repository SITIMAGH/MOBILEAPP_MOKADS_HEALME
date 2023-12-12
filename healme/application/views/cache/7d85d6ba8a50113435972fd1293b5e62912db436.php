

<?php $__env->startSection('title', 'Add Banks'); ?>

<?php $__env->startSection('page_title', 'Add Banks'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <form class="card-body" action="<?php echo e(base_url()); ?>admin/banks/store" method="POST"
                enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Name</label>
                    <select name="name" id="" class="form-control">
                        <?php $__currentLoopData = ['BRI', 'BNI', 'BCA', 'MANDIRI', 'DANAMON']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option><?php echo e($item); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Number</label>
                    <input type="number" name="number" id="" class="form-control" placeholder="89187678621" required>
                </div>
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" name="username" id="" class="form-control" placeholder="John" required>
                </div>
                <div class="form-group text-center">
                    <input type="submit" value="Simpan" class="btn btn-primary mt-2">
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\newxampp2\htdocs\moneygame\application\views/admin/banks/add.blade.php ENDPATH**/ ?>