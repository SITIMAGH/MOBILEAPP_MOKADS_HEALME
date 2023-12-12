

<?php $__env->startSection('title', 'Users'); ?>

<?php $__env->startSection('page_title', 'Users'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header">
                <a href="<?php echo e(base_url() . ADMINPATH); ?>/users/add" class="btn btn-sm btn-primary shadow"><i
                        class="fe fe-plus fe-16 mr-2"></i> Add Data</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover text-center" style="white-space: nowrap;"
                        id="datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Bank</th>
                                <th>Balance Invest</th>
                                <th>Balance Admin</th>
                                <th>Poin</th>
                                <th>Role</th>
                                <th>Refferal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($i+1); ?></td>
                                <td><?php echo e($item->name); ?></td>
                                <td><?php echo e($item->phone); ?></td>
                                <td><?php echo e($item->bank_username . ' - ' . '( ' . $item->bank_name . ' )' .
                                    $item->bank_number); ?></td>
                                <td><?php echo e('Rp ' . number_format($item->balance_invest)); ?></td>
                                <td><?php echo e('Rp ' . number_format($item->balance)); ?></td>
                                <td><?php echo e(number_format($item->poin)); ?></td>
                                <td><?php echo e($item->role); ?></td>
                                <td><a href="<?php echo e(base_url() . ADMINPATH . '/refferal/' . $item->id); ?>"
                                        class="btn btn-sm btn-info">Detail</a></td>
                                <td>
                                    <button class="btn btn-sm btn-success" data-toggle="modal"
                                        data-target="#modalSaldoAdmin"
                                        onclick="onSaldoAdmin('<?php echo e($item->id); ?>', '<?php echo e($item->balance); ?>')"><i
                                            class="fe fe-dollar-sign fe-16"></i></button>
                                    <a href="<?php echo e(base_url() . ADMINPATH); ?>/users/active/<?php echo e($item->id); ?>/<?php echo e($item->active == '1' ? '0' : '1'); ?>"
                                        class="btn btn-sm <?php echo e($item->active == '1' ? 'btn-success' : 'btn-danger'); ?>"><i class="fe <?php echo e($item->active == '1' ? 'fe-eye' : 'fe-eye-off'); ?> fe-16"></i></a>
                                    <a href="<?php echo e(base_url() . ADMINPATH); ?>/users/edit/<?php echo e($item->id); ?>"
                                        class="btn btn-sm btn-info"><i class="fe fe-edit fe-16"></i></a>
                                    <?php if($item->id != '1'): ?>
                                    <a onclick="return confirm('Apakah anda ingin menghapus data ini?')"
                                        href="<?php echo e(base_url() . ADMINPATH); ?>/users/delete/<?php echo e($item->id); ?>"
                                        class="btn btn-sm btn-danger"><i class="fe fe-trash fe-16"></i></a>
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
<div class="modal fade" id="modalSaldoAdmin" tabindex="-1" aria-labelledby="modalSaldoAdminLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?php echo e(base_url() . ADMINPATH); ?>/users/saldo_admin" method="POST" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalSaldoAdminLabel">Saldo Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" name="id">
                    <label for="">Nominal</label>
                    <input type="number" name="nominal" id="" class="form-control" placeholder="1000000" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" name="kurang" class="btn btn-danger" value="Kurang">
                <input type="submit" name="tambah" class="btn btn-success" value="Tambah">
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<script>
    function onSaldoAdmin(id, balance){
            $('input[name=id]').val(id);
            if(balance > 0){
                $('input[name=kurang]').show();
            }else{
                $('input[name=kurang]').hide();
            }
        }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\newxampp2\htdocs\ponselkita\application\views/admin/users/index.blade.php ENDPATH**/ ?>