

<?php $__env->startSection('title', 'Profile'); ?>

<?php $__env->startSection('page_title', 'Profile'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-4">
        <div class="card">
            <div class="card-header">Biodata</div>
            <form action="<?php echo e(base_url() . ADMINPATH); ?>/profile/biodata" method="POST" class="card-body">
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
                <div class="form-group text-center">
                    <input type="submit" id="" class="btn btn-primary w-75">
                </div>
            </form>
        </div>
    </div>
    <div class="col-4">
        <div class="card">
            <div class="card-header">Bank</div>
            <form action="<?php echo e(base_url() . ADMINPATH); ?>/profile/bank" method="POST" class="card-body">
                <div class="form-group">
                    <label for="">Name</label>
                    <select name="bank_name" id="" class="form-control">
                        <?php $__currentLoopData = ['BNI', 'BRI', 'BCA', 'MANDIRI', 'DANAMON']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php echo e($data->bank_name == $item ? 'selected' : ''); ?>><?php echo e($item); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Number</label>
                    <input type="number" name="bank_number" id="" class="form-control" value="<?php echo e($data->bank_number); ?>"
                        required>
                </div>
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" name="bank_username" id="" class="form-control"
                        value="<?php echo e($data->bank_username); ?>" required>
                </div>
                <div class="form-group text-center">
                    <input type="submit" id="" class="btn btn-primary w-75">
                </div>
            </form>
        </div>
    </div>
    <div class="col-4">
        <div class="card">
            <div class="card-header">Logo Web</div>
            <form action="<?php echo e(base_url() . ADMINPATH); ?>/profile/logo" method="POST" enctype="multipart/form-data" class="card-body">
                <div class="form-group text-center">
                    <img src="<?php echo e(base_url() . 'assets/' . $logo->image); ?>" alt="" style="width: 75%;">
                </div>
                <div class="form-group">
                    <input type="file" name="image" id="" class="form-control" required>
                </div>
                <div class="form-group text-center">
                    <input type="submit" id="" class="btn btn-primary w-75">
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/akhotel1/public_html/application/views/admin/profile.blade.php ENDPATH**/ ?>