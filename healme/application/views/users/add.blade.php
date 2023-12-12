@extends('layouts.app')

@section('title', 'Add Users')

@section('page_title', 'Add Users')

@section('content')
<div class="row justify-content-center">
    <div class="col-12 col-md-6">
        <div class="card shadow">
            <form class="card-body" action="{{ base_url() }}users/store" method="POST">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" id="" class="form-control" placeholder="John Richard" required>
                </div>
                <div class="form-group">
                    <label for="">Phone</label>
                    <input type="number" name="phone" id="" class="form-control" placeholder="085611611611" required>
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