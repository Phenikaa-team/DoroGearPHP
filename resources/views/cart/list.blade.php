@extends('layouts.app') @section('content')
    <div class="container my-5">
        <h2 class="fw-bold mb-4">Giỏ hàng của bạn</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(Cart::isEmpty())
            <div class="text-center p-5 bg-white rounded shadow-sm">
                <i class="fas fa-shopping-cart fa-3x text-muted mb-3"></i>
                <h4 class="text-muted">Giỏ hàng của bạn đang trống</h4>
                <p class="text-muted">Hãy quay lại trang chủ để bắt đầu mua sắm.</p>
                <a href="{{ route('home') }}" class="btn btn-primary" style="background-color: #008e68; border-color: #008e68;">
                    Về trang chủ
                </a>
            </div>
        @else
            <div class="row">
                <div class="col-lg-8">
                    <div class="card shadow-sm border-0">
                        <div class="card-body p-4">
                            <h5 class="mb-4">Bạn có {{ Cart::getTotalQuantity() }} sản phẩm trong giỏ</h5>
                            @foreach($cartItems->sortBy('name') as $item)
                                <div class="row mb-3 border-bottom pb-3 align-items-center">
                                    <div class="col-md-2">
                                        <img src="{{ $item->attributes->image }}" alt="{{ $item->name }}" class="img-fluid rounded" style="width: 80px; height: 80px; object-fit: contain;">
                                    </div>
                                    <div class="col-md-5">
                                        <h6 class="mb-0">{{ $item->name }}</h6>
                                        <p class="text-danger fw-bold mb-0">{{ number_format($item->price, 0, ',', '.') }}₫</p>
                                        @if($item->attributes->old_price)
                                            <del class="text-muted small">{{ number_format($item->attributes->old_price, 0, ',', '.') }}₫</del>
                                        @endif
                                    </div>
                                    <div class="col-md-3">
                                        <form action="{{ route('cart.update') }}" method="POST" class="d-flex">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                            <input type="number" name="quantity" value="{{ $item->quantity }}" class="form-control form-control-sm" style="width: 70px;" min="1">
                                            <button type="submit" class="btn btn-outline-primary btn-sm ms-2">Cập nhật</button>
                                        </form>
                                    </div>
                                    <div class="col-md-2 text-end">
                                        <form action="{{ route('cart.remove') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                            <button type="submit" class="btn btn-outline-danger btn-sm">&times; Xóa</button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card shadow-sm border-0 sticky-top" style="top: 20px;">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-3">Tóm tắt đơn hàng</h5>
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
                                <a href="{{ route('checkout.create') }}" class="btn btn-danger btn-lg">
                                    Tiến hành thanh toán
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
