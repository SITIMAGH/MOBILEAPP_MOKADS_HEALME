@extends('layouts.app')

@section('title', 'Transaksi Chat')

@section('page_title', 'Transaksi Chat')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover text-center" style="white-space: nowrap;"
                        id="datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kode Transaksi</th>
                                <th>Nama User</th>
                                <th>Nama Dokter</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $i => $item)
                            <tr>
                                <td>{{ $i+1 }}</td>
                                <td>#{{ $item->code }}</td>
                                <td>{{ $item->userName }}</td>
                                <td>{{ $item->dokterName }}</td>
                                <td>Rp {{ number_format($item->total) }}</td>
                                @switch($item->status)
                                @case("0")
                                <td>Pending</td>
                                @break
                                @case("1")
                                <td>Disetujui</td>
                                @break
                                @case("-1")
                                <td>Dibatalkan</td>
                                @break

                                @endswitch
                                <td>
                                    <a href="{{ base_url() }}transaksi/chat/detail/{{ $item->trxId }}" class="btn btn-sm btn-success"><i
                                            class="fe fe-eye fe-16"></i></a>
                                    <a onclick="return confirm('Apakah anda ingin menghapus data ini?')"
                                        href="{{ base_url() }}transaksi/chat/delete/{{ $item->trxId }}"
                                        class="btn btn-sm btn-danger"><i class="fe fe-trash fe-16"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection