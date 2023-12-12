

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <form class="card-body" action="<?php echo e(base_url()); ?>admin/sliders/store" method="POST"
                enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Image</label>
                    <input type="file" name="image" accept="image/*" id="" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="title" id="" class="form-control" placeholder="Informasi Pertama" required>
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="description" id="description" class="form-control"></textarea>
                </div>
                <div class="form-group text-center">
                    <input type="submit" value="Simpan" class="btn btn-primary mt-2">
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
</script>
<script>
     CKEDITOR.replace('description');

function onGas(){
console.log(quill.container.innerHTML);
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\newxampp2\htdocs\moneygame\application\views/admin/sliders/add.blade.php ENDPATH**/ ?>