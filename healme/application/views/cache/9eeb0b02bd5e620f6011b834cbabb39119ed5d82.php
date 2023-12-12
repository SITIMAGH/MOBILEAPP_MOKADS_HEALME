

<?php $__env->startSection('title', 'Bonus Redeem'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-12 mb-4">
        <div>
            
                <div class="col-12 mb-4">
        <div class="card text-decoration-none text-dark">
            <div class="card-header text-center">BONUS : <?php echo e(number_format($user->refferal_bonus)); ?></div>

        </div>
    </div>
    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    
    <?php if($item->statusOrder == null || $item->buyProduct == null): ?>
    <div class="col-12 mb-3">
        <div class="card product">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <img src="<?php echo e(base_url()); ?>files/products/<?php echo e($item->image); ?>" class="card-img-top img-fluid"
                            alt="<?php echo e($item->name); ?>">
                        <input type="hidden" id="start_time-<?php echo e($item->id); ?>"
                            value="<?php echo e(explode('-', $item->time_sale)[0]); ?>">
                        <input type="hidden" id="end_time-<?php echo e($item->id); ?>"
                            value="<?php echo e(explode('-', $item->time_sale)[1]); ?>">
                        <input type="hidden" id="fee_booking-<?php echo e($item->id); ?>"
                            value="<?php echo e(explode('/', $item->nominal_charge)[0]); ?>">
                        <input type="hidden" id="fee_buy-<?php echo e($item->id); ?>"
                            value="<?php echo e(explode('/', $item->nominal_charge)[1]); ?>">
                    </div>
                    <div class="col-6 text-center">
                        <h6 class="text-truncate" title="<?php echo e(strtoupper($item->name)); ?>"><?php echo e(strtoupper($item->name)); ?></h6>
                        <?php if($item->buyToday < $item->max_buy_day): ?>
                            <button class="btn btn-sm btn-success btn-curve w-100 mt-2"
                                id="<?php echo e('btn-buy-' . $item->id); ?>" onclick="onBuy('<?php echo e($item->id); ?>')">Beli</button>
                            <?php else: ?>
                            <button class="btn btn-sm btn-secondary btn-curve w-100 mt-2">Limit</button>
                            <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-6">
                        <div class="product-rule">
                            <i class="bi bi-coin"></i>
                            <span><?php echo e(number_format($item->poin)); ?></span>
                        </div>
                        <div class="product-rule">
                            <i class="bi bi-cash-stack"></i>
                            <span><?php echo e(number_format(explode('-', $item->nominal_minmax)[0])); ?></span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="product-rule">
                            <i class="bi bi-graph-up-arrow"></i>
                            <span><?php echo e(explode('/', $item->persen_per_day)[0] . '%'); ?></span>
                        </div>
                        <div class="product-rule">
                            <i class="bi bi-bookmark"></i>
                            <span><?php echo e(number_format(explode('/', $item->nominal_charge)[1])); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<script>
    function onBuy(id){
        const formData = new FormData();
        formData.append('product_id', id);
        formData.append('fee', $('#fee_buy-' + id).val());

        axios.post('<?php echo e(base_url()); ?>bonusredeem/buy', formData)
        .then(res => {
            // alert(JSON.stringify(res.data));
            if(res.data.status == 200){
                Swal.fire({
                    icon: 'success',
                    title: res.data.msg,
                    showConfirmButton: false,
                    timer: 1500
                }).then((result) => {
                    window.location = `<?php echo e(base_url()); ?>transactionhistory/buy`;
                })
            }else{
                // Swal.fire({
                //     icon: 'error',
                //     title: res.data.msg,
                //     showConfirmButton: false,
                //     timer: 1500
                // })
                Swal.fire({
                    icon: 'error',
                    html: res.data.msg,
                })
            }
        })
        .catch(err => {
            alert(JSON.stringify(err));
        });
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/akhotel1/public_html/application/views/bonus_redeem.blade.php ENDPATH**/ ?>