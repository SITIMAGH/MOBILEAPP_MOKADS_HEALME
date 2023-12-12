

<?php $__env->startSection('title', 'Edit Dokter'); ?>

<?php $__env->startSection('page_title', 'Edit Dokter'); ?>

<?php $__env->startSection('content'); ?>
<div class="row justify-content-center">
    <div class="col-12 col-md-6">
        <div class="card shadow">
            <form class="card-body" action="<?php echo e(base_url()); ?>dokter/update/<?php echo e($data->id); ?>" enctype="multipart/form-data" method="POST">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" id="" class="form-control" placeholder="John Richard" value="<?php echo e($data->name); ?>" required>
                </div>
                <div class="form-group">
                    <label for="">Spesialis</label>
                    <input type="text" name="title" id="" class="form-control" placeholder="Dokter Gigi" value="<?php echo e($data->title); ?>" required>
                </div>
                <div class="form-group">
                    <label for="">Phone</label>
                    <input type="number" name="phone" id="" class="form-control" placeholder="085611611611" value="<?php echo e($data->phone); ?>" required>
                </div>
                <div class="form-group">
                    <label for="">Foto</label>
                    <input type="file" name="image" id="" class="form-control">
                    <br>
                    <img src="<?php echo e(base_url() . 'files/' . $data->image); ?>" width="100" alt="">
                </div>
                <div class="form-group">
                    <label for="">Umur</label>
                    <input type="number" name="age" id="" class="form-control" placeholder="22" value="<?php echo e($data->age); ?>" required>
                </div>
                <div class="form-group">
                    <label for="">Harga</label>
                    <input type="number" name="price" id="" class="form-control" placeholder="200000" value="<?php echo e($data->price); ?>" required>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="text" name="password" id="" class="form-control">
                </div>
                <div class="form-group text-center">
                    <input type="submit" value="Simpan" class="btn btn-primary mt-2">
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\newxampp2\htdocs\healme\application\views/dokter/edit.blade.php ENDPATH**/ ?>