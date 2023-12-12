

<?php $__env->startSection('title', 'Other Products'); ?>

<?php $__env->startSection('page_title', 'Other Products'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header">
                <button class="btn btn-sm btn-primary shadow" data-toggle="modal" data-target="#exampleModal"><i
                        class="fe fe-plus fe-16 mr-2"></i> Add Data</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover text-center text-nowrap" id="datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User Name</th>
                                <th>Name</th>
                                <th>Time Of Sale</th>
                                <th>Min-Max Nominal</th>
                                <th>Persen Per Day</th>
                                <th>Nominal Charge</th>
                                <th>Stock</th>
                                <th>Display At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($i+1); ?></td>
                                <td><?php echo e($item->userName); ?></td>
                                <td><?php echo e($item->name); ?></td>
                                
                                <td><?php echo e($item->time_sale); ?></td>
                                <td><?php echo e('Rp ' . number_format(explode('-', $item->nominal_minmax)[0]) . '-Rp ' .
                                    number_format(explode('-', $item->nominal_minmax)[1])); ?></td>
                                <td><?php echo e(explode('/', $item->persen_per_day)[0] . '%/' . explode('/',
                                    $item->persen_per_day)[1] . ' day'); ?></td>
                                <td><?php echo e('Rp ' . number_format(explode('/', $item->nominal_charge)[0]) . '/Rp ' .
                                    number_format(explode('/', $item->nominal_charge)[1])); ?></td>
                                <td><?php echo $item->stock == '0' ? '<span class="badge badge-danger">Terjual</span>' : '<span class="badge badge-success">Tersedia</span>'; ?></td>
                                <td><?php echo e($item->display_at); ?></td>
                                <td><a onclick="return confirm('Apakah anda ingin menghapus data ini?')"
                                        href="<?php echo e(base_url() . ADMINPATH); ?>/otherproducts/delete/<?php echo e($item->id); ?>"
                                        class="btn btn-sm btn-danger"><i class="fe fe-trash fe-16"></i></a></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?php echo e(base_url() . ADMINPATH); ?>/otherproducts/store" method="POST" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">User</label>
                    <select name="user_id" id="" class="form-control">
                        <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Product</label>
                    <select name="product_id" id="" class="form-control">
                        <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\newxampp2\htdocs\ponselkita\application\views/admin/products/other.blade.php ENDPATH**/ ?>