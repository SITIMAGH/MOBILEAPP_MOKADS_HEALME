

<?php $__env->startSection('title', 'Add Products'); ?>

<?php $__env->startSection('page_title', 'Add Products'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <form class="card-body" action="<?php echo e(base_url()); ?>admin/products/store" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="form-group col-12 col-md-6">
                        <label for="">Name</label>
                        <input type="text" name="name" id="" class="form-control" placeholder="Honda" required>
                    </div>
                    <div class="form-group col-12 col-md-6">
                        <label for="">Image</label>
                        <input type="file" name="image" id="" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12 col-md-6">
                        <label for="">Start Time</label>
                        <input type="time" name="start_time" id="" class="form-control" required>
                    </div>
                    <div class="form-group col-12 col-md-6">
                        <label for="">End Time</label>
                        <input type="time" name="end_time" id="" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12 col-md-6">
                        <label for="">Nominal Minimal</label>
                        <input type="number" name="nominal_min" id="" class="form-control" placeholder="1000" required>
                    </div>
                    <div class="form-group col-12 col-md-6">
                        <label for="">Nominal Maximal</label>
                        <input type="number" name="nominal_max" id="" class="form-control" placeholder="2000" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12 col-md-6">
                        <label for="">Persen</label>
                        <input type="number" name="persen" id="" class="form-control" placeholder="5" required>
                    </div>
                    <div class="form-group col-12 col-md-6">
                        <label for="">Day</label>
                        <input type="number" name="day" id="" class="form-control" placeholder="2" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12 col-md-6">
                        <label for="">Fee Booking</label>
                        <input type="number" name="fee_booking" id="" class="form-control" placeholder="1000" required>
                    </div>
                    <div class="form-group col-12 col-md-6">
                        <label for="">Fee Buy</label>
                        <input type="number" name="fee_buy" id="" class="form-control" placeholder="2000" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12 col-md-6">
                        <label for="">Max Redeem per Day</label>
                        <input type="number" name="max_buy_day" id="" class="form-control" placeholder="5" required>
                    </div>
                    <div class="form-group col-12 col-md-6">
                        <label for="">Poin</label>
                        <input type="number" name="poin" id="" class="form-control" placeholder="50" required>
                    </div>
                </div>
                <div class="form-group text-center">
                    <input type="submit" value="Simpan" class="btn btn-primary mt-2">
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\newxampp2\htdocs\moneygame\application\views/admin/products/add.blade.php ENDPATH**/ ?>