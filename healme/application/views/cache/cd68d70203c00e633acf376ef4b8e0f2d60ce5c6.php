

<?php $__env->startSection('title', 'Transaction'); ?>

<?php $__env->startSection('page_title', 'Transaction'); ?>

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
                                <th>ID Transaction</th>
                                <th>Product</th>
                                <th>Name</th>
                                <th>Price</th>
                                
                                <th>Payment Date</th>
                                <th>Status</th>
                                
                            </tr>
                        </thead>
                        <tbody style="white-space: nowrap;">
                            <?php
                            $sts = ['0' => 'Proses-warning', '1' => 'Sukses-success', '-1' => 'Gagal-danger'];
                            ?>
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($i+1); ?></td>
                                <td>#<?php echo e($item->id); ?></td>
                                <td><?php echo e($item->productName); ?></td>
                                <td><?php echo e($item->userName); ?></td>
                                <td><?php echo e('Rp ' . number_format(explode('-', $item->nominal_minmax)[0])); ?></td>
                                
                                <td><?php echo e($item->payment_date); ?></td>
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

<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="modalPaymentImage" tabindex="-1" aria-labelledby="modalPaymentImageLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalPaymentImageLabel">Bukti Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="" alt="" id="img-payment" class="img-fluid w-100">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/akhotel1/public_html/application/views/admin/transaction/index.blade.php ENDPATH**/ ?>