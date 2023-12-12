

<?php $__env->startSection('title', 'Sliders'); ?>

<?php $__env->startSection('page_title', 'Sliders'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header">
                <a href="<?php echo e(base_url() . ADMINPATH); ?>/popup/add" class="btn btn-sm btn-primary shadow"><i
                        class="fe fe-plus fe-16 mr-2"></i> Add Data</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover text-center text-nowrap" id="datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr
                                style="background-color: <?php echo e($item->status == '1' ? 'rgba(0, 255, 115, 0.1);' : 'rgba(0, 0, 0, 0);'); ?>">
                                <td><?php echo e($i+1); ?></td>
                                <td><img src="<?php echo e(base_url()); ?>files/popup/<?php echo e($item->image); ?>" alt="" height="100"></td>
                                <td>
                                    <?php if($item->status == '0'): ?>
                                    <a href="<?php echo e(base_url() . ADMINPATH); ?>/popup/active/<?php echo e($item->id); ?>"
                                        class="btn btn-sm btn-success"><i class="fe fe-check fe-16"></i></a>
                                    <?php endif; ?>
                                    <a href="<?php echo e(base_url() . ADMINPATH); ?>/popup/edit/<?php echo e($item->id); ?>"
                                        class="btn btn-sm btn-info"><i class="fe fe-edit fe-16"></i></a>
                                    <a onclick="return confirm('Apakah anda ingin menghapus data ini?')"
                                        href="<?php echo e(base_url() . ADMINPATH); ?>/popup/delete/<?php echo e($item->id); ?>"
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
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\newxampp2\htdocs\ponselkita\application\views/admin/popup/index.blade.php ENDPATH**/ ?>