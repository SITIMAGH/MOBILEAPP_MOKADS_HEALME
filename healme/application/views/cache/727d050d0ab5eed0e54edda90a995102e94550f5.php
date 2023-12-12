

<?php $__env->startSection('title', 'Topup'); ?>

<?php $__env->startSection('page_title', 'Topup'); ?>

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
                                <th>Name</th>
                                <th>Nominal</th>
                                <th>Bank</th>
                                <th>Payment Image</th>
                                <th>Status</th>
                                <th>Action</th>
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
                                <td><?php echo e('Rp ' . number_format($item->nominal)); ?></td>
                                <td><?php echo e($item->payment_bank); ?></td>
                                <td><img src="<?php echo e(base_url() . 'files/tf_image/' . $item->payment_image); ?>" width="70"
                                        alt="" style="cursor: pointer;"
                                        onclick="openPaymentImage('<?php echo e(base_url() . 'files/tf_image/' . $item->payment_image); ?>')" data-toggle="modal" data-target="#modalPaymentImage">
                                </td>
                                <td><span class="badge badge-<?php echo e(explode('-', $sts[$item->status])[1]); ?>"><?php echo e(explode('-',
                                        $sts[$item->status])[0]); ?></span></td>
                                <td>
                                    <?php if($item->status == '0'): ?>
                                    <a onclick="return confirm('Apakah anda ingin menerima topup ini?')"
                                        href="<?php echo e(base_url() . ADMINPATH); ?>/topup/status/1/<?php echo e($item->id); ?>"
                                        class="btn btn-sm btn-success"><i class="fe fe-check fe-16"></i></a>
                                    <a onclick="return confirm('Apakah anda ingin menolak topup ini?')"
                                        href="<?php echo e(base_url() . ADMINPATH); ?>/topup/status/-1/<?php echo e($item->id); ?>"
                                        class="btn btn-sm btn-warning"><i class="fe fe-x fe-16"></i></a>
                                    <?php else: ?>
                                    <span class="text-center">-</span>
                                    <?php endif; ?>
                                    
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

<!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade" id="modalPaymentImage" tabindex="-1" aria-labelledby="modalPaymentImageLabel" aria-hidden="true">
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
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\newxampp2\htdocs\moneygame\application\views/admin/payment/topup.blade.php ENDPATH**/ ?>