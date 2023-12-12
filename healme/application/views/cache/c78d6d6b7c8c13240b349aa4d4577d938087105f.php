

<?php $__env->startSection('title', 'Bank Information'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <form action="<?php echo e(base_url()); ?>bankinformation/update" method="POST" class="col-12">
        <div class="form-group">
            <label for="">Jenis Bank</label>
            <select name="bank_name" id="" class="form-control" required>
                <?php $__currentLoopData = ['BNI', 'BRI', 'BCA', 'MANDIRI', 'DANAMON']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option <?php echo e($data->bank_name == $item ? 'selected' : ''); ?>><?php echo e($item); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="form-group">
            <label for="">Nomor Rekening</label>
            <input type="number" name="bank_number" id="" class="form-control" placeholder="19911911"
                value="<?php echo e($data->bank_number); ?>" required>
        </div>
        <div class="form-group">
            <label for="">Nama Pemilik</label>
            <input type="text" name="bank_username" id="" class="form-control" placeholder="Jhon"
                value="<?php echo e($data->bank_username); ?>" required>
        </div>
        <?php if($data->bank_number != null): ?>
        <div class="form-group">
            <label for="">Kode OTP</label>
            <input type="number" name="bank_token_reset" id="" class="form-control" placeholder="1234" required>
        </div>
        <?php endif; ?>
        <div class="form-group">
            <label for="">Pin Transaksi</label>
            <input type="number" name="pin" id="" class="form-control" placeholder="123" required>
        </div>
        <div class="form-group">
            <input type="submit" value="Update" class="btn btn-primary w-100 mt-3">
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/akhotel1/public_html/application/views/bank_information.blade.php ENDPATH**/ ?>