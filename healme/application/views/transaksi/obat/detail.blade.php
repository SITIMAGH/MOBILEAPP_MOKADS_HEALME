@extends('layouts.app')

@section('title', 'Detail Transaksi Obat')

@section('page_title', 'Detail Transaksi Obat')

@section('content')
<div class="row justify-content-center">
    <div class="col-12 col-md-6">
        <div class="card shadow">
            <div class="card-body">
                <div class="card-responsive">
                    <table class="table table-striped table-hover text-center" style="white-space: nowrap;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Obat</th>
                                <th>Harga</th>
                                <th>Qty</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $i => $item)
                            <tr>
                                <td>{{ $i+1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>Rp {{ number_format($item->price) }}</td>
                                <td>{{ number_format($item->qty) }}</td>
                                <td>Rp {{ number_format($item->price * $item->qty) }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="4" class="text-right">Total :</td>
                                <td>Rp {{ number_format($item->price * $item->qty) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="card shadow">
            <form class="card-body" action="{{ base_url() }}transaksi/obat/status/{{ $trx->trxID }}" method="POST">
                <div class="form-group">
                    <img src="{{ base_url() . 'files/' . $trx->proof_img }}" alt="" class="img-fluid">
                    <select name="status" id="" class="form-control">
                        @foreach (['0' => 'Pending', '1' => 'Disetujui', '-1' => 'Dibatalkan'] as $key => $val)
                        <option value="{{ $key }}" {{ $key==$trx->status ? 'selected' : '' }}>{{ $val }}</option>
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