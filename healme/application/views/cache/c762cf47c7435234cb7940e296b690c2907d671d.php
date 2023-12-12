

<?php $__env->startSection('title', 'Profile'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-12 d-flex justify-content-between align-items-center mb-2">
        <h6 class="text-truncate mr-2">Halo, <?php echo e(get_instance()->session->userdata('login')->name . ' ('
            .get_instance()->session->userdata('login')->phone. ')'); ?></h6>
        <a href="<?php echo e(base_url() . 'auth/logout'); ?>" class="d-block mb-2 text-decoration-none text-dark"><i class="bi bi-box-arrow-right" style="font-size: 1.5rem;"></i></a>
    </div>
    <div class="col-12 mb-3">
        <div class="card bg-primary" style="border: none; border-radius: 10px; overflow: hidden;">
            <div class="card-body text-white">
                <h4>Rp <?php echo e(number_format($balance_invest)); ?></h4>
                <h6 style="font-weight: normal;">Saldo Admin : Rp <?php echo e(number_format($user->balance)); ?></h6>
                <span style="font-size: 12px;">Laba Investasi : Rp <?php echo e(number_format($laba_invest)); ?></span>
            </div>
            <div class="card-footer d-flex justify-content-around">
                <a href="javascript:void(0)" data-toggle="modal" data-target="#modalTopup"
                    class="d-flex flex-column align-items-center text-decoration-none"
                    style="color: white; font-weight: bold;">
                    <i class="bi bi-wallet2" style="font-size: 1.5rem;"></i>
                    <span style="margin-top: -5px; font-size: 12px;">Top Up</span>
                </a>
                <a href="javascript:void(0)" data-toggle="modal" data-target="#modalTfAdmin"
                    class="d-flex flex-column align-items-center text-decoration-none"
                    style="color: white; font-weight: bold;">
                    <i class="bi bi-cash-stack" style="font-size: 1.5rem;"></i>
                    <span style="margin-top: -5px; font-size: 12px;">Transfer Admin</span>
                </a>
                <a href="<?php echo e(base_url()); ?>balancehistory" class="d-flex flex-column align-items-center text-decoration-none"
                    style="color: white; font-weight: bold;">
                    <i class="bi bi-clock-history" style="font-size: 1.5rem;"></i>
                    <span style="margin-top: -5px; font-size: 12px;">History</span>
                </a>
            </div>
        </div>
    </div>
    <div class="col-6 mb-4">
        <a href="<?php echo e(base_url()); ?>orderhistory" class="card text-decoration-none text-dark" style="height: 100px;">
            <div class="card-body d-flex flex-column align-items-center justify-content-center" style="padding: 5px;">
                <i class="bi bi-calendar4-week" style="font-size: 2rem;"></i>
                <span class="text-center">History Pemesanan</span>
            </div>
        </a>
    </div>
    <div class="col-6 mb-4">
        <a href="<?php echo e(base_url()); ?>transactionhistory" class="card text-decoration-none text-dark" style="height: 100px;">
            <div class="card-body d-flex flex-column align-items-center justify-content-center" style="padding: 5px;">
                <i class="bi bi-card-checklist" style="font-size: 2rem;"></i>
                <span class="text-center">History Transaksi</span>
            </div>
        </a>
    </div>
    <div class="col-6 mb-4">
        <a href="<?php echo e(base_url()); ?>member" class="card text-decoration-none text-dark" style="height: 100px;">
            <div class="card-body d-flex flex-column align-items-center justify-content-center" style="padding: 5px;">
                <i class="bi bi-diagram-3" style="font-size: 2rem;"></i>
                <span class="text-center">Anggota</span>
            </div>
        </a>
    </div>
    <div class="col-6 mb-4">
        <a href="<?php echo e(base_url()); ?>bonusdetail" class="card text-decoration-none text-dark" style="height: 100px;">
            <div class="card-body d-flex flex-column align-items-center justify-content-center" style="padding: 5px;">
                <i class="bi bi-cash-coin" style="font-size: 2rem;"></i>
                <span class="text-center">Rincian Bonus</span>
            </div>
        </a>
    </div>
    <div class="col-6 mb-4">
        <a href="<?php echo e(base_url()); ?>bankinformation" class="card text-decoration-none text-dark" style="height: 100px;">
            <div class="card-body d-flex flex-column align-items-center justify-content-center" style="padding: 5px;">
                <i class="bi bi-bank" style="font-size: 2rem;"></i>
                <span class="text-center">Informasi Bank</span>
            </div>
        </a>
    </div>
    <div class="col-6 mb-4">
        <a href="<?php echo e(base_url()); ?>profileupdate" class="card text-decoration-none text-dark" style="height: 100px;">
            <div class="card-body d-flex flex-column align-items-center justify-content-center" style="padding: 5px;">
                <i class="bi bi-person" style="font-size: 2rem;"></i>
                <span class="text-center">Edit Profile</span>
            </div>
        </a>
    </div>
</div>

<!-- Modal Topup -->
<div class="modal fade" id="modalTopup" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="modalTopupLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form action="<?php echo e(base_url()); ?>/profile/topup" method="POST" enctype="multipart/form-data" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTopupLabel">Topup</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Bank</label>
                    <select name="bank" id="" class="form-control">
                        <?php $__currentLoopData = $bank; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option><?php echo e($item->username . ' - (' . $item->name . ') ' . $item->number); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Nominal <span class="text-danger">(Minimal Rp 50,000)</span></label>
                    <input type="number" name="nominal" id="" class="form-control" placeholder="50000" required>
                </div>
                <div class="form-group">
                    <label for="">Bukti Transfer</label>
                    <input type="file" accept="image/*" name="pay_img" id="" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" value="Topup">
            </div>
        </form>
    </div>
</div>

<!-- Modal TF Admin -->
<div class="modal fade" id="modalTfAdmin" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="modalTfAdminLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form action="<?php echo e(base_url()); ?>/profile/tf_admin" method="POST" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTfAdminLabel">Transfer Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Nomor Tujuan</label>
                    <input type="number" name="phone" id="" class="form-control" placeholder="085638378377" required>
                </div>
                <div class="form-group">
                    <label for="">Nominal</label>
                    <input type="number" name="nominal" id="" class="form-control" placeholder="200000" required>
                </div>
                <div class="form-group">
                    <label for="">Pin</label>
                    <input type="number" name="pin" id="" class="form-control" placeholder="123" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" value="Transfer">
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/akhotel1/public_html/application/views/profile.blade.php ENDPATH**/ ?>