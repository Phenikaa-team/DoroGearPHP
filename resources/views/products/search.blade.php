@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-12">

                <h2 class="fw-bold mb-4">
                    Kết quả tìm kiếm cho: "{{ $query }}"
                </h2>

                @if($products->count() > 0)
                    <div class="row g-3">
                        @foreach($products as $product)
                            <div class="col-md-3 col-sm-6">
                                <a href="{{ route('product.show', $product->product_id) }}" class="text-decoration-none">
                                    @include('partials.product_card', ['product' => $product])
                                </a>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-4 d-flex justify-content-center">
                        {{ $products->links() }}
                    </div>

                @else
                    <div class="text-center p-5 bg-white rounded shadow-sm">
                        <i class="fas fa-search fa-3x text-muted mb-3"></i>
                        <h4 class="text-muted">Không tìm thấy sản phẩm nào</h4>
                        <p class="text-muted">Vui lòng thử tìm kiếm với từ khóa khác.</p>
                        <a href="{{ route('home') }}" class="btn btn-primary" style="background-color: #008e68; border-color: #008e68;">
                            Về trang chủ
                        </a>
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection
