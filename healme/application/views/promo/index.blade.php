@extends('layouts.app')

@section('title', 'Promo')

@section('page_title', 'Promo')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header">
                <form action="{{ base_url() }}promo/store" method="POST" enctype="multipart/form-data"
                    class="row justify-content-center">
                    <div class="col-12 col-md-6 form-group d-flex">
                        <input type="file" name="image" id="" class="form-control mr-2" required>
                        <input type="submit" value="Simpan" class="btn btn-primary">
                    </div>
                </form>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover text-center" style="white-space: nowrap;"
                        id="datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Gambar</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $i => $item)
                            <tr>
                                <td>{{ $i+1 }}</td>
                                <td><img src="{{ base_url() . 'files/' . $item->image }}" width="150" alt=""></td>
                                <td>
                                    <a onclick="return confirm('Apakah anda ingin menghapus data ini?')"
                                        href="{{ base_url() }}promo/delete/{{ $item->id }}"
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