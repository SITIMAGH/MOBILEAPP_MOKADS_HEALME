

<?php $__env->startSection('title', 'Products'); ?>

<?php $__env->startSection('page_title', 'Products'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header">
                <a href="<?php echo e(base_url() . ADMINPATH); ?>/products/add" class="btn btn-sm btn-primary shadow"><i class="fe fe-plus fe-16 mr-2"></i> Add Data</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover text-center text-nowrap" id="datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User Name</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Time Of Sale</th>
                                <th>Min-Max Nominal</th>
                                <th>Poin</th>
                                <th>Persen Per Day</th>
                                <th>Nominal Charge</th>
                                <th>Max Redeem per Day</th>
                                <th>Statistik</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($i+1); ?></td>
                                <td><?php echo e($item->userName); ?></td>
                                <td><?php echo e($item->name); ?></td>
                                <td><img src="<?php echo e(base_url() . 'files/products/' . $item->image); ?>" alt="" width="100"></td>
                                <td><?php echo e($item->time_sale); ?></td>
                                <td><?php echo e('Rp ' . number_format(explode('-', $item->nominal_minmax)[0]) . '-Rp ' . number_format(explode('-', $item->nominal_minmax)[1])); ?></td>
                                <td><?php echo e(number_format($item->poin)); ?></td>
                                <td><?php echo e(explode('/', $item->persen_per_day)[0] . '%/' . explode('/', $item->persen_per_day)[1] . ' day'); ?></td>
                                <td><?php echo e('Rp ' . number_format(explode('/', $item->nominal_charge)[0]) . '/Rp ' . number_format(explode('/', $item->nominal_charge)[1])); ?></td>
                                <td><?php echo e(number_format($item->max_buy_day)); ?> Unit</td>
                                <td><?php echo $item->statistik_booking == '0' ? '<span class="badge badge-danger">' . number_format($item->statistik_booking) . ' Booking</span>' : '<span class="badge badge-success">' . number_format($item->statistik_booking) . ' Booking</span>'; ?></td>
                                <td>
                                    <a href="<?php echo e(base_url() . ADMINPATH); ?>/products/edit/<?php echo e($item->id); ?>" class="btn btn-sm btn-info"><i class="fe fe-edit fe-16"></i></a>
                                    <a onclick="return confirm('Apakah anda ingin menghapus data ini?')" href="<?php echo e(base_url() . ADMINPATH); ?>/products/delete/<?php echo e($item->id); ?>" class="btn btn-sm btn-danger"><i class="fe fe-trash fe-16"></i></a>
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
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\newxampp2\htdocs\moneygame\application\views/admin/products/index.blade.php ENDPATH**/ ?>