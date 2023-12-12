

<?php $__env->startSection('title', 'Edit Obat'); ?>

<?php $__env->startSection('page_title', 'Edit Obat'); ?>

<?php $__env->startSection('content'); ?>
<div class="row justify-content-center">
    <div class="col-12 col-md-6">
        <div class="card shadow">
            <form class="card-body" action="<?php echo e(base_url()); ?>obat/update/<?php echo e($data->id); ?>" enctype="multipart/form-data" method="POST">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" id="" class="form-control" placeholder="Obat A" value="<?php echo e($data->name); ?>" required>
                </div>
                <div class="form-group">
                    <label for="">Harga</label>
                    <input type="number" name="price" id="" class="form-control" placeholder="2000000" value="<?php echo e($data->price); ?>"  required>
                </div>
                <div class="form-group">
                    <label for="">Gambar</label>
                    <input type="file" name="image" id="" class="form-control">
                    <br>
                    <img src="<?php echo e(base_url() . 'files/' . $data->image); ?>" width="100" alt="">
                </div>
                <div class="form-group">
                    <label for="">Deskripsi</label>
                    <div id="editor" style="height: 200px;">
                    </div>
                    <input type="hidden" name="description" id="" required>
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
<script>
    // editor
    var editor = document.getElementById('editor');
      if (editor)
      {
        var toolbarOptions = [
          [
          {
            'font': []
          }],
          [
          {
            'header': [1, 2, 3, 4, 5, 6, false]
          }],
          ['bold', 'italic', 'underline', 'strike'],
          ['blockquote', 'code-block'],
          [
          {
            'header': 1
          },
          {
            'header': 2
          }],
          [
          {
            'list': 'ordered'
          },
          {
            'list': 'bullet'
          }],
          [
          {
            'script': 'sub'
          },
          {
            'script': 'super'
          }],
          [
          {
            'indent': '-1'
          },
          {
            'indent': '+1'
          }], // outdent/indent
          [
          {
            'direction': 'rtl'
          }], // text direction
          [
          {
            'color': []
          },
          {
            'background': []
          }], // dropdown with defaults from theme
          [
          {
            'align': []
          }],
          ['clean'] // remove formatting button
        ];
        var quill = new Quill(editor,
        {
          modules:
          {
            toolbar: toolbarOptions
          },
          theme: 'snow'
        });
      }

      const descBase = '<h3><strong>Deskripsi</strong></h3><p><br></p><p><br></p><h3><strong>Indikasi Umum</strong></h3><p><br></p><p><br></p><h3><strong>Komposisi</strong></h3><p><br></p><p><br></p><h3><strong>Dosis</strong></h3><p><br></p><p><br></p><h3><strong>Aturan Pakai</strong></h3><p><br></p><p><br></p><h3><strong>Perhatian</strong></h3><p><br></p><p><br></p><h3><strong>Kontraindikasi</strong></h3><p><br></p><p><br></p><h3><strong>Efek Samping</strong></h3><p><br></p><p><br></p><h3><strong>Golongan Produk</strong></h3><p><br></p><p><br></p><h3><strong>Manufaktur</strong></h3><p><br></p><p><br></p><h3><strong>No.Registrasi</strong></h3><p><br></p><p><br></p>';

      quill.root.innerHTML = descBase
      $("input[name=description]").val(descBase)

      quill.on('text-change', function(){
        $("input[name=description]").val(quill.root.innerHTML)
      })

      quill.root.innerHTML = '<?php echo $data->description; ?>'
      $("input[name=description]").val('<?php echo $data->description; ?>')
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\newxampp2\htdocs\healme\application\views/obat/edit.blade.php ENDPATH**/ ?>