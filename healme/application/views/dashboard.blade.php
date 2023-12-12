@extends('layouts.app')

@section('title', 'Dashboard')

@section('page_title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-12 col-md-6 col-xl-6 mb-4">
        <div class="card shadow">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-3 text-center">
                        <span class="circle circle-sm bg-primary">
                            <i class="fe fe-16 fe-credit-card text-white mb-0"></i>
                        </span>
                    </div>
                    <div class="col">
                        <p class="small text-muted mb-0">Total Topup</p>
                        <span class="h3 mb-0">Rp {{ number_format(0) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-xl-6 mb-4">
        <div class="card shadow">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-3 text-center">
                        <span class="circle circle-sm bg-primary">
                            <i class="fe fe-16 fe-credit-card text-white mb-0"></i>
                        </span>
                    </div>
                    <div class="col">
                        <p class="small text-muted mb-0">Total Admin Transfer</p>
                        <span class="h3 mb-0">Rp {{ number_format(0) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-xl-4 mb-4">
        <div class="card shadow">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-3 text-center">
                        <span class="circle circle-sm bg-primary">
                            <i class="fe fe-16 fe-sliders text-white mb-0"></i>
                        </span>
                    </div>
                    <div class="col">
                        <p class="small text-muted mb-0">Total Sliders</p>
                        <span class="h3 mb-0">{{ number_format(0) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-xl-4 mb-4">
        <div class="card shadow">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-3 text-center">
                        <span class="circle circle-sm bg-primary">
                            <i class="fe fe-16 fe-info text-white mb-0"></i>
                        </span>
                    </div>
                    <div class="col">
                        <p class="small text-muted mb-0">Total Information</p>
                        <span class="h3 mb-0">{{ number_format(0) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-xl-4 mb-4">
        <div class="card shadow">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-3 text-center">
                        <span class="circle circle-sm bg-primary">
                            <i class="fe fe-16 fe-users text-white mb-0"></i>
                        </span>
                    </div>
                    <div class="col">
                        <p class="small text-muted mb-0">Total Users Active</p>
                        <span class="h3 mb-0">{{ number_format(0) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-xl-4 mb-4">
        <div class="card shadow">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-3 text-center">
                        <span class="circle circle-sm bg-primary">
                            <i class="fe fe-16 fe-users text-white mb-0"></i>
                        </span>
                    </div>
                    <div class="col">
                        <p class="small text-muted mb-0">Total Users Suspend</p>
                        <span class="h3 mb-0">{{ number_format(0) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-xl-4 mb-4">
        <div class="card shadow">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-3 text-center">
                        <span class="circle circle-sm bg-primary">
                            <i class="fe fe-16 fe-archive text-white mb-0"></i>
                        </span>
                    </div>
                    <div class="col">
                        <p class="small text-muted mb-0">Total Products Admin</p>
                        <span class="h3 mb-0">{{ number_format(0) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-xl-4 mb-4">
        <div class="card shadow">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-3 text-center">
                        <span class="circle circle-sm bg-primary">
                            <i class="fe fe-16 fe-archive text-white mb-0"></i>
                        </span>
                    </div>
                    <div class="col">
                        <p class="small text-muted mb-0">Total Product User</p>
                        <span class="h3 mb-0">{{ number_format(0) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection