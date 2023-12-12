@extends('layouts.app')

@section('title', 'Add Dokter')

@section('page_title', 'Add dokter')

@section('content')
<div class="row justify-content-center">
    <div class="col-12 col-md-6">
        <div class="card shadow">
            <form class="card-body" action="{{ base_url() }}dokter/store" enctype="multipart/form-data" method="POST">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" id="" class="form-control" placeholder="John Richard" required>
                </div>
                <div class="form-group">
                    <label for="">Spesialis</label>
                    <input type="text" name="title" id="" class="form-control" placeholder="Dokter Gigi" required>
                </div>
                <div class="form-group">
                    <label for="">Phone</label>
                    <input type="number" name="phone" id="" class="form-control" placeholder="085611611611" required>
                </div>
                <div class="form-group">
                    <label for="">Foto</label>
                    <input type="file" name="image" id="" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Umur</label>
                    <input type="number" name="age" id="" class="form-control" placeholder="22" required>
                </div>
                <div class="form-group">
                    <label for="">Harga</label>
                    <input type="number" name="price" id="" class="form-control" placeholder="200000" required>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="text" name="password" id="" class="form-control" required>
                </div>
                <div class="form-group text-center">
                    <input type="submit" value="Simpan" class="btn btn-primary mt-2">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection