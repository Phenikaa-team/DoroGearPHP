@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-md-3">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0 fw-bold" style="color: #008e68;">Admin Menu</h5>
                    </div>
                    <div class="list-group list-group-flush">
                        <a href="{{ route('admin.dashboard') }}" class="list-group-item list-group-item-action active" style="background-color: #008e68; border-color: #008e68;">
                            <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <i class="fas fa-box me-2"></i> Quản lý sản phẩm
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <i class="fas fa-users me-2"></i> Quản lý người dùng
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <i class="fas fa-list-alt me-2"></i> Quản lý danh mục
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <h2 class="fw-bold mb-4">Admin Dashboard</h2>
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">
                        <h5 class="card-title">Chào mừng, {{ Auth::user()->full_name }}!</h5>
                        <p class="card-text">Đây là trang quản trị của bạn.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
