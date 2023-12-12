

<?php $__env->startSection('title', 'Balance History'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <?php
    $sts = ['0' => 'Pending-warning', '1' => 'Sukses-success', '-1' => 'Gagal-danger'];
    ?>
    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
    $type = explode(' ', $item->description)[0]
    ?>
    <div class="col-12 mb-3">
        <div class="card">
            <div class="card-header p-2">
                <h6 class="text-center" style="font-size: .8rem;"><?php echo e(ucwords($item->description)); ?></h6>
            </div>
            <div class="card-body p-2">
                <div class="d-flex justify-content-between align-items-center">
                    <div style="font-size: .7rem;">
                        <div class="d-flex">
                            
                            <?php if($item->user_id == get_instance()->session->userdata('login')->id): ?>
                            <div style="width: 70px;"><?php echo e($type == 'topup' ? 'Sumber' : 'Tujuan'); ?></div>
                            <div> : <?php echo e($item->to_id == '0' ? 'System' : $item->to); ?></div>
                            <?php else: ?>
                            <div style="width: 70px;">Sumber</div>
                            <div> : <?php echo e($item->from); ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="d-flex">
                            <div style="width: 70px;">Tgl. Transaksi</div>
                            <div> : <?php echo e(day_month_year_indonesia($item->created_at)); ?></div>
                        </div>
                        <div class="d-flex">
                            <div style="width: 70px;">Status</div>
                            <div> : <span class="badge badge-<?php echo e(explode('-', $sts[$item->status])[1]); ?>"><?php echo e(explode('-',
                                    $sts[$item->status])[0]); ?></span></div>
                        </div>
                    </div>
                    <div style="font-size: .7rem;">
                        <?php if($item->user_id == get_instance()->session->userdata('login')->id): ?>
                        <span class="text-<?php echo e($type == 'topup' ? 'success' : 'danger'); ?> font-weight-bold"><?php echo e($type == 'topup' ? '+' : '-'); ?>Rp <?php echo e(number_format($item->nominal)); ?></span>
                        <?php else: ?>
                        <span class="text-success font-weight-bold">+Rp <?php echo e(number_format($item->nominal)); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\newxampp2\htdocs\moneygame\application\views/balance_history.blade.php ENDPATH**/ ?>