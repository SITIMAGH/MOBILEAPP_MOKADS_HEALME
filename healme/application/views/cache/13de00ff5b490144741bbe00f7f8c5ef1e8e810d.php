

<?php $__env->startSection('title', 'History Transaction'); ?>

<?php $__env->startSection('header'); ?>
<style>
    .nav-pills .nav-link.active,
    .nav-pills .nav-link.active:hover,
    .nav-pills .show>.nav-link {
        color: #fff !important;
        background-color: #ffc107 !important;
    }

    .nav-pills .nav-link {
        color: #000000 !important;
    }

    .nav-pills .nav-link:hover {
        color: #ca9b0d !important;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-12">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item w-50" role="presentation">
                <a class="nav-link text-center active" id="buy-tab" data-toggle="pill" href="#buy" role="tab"
                    aria-controls="buy" aria-selected="true">Buy</a>
            </li>
            <li class="nav-item w-50" role="presentation">
                <a class="nav-link text-center" id="sell-tab" data-toggle="pill" href="#sell" role="tab"
                    aria-controls="sell" aria-selected="false">Sell</a>
            </li>
        </ul>
        <div class="tab-content" id="buy-parent-tabContent">
            <div class="tab-pane fade show active" id="buy" role="tabpanel" aria-labelledby="buy-tab">
                
                <div class="row">
                    <div class="col-12">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item w-50" role="presentation">
                                <a class="nav-link text-center active" id="buy-proses-tab" data-toggle="pill"
                                    href="#buy-proses" role="tab" aria-controls="buy-proses"
                                    aria-selected="true">Processing</a>
                            </li>
                            <li class="nav-item w-50" role="presentation">
                                <a class="nav-link text-center" id="buy-selesai-tab" data-toggle="pill"
                                    href="#buy-selesai" role="tab" aria-controls="buy-selesai"
                                    aria-selected="false">Finish</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="buy-tabContent">
                            <div class="tab-pane fade show active" id="buy-proses" role="tabpanel"
                                aria-labelledby="buy-proses-tab">
                                <div class="row">
                                    <?php $__currentLoopData = $prosesBuy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    
                                    <div class="col-12 mb-3">
                                        <div class="card">
                                            <div class="card-header">
                                                <span style="font-size: .8rem;" class="d-block text-center">Rincian
                                                    Pembayaran Unit
                                                    <b>#<?php echo e(strtoupper($item->id)); ?></b></span>
                                            </div>
                                            <div class="card-body row">
                                                <div class="col-5 text-nowrap">
                                                    <span style="font-size: .8rem;"
                                                        class="d-block text-left">Unit</span>
                                                </div>
                                                <div class="col-7">
                                                    <span
                                                        style="font-size: .7rem; font-weight: bold; margin-top: -.5px;"
                                                        class="d-block text-left">: <?php echo e($item->productName); ?></span>
                                                </div>
                                                <div class="col-5 text-nowrap">
                                                    <span style="font-size: .8rem;"
                                                        class="d-block text-left">Harga</span>
                                                </div>
                                                <div class="col-7">
                                                    <span
                                                        style="font-size: .7rem; font-weight: bold; margin-top: -.5px;"
                                                        class="d-block text-left">: Rp <?php echo e(number_format(explode('-',
                                                        $item->nominal_minmax)[0])); ?></span>
                                                </div>
                                                <div class="col-5 text-nowrap">
                                                    <span style="font-size: .8rem;"
                                                        class="d-block text-left">Keuntungan</span>
                                                </div>
                                                <div class="col-7">
                                                    <span
                                                        style="font-size: .7rem; font-weight: bold; margin-top: -.5px;"
                                                        class="d-block text-left">: Rp <?php echo e(number_format(explode('-',
                                                        $item->nominal_minmax)[0] * explode('/',
                                                        $item->persen_per_day)[0] /100)); ?></span>
                                                </div>
                                                <div class="col-5 text-nowrap">
                                                    <span style="font-size: .8rem;" class="d-block text-left">Masa
                                                        Kontrak</span>
                                                </div>
                                                <div class="col-7">
                                                    <span
                                                        style="font-size: .7rem; font-weight: bold; margin-top: -.5px;"
                                                        class="d-block text-left">: <?php echo e(explode('/',
                                                        $item->persen_per_day)[1] . ' Hari/'
                                                        .
                                                        explode('/', $item->persen_per_day)[0] . '%'); ?></span>
                                                </div>
                                                <div class="col-5 text-nowrap">
                                                    <span style="font-size: .8rem;" class="d-block text-left">Kontak
                                                        Penjual</span>
                                                </div>
                                                <div class="col-7">
                                                    <span
                                                        style="font-size: .7rem; font-weight: bold; margin-top: -.5px;"
                                                        class="d-block text-left">: <?php echo e($item->fromPhone); ?></span>
                                                </div>
                                                <div class="col-5 text-nowrap">
                                                    <span style="font-size: .8rem;" class="d-block text-left">Nama
                                                        Rekening</span>
                                                </div>
                                                <div class="col-7" <span
                                                    style="font-size: .7rem; font-weight: bold; margin-top: -.5px;"
                                                    class="d-block text-left">: <?php echo e(explode(' - ', $item->bank)[0]); ?></span>
                                                </div>
                                                <div class="col-5 text-nowrap">
                                                    <span style="font-size: .8rem;" class="d-block text-left">No.
                                                        Rekening</span>
                                                </div>
                                                <div class="col-7">
                                                    <span
                                                        style="font-size: .7rem; font-weight: bold; margin-top: -.5px;"
                                                        class="d-block text-left">: <?php echo e(explode(' - ', $item->bank)[1]); ?></span>
                                                </div>
                                                <div class="col-5 text-nowrap">
                                                    <span style="font-size: .8rem;" class="d-block text-left">Bayar
                                                        Sebelum</span>
                                                </div>
                                                <div class="col-7">
                                                    <span
                                                        style="font-size: .7rem; font-weight: bold; margin-top: -.5px;"
                                                        class="d-block text-left">: <?php echo e(day_month_year_time_indonesia($item->payment_end)); ?></span>
                                                </div>
                                                
                                                <div class="col-12">
                                                    <hr>
                                                    <?php if($item->status == '0' && $item->payment_image != ''): ?>
                                                    
                                                    <div class="text-success text-center">Verifikasi
                                                    </div>
                                                    <?php else: ?>
                                                    <form action="<?php echo e(base_url()); ?>/transactionhistory/transfer"
                                                        method="POST" enctype="multipart/form-data"
                                                        class="form-group w-100 d-flex">
                                                        <input type="file" name="pay_img" accept="image/*" id=""
                                                            class="form-control" required>
                                                        <input type="hidden" name="id_trans" value="<?php echo e($item->id); ?>">
                                                        <input type="hidden" name="bank" value="<?php echo e($item->bank); ?>">
                                                        <button class="btn btn-warning ml-2"
                                                            type="submit">Bayar</button>
                                                    </form>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="buy-selesai" role="tabpanel"
                                aria-labelledby="buy-selesai-tab">
                                <div class="row">
                                    <?php $__currentLoopData = $selesaiBuy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    
                                    <div class="col-12 mb-3">
                                        <div class="card">
                                            <div class="card-header">
                                                <span style="font-size: .8rem;" class="d-block text-center">Rincian
                                                    Pembayaran Unit
                                                    <b>#<?php echo e(strtoupper($item->id)); ?></b></span>
                                            </div>
                                            <div class="card-body row">
                                                <div class="col-5 text-nowrap">
                                                    <span style="font-size: .8rem;"
                                                        class="d-block text-left">Unit</span>
                                                </div>
                                                <div class="col-7">
                                                    <span
                                                        style="font-size: .7rem; font-weight: bold; margin-top: -.5px;"
                                                        class="d-block text-left">: <?php echo e($item->productName); ?></span>
                                                </div>
                                                <div class="col-5 text-nowrap">
                                                    <span style="font-size: .8rem;"
                                                        class="d-block text-left">Harga</span>
                                                </div>
                                                <div class="col-7">
                                                    <span
                                                        style="font-size: .7rem; font-weight: bold; margin-top: -.5px;"
                                                        class="d-block text-left">: Rp <?php echo e(number_format(explode('-',
                                                        $item->nominal_minmax)[0])); ?></span>
                                                </div>
                                                <div class="col-5 text-nowrap">
                                                    <span style="font-size: .8rem;"
                                                        class="d-block text-left">Keuntungan</span>
                                                </div>
                                                <div class="col-7">
                                                    <span
                                                        style="font-size: .7rem; font-weight: bold; margin-top: -.5px;"
                                                        class="d-block text-left">: Rp <?php echo e(number_format(explode('-',
                                                        $item->nominal_minmax)[0] * explode('/',
                                                        $item->persen_per_day)[0] /100)); ?></span>
                                                </div>
                                                <div class="col-5 text-nowrap">
                                                    <span style="font-size: .8rem;" class="d-block text-left">Masa
                                                        Kontrak</span>
                                                </div>
                                                <div class="col-7">
                                                    <span
                                                        style="font-size: .7rem; font-weight: bold; margin-top: -.5px;"
                                                        class="d-block text-left">: <?php echo e(explode('/',
                                                        $item->persen_per_day)[1] . ' Hari/'
                                                        .
                                                        explode('/', $item->persen_per_day)[0] . '%'); ?></span>
                                                </div>
                                                <div class="col-5 text-nowrap">
                                                    <span style="font-size: .8rem;" class="d-block text-left">Kontak
                                                        Penjual</span>
                                                </div>
                                                <div class="col-7">
                                                    <span
                                                        style="font-size: .7rem; font-weight: bold; margin-top: -.5px;"
                                                        class="d-block text-left">: <?php echo e($item->fromPhone); ?></span>
                                                </div>
                                                <div class="col-5 text-nowrap">
                                                    <span style="font-size: .8rem;" class="d-block text-left">Nama
                                                        Rekening</span>
                                                </div>
                                                <div class="col-7" <span
                                                    style="font-size: .7rem; font-weight: bold; margin-top: -.5px;"
                                                    class="d-block text-left">: <?php echo e(explode(' - ', $item->bank)[0]); ?></span>
                                                </div>
                                                <div class="col-5 text-nowrap">
                                                    <span style="font-size: .8rem;" class="d-block text-left">No.
                                                        Rekening</span>
                                                </div>
                                                <div class="col-7">
                                                    <span
                                                        style="font-size: .7rem; font-weight: bold; margin-top: -.5px;"
                                                        class="d-block text-left">: <?php echo e(explode(' - ', $item->bank)[1]); ?></span>
                                                </div>
                                                <div class="col-5 text-nowrap">
                                                    <span style="font-size: .8rem;" class="d-block text-left">Tgl.
                                                        Pembayaran</span>
                                                </div>
                                                <div class="col-7">
                                                    <span
                                                        style="font-size: .7rem; font-weight: bold; margin-top: -.5px;"
                                                        class="d-block text-left">: <?php echo e(day_month_year_time_indonesia($item->payment_date)); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="tab-pane fade" id="sell" role="tabpanel" aria-labelledby="sell-tab">
                
                <div class="row">
                    <div class="col-12">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item active" style="width: calc(100%/3);" role="presentation">
                                <a class="nav-link text-center active" id="sale-product-tab" data-toggle="pill"
                                    href="#sale-product" role="tab" aria-controls="sale-product"
                                    aria-selected="true">Unit</a>
                            </li>
                            <li class="nav-item" style="width: calc(100%/3);" role="presentation">
                                <a class="nav-link text-center" id="sale-proses-tab" data-toggle="pill"
                                    href="#sale-proses" role="tab" aria-controls="sale-proses"
                                    aria-selected="false">Processing</a>
                            </li>
                            <li class="nav-item" style="width: calc(100%/3);" role="presentation">
                                <a class="nav-link text-center" id="sale-selesai-tab" data-toggle="pill"
                                    href="#sale-selesai" role="tab" aria-controls="sale-selesai"
                                    aria-selected="false">Finish</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="sale-tabContent">
                            <div class="tab-pane fade show active" id="sale-product" role="tabpanel"
                                aria-labelledby="sale-product-tab">
                                <div class="row">
                                    <?php $__currentLoopData = $productSale; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-12 mb-3">
                                        <div class="card product">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h6 class="text-truncate text-center"
                                                            style="margin: -.7rem auto;"
                                                            title="<?php echo e(strtoupper($item->name)); ?>"><?php echo e(strtoupper($item->name)); ?></h6>
                                                        <hr>
                                                    </div>
                                                    
                                                    <div class="col-12">
                                                        
                                                        <div class="product-rule d-flex justify-content-center"
                                                            style="font-size: 16px;">
                                                            <i class="bi bi-cash-stack mr-2"></i>
                                                            <span>Rp <?php echo e(number_format(explode('-',
                                                                $item->nominal_minmax)[0])); ?></span>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer text-center bg-warning">
                                                
                                                <h6><?php echo e($item->display_at); ?></h6>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="sale-proses" role="tabpanel"
                                aria-labelledby="sale-proses-tab">
                                <div class="row">
                                    <?php $__currentLoopData = $prosesSale; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    
                                    <div class="col-12 mb-3">
                                        <div class="card">
                                            <div class="card-header">
                                                <span style="font-size: .8rem;" class="d-block text-center">Rincian
                                                    Pembayaran Unit
                                                    <b>#<?php echo e(strtoupper($item->id)); ?></b></span>
                                            </div>
                                            <div class="card-body row">
                                                <div class="col-5 text-nowrap">
                                                    <span style="font-size: .8rem;"
                                                        class="d-block text-left">Unit</span>
                                                </div>
                                                <div class="col-7">
                                                    <span
                                                        style="font-size: .7rem; font-weight: bold; margin-top: -.5px;"
                                                        class="d-block text-left">: <?php echo e($item->productName); ?></span>
                                                </div>
                                                <div class="col-5 text-nowrap">
                                                    <span style="font-size: .8rem;"
                                                        class="d-block text-left">Harga</span>
                                                </div>
                                                <div class="col-7">
                                                    <span
                                                        style="font-size: .7rem; font-weight: bold; margin-top: -.5px;"
                                                        class="d-block text-left">: Rp <?php echo e(number_format(explode('-',
                                                        $item->nominal_minmax)[0])); ?></span>
                                                </div>
                                                <div class="col-5 text-nowrap">
                                                    <span style="font-size: .8rem;"
                                                        class="d-block text-left">Keuntungan</span>
                                                </div>
                                                <div class="col-7">
                                                    <span
                                                        style="font-size: .7rem; font-weight: bold; margin-top: -.5px;"
                                                        class="d-block text-left">: Rp <?php echo e(number_format(explode('-',
                                                        $item->nominal_minmax)[0] * explode('/',
                                                        $item->persen_per_day)[0] /100)); ?></span>
                                                </div>
                                                <div class="col-5 text-nowrap">
                                                    <span style="font-size: .8rem;" class="d-block text-left">Masa
                                                        Kontrak</span>
                                                </div>
                                                <div class="col-7">
                                                    <span
                                                        style="font-size: .7rem; font-weight: bold; margin-top: -.5px;"
                                                        class="d-block text-left">: <?php echo e(explode('/',
                                                        $item->persen_per_day)[1] . ' Hari/'
                                                        .
                                                        explode('/', $item->persen_per_day)[0] . '%'); ?></span>
                                                </div>
                                                <div class="col-5 text-nowrap">
                                                    <span style="font-size: .8rem;" class="d-block text-left">Kontak
                                                        Pembeli</span>
                                                </div>
                                                <div class="col-7">
                                                    <span
                                                        style="font-size: .7rem; font-weight: bold; margin-top: -.5px;"
                                                        class="d-block text-left">: <?php echo e($item->phone); ?></span>
                                                </div>
                                                <div class="col-5 text-nowrap">
                                                    <span style="font-size: .8rem;" class="d-block text-left">Nama
                                                        Pembeli</span>
                                                </div>
                                                <div class="col-7" <span
                                                    style="font-size: .7rem; font-weight: bold; margin-top: -.5px;"
                                                    class="d-block text-left">: <?php echo e($item->userName); ?></span>
                                                </div>
                                                <div class="col-5 text-nowrap">
                                                    <span style="font-size: .8rem;" class="d-block text-left">Tgl.
                                                        Pembayaran</span>
                                                </div>
                                                <div class="col-7">
                                                    <span
                                                        style="font-size: .7rem; font-weight: bold; margin-top: -.5px;"
                                                        class="d-block text-left">: <?php echo e($item->payment_end == '0000-00-00
                                                        00:00:00' ? '-'
                                                        : day_month_year_time_indonesia($item->payment_end)); ?></span>
                                                </div>
                                                <?php if($item->status == '0' && $item->payment_image != ''): ?>
                                                <div class="col-12">
                                                    <hr>
                                                    <a href="<?php echo e(base_url()); ?>transactionhistory/payview/<?php echo e($item->id); ?>"
                                                        class="btn btn-warning w-100">Lihat Bukti Transfer</a>
                                                </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="sale-selesai" role="tabpanel"
                                aria-labelledby="sale-selesai-tab">
                                <div class="row">
                                    <?php $__currentLoopData = $selesaiSale; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    
                                    <div class="col-12 mb-3">
                                        <div class="card">
                                            <div class="card-header">
                                                <span style="font-size: .8rem;" class="d-block text-center">Rincian
                                                    Pembayaran Unit
                                                    <b>#<?php echo e(strtoupper($item->id)); ?></b></span>
                                            </div>
                                            <div class="card-body row">
                                                <div class="col-5 text-nowrap">
                                                    <span style="font-size: .8rem;"
                                                        class="d-block text-left">Unit</span>
                                                </div>
                                                <div class="col-7">
                                                    <span
                                                        style="font-size: .7rem; font-weight: bold; margin-top: -.5px;"
                                                        class="d-block text-left">: <?php echo e($item->productName); ?></span>
                                                </div>
                                                <div class="col-5 text-nowrap">
                                                    <span style="font-size: .8rem;"
                                                        class="d-block text-left">Harga</span>
                                                </div>
                                                <div class="col-7">
                                                    <span
                                                        style="font-size: .7rem; font-weight: bold; margin-top: -.5px;"
                                                        class="d-block text-left">: Rp <?php echo e(number_format(explode('-',
                                                        $item->nominal_minmax)[0])); ?></span>
                                                </div>
                                                <div class="col-5 text-nowrap">
                                                    <span style="font-size: .8rem;"
                                                        class="d-block text-left">Keuntungan</span>
                                                </div>
                                                <div class="col-7">
                                                    <span
                                                        style="font-size: .7rem; font-weight: bold; margin-top: -.5px;"
                                                        class="d-block text-left">: Rp <?php echo e(number_format(explode('-',
                                                        $item->nominal_minmax)[0] * explode('/',
                                                        $item->persen_per_day)[0] /100)); ?></span>
                                                </div>
                                                <div class="col-5 text-nowrap">
                                                    <span style="font-size: .8rem;" class="d-block text-left">Masa
                                                        Kontrak</span>
                                                </div>
                                                <div class="col-7">
                                                    <span
                                                        style="font-size: .7rem; font-weight: bold; margin-top: -.5px;"
                                                        class="d-block text-left">: <?php echo e(explode('/',
                                                        $item->persen_per_day)[1] . ' Hari/'
                                                        .
                                                        explode('/', $item->persen_per_day)[0] . '%'); ?></span>
                                                </div>
                                                <div class="col-5 text-nowrap">
                                                    <span style="font-size: .8rem;" class="d-block text-left">Kontak
                                                        Pembeli</span>
                                                </div>
                                                <div class="col-7">
                                                    <span
                                                        style="font-size: .7rem; font-weight: bold; margin-top: -.5px;"
                                                        class="d-block text-left">: <?php echo e($item->phone); ?></span>
                                                </div>
                                                <div class="col-5 text-nowrap">
                                                    <span style="font-size: .8rem;" class="d-block text-left">Nama
                                                        Pembeli</span>
                                                </div>
                                                <div class="col-7" <span
                                                    style="font-size: .7rem; font-weight: bold; margin-top: -.5px;"
                                                    class="d-block text-left">: <?php echo e($item->userName); ?></span>
                                                </div>
                                                <div class="col-5 text-nowrap">
                                                    <span style="font-size: .8rem;" class="d-block text-left">Tgl.
                                                        Pembayaran</span>
                                                </div>
                                                <div class="col-7">
                                                    <span
                                                        style="font-size: .7rem; font-weight: bold; margin-top: -.5px;"
                                                        class="d-block text-left">: <?php echo e(day_month_year_time_indonesia($item->payment_date)); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="modalPembayaran" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="modalPembayaranLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form action="<?php echo e(base_url()); ?>/transactionhistory/transfer" method="POST" enctype="multipart/form-data"
            class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalPembayaranLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" name="id_trans">
                    <input type="hidden" name="bank">
                    <div class="text-center">
                        <h5 id="bank_display"></h5>
                    </div>
                    
                </div>
                <div class="form-group">
                    <label for="">Bukti Transfer</label>
                    <input type="file" accept="image/*" name="pay_img" id="" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-warning" value="Upload">
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<script>
    function onPay(id, bank){
        $('input[name=id_trans]').val(id);
        $('input[name=bank]').val(bank);
        $('#bank_display').text(bank);
        $('#modalPembayaranLabel').text('#' + id);
        $('#modalPembayaran').modal({
        backdrop: 'static'
    });
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\newxampp2\htdocs\ponselkita\application\views/transaction_history.blade.php ENDPATH**/ ?>