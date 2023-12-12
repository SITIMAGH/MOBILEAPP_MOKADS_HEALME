

<?php $__env->startSection('title', 'Add Dokter'); ?>

<?php $__env->startSection('page_title', 'Add dokter'); ?>

<?php $__env->startSection('content'); ?>
<div class="row justify-content-center">
    <div class="col-12 col-md-6">
        <div class="card shadow">
            <form class="card-body" action="<?php echo e(base_url()); ?>dokter/store" enctype="multipart/form-data" method="POST">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" id="" class="form-control" placeholder="John Richard" required>
                </div>
                <div class="form-group">
                    <label for="">Spesialis</label>
                    <input type="text" name="title" id="" class="form-control" placeholder="Dokter Gigi" required>
                </div>
                <div class="form-group">
                    <label for="">Phone</label>
                    <input type="number" name="phone" id="" class="form-control" placeholder="085611611611" required>
                </div>
                <div class="form-group">
                    <label for="">Foto</label>
                    <input type="file" name="image" id="" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Umur</label>
                    <input type="number" name="age" id="" class="form-control" placeholder="22" required>
                </div>
                <div class="form-group">
                    <label for="">Harga</label>
                    <input type="number" name="price" id="" class="form-control" placeholder="200000" required>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="text" name="password" id="" class="form-control" required>
                </div>
                <div class="form-group text-center">
                    <input type="submit" value="Simpan" class="btn btn-primary mt-2">
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\healme\application\views/dokter/add.blade.php ENDPATH**/ ?>