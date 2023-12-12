

<?php $__env->startSection('title', 'Information'); ?>

<?php $__env->startSection('page_title', 'Information'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header">
                <a href="<?php echo e(base_url() . ADMINPATH); ?>/information/add" class="btn btn-sm btn-primary shadow"><i class="fe fe-plus fe-16 mr-2"></i> Add Data</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover text-center text-nowrap" id="datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Display</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($i+1); ?></td>
                                <td><img src="<?php echo e(base_url()); ?>files/info/<?php echo e($item->image); ?>" alt="" width="100"></td>
                                <td><?php echo e($item->title); ?></td>
                                <td><a href="<?php echo e($item->display == '1' ? 'javascript:void(0)' : base_url() . ADMINPATH . '/information/display/' . $item->id); ?>" class="btn btn-sm btn-<?php echo e($item->display == '1' ? 'success' : 'danger'); ?>"><i class="fe fe-eye fe-16"></i></a></td>
                                <td>
                                    <a href="<?php echo e(base_url() . ADMINPATH); ?>/information/edit/<?php echo e($item->id); ?>" class="btn btn-sm btn-info"><i class="fe fe-edit fe-16"></i></a>
                                    <a onclick="return confirm('Apakah anda ingin menghapus data ini?')" href="<?php echo e(base_url() . ADMINPATH); ?>/information/delete/<?php echo e($item->id); ?>" class="btn btn-sm btn-danger"><i class="fe fe-trash fe-16"></i></a>
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
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/akhotel1/public_html/application/views/admin/information/index.blade.php ENDPATH**/ ?>