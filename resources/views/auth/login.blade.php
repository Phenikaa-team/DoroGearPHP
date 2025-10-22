@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="text-center fw-bold mb-4" style="color: #008e68;">Đăng nhập</h3>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input id="email" class="form-control form-control-lg" type="email" name="email" value="{{ old('email') }}" required autofocus>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Mật khẩu</label>
                                <input id="password" class="form-control form-control-lg" type="password" name="password" required>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="form-check">
                                    <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                                    <label for="remember_me" class="form-check-label small">Lưu đăng nhập</label>
                                </div>
                                <a href="#" class="small text-decoration-none">Quên mật khẩu?</a>
                            </div>

                            <div class="d-grid mb-3">
                                <button type="submit" class="btn btn-primary btn-lg" style="background-color: #008e68; border-color: #008e68;">
                                    ĐĂNG NHẬP
                                </button>
                            </div>
                        </form>

                        <div class="text-center">
                            <span class="text-muted small">Bạn chưa có tài khoản?</span>
                            <a href="{{ route('register') }}" class="fw-bold text-decoration-none" style="color: #008e68;">Đăng ký ngay</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
