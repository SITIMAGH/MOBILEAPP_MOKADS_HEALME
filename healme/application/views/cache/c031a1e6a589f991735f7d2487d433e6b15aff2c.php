

<?php $__env->startSection('title', 'Information'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-12 mb-3">
        <div class="card" data-toggle="modal" data-target="#modalInfo" onclick="onDesc('<?php echo e($item->title); ?>', '<?php echo e(base64_encode($item->description)); ?>')">
            <div class="card-body p-2">
                <h6 class="text-center mb-3"><?php echo e($item->title); ?></h6>
                <img src="<?php echo e(base_url() . 'files/info/' . $item->image); ?>" alt="" class="img-fluid">
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="modalInfo" tabindex="-1" aria-labelledby="modalInfoLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalInfoLabel"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p id="infoContent"></p>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <script>
        function onDesc(title, desc){
            $('#modalInfoLabel').text(title);
            $('#infoContent').html(atob(desc));
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\newxampp2\htdocs\moneygame\application\views/information.blade.php ENDPATH**/ ?>