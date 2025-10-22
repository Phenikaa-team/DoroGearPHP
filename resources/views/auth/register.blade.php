@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="text-center fw-bold mb-4" style="color: #008e68;">Đăng ký tài khoản</h3>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="full_name" class="form-label">Họ và tên</label>
                                <input id="full_name" class="form-control" type="text" name="full_name" value="{{ old('full_name') }}" required autofocus>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="phone_number" class="form-label">Số điện thoại (Tùy chọn)</label>
                                <input id="phone_number" class="form-control" type="text" name="phone_number" value="{{ old('phone_number') }}">
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Mật khẩu</label>
                                <input id="password" class="form-control" type="password" name="password" required>
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Xác nhận mật khẩu</label>
                                <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required>
                            </div>

                            <div class="d-grid mb-3">
                                <button type="submit" class="btn btn-primary btn-lg" style="background-color: #008e68; border-color: #008e68;">
                                    ĐĂNG KÝ
                                </button>
                            </div>
                        </form>

                        <div class="text-center">
                            <span class="text-muted small">Bạn đã có tài khoản?</span>
                            <a href="{{ route('login') }}" class="fw-bold text-decoration-none" style="color: #008e68;">Đăng nhập</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
