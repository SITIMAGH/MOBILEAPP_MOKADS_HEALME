

<?php $__env->startSection('title', 'Refferal'); ?>

<?php $__env->startSection('page_title', 'Refferal'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-12 col-md-8 mb-3">
        <div class="card shadow">
            <div class="card-header">Member</div>
            <div class="card-body">
                <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="level1-tab" data-toggle="tab" href="#level1" role="tab"
                            aria-controls="level1" aria-selected="true">Level 1(1)</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="level2-tab" data-toggle="tab" href="#level2" role="tab"
                            aria-controls="level2" aria-selected="false">Level 2(1)</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="level3-tab" data-toggle="tab" href="#level3" role="tab"
                            aria-controls="level3" aria-selected="false">Level 3(1)</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="level1" role="tabpanel" aria-labelledby="level1-tab">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover text-center" style="white-space: nowrap;"
                                id="datatable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $data_1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($i+1); ?></td>
                                        <td><?php echo e($item->name); ?></td>
                                        <td><?php echo e($item->phone); ?></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="level2" role="tabpanel" aria-labelledby="level2-tab">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover text-center" style="white-space: nowrap;"
                                id="datatable2">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $data_2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($i+1); ?></td>
                                        <td><?php echo e($item->name); ?></td>
                                        <td><?php echo e($item->phone); ?></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="level3" role="tabpanel" aria-labelledby="level3-tab">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover text-center" style="white-space: nowrap;"
                                id="datatable3">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $data_3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($i+1); ?></td>
                                        <td><?php echo e($item->name); ?></td>
                                        <td><?php echo e($item->phone); ?></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-4 mb-3">
        <div class="card shadow">
            <div class="card-header">Balance</div>
            <form action="<?php echo e(base_url() . ADMINPATH); ?>/refferal/poin/<?php echo e(get_instance()->uri->segment(3)); ?>" method="POST" class="card-body">
                <div class="form-group">
                    <label for="">Bonus</label>
                    <input type="number" name="poin" id="" class="form-control" placeholder="100000" value="<?php echo e($user->refferal_bonus); ?>" required>
                </div>
                <div class="form-group">
                    <label for="">Poin</label>
                    <input type="number" name="poin" id="" class="form-control" placeholder="100000" value="<?php echo e($user->poin); ?>" required>
                </div>
                <div class="form-group">
                    <label for="">Refferal Bonus</label>
                    <input type="number" name="refferal_bonus" id="" class="form-control" placeholder="100000" value="<?php echo e($user->refferal_bonus); ?>" required>
                </div>
                <div class="form-group text-center">
                    <input type="submit" value="Update" class="btn btn-primary w-75">
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <script>
        $("#datatable2").DataTable();
        $("#datatable3").DataTable();
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/akhotel1/public_html/application/views/admin/users/refferal.blade.php ENDPATH**/ ?>