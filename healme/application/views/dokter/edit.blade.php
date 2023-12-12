@extends('layouts.app')

@section('title', 'Edit Dokter')

@section('page_title', 'Edit Dokter')

@section('content')
<div class="row justify-content-center">
    <div class="col-12 col-md-6">
        <div class="card shadow">
            <form class="card-body" action="{{ base_url() }}dokter/update/{{ $data->id }}" enctype="multipart/form-data" method="POST">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" id="" class="form-control" placeholder="John Richard" value="{{ $data->name }}" required>
                </div>
                <div class="form-group">
                    <label for="">Spesialis</label>
                    <input type="text" name="title" id="" class="form-control" placeholder="Dokter Gigi" value="{{ $data->title }}" required>
                </div>
                <div class="form-group">
                    <label for="">Phone</label>
                    <input type="number" name="phone" id="" class="form-control" placeholder="085611611611" value="{{ $data->phone }}" required>
                </div>
                <div class="form-group">
                    <label for="">Foto</label>
                    <input type="file" name="image" id="" class="form-control">
                    <br>
                    <img src="{{ base_url() . 'files/' . $data->image }}" width="100" alt="">
                </div>
                <div class="form-group">
                    <label for="">Umur</label>
                    <input type="number" name="age" id="" class="form-control" placeholder="22" value="{{ $data->age }}" required>
                </div>
                <div class="form-group">
                    <label for="">Harga</label>
                    <input type="number" name="price" id="" class="form-control" placeholder="200000" value="{{ $data->price }}" required>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="text" name="password" id="" class="form-control">
                </div>
                <div class="form-group text-center">
                    <input type="submit" value="Simpan" class="btn btn-primary mt-2">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection