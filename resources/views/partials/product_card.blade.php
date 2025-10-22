<div class="card product-card h-100 border-0 shadow-sm position-relative">

    @if ($product->discount_percent && $product->discount_percent > 0)
        <span class="badge bg-danger discount-badge position-absolute rounded-pill" style="top: 10px; right: 10px; z-index: 10;">
            -{{ number_format($product->discount_percent) }}%
        </span>
    @endif

    @if($product->sold_count > 300 || $product->discount_percent > 10)
        <div class="hot-badge position-absolute" style="top: 10px; left: 10px; z-index: 10;">
            <span class="badge bg-danger">HOT</span>
        </div>
    @endif

    <div class="product-image-wrapper bg-light">
        <img src="{{ $product->main_image ?? 'https://via.placeholder.com/300' }}"
             class="card-img-top p-3"
             alt="{{ $product->name }}"
             loading="lazy">
    </div>

    <div class="card-body d-flex flex-column p-3">
        <h6 class="card-title product-name mb-2">{{ Str::limit($product->name, 60) }}</h6>

        <div class="product-rating mb-2">
            @for($i = 1; $i <= 5; $i++)
                @if($i <= floor($product->rating))
                    <i class="fas fa-star text-warning small"></i>
                @elseif($i - 0.5 <= $product->rating)
                    <i class="fas fa-star-half-alt text-warning small"></i>
                @else
                    <i class="far fa-star text-warning small"></i>
                @endif
            @endfor
            <span class="text-muted small ms-1">{{ $product->rating }}</span>
            <span class="text-muted small ms-2">Đã bán {{ $product->sold_count }}</span>
        </div>

        <div class="mt-auto">
            <div class="mb-2">
                <p class="card-text text-danger fw-bold fs-5 mb-0">
                    {{ number_format($product->price, 0, ',', '.') }}₫
                </p>
                @if($product->old_price)
                    <p class="card-text text-muted small mb-0">
                        <del>{{ number_format($product->old_price, 0, ',', '.') }}₫</del>
                    </p>
                @endif
            </div>

            <div class="d-grid gap-2">
                <form action="{{ route('cart.add') }}" method="POST" onsubmit="this.querySelector('button').disabled = true; this.querySelector('button').innerHTML = 'Đang thêm...';">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                    <input type="hidden" name="quantity" value="1">
                    <button type="submit" class="btn btn-outline-primary btn-sm w-100" @if($product->stock == 0) disabled @endif>
                        <i class="fas fa-shopping-cart me-1"></i> Thêm vào giỏ
                    </button>
                </form>
            </div>

            @if($product->stock > 0)
                <div class="stock-info mt-2 text-center">
                    @if($product->stock > 20)
                        <small class="text-success">
                            <i class="fas fa-check-circle"></i> Còn hàng
                        </small>
                    @else
                        <small class="text-warning">
                            <i class="fas fa-exclamation-triangle"></i> Chỉ còn {{ $product->stock }} sản phẩm
                        </small>
                    @endif
                </div>
            @else
                <div class="text-center mt-2">
                    <small class="text-danger">Hết hàng</small>
                </div>
            @endif
        </div>
    </div>
</div>
