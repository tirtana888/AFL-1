# 🛒 Laravel E-commerce Mini - Toko Elektronik Indonesia

Aplikasi e-commerce sederhana berbasis Laravel 10 untuk tugas AFL (Algoritma Framework Laravel).

![PHP](https://img.shields.io/badge/PHP-8.1+-777BB4?logo=php&logoColor=white)
![Laravel](https://img.shields.io/badge/Laravel-10-FF2D20?logo=laravel&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3-7952B3?logo=bootstrap&logoColor=white)
![SQLite](https://img.shields.io/badge/SQLite-Database-003B57?logo=sqlite&logoColor=white)

---

## 📋 Deskripsi Proyek

Aplikasi **ShopMini** adalah toko online yang menjual berbagai peralatan elektronik Indonesia. Aplikasi ini dibangun menggunakan framework Laravel 10 dengan fitur-fitur lengkap untuk manajemen produk, keranjang belanja, dan checkout.

### ✨ Fitur Utama

- ✅ **CRUD Produk** - Create, Read, Update, Delete produk
- ✅ **Katalog Produk** - Tampilan grid dengan pagination
- ✅ **Search & Filter** - Cari berdasarkan nama/deskripsi, filter harga
- ✅ **Sorting** - Urutkan berdasarkan nama/harga (asc/desc)
- ✅ **Keranjang Belanja** - Tambah, update quantity, hapus item
- ✅ **Checkout** - Form pengiriman dan metode pembayaran
- ✅ **Order History** - Riwayat pembelian user
- ✅ **Authentication** - Register, Login, Logout (Laravel Breeze)
- ✅ **UI Modern** - Bootstrap 5 dengan desain gradient

---

## 🗂️ Struktur Database

### Entity Relationship Diagram

```
┌─────────────┐       ┌─────────────┐       ┌─────────────┐
│   users     │       │  categories │       │  products   │
├─────────────┤       ├─────────────┤       ├─────────────┤
│ id          │       │ id          │◄──────│ category_id │
│ name        │       │ name        │       │ name        │
│ email       │       │ timestamps  │       │ description │
│ password    │       └─────────────┘       │ price       │
│ timestamps  │                             │ timestamps  │
└──────┬──────┘                             └──────┬──────┘
       │                                           │
       │ 1:N                                       │ 1:N
       │                                           │
┌──────▼──────┐                             ┌──────▼──────┐
│   orders    │                             │    carts    │
├─────────────┤                             ├─────────────┤
│ id          │                             │ id          │
│ user_id     │                             │ user_id     │
│ shipping_   │                             │ product_id  │
│   address   │                             │ quantity    │
│ payment_    │                             │ timestamps  │
│   method    │                             └─────────────┘
│ total_amount│
│ status      │
│ timestamps  │
└──────┬──────┘
       │ 1:N
       │
┌──────▼──────┐
│order_details│
├─────────────┤
│ id          │
│ order_id    │
│ product_id  │
│ quantity    │
│ price_at_   │
│   purchase  │
│ timestamps  │
└─────────────┘
```

---

## 🚀 Instalasi

### Prasyarat

- PHP 8.1+
- Composer
- Laragon / XAMPP

### Langkah Instalasi

```bash
# 1. Clone repository
git clone https://github.com/tirtana888/AFL-1.git
cd AFL-1

# 2. Install dependencies
composer install

# 3. Copy file environment
copy env-example.txt .env

# 4. Generate application key
php artisan key:generate

# 5. Jalankan migrasi dan seeder
php artisan migrate --seed

# 6. Jalankan server development
php artisan serve
```

### Akses Aplikasi

Buka browser dan kunjungi: **http://localhost:8000**

---

## 📁 Struktur Folder

```
AFL-1/
├── app/
│   ├── Http/Controllers/
│   │   ├── ProductController.php    # CRUD & Katalog Produk
│   │   ├── CartController.php       # Keranjang Belanja
│   │   └── OrderController.php      # Checkout & Order History
│   └── Models/
│       ├── Category.php
│       ├── Product.php
│       ├── Cart.php
│       ├── Order.php
│       └── OrderDetail.php
├── database/
│   ├── migrations/                  # Schema database
│   └── seeders/
│       ├── CategorySeeder.php       # 5 kategori elektronik
│       └── ProductSeeder.php        # 30 produk Indonesia
├── resources/views/
│   ├── layouts/app.blade.php        # Layout utama Bootstrap 5
│   ├── welcome.blade.php            # Landing page
│   ├── products/                    # Views produk
│   ├── cart/                        # Views keranjang
│   ├── checkout/                    # Views checkout
│   ├── orders/                      # Views order history
│   └── auth/                        # Views login/register
└── routes/web.php                   # Definisi routing
```

---

## 🎯 Fitur Detail

### 1. Katalog Produk (`/products`)

| Fitur | Deskripsi |
|-------|-----------|
| Search | Cari produk berdasarkan nama atau deskripsi |
| Filter Harga | Filter berdasarkan harga minimum/maksimum |
| Sorting | Urutkan berdasarkan nama (A-Z, Z-A) atau harga (rendah-tinggi, tinggi-rendah) |
| Pagination | 20 produk per halaman |

### 2. CRUD Produk

| Route | Method | Deskripsi |
|-------|--------|-----------|
| `/products` | GET | List semua produk |
| `/products/create` | GET | Form tambah produk |
| `/products/store` | POST | Simpan produk baru |
| `/products/show/{id}` | GET | Detail produk |
| `/products/edit/{id}` | GET | Form edit produk |
| `/products/update/{id}` | POST | Update produk |

### 3. Keranjang Belanja (Auth Required)

| Route | Method | Deskripsi |
|-------|--------|-----------|
| `/cart` | GET | Lihat keranjang |
| `/cart/add/{product}` | POST | Tambah ke keranjang |
| `/cart/update/{cart}` | PATCH | Update quantity |
| `/cart/remove/{cart}` | DELETE | Hapus item |

### 4. Checkout & Order

| Route | Method | Deskripsi |
|-------|--------|-----------|
| `/checkout` | GET | Form checkout |
| `/checkout` | POST | Proses order |
| `/orders` | GET | Riwayat order |

---

## 📦 Data Produk

Aplikasi ini berisi **30 produk elektronik Indonesia** dalam 5 kategori:

| Kategori | Produk |
|----------|--------|
| **Smartphone & Tablet** | Samsung Galaxy A54, iPhone 15 Pro Max, Xiaomi Redmi Note 12, OPPO Reno 10, Vivo V29, Samsung Tab S9 |
| **Laptop & Komputer** | ASUS ROG Strix G16, Lenovo IdeaPad, HP Pavilion, Acer Aspire, MacBook Air M2, MSI Modern |
| **TV & Audio** | Samsung Smart TV 55", LG OLED TV, TCL Android TV, Sony Soundbar, JBL Flip 6, Sony WH-1000XM5 |
| **Peralatan Rumah Tangga** | Samsung Kulkas, LG Mesin Cuci, Panasonic AC, Philips Air Fryer, Sharp Rice Cooker, Electrolux Vacuum |
| **Aksesoris Elektronik** | AirPods Pro 2, Galaxy Watch 6, Logitech MX Master, Anker PowerCore, Baseus Charger, Xiaomi Mi Band 8 |

---

## 🛠️ Teknologi

| Teknologi | Versi | Deskripsi |
|-----------|-------|-----------|
| PHP | 8.1+ | Bahasa pemrograman |
| Laravel | 10.x | Framework PHP |
| Bootstrap | 5.3 | CSS Framework |
| SQLite | - | Database lokal |
| Laravel Breeze | 1.x | Authentication |

---

## 📸 Screenshot

### Landing Page
- Hero section dengan gradient
- Kategori produk dengan icon
- Fitur Fast Delivery, Secure Payment, 24/7 Support

### Katalog Produk
- Grid produk dengan card modern
- Filter & sorting
- Pagination

### Cart & Checkout
- Table keranjang
- Order summary
- Payment method selection

---

## 👨‍💻 Dibuat Oleh

**Tugas AFL - Laravel E-commerce Mini**

Repository: [https://github.com/tirtana888/AFL-1](https://github.com/tirtana888/AFL-1)

---

## 📝 Lisensi

Proyek ini dibuat untuk keperluan tugas kuliah.
