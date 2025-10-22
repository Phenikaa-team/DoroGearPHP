@extends('layouts.app')

@section('content')
    <div class="container-fluid px-0">
        <div class="row g-0">
            <div class="col-lg-2 d-none d-lg-block">
                <div class="side-banner-left bg-gradient-primary text-white h-50 d-flex align-items-center justify-content-center rounded">
                    <h5 style="writing-mode: vertical-rl; text-orientation: mixed;" class="fw-bold">
                        KHUYẾN MÃI ĐẶC BIỆT
                    </h5>
                </div>
            </div>

            <div class="col-lg-8 px-3 py-4">
                <div class="main-banner bg-gradient-info text-white text-center py-5 mb-3 rounded shadow-sm">
                    <h2 class="fw-bold">🔥 FLASH SALE CUỐI TUẦN 🔥</h2>
                    <p class="mb-0">Giảm giá lên đến 50% - Freeship toàn quốc</p>
                </div>

                <div class="secondary-banner bg-gradient-warning text-dark text-center py-3 mb-4 rounded">
                    <h5 class="mb-0">⚡ Trả góp 0% - Giao hàng 2H ⚡</h5>
                </div>

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

                    <div class="horizontal-scroll-wrapper">
                        @foreach($hotProducts as $product)
                            <div class="horizontal-scroll-item">
                                <a href="{{ route('product.show', $product->product_id) }}" class="text-decoration-none h-100">
                                    @include('partials.hot_product_card', ['product' => $product])
                                </a>
                            </div>
                        @endforeach
                    </div>
                </section>

                @php
                    $categoryDetails = [
                        'CPU' => ['icon' => 'fa-microchip', 'displayName' => 'CPU - Vi xử lý'],
                        'Mainboard' => ['icon' => 'fa-desktop', 'displayName' => 'Mainboard - Bo mạch chủ'],
                        'RAM' => ['icon' => 'fa-memory', 'displayName' => 'RAM - Bộ nhớ trong'],
                        'GPU' => ['icon' => 'fa-gamepad', 'displayName' => 'GPU - Card màn hình'],
                        'Storage' => ['icon' => 'fa-hdd', 'displayName' => 'Storage - Ổ cứng'],
                        'Case' => ['icon' => 'fa-box', 'displayName' => 'Case - Vỏ máy tính'],
                        'PSU' => ['icon' => 'fa-plug', 'displayName' => 'PSU - Nguồn máy tính'],
                        'Cooling' => ['icon' => 'fa-fan', 'displayName' => 'Cooling - Tản nhiệt'],
                        'Monitor' => ['icon' => 'fa-tv', 'displayName' => 'Monitor - Màn hình'],
                        'Keyboard' => ['icon' => 'fa-keyboard', 'displayName' => 'Keyboard - Bàn phím'],
                        'Mouse' => ['icon' => 'fa-mouse', 'displayName' => 'Mouse - Chuột'],
                        'Headset' => ['icon' => 'fa-headset', 'displayName' => 'Headset - Tai nghe'],
                    ];
                    $defaultIcon = 'fa-tag';
                @endphp

                @if(isset($categories))
                    @foreach($categories as $category)
                        @if(isset($category->products) && $category->products->count() > 0)
                            @php
                                $details = $categoryDetails[$category->name] ?? null;
                                $icon = $details['icon'] ?? $defaultIcon;
                                $displayName = $details['displayName'] ?? $category->name;
                            @endphp
                            <section class="mb-5">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h3 class="fw-bold">
                                        <i class="fas {{ $icon }} text-primary me-2"></i>
                                        {{ $displayName }}
                                    </h3>
                                    <a href="{{ route('category.show', ['id' => $category->category_id]) }}" class="text-decoration-none">
                                        Xem tất cả <i class="fas fa-chevron-right"></i>
                                    </a>
                                </div>
                                <div class="row g-3">
                                    @foreach($category->products->take(6) as $product)
                                        <div class="col-md-4 col-sm-6">
                                            <a href="{{ route('product.show', $product->product_id) }}" class="text-decoration-none">
                                                @include('partials.product_card', ['product' => $product])
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </section>
                        @endif
                    @endforeach
                @endif
            </div>

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
        .horizontal-scroll-wrapper {
            display: flex;
            flex-wrap: nowrap;
            overflow-x: auto;
            padding-bottom: 1rem;
            -webkit-overflow-scrolling: touch;
            gap: 1rem;
        }

        .horizontal-scroll-item {
            flex: 0 0 auto;
            width: 320px;
        }

        .horizontal-scroll-wrapper::-webkit-scrollbar {
            display: none;
        }
        .horizontal-scroll-wrapper {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
@endsection
