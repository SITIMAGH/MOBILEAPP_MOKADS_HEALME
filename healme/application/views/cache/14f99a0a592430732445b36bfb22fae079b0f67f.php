

<?php $__env->startSection('title', 'Detail Transaksi Obat'); ?>

<?php $__env->startSection('page_title', 'Detail Transaksi Obat'); ?>

<?php $__env->startSection('content'); ?>
<div class="row justify-content-center">
    <div class="col-12 col-md-6">
        <div class="card shadow">
            <div class="card-body">
                <div class="card-responsive">
                    <table class="table table-striped table-hover text-center" style="white-space: nowrap;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Obat</th>
                                <th>Harga</th>
                                <th>Qty</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($i+1); ?></td>
                                <td><?php echo e($item->name); ?></td>
                                <td>Rp <?php echo e(number_format($item->price)); ?></td>
                                <td><?php echo e(number_format($item->qty)); ?></td>
                                <td>Rp <?php echo e(number_format($item->price * $item->qty)); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td colspan="4" class="text-right">Total :</td>
                                <td>Rp <?php echo e(number_format($item->price * $item->qty)); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="card shadow">
            <form class="card-body" action="<?php echo e(base_url()); ?>transaksi/obat/status/<?php echo e($trx->trxID); ?>" method="POST">
                <div class="form-group">
                    <img src="<?php echo e(base_url() . 'files/' . $trx->proof_img); ?>" alt="" class="img-fluid">
                    <select name="status" id="" class="form-control">
                        <?php $__currentLoopData = ['0' => 'Pending', '1' => 'Disetujui', '-1' => 'Dibatalkan']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($key); ?>" <?php echo e($key==$trx->status ? 'selected' : ''); ?>><?php echo e($val); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-group text-center">
                    <input type="submit" value="Simpan" class="btn btn-primary mt-2">
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\healme\application\views/transaksi/obat/detail.blade.php ENDPATH**/ ?>