

<?php $__env->startSection('title', 'Profile Update'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <form action="<?php echo e(base_url()); ?>profileupdate/update" method="POST" class="col-12">
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" id="" class="form-control" value="<?php echo e($data->name); ?>" required>
        </div>
        <div class="form-group">
            <label for="">Phone</label>
            <input type="number" name="phone" id="" class="form-control" value="<?php echo e($data->phone); ?>" required>
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="text" name="password" id="" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Pin</label>
            <input type="number" name="pin" id="" class="form-control">
        </div>
        <div class="form-group text-center">
            <input type="submit" value="Update" class="btn btn-warning w-75">
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\newxampp2\htdocs\ponselkita\application\views/profile_update.blade.php ENDPATH**/ ?>