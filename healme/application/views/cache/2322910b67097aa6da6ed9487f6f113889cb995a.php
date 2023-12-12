

<?php $__env->startSection('title', 'Promo'); ?>

<?php $__env->startSection('page_title', 'Promo'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header">
                <form action="<?php echo e(base_url()); ?>promo/store" method="POST" enctype="multipart/form-data"
                    class="row justify-content-center">
                    <div class="col-12 col-md-6 form-group d-flex">
                        <input type="file" name="image" id="" class="form-control mr-2" required>
                        <input type="submit" value="Simpan" class="btn btn-primary">
                    </div>
                </form>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover text-center" style="white-space: nowrap;"
                        id="datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Gambar</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($i+1); ?></td>
                                <td><img src="<?php echo e(base_url() . 'files/' . $item->image); ?>" width="150" alt=""></td>
                                <td>
                                    <a onclick="return confirm('Apakah anda ingin menghapus data ini?')"
                                        href="<?php echo e(base_url()); ?>promo/delete/<?php echo e($item->id); ?>"
                                        class="btn btn-sm btn-danger"><i class="fe fe-trash fe-16"></i></a>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\newxampp2\htdocs\healme\application\views/promo/index.blade.php ENDPATH**/ ?>