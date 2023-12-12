

<?php $__env->startSection('title', 'Admin Transfer'); ?>

<?php $__env->startSection('page_title', 'Admin Transfer'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover text-center" id="datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Nominal</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sts = ['0' => 'Proses-warning', '1' => 'Sukses-success', '-1' => 'Gagal-danger'];
                            ?>
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($i+1); ?></td>
                                <td><?php echo e($item->from); ?></td>
                                <td><?php echo e($item->to); ?></td>
                                <td><?php echo e('Rp ' . number_format($item->nominal)); ?></td>
                                <td><span class="badge badge-<?php echo e(explode('-', $sts[$item->status])[1]); ?>"><?php echo e(explode('-',
                                        $sts[$item->status])[0]); ?></span></td>
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

<?php $__env->startSection('footer'); ?>
<script>
    function openPaymentImage(img){
            $('#img-payment').attr('src', img);
        }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\newxampp2\htdocs\moneygame\application\views/admin/payment/admin_transfer.blade.php ENDPATH**/ ?>