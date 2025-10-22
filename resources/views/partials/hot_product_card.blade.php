<div class="card product-card h-100 border-0 rounded-3 shadow-sm overflow-hidden hover-shadow-lg">
    <div class="row g-0">
        <div class="col-4 p-2 d-flex align-items-center justify-content-center">
            <img src="{{ asset('storage/' . $product->image_url) }}" class="img-fluid rounded-start product-card-img" alt="{{ $product->name }}">
        </div>
        <div class="col-8">
            <div class="card-body p-2 d-flex flex-column">
                <h6 class="card-title product-card-title mb-1 text-dark fw-normal">
                    {{ Str::limit($product->name, 50, '...') }}
                </h6>

                @if ($product->old_price)
                    <p class="card-text old-price mb-0 text-secondary text-decoration-line-through">
                        {{ number_format($product->old_price, 0, ',', '.') }}đ
                    </p>
                @endif

                <div class="d-flex align-items-baseline mt-auto">
                    <h5 class="card-text current-price mb-0 text-danger fw-bold me-2">
                        {{ number_format($product->price, 0, ',', '.') }}đ
                    </h5>

                    @if ($product->discount_percent && $product->discount_percent > 0)
                        <span class="badge bg-danger discount-badge rounded-pill">
                            -{{ number_format($product->discount_percent, 0) }}%
                        </span>
                    @endif
                </div>

                {{-- <div class="mt-2 text-center">
                    <button class="btn btn-sm btn-outline-primary w-100">Thêm vào giỏ</button>
                </div> --}}
            </div>
        </div>
    </div>
</div>

<style>
    .product-card {
        transition: all 0.2s ease-in-out;
        border: 1px solid #f0f0f0 !important;
        background-color: #fff;
    }
    .product-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08) !important;
    }
    .product-card-img {
        max-height: 100px;
        width: auto;
        object-fit: contain;
    }
    .product-card-title {
        font-size: 0.875rem;
        line-height: 1.2;
        min-height: 38px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .old-price {
        font-size: 0.75rem;
        color: #888;
        min-height: 18px;
    }
    .current-price {
        font-size: 1.1rem;
    }
    .discount-badge {
        font-size: 0.7rem;
        padding: 0.25em 0.5em;
        background-color: #f44336 !important;
    }
    .hover-shadow-lg:hover {
        box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
    }
</style>
