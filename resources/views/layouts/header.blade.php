<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<header class="main-header">
    <div class="container py-3">
        <div class="row align-items-center">
            <div class="col-md-2">
                <a href="/" class="navbar-brand d-flex align-items-center">
                    <div class="logo-icon bg-white rounded p-2">
                        <i class="fas fa-laptop fa-3x text-primary"></i>
                    </div>
                </a>
            </div>
            <div class="col-md-5">
                <div class="search-box">
                    <form class="d-flex" action="{{ route('search') }}" method="GET">
                        <div class="input-group">
                            <span class="input-group-text border-end-0">
                                <i class="fas fa-search fa-lg"></i>
                            </span>
                            <input type="text" class="form-control border-start-0 ps-0"
                                   name="query"
                                   placeholder="Tìm kiếm sản phẩm..."
                                   value="{{ request('query') }}"
                                   required>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-5">
                <div class="d-flex align-items-center justify-content-end">
                    <a href="#" class="header-link text-white text-decoration-none me-4 d-flex flex-column align-items-center">
                        <i class="fas fa-tools fa-2x mb-2"></i>
                        <small>Xây dựng cấu hình</small>
                    </a>
                    <a href="#" class="header-link text-white text-decoration-none me-4 d-flex flex-column align-items-center">
                        <i class="fas fa-question-circle fa-2x mb-2"></i>
                        <small>Hỗ trợ</small>
                    </a>
                    <a href="{{ route('cart.list') }}" class="header-link text-white text-decoration-none me-4 d-flex flex-column align-items-center position-relative">
                        <i class="fas fa-shopping-cart fa-2x mb-2"></i>
                        <small>Giỏ hàng</small>

                        @if(Cart::getTotalQuantity() > 0)
                            <span class="badge bg-danger rounded-pill position-absolute"
                                  style="top: -5px; right: 0px; font-size: 0.6rem;">
                            {{ Cart::getTotalQuantity() }}
                        </span>
                        @endif
                    </a>
                    @guest
                        <a href="{{ route('login') }}" class="btn btn-outline-light d-flex align-items-center">
                            <i class="fas fa-user-circle fa-lg me-2"></i>
                            <div class="text-start">
                                <small class="d-block" style="font-size: 0.7rem;">Đăng nhập/ Đăng ký</small>
                                <small class="fw-bold" style="font-size: 0.75rem;">Tài khoản ▼</small>
                            </div>
                        </a>
                    @endguest

                    @auth
                        <div class="dropdown">
                            <a href="#" class="btn btn-outline-light d-flex align-items-center dropdown-toggle" data-bs-toggle="dropdown">
                                <i class="fas fa-user-circle fa-lg me-2"></i>
                                <div class="text-start">
                                    <small class="d-block" style="font-size: 0.7rem;">Xin chào,</small>
                                    <small class="fw-bold" style="font-size: 0.75rem;">{{ Str::limit(Auth::user()->full_name, 15) }}</small>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">

                                @if (Auth::user()->isAdmin())
                                    <li>
                                        <a class="dropdown-item fw-bold text-danger" href="{{ route('admin.dashboard') }}">
                                            <i class="fas fa-shield-halved me-2"></i> Admin Panel
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider"></li>
                                @endif
                                <li><a class="dropdown-item" href="{{ route('profile.show') }}">Tài khoản của tôi</a></li>
                                    <li><a class="dropdown-item" href="{{ route('profile.orders') }}">Đơn hàng</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger">Đăng xuất</button>
                                    </form>
                                </li>

                            </ul>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</header>

<nav class="nav-secondary border-bottom">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center py-2">
            <div class="d-flex align-items-center">
                <a href="#" class="text-white text-decoration-none me-4 fw-bold">
                    <i class="fas fa-bars me-2"></i>
                    Danh mục sản phẩm
                </a>
                <a href="#" class="text-white text-decoration-none">
                    <i class="fas fa-shield-alt me-2"></i>
                    Tra cứu bảo hành
                </a>
            </div>
            <div class="d-flex align-items-center text-white">
                <span class="me-3">
                    <i class="fas fa-store me-1"></i>
                    Chuỗi cửa hàng
                </span>
                <span>
                    <i class="fas fa-phone-alt me-1"></i>
                    Gọi mua hàng: <strong>091x.xxx.xxx</strong>
                </span>
            </div>
        </div>
    </div>
</nav>
