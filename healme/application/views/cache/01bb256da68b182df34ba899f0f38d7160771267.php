

<?php $__env->startSection('title', 'Profile'); ?>

<?php $__env->startSection('header'); ?>
<style>
    .border-bottom-list-profile::before {
        content: "";
        height: 1px;
        width: 87%;
        background-color: rgba(0, 0, 0, 0.123);
        position: absolute;
        bottom: 0;
        right: 0;
        box-sizing: border-box;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    
    <a href="<?php echo e(base_url()); ?>profileupdate"
        class="col-12 mb-2 d-flex justify-content-between align-items-center text-decoration-none text-dark">
        <div class="d-flex align-items-center">
            <i class="bi bi-person-circle" style="font-size: 40px;"></i>
            <div class="ml-3">
                <h5><?php echo e(get_instance()->session->userdata('login')->name); ?></h5>
                <h6 style="margin-top: -5px;"><?php echo e(get_instance()->session->userdata('login')->phone); ?></h6>
            </div>
        </div>
        <i class="bi bi-chevron-right" style="font-size: 17px; font-weight: bold; color: rgb(0, 0, 0);"></i>
    </a>
    <div class="col-12">
        <div class="form-group d-flex">
            <input type="text" name="" id="refferal-code" class="form-control form-control-sm"
                onclick="onCopy('<?php echo e(base_url() . 'auth/daftar?invite=' . $user->refferal); ?>')"
                value="<?php echo e(base_url() . 'auth/daftar?invite=' . $user->refferal); ?>" readonly>
            <button class="btn btn-sm btn-warning ml-3 font-weight-bold" id="btn-copy">Salin</button>
        </div>
    </div>
    <div class="col-12 mb-3">
        <div class="card shadow-lg bg-white"
            style="border: none; border-radius: 10px; overflow: hidden; background-color: rgba(0,0,0,0);">
            <div class="card-body text-dark">
                <div class="row">
                    <div class="col-6 text-center">
                        <div style="font-size: 15px; font-weight: bold;" class="text-nowrap">INVESTASI</div>
                        
                        <div style="font-size: 12px; font-weight: bold;"
                            class="mt-2 d-flex align-items-center justify-content-center">
                            <img src="<?php echo e(base_url()); ?>assets/icon/invest.png" alt="" height="24">
                            Rp <?php echo e(number_format($balance_invest)); ?>

                        </div>
                    </div>
                    <div class="col-6 text-center">
                        <div style="font-size: 15px; font-weight: bold;" class="text-nowrap">BIAYA ADMIN</div>
                        
                        <div style="font-size: 12px; font-weight: bold;"
                            class="mt-2 d-flex align-items-center justify-content-center">
                            <img src="<?php echo e(base_url()); ?>assets/icon/wallets.png" alt="" height="24">
                            Rp <?php echo e(number_format($user->balance)); ?>

                        </div>
                    </div>
                </div>
                
            </div>
            <div class="card-footer d-flex justify-content-around">
                <a href="javascript:void(0)" data-toggle="modal" data-target="#modalTopup"
                    class="d-flex flex-column align-items-center text-decoration-none"
                    style="color: rgb(0, 0, 0); font-weight: bold;">
                    <img src="<?php echo e(base_url()); ?>assets/icon/top-up.png" alt="" height="30">
                    
                    
                </a>
                <a href="javascript:void(0)" data-toggle="modal" data-target="#modalTfAdmin"
                    class="d-flex flex-column align-items-center text-decoration-none"
                    style="color: rgb(0, 0, 0); font-weight: bold;">
                    <img src="<?php echo e(base_url()); ?>assets/icon/transfer.png" alt="" height="30">
                    
                    
                </a>
                <a href="<?php echo e(base_url()); ?>balancehistory"
                    class="d-flex flex-column align-items-center text-decoration-none"
                    style="color: rgb(0, 0, 0); font-weight: bold;">
                    <img src="<?php echo e(base_url()); ?>assets/icon/transaction.png" alt="" height="30">
                    
                    
                </a>
            </div>
        </div>
    </div>
    

    <div class="col-12 mb-4">
        <a href="<?php echo e(base_url()); ?>transactionhistory"
            class="text-decoration-none d-flex align-items-center text-dark py-2 position-relative border-bottom-list-profile">
            
            <img src="<?php echo e(base_url()); ?>assets/icon/transaction-history.png" alt="" height="30">
            <div class="ml-3" style="font-weight: 500;">History Transaksi</div>
        </a>
        <a href="<?php echo e(base_url()); ?>member"
            class="text-decoration-none d-flex align-items-center text-dark py-2 position-relative border-bottom-list-profile">
            
            <img src="<?php echo e(base_url()); ?>assets/icon/member.png" alt="" height="30">
            <div class="ml-3" style="font-weight: 500;">Anggota</div>
        </a>
        
        
        <a href="<?php echo e(base_url()); ?>bankinformation"
            class="text-decoration-none d-flex align-items-center text-dark py-2 position-relative border-bottom-list-profile">
            
            <img src="<?php echo e(base_url()); ?>assets/icon/bank.png" alt="" height="30">
            <div class="ml-3" style="font-weight: 500;">Informasi Bank</div>
        </a>
        <a href="<?php echo e(base_url()); ?>auth/logout"
            class="text-decoration-none d-flex align-items-center text-dark py-2 position-relative border-bottom-list-profile">
            
            <img src="<?php echo e(base_url()); ?>assets/icon/logout.png" alt="" height="30">
            <div class="ml-3" style="font-weight: 500;">Keluar</div>
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
                    <input type="number" name="nominal" id="" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Bukti Transfer</label>
                    <input type="file" accept="image/*" name="pay_img" id="" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-warning" value="Topup">
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
                    <input type="number" name="phone" id="" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Nominal</label>
                    <input type="number" name="nominal" id="" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Pin</label>
                    <input type="number" name="pin" id="" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-warning" value="Transfer">
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<script>
    function onCopy(value){
        var $temp = $("<input>");
          $("body").append($temp);
          $temp.val(value).select();
          document.execCommand("copy");
          $temp.remove();
    }

    $("#btn-copy").click(function(e){
        e.preventDefault();
        onCopy($('#refferal-code').val())
    })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\newxampp2\htdocs\ponselkita\application\views/profile.blade.php ENDPATH**/ ?>