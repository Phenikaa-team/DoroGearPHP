
<p align="center">
  <img src="public/images/logo.png" alt="Logo" width="200">
</p>

<h1 align="center">Website Bán Linh Kiện Máy Tính</h1>

<div align="center">

![Laravel](https://img.shields.io/badge/Laravel_11-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP_8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white)
![Composer](https://img.shields.io/badge/Composer-885630?style=for-the-badge&logo=composer&logoColor=white)
![Vite](https://img.shields.io/badge/Vite-646CFF?style=for-the-badge&logo=vite&logoColor=white)
![Sass](https://img.shields.io/badge/Sass-CC6699?style=for-the-badge&logo=sass&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap_5-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)
![TailwindCSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![Cloudinary](https://img.shields.io/badge/Cloudinary-3448C5?style=for-the-badge&logo=cloudinary&logoColor=white)
![Node.js](https://img.shields.io/badge/Node.js-43853D?style=for-the-badge&logo=node.js&logoColor=white)
![NPM](https://img.shields.io/badge/NPM-CB3837?style=for-the-badge&logo=npm&logoColor=white)
![Git](https://img.shields.io/badge/Git-F05032?style=for-the-badge&logo=git&logoColor=white)
![PhpStorm](https://img.shields.io/badge/PhpStorm-000000?style=for-the-badge&logo=phpstorm&logoColor=white)

</div>

<div align="center">

![GitHub repo size](https://img.shields.io/github/repo-size/Phenikaa-team/DoroGearPHP?style=flat-square)
![GitHub last commit](https://img.shields.io/github/last-commit/Phenikaa-team/DoroGearPHP?style=flat-square)
![GitHub issues](https://img.shields.io/github/issues/Phenikaa-team/DoroGearPHP?style=flat-square)
![GitHub pull requests](https://img.shields.io/github/issues-pr/Phenikaa-team/DoroGearPHP?style=flat-square)

</div>

---
                        TRƯỜNG ĐẠI HỌC PHENIKAA KHOA CÔNG NGHỆ THÔNG TIN   
                                BÁO CÁO THỰC HÀNH MÔN WED NÂNG CAO
                            ĐỀ TÀI: XÂY DỰNG PHẦN MỀM BÁN HÀNG MÁY TÍNH
                            Giảng viên hướng dẫn: NGUYỄN THỊ THÙY LIÊN 
     









                                                            
                                                                               
## Thông tin nhóm

- Trần Bá Minh Đức - 23010210
- Vũ Thành Long - 23010882
- Bùi Quang Huy - 23010865

---

## 📖 Giới thiệu

<div align="center">

**DoroGearPHP** là website thương mại điện tử chuyên bán linh kiện máy tính, được phát triển với công nghệ hiện đại.

[![Laravel](https://img.shields.io/badge/Built_with-Laravel_11-FF2D20?style=flat-square&logo=laravel)](https://laravel.com)
[![Vite](https://img.shields.io/badge/Powered_by-Vite-646CFF?style=flat-square&logo=vite)](https://vitejs.dev)
[![License](https://img.shields.io/badge/License-MIT-green.svg?style=flat-square)](LICENSE)

</div>

### ✨ Điểm nổi bật
```
🚀 Hiệu suất cao          ⚡ Build nhanh với Vite
🎨 Giao diện hiện đại     🔒 Bảo mật tốt
📱 Responsive design      🛠️ Dễ bảo trì & mở rộng
```

---

## 💻 Yêu cầu hệ thống

<table>
<tr>
<td>

**Backend**
- ![PHP](https://img.shields.io/badge/PHP-≥_8.2-777BB4?style=flat-square&logo=php)
- ![Composer](https://img.shields.io/badge/Composer-Latest-885630?style=flat-square&logo=composer)

</td>
<td>

**Frontend**
- ![Node.js](https://img.shields.io/badge/Node.js-≥_18.0-43853D?style=flat-square&logo=node.js)
- ![NPM](https://img.shields.io/badge/NPM-≥_9.0-CB3837?style=flat-square&logo=npm)

</td>
<td>

**Database & Storage**
- ![MySQL](https://img.shields.io/badge/MySQL-≥_8.0-4479A1?style=flat-square&logo=mysql)
- ![Cloudinary](https://img.shields.io/badge/Cloudinary-Account-3448C5?style=flat-square&logo=cloudinary)

</td>
</tr>
</table>

---

## 🚀 Cài đặt và chạy dự án

### ▶ Bước 1: Clone repository
```bash
 git clone https://github.com/Phenikaa-team/DoroGearPHP.git
 cd DoroGearPHP
```

### ▶ Bước 2: Cài đặt dependencies

```bash
  # Cài đặt PHP dependencies
  composer install
  
  # Cài đặt Node dependencies
  npm install
```

### ▶ Bước 3: Cấu hình môi trường

**3.1. Tạo file môi trường**

```bash
  cp .env.example .env
  php artisan key:generate
```

**3.2. Cấu hình database & cloudinary**

Mở file `.env` và cập nhật:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password

CLOUDINARY_URL=cloudinary://your_cloudinary_url
```

> 💡 **Lưu ý:** Đăng ký tài khoản miễn phí tại [Cloudinary](https://cloudinary.com/) để lấy `CLOUDINARY_URL`

### ▶ Bước 4: Khởi tạo cơ sở dữ liệu

```bash
  # Chạy migration và seed dữ liệu mẫu
  php artisan migrate:fresh --seed
```

> ⚠️ Lệnh này sẽ xóa toàn bộ dữ liệu cũ và tạo mới

### ▶ Bước 5: Khởi chạy dự án

Mở **2 terminal** và chạy đồng thời:

<table>
<tr>
<td width="50%">

**Terminal 1️⃣ – Frontend (Vite)**
```bash
  npm run dev
```
<img src="https://img.shields.io/badge/Running_on-http://localhost:5173-646CFF?style=flat-square&logo=vite" />

</td>
<td width="50%">

**Terminal 2️⃣ – Backend (Laravel)**
```bash
  php artisan serve
```
<img src="https://img.shields.io/badge/Running_on-http://127.0.0.1:8000-FF2D20?style=flat-square&logo=laravel" />

</td>
</tr>
</table>

### 🎉 Hoàn tất!

Truy cập website tại: **[http://127.0.0.1:8000](http://127.0.0.1:8000)**

---

## 📐 Kiến trúc & Database

### 🗂️ Database Schema (ERD)

<div align="center">

![Database Schema](public/images/uml.png)

*Sơ đồ quan hệ cơ sở dữ liệu đầy đủ của hệ thống*

[![View Full Size](https://img.shields.io/badge/View-Full_Size-2196F3?style=flat-square&logo=database)](public/images/uml.png)

</div>

---

### 📊 Mô tả các bảng chính

<table>
<tr>
<td width="33%">

#### 👤 **Users & Authentication**
- **users** - Thông tin người dùng
- **addresses** - Địa chỉ giao hàng
- **notifications** - Thông báo hệ thống

</td>
<td width="33%">

#### 📦 **Products & Categories**
- **products** - Sản phẩm
- **categories** - Danh mục
- **reviews** - Đánh giá sản phẩm
- **wishlists** - Yêu thích

</td>
<td width="33%">

#### 🛒 **Orders & Cart**
- **orders** - Đơn hàng
- **order_items** - Chi tiết đơn
- **cart_items** - Giỏ hàng
- **coupons** - Mã giảm giá

</td>
</tr>
</table>

---

### 🏗️ Kiến trúc hệ thống (MVC Pattern)
```
┌─────────────────────────────────────────────────────────────┐
│                     CLIENT LAYER                            │
│              Browser / Mobile Device                        │
└──────────────────────────┬──────────────────────────────────┘
                           │ HTTP/HTTPS Request
                           ▼
┌─────────────────────────────────────────────────────────────┐
│                    PRESENTATION LAYER                       │
│   ┌─────────────────────────────────────────────────────┐   │
│   │  Frontend (Vite + Sass + Bootstrap + Tailwind)      │   │
│   │  • Blade Templates                                  │   │
│   │  • JavaScript ES6+                                  │   │
│   │  • Responsive UI Components                         │   │
│   └─────────────────────────────────────────────────────┘   │
└──────────────────────────┬──────────────────────────────────┘
                           │
                           ▼
┌─────────────────────────────────────────────────────────────┐
│                   APPLICATION LAYER                         │
│                    Laravel 11 (MVC)                         │
│   ┌────────────┬─────────────┬──────────────┬────────────┐  │
│   │ Routes     │ Controllers │  Middleware  │  Services  │  │
│   │ (web.php)  │             │              │            │  │
│   └────────────┴─────────────┴──────────────┴────────────┘  │
│   ┌────────────┬─────────────┬──────────────┬────────────┐  │
│   │ Models     │ Validation  │  Events      │  Jobs      │  │
│   │ (Eloquent) │ (Requests)  │              │  (Queue)   │  │
│   └────────────┴─────────────┴──────────────┴────────────┘  │
└──────────────────────────┬──────────────────────────────────┘
                           │
                           ▼
┌─────────────────────────────────────────────────────────────┐
│                      DATA LAYER                             │
│   ┌──────────────────┐            ┌──────────────────┐      │
│   │  MySQL Database  │            │    Cloudinary    │      │
│   │  • 12 Tables     │            │  • Images/Media  │      │
│   │  • Relationships │            │  • CDN Storage   │      │
│   └──────────────────┘            └──────────────────┘      │
└─────────────────────────────────────────────────────────────┘
```

---

## 💻 Giao diện của trang

<table>
<tr>
<td width="50%">

### 🏠 Trang chủ
Hiển thị banner, sản phẩm nổi bật và danh mục
![Trang chủ](public/images/home_page.png)

</td>
<td width="50%">

### 🔐 Đăng nhập
Form đăng nhập với validation
![Đăng nhập](public/images/login.png)

</td>
</tr>
<tr>
<td width="50%">

### 📝 Đăng ký
Đăng ký tài khoản mới
![Đăng ký](public/images/register.png)

</td>
<td width="50%">

### 📦 Chi tiết sản phẩm
Thông tin đầy đủ về sản phẩm
![Thông tin sản phẩm](public/images/info.png)

</td>
</tr>
<tr>
<td width="50%">

### 🛒 Giỏ hàng
Quản lý sản phẩm trong giỏ
![Giỏ hàng](public/images/cart.png)

</td>
<td width="50%">

### 💳 Thanh toán
Xác nhận và hoàn tất đơn hàng
![Thanh toán](public/images/order.png)

</td>
</tr>
</table>
</div>

---

## ⚙️ Các chức năng của trang

### ![User Management](https://img.shields.io/badge/Quản_lý_người_dùng-4CAF50?style=flat-square)
- [x] Đăng ký tài khoản
- [x] Đăng nhập/Đăng xuất
- [x] Quản lý thông tin cá nhân
- [x] Đổi mật khẩu
- [ ] Quên mật khẩu và khôi phục
- [x] Phân quyền người dùng (Admin, User)

### ![Product Management](https://img.shields.io/badge/Quản_lý_sản_phẩm-2196F3?style=flat-square)
- [x] Hiển thị danh sách sản phẩm
- [x] Tìm kiếm sản phẩm
- [x] Lọc sản phẩm theo danh mục
- [x] Xem chi tiết sản phẩm
- [ ] Đánh giá và bình luận sản phẩm
- [x] Sản phẩm liên quan
- [x] Sản phẩm nổi bật

### ![Shopping Cart](https://img.shields.io/badge/Giỏ_hàng_&_Đặt_hàng-FF9800?style=flat-square)
- [x] Thêm sản phẩm vào giỏ hàng
- [x] Cập nhật số lượng sản phẩm trong giỏ
- [x] Xóa sản phẩm khỏi giỏ hàng
- [ ] Áp dụng mã giảm giá
- [x] Đặt hàng và thanh toán
- [ ] Xem lịch sử đơn hàng
- [ ] Theo dõi trạng thái đơn hàng

### ![Payment](https://img.shields.io/badge/Thanh_toán-9C27B0?style=flat-square)
- [x] Thanh toán COD (Tiền mặt khi nhận hàng)
- [ ] Thanh toán online qua cổng thanh toán
- [x] Tính phí vận chuyển
- [ ] Xuất hóa đơn

### ![Admin Panel](https://img.shields.io/badge/Quản_trị_viên_(Admin)-F44336?style=flat-square)
- [ ] Dashboard thống kê
- [ ] Quản lý sản phẩm (CRUD)
- [ ] Quản lý danh mục sản phẩm
- [ ] Quản lý đơn hàng
- [ ] Quản lý người dùng
- [ ] Quản lý mã giảm giá
- [ ] Quản lý bình luận/đánh giá
- [ ] Quản lý banner/slider
- [ ] Báo cáo doanh thu
