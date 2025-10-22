![logo.png](public/images/logo.png)

<h1 align="center">Website Bán Linh Kiện Máy Tính</h1>

<p align="center">
  <img src="https://img.shields.io/badge/PHP-7d95ff?style=for-the-badge&logo=php&logoColor=white">
  <img src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white">
  <img src="https://img.shields.io/badge/Node.js-43853D?style=for-the-badge&logo=node.js&logoColor=white">
  <img src="https://img.shields.io/badge/Vite-646CFF?style=for-the-badge&logo=vite&logoColor=white">
  <img src="https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white">
  <img src="https://img.shields.io/badge/Bootstrap-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white">
  <img src="https://img.shields.io/badge/Sass-CC6699?style=for-the-badge&logo=sass&logoColor=white">
  <img src="https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white">
  <img src="https://img.shields.io/badge/Cloudinary-3448C5?style=for-the-badge&logo=cloudinary&logoColor=white">
  <img src="https://img.shields.io/badge/PhpStorm-181717?style=for-the-badge&logo=phpstorm&logoColor=white">
</p>

---

## Thông tin nhóm

- Vũ Thành Long - 23010882
- Bùi Quang Huy - 23010865
- Trần Bá Minh Đức - 23010210

---

## Giới thiệu

**DoroGearPHP** là website thương mại điện tử bán linh kiện máy tính, được phát triển bằng **Laravel** cho backend và **Vite** cho frontend.  
Dự án hướng đến việc xây dựng một hệ thống nhanh, hiện đại, dễ bảo trì và có khả năng mở rộng.

---

## Yêu cầu hệ thống

- PHP >= 8.2
- Composer
- Node.js & NPM
- MySQL
- Cloudinary (dùng để lưu trữ hình ảnh trên cloud)

---

## Cài đặt và chạy dự án

### 1. Clone repository

```bash
git clone https://github.com/Phenikaa-team/DoroGearPHP.git
cd DoroGearPHP
```

### 2. Cài đặt dependencies

```bash
composer install
npm install
```

### 3. Cấu hình môi trường

Sao chép file `.env.example` thành `.env` và tạo key ứng dụng:

```bash
cp .env.example .env
php artisan key:generate
```

Cập nhật các thông tin trong file `.env`:

```
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
CLOUDINARY_URL=your_cloudinary_url
```

> Bạn cần có tài khoản [Cloudinary](https://cloudinary.com/) để lấy `CLOUDINARY_URL`.

---

### 4. Khởi tạo cơ sở dữ liệu

```bash
php artisan migrate:fresh --seed
```

---

### 5. Khởi chạy dự án

Mở **hai terminal**:

**Terminal 1 – Frontend (Vite):**
```bash
npm run dev
```

**Terminal 2 – Backend (Laravel):**
```bash
php artisan serve
```

Truy cập website tại:  
[http://127.0.0.1:8000](http://127.0.0.1:8000)

---

## Công nghệ sử dụng

| Thành phần | Công nghệ |
|-------------|------------|
| Backend     | Laravel 11 |
| Frontend    | Vite, Sass, Bootstrap, Tailwind CSS |
| Database    | MySQL |
| Storage     | Cloudinary |

---
