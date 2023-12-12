@extends('layouts.app')

@section('title', 'Edit News')

@section('page_title', 'Edit News')

@section('content')
<div class="row justify-content-center">
    <div class="col-12 col-md-6">
        <div class="card shadow">
            <form class="card-body" action="{{ base_url() }}news/update/{{ $data->id }}" enctype="multipart/form-data" method="POST">
                <div class="form-group">
                    <label for="">Judul</label>
                    <input type="text" name="title" id="" class="form-control" placeholder="News A" value="{{ $data->title }}" required>
                </div>
                <div class="form-group">
                    <label for="">Gambar</label>
                    <input type="file" name="image" id="" class="form-control">
                    <br>
                    <img src="{{ base_url() . 'files/' . $data->image }}" width="100" alt="">
                </div>
                <div class="form-group">
                    <label for="">Konten</label>
                    <div id="editor" style="height: 200px;">
                    </div>
                    <input type="hidden" name="content" id="" required>
                </div>
                <div class="form-group text-center">
                    <input type="submit" value="Simpan" class="btn btn-primary mt-2">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('footer')
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

      quill.on('text-change', function(){
        $("input[name=content]").val(quill.root.innerHTML)
      })

      quill.root.innerHTML = '{!! $data->content !!}'
      $("input[name=content]").val('{!! $data->content !!}')
</script>
@endsection