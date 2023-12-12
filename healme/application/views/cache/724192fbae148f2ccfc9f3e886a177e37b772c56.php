

<?php $__env->startSection('title', 'Add Users'); ?>

<?php $__env->startSection('page_title', 'Add Users'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <form class="card-body" action="<?php echo e(base_url() . ADMINPATH); ?>/users/store" method="POST">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" id="" class="form-control" placeholder="John Richard" required>
                </div>
                <div class="form-group">
                    <label for="">Phone</label>
                    <input type="number" name="phone" id="" class="form-control" placeholder="085611611611" required>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="text" name="password" id="" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Role</label>
                    <select name="role" id="" class="form-control">
                        <?php $__currentLoopData = ['admin', 'user']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?= $item ?>"><?= $item ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <hr>
                <div class="form-group">
                    <label for="">Bank Name</label>
                    <select name="bank_name" id="" class="form-control">
                        <?php $__currentLoopData = ['BCA', 'MANDIRI', 'BNI', 'BRI', 'DANAMON']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?= $item ?>"><?= $item ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Bank Number</label>
                    <input type="number" name="bank_number" id="" class="form-control" placeholder="987898378378" required>
                </div>
                <div class="form-group">
                    <label for="">Bank Username</label>
                    <input type="text" name="bank_username" id="" class="form-control" placeholder="John Richard" required>
                </div>
                <div class="form-group text-center">
                    <input type="submit" value="Simpan" class="btn btn-primary mt-2">
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/akhotel1/public_html/application/views/admin/users/add.blade.php ENDPATH**/ ?>