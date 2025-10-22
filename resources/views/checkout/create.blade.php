@extends('layouts.app') @section('content')
    <div class="container my-5">
        <h2 class="fw-bold mb-4">Thanh toán đơn hàng</h2>

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('checkout.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-7">
                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-3">Thông tin nhận hàng</h5>

                            <div class="mb-3">
                                <label for="full_name" class="form-label">Họ và tên</label>
                                <input type="text" class="form-control" id="full_name" name="full_name" value="{{ old('full_name', $user->full_name) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="phone_number" class="form-label">Số điện thoại</label>
                                <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number', $user->phone_number) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Địa chỉ nhận hàng</label>
                                <textarea class="form-control" id="address" name="address" rows="3" required>{{ old('address') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow-sm border-0">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-3">Phương thức thanh toán</h5>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment_method" id="payment_cod" value="cod" checked>
                                <label class="form-check-label" for="payment_cod">
                                    <i class="fas fa-money-bill-wave"></i> Thanh toán khi nhận hàng (COD)
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="card shadow-sm border-0 sticky-top" style="top: 20px;">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-3">Đơn hàng của bạn ({{ Cart::getTotalQuantity() }} sản phẩm)</h5>

                            @foreach($cartItems->sortBy('name') as $item)
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ $item->attributes->image }}" class="img-fluid rounded me-2" style="width: 50px; height: 50px; object-fit: contain;">
                                        <div>
                                            <small class="d-block">{{ Str::limit($item->name, 30) }}</small>
                                            <small class="text-muted">SL: {{ $item->quantity }}</small>
                                        </div>
                                    </div>
                                    <small class="fw-bold">{{ number_format($item->price * $item->quantity, 0, ',', '.') }}₫</small>
                                </div>
                            @endforeach

                            <hr>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Tạm tính</span>
                                <strong>{{ number_format(Cart::getSubTotal(), 0, ',', '.') }}₫</strong>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Phí vận chuyển</span>
                                <strong>Miễn phí</strong>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between fw-bold fs-5">
                                <span>Tổng cộng</span>
                                <span class="text-danger">{{ number_format(Cart::getTotal(), 0, ',', '.') }}₫</span>
                            </div>
                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-danger btn-lg">
                                    <i class="fas fa-check-circle me-2"></i> ĐẶT HÀNG
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
