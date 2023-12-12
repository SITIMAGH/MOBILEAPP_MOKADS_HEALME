@extends('layouts.app')

@section('title', 'Edit Voucher')

@section('page_title', 'Edit Voucher')

@section('content')
<div class="row justify-content-center">
    <div class="col-12 col-md-6">
        <div class="card shadow">
            <form class="card-body" action="{{ base_url() }}voucher/update/{{ $data->id }}" method="POST">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" id="" class="form-control" placeholder="PAKET HEMAT" value="{{ $data->name }}" required>
                </div>
                <div class="form-group">
                    <label for="">Harga</label>
                    <input type="number" name="price" id="" class="form-control" placeholder="200000" value="{{ $data->price }}" required>
                </div>
                <div class="form-group">
                    <label for="">Diskon</label>
                    <input type="number" name="discon" id="" class="form-control" placeholder="50" value="{{ $data->discon }}" required>
                </div>
                <div class="form-group">
                    <label for="">Durasi</label>
                    <input type="number" name="time" id="" class="form-control" placeholder="2" value="{{ $data->time }}" required>
                </div>
                <div class="form-group text-center">
                    <input type="submit" value="Simpan" class="btn btn-primary mt-2">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection