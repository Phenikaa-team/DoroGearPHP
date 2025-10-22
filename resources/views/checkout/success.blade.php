@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-0 text-center p-4">
                    <div class="card-body">
                        <i class="fas fa-check-circle fa-5x text-success mb-4"></i>
                        <h2 class="fw-bold mb-3">Đặt hàng thành công!</h2>
                        <p class="text-muted">Cảm ơn bạn đã mua hàng. Đơn hàng <strong class="text-dark">#{{ $order->order_id }}</strong> của bạn đã được tiếp nhận và đang chờ xử lý.</p>
                        <p>Chúng tôi sẽ liên hệ với bạn qua email <strong class="text-dark">{{ $order->email }}</strong> hoặc SĐT <strong class="text-dark">{{ $order->phone_number }}</strong> để xác nhận.</p>
                        <div class="mt-4">
                            <a href="{{ route('home') }}" class="btn btn-primary" style="background-color: #008e68; border-color: #008e68;">
                                Tiếp tục mua sắm
                            </a>
                            <a href="#" class="btn btn-outline-secondary">
                                Xem chi tiết đơn hàng
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
