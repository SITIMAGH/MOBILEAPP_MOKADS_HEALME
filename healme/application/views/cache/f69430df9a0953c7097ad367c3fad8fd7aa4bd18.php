

<?php $__env->startSection('title', 'Transaction #' . $data->id); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="text-center font-weight-bold">#<?php echo e($data->id); ?></div>
    </div>
    <div class="col-6 mb-2">
        <span style="font-size: .8rem;" class="d-block text-left">Properti</span>
        <span style="font-size: .7rem; font-weight: bold; margin-top: -.5px;" class="d-block text-left"><?php echo e($data->productName); ?></span>
    </div>
    <div class="col-6 mb-2">
        <span style="font-size: .8rem;" class="d-block text-right">Harga</span>
        <span style="font-size: .7rem; font-weight: bold; margin-top: -.5px;" class="d-block text-right">Rp <?php echo e(number_format(explode('-',
            $data->nominal_minmax)[0])); ?></span>
    </div>
    <div class="col-6 mb-2">
        <span style="font-size: .8rem;" class="d-block text-left">Rincian Bonus</span>
        <span style="font-size: .7rem; font-weight: bold; margin-top: -.5px;" class="d-block text-left"><?php echo e(explode('/',
            $data->persen_per_day)[1] . ' Hari/' .
            explode('/', $data->persen_per_day)[0] . '%'); ?></span>
    </div>
    <div class="col-6 mb-2">
        <span style="font-size: .8rem;" class="d-block text-right">Profit</span>
        <span style="font-size: .7rem; font-weight: bold; margin-top: -.5px;" class="d-block text-right">Rp <?php echo e(number_format(explode('-',
            $data->nominal_minmax)[0] * explode('/', $data->persen_per_day)[0] /100)); ?></span>
    </div>
    <div class="col-6 mb-2">
        <span style="font-size: .8rem;" class="d-block text-left">Nama Pembeli</span>
        <span style="font-size: .7rem; font-weight: bold; margin-top: -.5px;"
            class="d-block text-left"><?php echo e($data->userName); ?></span>
    </div>
    <div class="col-6 mb-2">
        <span style="font-size: .8rem;" class="d-block text-right">Nomor Pembeli</span>
        <span style="font-size: .7rem; font-weight: bold; margin-top: -.5px;"
            class="d-block text-right"><?php echo e($data->phone); ?></span>
    </div>
    <div class="col-6 mb-2">
        <span style="font-size: .8rem;" class="d-block text-left">Tgl. Transaksi</span>
        <span style="font-size: .7rem; font-weight: bold; margin-top: -.5px;" class="d-block text-left"><?php echo e(day_month_year_time_indonesia($data->created_at)); ?></span>
    </div>
    <div class="col-6 mb-2">
        <span style="font-size: .8rem;" class="d-block text-right">Tgl. Pemabayaran</span>
        <span style="font-size: .7rem; font-weight: bold; margin-top: -.5px;" class="d-block text-right"><?php echo e($data->payment_end == '0000-00-00 00:00:00' ? '-' : day_month_year_time_indonesia($data->payment_end)); ?></span>
    </div>
    <div class="col-6 mb-2">
        <span style="font-size: .8rem;" class="d-block text-left">Nama Pemilik Bank</span>
        <span style="font-size: .7rem; font-weight: bold; margin-top: -.5px;" class="d-block text-left"><?php echo e(explode(' - ', $data->payment_bank)[0]); ?></span>
    </div>
    <div class="col-6 mb-2">
        <span style="font-size: .8rem;" class="d-block text-right">Bank</span>
        <span style="font-size: .7rem; font-weight: bold; margin-top: -.5px;" class="d-block text-right"><?php echo e(explode(' - ', $data->payment_bank)[1]); ?></span>
    </div>
    <div class="col-12 my-4">
        <div class="text-center font-weight-bold" style="font-size: .8rem;">==Bukti Transfer==</div>
        <img src="<?php echo e(base_url()); ?>files/tf_image/<?php echo e($data->payment_image); ?>" alt="" class="img-fluid w-100">
    </div>
    <div class="col-6 mb-2">
        <a href="<?php echo e(base_url()); ?>transactionhistory/payStatus/tolak/<?php echo e($data->id); ?>" class="btn btn-danger w-100">Tolak</a>
    </div>
    <div class="col-6 mb-2">
        <a href="<?php echo e(base_url()); ?>transactionhistory/payStatus/setuju/<?php echo e($data->id); ?>" class="btn btn-success w-100">Terima</a>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/akhotel1/public_html/application/views/payview.blade.php ENDPATH**/ ?>