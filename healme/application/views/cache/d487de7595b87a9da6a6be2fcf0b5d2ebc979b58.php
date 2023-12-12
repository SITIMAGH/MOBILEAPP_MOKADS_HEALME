

<?php $__env->startSection('title', 'History Transaction'); ?>

<?php $__env->startSection('content'); ?>
<?php if($type == 'buy'): ?>
<div class="row">
    <div class="col-12">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item w-50" role="presentation">
                <a class="nav-link text-center active" id="buy-proses-tab" data-toggle="pill" href="#buy-proses"
                    role="tab" aria-controls="buy-proses" aria-selected="true">Proses</a>
            </li>
            <li class="nav-item w-50" role="presentation">
                <a class="nav-link text-center" id="buy-selesai-tab" data-toggle="pill" href="#buy-selesai" role="tab"
                    aria-controls="buy-selesai" aria-selected="false">Selesai</a>
            </li>
        </ul>
        <div class="tab-content" id="buy-tabContent">
            <div class="tab-pane fade show active" id="buy-proses" role="tabpanel" aria-labelledby="buy-proses-tab">
                <div class="row">
                    <?php $__currentLoopData = $proses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-12 mb-3">
                        <div class="card">
                            <div class="card-header">
                                <span style="font-size: .8rem;" class="d-block text-center">#<?php echo e(strtoupper($item->id)); ?></span>
                            </div>
                            <div class="card-body row">
                                <div class="col-6">
                                    <span style="font-size: .8rem;" class="d-block text-left">Properti</span>
                                    <span style="font-size: .7rem; font-weight: bold; margin-top: -.5px;"
                                        class="d-block text-left"><?php echo e($item->productName); ?></span>
                                </div>
                                <div class="col-6">
                                    <span style="font-size: .8rem;" class="d-block text-right">Harga</span>
                                    <span style="font-size: .7rem; font-weight: bold; margin-top: -.5px;"
                                        class="d-block text-right">Rp <?php echo e(number_format(explode('-',
                                        $item->nominal_minmax)[0])); ?></span>
                                </div>
                                <div class="col-6">
                                    <span style="font-size: .8rem;" class="d-block text-left">Rincian Bonus</span>
                                    <span style="font-size: .7rem; font-weight: bold; margin-top: -.5px;"
                                        class="d-block text-left"><?php echo e(explode('/', $item->persen_per_day)[1] . ' Hari/' .
                                        explode('/', $item->persen_per_day)[0] . '%'); ?></span>
                                </div>
                                <div class="col-6">
                                    <span style="font-size: .8rem;" class="d-block text-right">Profit</span>
                                    <span style="font-size: .7rem; font-weight: bold; margin-top: -.5px;"
                                        class="d-block text-right">Rp <?php echo e(number_format(explode('-',
                                        $item->nominal_minmax)[0] * explode('/', $item->persen_per_day)[0] /100)); ?></span>
                                </div>
                                <div class="col-6">
                                    <span style="font-size: .8rem;" class="d-block text-left">Nama Penjual</span>
                                    <span style="font-size: .7rem; font-weight: bold; margin-top: -.5px;"
                                        class="d-block text-left"><?php echo e($item->fromUsername); ?></span>
                                </div>
                                <div class="col-6">
                                    <span style="font-size: .8rem;" class="d-block text-right">Nomor Penjual</span>
                                    <span style="font-size: .7rem; font-weight: bold; margin-top: -.5px;"
                                        class="d-block text-right"><?php echo e($item->fromPhone); ?></span>
                                </div>
                                <div class="col-6">
                                    <span style="font-size: .8rem;" class="d-block text-left">Tgl. Transaksi</span>
                                    <span style="font-size: .7rem; font-weight: bold; margin-top: -.5px;"
                                        class="d-block text-left"><?php echo e(day_month_year_time_indonesia($item->created_at)); ?></span>
                                </div>
                                <div class="col-6">
                                    <span style="font-size: .8rem;" class="d-block text-right">Batas Pembayaran</span>
                                    <span style="font-size: .7rem; font-weight: bold; margin-top: -.5px;"
                                        class="d-block text-right"><?php echo e(day_month_year_time_indonesia($item->payment_end)); ?></span>
                                </div>
                                <div class="col-12">
                                    <hr>
                                    <?php if($item->status == '0' && $item->payment_image != ''): ?>
                                    <div class="text-success text-center">Proses Verifikasi Pembayaran</div>
                                    <?php else: ?>
                                    <button class="btn btn-primary w-100"
                                        onclick="onPay('<?php echo e($item->id); ?>', '<?php echo e($item->bank); ?>')">Bayar</button>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="tab-pane fade" id="buy-selesai" role="tabpanel" aria-labelledby="buy-selesai-tab">
                <div class="row">
                    <?php $__currentLoopData = $selesai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-12 mb-3">
                        <div class="card">
                            <div class="card-header">
                                <span style="font-size: .8rem;" class="d-block text-center">#<?php echo e(strtoupper($item->id)); ?></span>
                            </div>
                            <div class="card-body row">
                                <div class="col-6">
                                    <span style="font-size: .8rem;" class="d-block text-left">Properti</span>
                                    <span style="font-size: .7rem; font-weight: bold; margin-top: -.5px;"
                                        class="d-block text-left"><?php echo e($item->productName); ?></span>
                                </div>
                                <div class="col-6">
                                    <span style="font-size: .8rem;" class="d-block text-right">Harga</span>
                                    <span style="font-size: .7rem; font-weight: bold; margin-top: -.5px;"
                                        class="d-block text-right">Rp <?php echo e(number_format(explode('-',
                                        $item->nominal_minmax)[0])); ?></span>
                                </div>
                                <div class="col-6">
                                    <span style="font-size: .8rem;" class="d-block text-left">Rincian Bonus</span>
                                    <span style="font-size: .7rem; font-weight: bold; margin-top: -.5px;"
                                        class="d-block text-left"><?php echo e(explode('/', $item->persen_per_day)[1] . ' Hari/' .
                                        explode('/', $item->persen_per_day)[0] . '%'); ?></span>
                                </div>
                                <div class="col-6">
                                    <span style="font-size: .8rem;" class="d-block text-right">Profit</span>
                                    <span style="font-size: .7rem; font-weight: bold; margin-top: -.5px;"
                                        class="d-block text-right">Rp <?php echo e(number_format(explode('-',
                                        $item->nominal_minmax)[0] * explode('/', $item->persen_per_day)[0] /100)); ?></span>
                                </div>
                                <div class="col-6">
                                    <span style="font-size: .8rem;" class="d-block text-left">Nama Penjual</span>
                                    <span style="font-size: .7rem; font-weight: bold; margin-top: -.5px;"
                                        class="d-block text-left"><?php echo e($item->fromUsername); ?></span>
                                </div>
                                <div class="col-6">
                                    <span style="font-size: .8rem;" class="d-block text-right">Nomor Penjual</span>
                                    <span style="font-size: .7rem; font-weight: bold; margin-top: -.5px;"
                                        class="d-block text-right"><?php echo e($item->fromPhone); ?></span>
                                </div>
                                <div class="col-6">
                                    <span style="font-size: .8rem;" class="d-block text-left">Tgl. Transaksi</span>
                                    <span style="font-size: .7rem; font-weight: bold; margin-top: -.5px;"
                                        class="d-block text-left"><?php echo e(day_month_year_time_indonesia($item->created_at)); ?></span>
                                </div>
                                <div class="col-6">
                                    <span style="font-size: .8rem;" class="d-block text-right">Tgl. Pembayaran</span>
                                    <span style="font-size: .7rem; font-weight: bold; margin-top: -.5px;"
                                        class="d-block text-right"><?php echo e(day_month_year_time_indonesia($item->payment_date)); ?></span>
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
<?php elseif($type == 'sale'): ?>
<div class="row">
    <div class="col-12">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item active" style="width: calc(100%/3);" role="presentation">
                <a class="nav-link text-center active" id="sale-product-tab" data-toggle="pill" href="#sale-product"
                    role="tab" aria-controls="sale-product" aria-selected="true">Product</a>
            </li>
            <li class="nav-item" style="width: calc(100%/3);" role="presentation">
                <a class="nav-link text-center" id="sale-proses-tab" data-toggle="pill" href="#sale-proses" role="tab"
                    aria-controls="sale-proses" aria-selected="false">Proses</a>
            </li>
            <li class="nav-item" style="width: calc(100%/3);" role="presentation">
                <a class="nav-link text-center" id="sale-selesai-tab" data-toggle="pill" href="#sale-selesai" role="tab"
                    aria-controls="sale-selesai" aria-selected="false">Selesai</a>
            </li>
        </ul>
        <div class="tab-content" id="sale-tabContent">
            <div class="tab-pane fade show active" id="sale-product" role="tabpanel" aria-labelledby="sale-product-tab">
                <div class="row">
                    <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-12 mb-3">
                        <div class="card product">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <img src="<?php echo e(base_url()); ?>files/products/<?php echo e($item->image); ?>"
                                            class="card-img-top img-fluid" alt="<?php echo e($item->name); ?>">
                                    </div>
                                    <div class="col-6 text-center">
                                        <h6 class="text-truncate" title="<?php echo e(strtoupper($item->name)); ?>"><?php echo e(strtoupper($item->name)); ?></h6>
                                        <?php if($item->display == '0'): ?>
                                        
                                        <h6 class="text-danger">Proses</h6>
                                        <?php else: ?>
                                        <h6><?php echo e($item->stock > 0 ? 'Tersedia' : 'Berjalan'); ?></h6>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="product-rule">
                                            <i class="bi bi-clock"></i>
                                            <span><?php echo e($item->time_sale); ?></span>
                                        </div>
                                        <div class="product-rule">
                                            <i class="bi bi-cash-stack"></i>
                                            <span><?php echo e(number_format(explode('-', $item->nominal_minmax)[0]) . '-' .
                                                number_format(explode('-', $item->nominal_minmax)[1])); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="product-rule">
                                            <i class="bi bi-calendar2"></i>
                                            <span><?php echo e(explode('/', $item->persen_per_day)[1] . 'Hari/' . explode('/',
                                                $item->persen_per_day)[0] . '%'); ?></span>
                                        </div>
                                        <div class="product-rule">
                                            <i class="bi bi-bookmark"></i>
                                            <span><?php echo e(number_format(explode('/', $item->nominal_charge)[0]) . '/' .
                                                number_format(explode('/', $item->nominal_charge)[1])); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="tab-pane fade" id="sale-proses" role="tabpanel" aria-labelledby="sale-proses-tab">
                <div class="row">
                    <?php $__currentLoopData = $proses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-12 mb-3">
                        <div class="card">
                            <div class="card-header">
                                <span style="font-size: .8rem;" class="d-block text-center">#<?php echo e(strtoupper($item->id)); ?></span>
                            </div>
                            <div class="card-body row">
                                <div class="col-6">
                                    <span style="font-size: .8rem;" class="d-block text-left">Properti</span>
                                    <span style="font-size: .7rem; font-weight: bold; margin-top: -.5px;"
                                        class="d-block text-left"><?php echo e($item->productName); ?></span>
                                </div>
                                <div class="col-6">
                                    <span style="font-size: .8rem;" class="d-block text-right">Harga</span>
                                    <span style="font-size: .7rem; font-weight: bold; margin-top: -.5px;"
                                        class="d-block text-right">Rp <?php echo e(number_format(explode('-',
                                        $item->nominal_minmax)[0])); ?></span>
                                </div>
                                <div class="col-6">
                                    <span style="font-size: .8rem;" class="d-block text-left">Rincian Bonus</span>
                                    <span style="font-size: .7rem; font-weight: bold; margin-top: -.5px;"
                                        class="d-block text-left"><?php echo e(explode('/', $item->persen_per_day)[1] . ' Hari/' .
                                        explode('/', $item->persen_per_day)[0] . '%'); ?></span>
                                </div>
                                <div class="col-6">
                                    <span style="font-size: .8rem;" class="d-block text-right">Profit</span>
                                    <span style="font-size: .7rem; font-weight: bold; margin-top: -.5px;"
                                        class="d-block text-right">Rp <?php echo e(number_format(explode('-',
                                        $item->nominal_minmax)[0] * explode('/', $item->persen_per_day)[0] /100)); ?></span>
                                </div>
                                <div class="col-6">
                                    <span style="font-size: .8rem;" class="d-block text-left">Nama Pembeli</span>
                                    <span style="font-size: .7rem; font-weight: bold; margin-top: -.5px;"
                                        class="d-block text-left"><?php echo e($item->userName); ?></span>
                                </div>
                                <div class="col-6">
                                    <span style="font-size: .8rem;" class="d-block text-right">Nomor Pembeli</span>
                                    <span style="font-size: .7rem; font-weight: bold; margin-top: -.5px;"
                                        class="d-block text-right"><?php echo e($item->phone); ?></span>
                                </div>
                                <div class="col-6">
                                    <span style="font-size: .8rem;" class="d-block text-left">Tgl. Transaksi</span>
                                    <span style="font-size: .7rem; font-weight: bold; margin-top: -.5px;"
                                        class="d-block text-left"><?php echo e(day_month_year_time_indonesia($item->created_at)); ?></span>
                                </div>
                                <div class="col-6">
                                    <span style="font-size: .8rem;" class="d-block text-right">Tgl. Pembayaran</span>
                                    <span style="font-size: .7rem; font-weight: bold; margin-top: -.5px;"
                                        class="d-block text-right"><?php echo e($item->payment_end == '0000-00-00 00:00:00' ? '-'
                                        : day_month_year_time_indonesia($item->payment_end)); ?></span>
                                </div>
                                <?php if($item->status == '0' && $item->payment_image != ''): ?>
                                <div class="col-12">
                                    <hr>
                                    <a href="<?php echo e(base_url()); ?>transactionhistory/payview/<?php echo e($item->id); ?>"
                                        class="btn btn-primary w-100">Lihat Bukti Transfer</a>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="tab-pane fade" id="sale-selesai" role="tabpanel" aria-labelledby="sale-selesai-tab">
                <div class="row">
                    <?php $__currentLoopData = $selesai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-12 mb-3">
                        <div class="card">
                            <div class="card-header">
                                <span style="font-size: .8rem;" class="d-block text-center">#<?php echo e(strtoupper($item->id)); ?></span>
                            </div>
                            <div class="card-body row">
                                <div class="col-6">
                                    <span style="font-size: .8rem;" class="d-block text-left">Properti</span>
                                    <span style="font-size: .7rem; font-weight: bold; margin-top: -.5px;"
                                        class="d-block text-left"><?php echo e($item->productName); ?></span>
                                </div>
                                <div class="col-6">
                                    <span style="font-size: .8rem;" class="d-block text-right">Harga</span>
                                    <span style="font-size: .7rem; font-weight: bold; margin-top: -.5px;"
                                        class="d-block text-right">Rp <?php echo e(number_format(explode('-',
                                        $item->nominal_minmax)[0])); ?></span>
                                </div>
                                <div class="col-6">
                                    <span style="font-size: .8rem;" class="d-block text-left">Rincian Bonus</span>
                                    <span style="font-size: .7rem; font-weight: bold; margin-top: -.5px;"
                                        class="d-block text-left"><?php echo e(explode('/', $item->persen_per_day)[1] . ' Hari/' .
                                        explode('/', $item->persen_per_day)[0] . '%'); ?></span>
                                </div>
                                <div class="col-6">
                                    <span style="font-size: .8rem;" class="d-block text-right">Profit</span>
                                    <span style="font-size: .7rem; font-weight: bold; margin-top: -.5px;"
                                        class="d-block text-right">Rp <?php echo e(number_format(explode('-',
                                        $item->nominal_minmax)[0] * explode('/', $item->persen_per_day)[0] /100)); ?></span>
                                </div>
                                <div class="col-6">
                                    <span style="font-size: .8rem;" class="d-block text-left">Nama Pembeli</span>
                                    <span style="font-size: .7rem; font-weight: bold; margin-top: -.5px;"
                                        class="d-block text-left"><?php echo e($item->userName); ?></span>
                                </div>
                                <div class="col-6">
                                    <span style="font-size: .8rem;" class="d-block text-right">Nomor Pembeli</span>
                                    <span style="font-size: .7rem; font-weight: bold; margin-top: -.5px;"
                                        class="d-block text-right"><?php echo e($item->phone); ?></span>
                                </div>
                                <div class="col-6">
                                    <span style="font-size: .8rem;" class="d-block text-left">Tgl. Transaksi</span>
                                    <span style="font-size: .7rem; font-weight: bold; margin-top: -.5px;"
                                        class="d-block text-left"><?php echo e(day_month_year_time_indonesia($item->created_at)); ?></span>
                                </div>
                                <div class="col-6">
                                    <span style="font-size: .8rem;" class="d-block text-right">Tgl. Pembayaran</span>
                                    <span style="font-size: .7rem; font-weight: bold; margin-top: -.5px;"
                                        class="d-block text-right"><?php echo e(day_month_year_time_indonesia($item->payment_date)); ?></span>
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
<?php else: ?>
<div class="row">
    <div class="col-12 mb-4">
        <a href="<?php echo e(base_url()); ?>transactionhistory/buy" class="card text-decoration-none text-dark"
            style="height: 100px;">
            <div class="card-body d-flex flex-column align-items-center justify-content-center" style="padding: 5px;">
                <i class="bi bi-arrow-down-square-fill" style="font-size: 2rem;"></i>
                <span class="text-center">Pembelian</span>
            </div>
        </a>
    </div>
    <div class="col-12 mb-4">
        <a href="<?php echo e(base_url()); ?>transactionhistory/sale" class="card text-decoration-none text-dark"
            style="height: 100px;">
            <div class="card-body d-flex flex-column align-items-center justify-content-center" style="padding: 5px;">
                <i class="bi bi-arrow-up-square-fill" style="font-size: 2rem;"></i>
                <span class="text-center">Penjualan</span>
            </div>
        </a>
    </div>
</div>
<?php endif; ?>

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
                <input type="submit" class="btn btn-primary" value="Upload">
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\newxampp2\htdocs\moneygame\application\views/transaction_history.blade.php ENDPATH**/ ?>