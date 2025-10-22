@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="#">{{ $product->category->name ?? 'Sản phẩm' }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($product->name, 50) }}</li>
            </ol>
        </nav>

        <div class="row">
            <!-- Product Images -->
            <div class="col-md-5">
                <div class="product-detail-image bg-white p-4 rounded shadow-sm mb-3">
                    <img src="{{ $product->image_url ?? 'https://via.placeholder.com/500' }}"
                         class="img-fluid"
                         alt="{{ $product->name }}"
                         id="mainImage">
                </div>

                @if($product->images && $product->images->count() > 0)
                    <div class="product-thumbnails d-flex gap-2">
                        <img src="{{ $product->image_url }}"
                             class="img-thumbnail cursor-pointer active"
                             style="width: 80px; height: 80px; object-fit: contain;"
                             onclick="changeImage(this.src)">
                        @foreach($product->images as $image)
                            <img src="{{ $image->image_url }}"
                                 class="img-thumbnail cursor-pointer"
                                 style="width: 80px; height: 80px; object-fit: contain;"
                                 onclick="changeImage(this.src)">
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Product Info -->
            <div class="col-md-7">
                <div class="product-detail-info bg-white p-4 rounded shadow-sm">
                    <h2 class="product-title mb-3">{{ $product->name }}</h2>

                    <!-- Rating -->
                    <div class="product-rating mb-3">
                        <div class="d-flex align-items-center">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= floor($product->rating))
                                    <i class="fas fa-star text-warning"></i>
                                @elseif($i - 0.5 <= $product->rating)
                                    <i class="fas fa-star-half-alt text-warning"></i>
                                @else
                                    <i class="far fa-star text-warning"></i>
                                @endif
                            @endfor
                            <span class="ms-2 text-muted">({{ $product->rating }}/5)</span>
                            <span class="ms-3 text-muted">
                            <i class="fas fa-shopping-bag"></i>
                            Đã bán: {{ $product->sold_count }}
                        </span>
                        </div>
                    </div>

                    <!-- Price -->
                    <div class="product-price mb-4">
                        <div class="d-flex align-items-center gap-3">
                            <h3 class="text-danger mb-0">
                                {{ number_format($product->price, 0, ',', '.') }}₫
                            </h3>
                            @if($product->old_price)
                                <del class="text-muted h5 mb-0">
                                    {{ number_format($product->old_price, 0, ',', '.') }}₫
                                </del>
                                <span class="badge bg-danger">
                                -{{ round($product->discount_percent) }}%
                            </span>
                            @endif
                        </div>
                    </div>

                    <!-- Stock Status -->
                    <div class="stock-status mb-4">
                        @if($product->stock > 20)
                            <span class="badge bg-success fs-6 px-3 py-2">
                            <i class="fas fa-check-circle"></i> Còn hàng
                        </span>
                        @elseif($product->stock > 0)
                            <span class="badge bg-warning fs-6 px-3 py-2">
                            <i class="fas fa-exclamation-triangle"></i> Chỉ còn {{ $product->stock }} sản phẩm
                        </span>
                        @else
                            <span class="badge bg-danger fs-6 px-3 py-2">
                            <i class="fas fa-times-circle"></i> Hết hàng
                        </span>
                        @endif
                    </div>

                    <!-- Warranty -->
                    @if($product->warranty)
                        <div class="warranty-info mb-4">
                            <p class="mb-0">
                                <i class="fas fa-shield-alt text-success"></i>
                                <strong>Bảo hành:</strong> {{ $product->warranty }}
                            </p>
                        </div>
                    @endif

                    <!-- Actions -->
                    <div class="product-actions mb-4">
                        <div class="d-flex gap-2">
                            <button class="btn btn-danger btn-lg flex-fill" @if($product->stock == 0) disabled @endif>
                                <i class="fas fa-shopping-cart me-2"></i>
                                Mua ngay
                            </button>
                            <button class="btn btn-outline-primary btn-lg" @if($product->stock == 0) disabled @endif>
                                <i class="fas fa-cart-plus"></i>
                            </button>
                            <button class="btn btn-outline-secondary btn-lg">
                                <i class="fas fa-heart"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Promotions -->
                    <div class="promotions border rounded p-3 mb-3">
                        <h6 class="text-primary fw-bold mb-2">
                            <i class="fas fa-gift"></i> Ưu đãi đặc biệt
                        </h6>
                        <ul class="list-unstyled mb-0 small">
                            <li class="mb-1">✓ Miễn phí giao hàng toàn quốc</li>
                            <li class="mb-1">✓ Trả góp 0% qua thẻ tín dụng</li>
                            <li class="mb-1">✓ Tặng quà trị giá 500.000đ khi mua kèm</li>
                            <li>✓ Thu cũ đổi mới, trợ giá cao</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Specifications -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="bg-white p-4 rounded shadow-sm">
                    <h4 class="fw-bold mb-3">
                        <i class="fas fa-info-circle text-primary"></i>
                        Thông số kỹ thuật
                    </h4>

                    @if($product->spec && is_array($product->spec))
                        <table class="table table-bordered">
                            <tbody>
                            @foreach($product->spec as $key => $value)
                                <tr>
                                    <td class="fw-bold bg-light" style="width: 30%">{{ $key }}</td>
                                    <td>{{ $value }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-muted">Thông tin chi tiết đang được cập nhật...</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Product Description -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="bg-white p-4 rounded shadow-sm">
                    <h4 class="fw-bold mb-3">
                        <i class="fas fa-file-alt text-primary"></i>
                        Mô tả sản phẩm
                    </h4>
                    <p>{{ $product->description ?? 'Thông tin mô tả sản phẩm đang được cập nhật...' }}</p>
                </div>
            </div>
        </div>

        <!-- Related Products -->
        @if(isset($relatedProducts) && $relatedProducts->count() > 0)
            <div class="row mt-5">
                <div class="col-12">
                    <h4 class="fw-bold mb-3">
                        <i class="fas fa-box-open text-primary"></i>
                        Sản phẩm liên quan
                    </h4>
                    <div class="row g-3">
                        @foreach($relatedProducts as $related)
                            <div class="col-md-3 col-sm-6">
                                <a href="{{ route('product.show', $related->product_id) }}" class="text-decoration-none">
                                    @include('partials.product_card', ['product' => $related])
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div>

    <script>
        function changeImage(src) {
            document.getElementById('mainImage').src = src;
            document.querySelectorAll('.product-thumbnails img').forEach(img => {
                img.classList.remove('active');
            });
            event.target.classList.add('active');
        }
    </script>

    <style>
        .product-detail-image img {
            max-height: 450px;
            object-fit: contain;
            width: 100%;
        }
        .product-thumbnails img {
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }
        .product-thumbnails img:hover,
        .product-thumbnails img.active {
            border-color: #0d6efd;
            transform: scale(1.05);
        }
        .cursor-pointer {
            cursor: pointer;
        }
    </style>
@endsection
