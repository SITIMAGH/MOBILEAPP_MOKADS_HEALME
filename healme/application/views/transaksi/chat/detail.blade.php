@extends('layouts.app')

@section('title', 'Detail Transaksi Chat')

@section('page_title', 'Detail Transaksi Chat')

@section('content')
<div class="row justify-content-center">
    <div class="col-12 col-md-6">
        <div class="card shadow">
            <form class="card-body" action="{{ base_url() }}transaksi/chat/status/{{ $data->trxId }}" method="POST">
                <div class="form-group">
                    <img src="{{ base_url() . 'files/' . $data->proof_img }}" alt="" class="img-fluid">
                    <select name="status" id="" class="form-control">
                        @foreach (['0' => 'Pending', '1' => 'Disetujui', '-1' => 'Dibatalkan'] as $key => $val)
                            <option value="{{ $key }}" {{ $key == $data->status ? 'selected' : '' }}>{{ $val }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group text-center">
                    <input type="submit" value="Simpan" class="btn btn-primary mt-2">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection