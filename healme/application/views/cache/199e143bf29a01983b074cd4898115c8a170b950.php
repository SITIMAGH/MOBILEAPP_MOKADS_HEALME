

<?php $__env->startSection('title', 'Refferal Member'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-12">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" style="width: calc(100%/3); font-size: 12px;" role="presentation">
                <a class="nav-link text-center active" id="member1-tab" data-toggle="pill" href="#member1" role="tab"
                    aria-controls="member1" aria-selected="true">Level 1<span class="font-weight-bold">(<?php echo e(count($data_1)); ?>)</span> </a>
            </li>
            <li class="nav-item" style="width: calc(100%/3); font-size: 12px;" role="presentation">
                <a class="nav-link text-center" id="member2-tab" data-toggle="pill" href="#member2" role="tab"
                    aria-controls="member2" aria-selected="false">Level 2<span class="font-weight-bold">(<?php echo e(count($data_2)); ?>)</span></a>
            </li>
            <li class="nav-item" style="width: calc(100%/3); font-size: 12px; " role="presentation">
                <a class="nav-link text-center" id="member3-tab" data-toggle="pill" href="#member3" role="tab"
                    aria-controls="member3" aria-selected="false">Level 3<span class="font-weight-bold">(<?php echo e(count($data_3)); ?>)</span></a>
            </li>
        </ul>
        <div class="tab-content" id="buy-tabContent">
            <div class="tab-pane fade show active" id="member1" role="tabpanel" aria-labelledby="member1-tab">
                <div class="row">
                    <?php $__currentLoopData = $data_1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-12 mb-3">
                        <div class="card">
                            <div class="card-body p-2 text-center">
                                <h6 style="font-size: 14px;"><?php echo e($item->name); ?></h6>
                                <h6 style="font-weight: normal; font-size: 12px;">(<?php echo e($item->phone); ?>)</h6>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="tab-pane fade" id="member2" role="tabpanel" aria-labelledby="member2-tab">
                <div class="row">
                    <?php $__currentLoopData = $data_2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-12 mb-3">
                        <div class="card">
                            <div class="card-body p-2 text-center">
                                <h6 style="font-size: 14px;"><?php echo e($item->name); ?></h6>
                                <h6 style="font-weight: normal; font-size: 12px;">(<?php echo e($item->phone); ?>)</h6>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="tab-pane fade" id="member3" role="tabpanel" aria-labelledby="member3-tab">
                <div class="row">
                    <?php $__currentLoopData = $data_3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-12 mb-3">
                        <div class="card">
                            <div class="card-body p-2 text-center">
                                <h6 style="font-size: 14px;"><?php echo e($item->name); ?></h6>
                                <h6 style="font-weight: normal; font-size: 12px;">(<?php echo e($item->phone); ?>)</h6>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/akhotel1/public_html/application/views/member.blade.php ENDPATH**/ ?>