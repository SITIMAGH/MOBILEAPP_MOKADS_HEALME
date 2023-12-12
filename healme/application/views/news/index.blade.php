@extends('layouts.app')

@section('title', 'News')

@section('page_title', 'News')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header">
                <a href="{{ base_url() }}news/add" class="btn btn-sm btn-primary shadow"><i
                        class="fe fe-plus fe-16 mr-2"></i> Add Data</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover text-center" style="white-space: nowrap;"
                        id="datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>judul</th>
                                <th>Gambar</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $i => $item)
                            <tr>
                                <td>{{ $i+1 }}</td>
                                <td>{{ $item->title }}</td>
                                <td><img src="{{ base_url() . 'files/' . $item->image }}" width="80" alt=""></td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    <a href="{{ base_url() }}news/edit/{{ $item->id }}" class="btn btn-sm btn-info"><i
                                            class="fe fe-edit fe-16"></i></a>
                                    <a onclick="return confirm('Apakah anda ingin menghapus data ini?')"
                                        href="{{ base_url() }}news/delete/{{ $item->id }}"
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