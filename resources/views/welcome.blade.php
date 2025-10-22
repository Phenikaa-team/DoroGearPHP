@extends('layouts.app')

@section('content')
    <div class="container-fluid px-0">
        <div class="row g-0">
            <!-- Left Banner -->
            <div class="col-md-2 d-none d-md-block">
                <div class="side-banner-left bg-gradient-primary text-white h-50 d-flex align-items-center justify-content-center rounded">
                    <h5 style="writing-mode: vertical-rl; text-orientation: mixed;" class="fw-bold">
                        KHUYẾN MÃI ĐẶC BIỆT
                    </h5>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-lg-8 px-3 py-4">
                <!-- Main Banner -->
                <div class="main-banner bg-gradient-info text-white text-center py-5 mb-3 rounded shadow-sm">
                    <h2 class="fw-bold">🔥 FLASH SALE CUỐI TUẦN 🔥</h2>
                    <p class="mb-0">Giảm giá lên đến 50% - Freeship toàn quốc</p>
                </div>

                <!-- Secondary Banner -->
                <div class="secondary-banner bg-gradient-warning text-dark text-center py-3 mb-4 rounded">
                    <h5 class="mb-0">⚡ Trả góp 0% - Giao hàng 2H ⚡</h5>
                </div>

                <!-- Hot Products Section -->
                <section class="mb-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h3 class="fw-bold">
                            <i class="fas fa-fire text-danger me-2"></i>
                            Sản phẩm nổi bật
                            <span class="badge bg-danger">HOT</span>
                        </h3>
                        <a href="#" class="text-decoration-none">
                            Xem tất cả <i class="fas fa-chevron-right"></i>
                        </a>
                    </div>
                    <div class="row g-3">
                        @foreach($hotProducts as $product)
                            <div class="col-md-4 col-sm-6">
                                <a href="{{ route('product.show', $product->product_id) }}" class="text-decoration-none">
                                    @include('partials.product_card', ['product' => $product])
                                </a>
                            </div>
                        @endforeach
                    </div>
                </section>

                <!-- CPU Section -->
                @if(isset($cpuProducts) && $cpuProducts->count() > 0)
                    <section class="mb-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h3 class="fw-bold">
                                <i class="fas fa-microchip text-primary me-2"></i>
                                CPU - Vi xử lý
                            </h3>
                            <a href="#" class="text-decoration-none">
                                Xem tất cả <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                        <div class="row g-3">
                            @foreach($cpuProducts->take(6) as $product)
                                <div class="col-md-4 col-sm-6">
                                    <a href="{{ route('product.show', $product->product_id) }}" class="text-decoration-none">
                                        @include('partials.product_card', ['product' => $product])
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </section>
                @endif

                <!-- Categories Quick Access -->
{{--                <section class="mb-5">--}}
{{--                    <h3 class="fw-bold mb-3">--}}
{{--                        <i class="fas fa-th-large text-success me-2"></i>--}}
{{--                        Danh mục sản phẩm--}}
{{--                    </h3>--}}
{{--                    <div class="row g-3">--}}
{{--                        @if(isset($categories))--}}
{{--                            @foreach($categories->take(6) as $category)--}}
{{--                                <div class="col-md-4 col-sm-6">--}}
{{--                                    <div class="category-card card h-100 border-0 shadow-sm hover-lift">--}}
{{--                                        <div class="card-body text-center">--}}
{{--                                            <i class="fas fa-laptop fa-3x text-primary mb-3"></i>--}}
{{--                                            <h5 class="card-title">{{ $category->name }}</h5>--}}
{{--                                            <a href="#" class="btn btn-outline-primary btn-sm">--}}
{{--                                                Xem sản phẩm--}}
{{--                                            </a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endforeach--}}
{{--                        @endif--}}
{{--                    </div>--}}
{{--                </section>--}}
            </div>

            <!-- Right Banner -->
            <div class="col-md-2 d-none d-md-block">
                <div class="side-banner bg-gradient-success text-white h-50 d-flex align-items-center justify-content-center rounded">
                    <h5 style="writing-mode: vertical-rl; text-orientation: mixed;" class="fw-bold">
                        DEAL KHỦNG HÔM NAY
                    </h5>
                </div>
            </div>
        </div>
    </div>

    <style>
        .hover-lift {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .hover-lift:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
        }
        .side-banner {
            min-height: 800px;
        }
        .bg-gradient-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .bg-gradient-info {
            background: linear-gradient(135deg, #36d1dc 0%, #5b86e5 100%);
        }
        .bg-gradient-warning {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        }
        .bg-gradient-success {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        }
    </style>
@endsection
