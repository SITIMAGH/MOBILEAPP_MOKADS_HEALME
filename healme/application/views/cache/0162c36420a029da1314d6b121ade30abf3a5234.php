

<?php $__env->startSection('title', 'Edit Users'); ?>

<?php $__env->startSection('page_title', 'Edit Users'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-12 col-md-8">
        <div class="card shadow">
            <form class="card-body" action="<?php echo e(base_url() . ADMINPATH); ?>/users/update/<?php echo e($data->id); ?>" method="POST">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" id="" class="form-control" placeholder="John Richard" value="<?php echo e($data->name); ?>" required>
                </div>
                <div class="form-group">
                    <label for="">Phone</label>
                    <input type="number" name="phone" id="" class="form-control" placeholder="085611611611" value="<?php echo e($data->phone); ?>" required>
                </div>
                <div class="form-group">
                    <label for="">Password (Options)</label>
                    <input type="text" name="password" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Role</label>
                    <select name="role" id="" class="form-control">
                        <?php $__currentLoopData = ['admin', 'user']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?= $item ?>" <?php echo e($data->role == $item ? 'selected' : ''); ?>><?= $item ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <hr>
                <div class="form-group">
                    <label for="">Bank Name</label>
                    <select name="bank_name" id="" class="form-control">
                        <?php $__currentLoopData = ['BCA', 'MANDIRI', 'BNI', 'BRI', 'DANAMON']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?= $item ?>" <?php echo e($data->bank_name == $item ? 'selected' : ''); ?>><?= $item ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Bank Number</label>
                    <input type="number" name="bank_number" id="" class="form-control" placeholder="987898378378" value="<?php echo e($data->bank_number); ?>" required>
                </div>
                <div class="form-group">
                    <label for="">Bank Username</label>
                    <input type="text" name="bank_username" id="" class="form-control" placeholder="John Richard" value="<?php echo e($data->bank_username); ?>" required>
                </div>
                <div class="form-group text-center">
                    <input type="submit" value="Ubah" class="btn btn-primary mt-2">
                </div>
            </form>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="card">
            <form action="<?php echo e(base_url() . ADMINPATH); ?>/users/token_bank" method="POST" class="card-body">
                <div class="form-group text-center">
                    <input type="hidden" name="id" value="<?php echo e($data->id); ?>">
                    <label for="">Token Reset Bank Information</label>
                    <h3><?php echo e($data->bank_token_reset); ?></h3>
                </div>
                <div class="form-group text-center">
                    <input type="submit" value="Dapatkan" class="btn btn-warning">
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/akhotel1/public_html/application/views/admin/users/edit.blade.php ENDPATH**/ ?>