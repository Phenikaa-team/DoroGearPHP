@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-md-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-0">
                        <div class="list-group list-group-flush">
                            <a href="{{ route('profile.show') }}" class="list-group-item list-group-item-action active" style="background-color: #008e68; border-color: #008e68;">
                                <i class="fas fa-user-circle me-2"></i> Thông tin tài khoản
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <i class="fas fa-box me-2"></i> Đơn hàng của tôi
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <i class="fas fa-heart me-2"></i> Sản phẩm yêu thích
                            </a>
                            <form method="POST" action="{{ route('logout') }}" class="list-group-item p-0">
                                @csrf
                                <button type="submit" class="btn btn-link list-group-item list-group-item-action text-danger w-100 text-start">
                                    <i class="fas fa-sign-out-alt me-2"></i> Đăng xuất
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <h2 class="fw-bold mb-4">Tài khoản của tôi</h2>

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0 fw-bold" style="color: #008e68;">Cập nhật thông tin</h5>
                    </div>
                    <div class="card-body p-4">
                        @if ($errors->updateInfo->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->updateInfo->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('profile.updateInfo') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="full_name" class="form-label">Họ và tên</label>
                                <input id="full_name" class="form-control" type="text" name="full_name" value="{{ old('full_name', $user->full_name) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input id="email" class="form-control" type="email" name="email" value="{{ old('email', $user->email) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="phone_number" class="form-label">Số điện thoại</label>
                                <input id="phone_number" class="form-control" type="text" name="phone_number" value="{{ old('phone_number', $user->phone_number) }}">
                            </div>
                            <button type="submit" class="btn btn-primary" style="background-color: #008e68; border-color: #008e68;">Lưu thay đổi</button>
                        </form>
                    </div>
                </div>

                <div class="card shadow-sm border-0">
                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0 fw-bold" style="color: #008e68;">Đổi mật khẩu</h5>
                    </div>
                    <div class="card-body p-4">
                        @if ($errors->updatePassword->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->updatePassword->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('profile.updatePassword') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="current_password" class="form-label">Mật khẩu hiện tại</label>
                                <input id="current_password" class="form-control" type="password" name="current_password" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Mật khẩu mới</label>
                                <input id="password" class="form-control" type="password" name="password" required>
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Xác nhận mật khẩu mới</label>
                                <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required>
                            </div>
                            <button type="submit" class="btn btn-primary" style="background-color: #008e68; border-color: #008e68;">Đổi mật khẩu</Lưu>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
