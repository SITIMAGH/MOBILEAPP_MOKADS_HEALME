

<?php $__env->startSection('title', 'Transaksi Obat'); ?>

<?php $__env->startSection('page_title', 'Transaksi Obat'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover text-center" style="white-space: nowrap;"
                        id="datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kode Transaksi</th>
                                <th>Nama User</th>
                                <th>Total</th>
                                <th>Tipe Pengiriman</th>
                                <th>Alamat</th>
                                <th>Catatan</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($i+1); ?></td>
                                <td>#<?php echo e($item->code); ?></td>
                                <td><?php echo e($item->name); ?></td>
                                <td>Rp <?php echo e(number_format($item->total)); ?></td>
                                <td><?php echo e($item->shipment_type); ?></td>
                                <td><?php echo e($item->address); ?></td>
                                <td><?php echo e($item->note); ?></td>
                                <?php switch($item->status):
                                case ("0"): ?>
                                <td>Pending</td>
                                <?php break; ?>
                                <?php case ("1"): ?>
                                <td>Disetujui</td>
                                <?php break; ?>
                                <?php case ("-1"): ?>
                                <td>Dibatalkan</td>
                                <?php break; ?>

                                <?php endswitch; ?>
                                <td>
                                    <a href="<?php echo e(base_url()); ?>transaksi/obat/detail/<?php echo e($item->trxID); ?>"
                                        class="btn btn-sm btn-success"><i class="fe fe-eye fe-16"></i></a>
                                    <a onclick="return confirm('Apakah anda ingin menghapus data ini?')"
                                        href="<?php echo e(base_url()); ?>transaksi/obat/delete/<?php echo e($item->trxID); ?>"
                                        class="btn btn-sm btn-danger"><i class="fe fe-trash fe-16"></i></a>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\healme\application\views/transaksi/obat/index.blade.php ENDPATH**/ ?>