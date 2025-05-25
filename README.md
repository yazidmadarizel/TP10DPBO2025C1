# TP10DPBO2025C1

Saya Yazid Madarizel dengan NIM 2305328 mengerjakan soal TP 10 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

# Sistem Manajemen Restoran

Sistem Manajemen Restoran adalah program web berbasis PHP yang didesain untuk membantu pengelolaan operasional restoran, termasuk manajemen kategori menu, item menu, dan pesanan. Program ini menggunakan pola arsitektur MVVM (Model-View-ViewModel) dan database MySQL.

## Desain Program

![Untitled Diagram drawio](https://github.com/user-attachments/assets/972ada85-d8d6-49ba-b82e-a7c69b42df0a)

### menu\_category (kategori menu)

* `id` (primary key)
* `name` (nama kategori)
* `description` (deskripsi kategori)

### menu\_item (item menu)

* `id` (primary key)
* `name` (nama item)
* `description` (deskripsi item)
* `price` (harga)
* `category_id` (foreign key ke kategori menu)
* `is_available` (status ketersediaan)

### order (pesanan)

* `id` (primary key)
* `customer_name` (nama pelanggan)
* `table_number` (nomor meja)
* `menu_item_id` (foreign key ke item menu)
* `quantity` (jumlah item)
* `order_time` (waktu pemesanan)
* `status` (pending/preparing/served/paid)

## Alur Penjelasan

### 1. Manajemen Kategori Menu

* Lihat daftar semua kategori menu
* Tambah kategori baru
* Edit kategori yang ada
* Hapus kategori

**Informasi yang dicatat**: nama dan deskripsi kategori

### 2. Manajemen Item Menu

* Lihat daftar semua item menu
* Tambah item menu baru
* Edit item menu
* Hapus item menu

**Informasi yang dicatat**: nama item, deskripsi, harga, kategori, status ketersediaan

### 3. Manajemen Pesanan

* Lihat semua pesanan
* Tambah pesanan baru
* Edit detail pesanan
* Hapus pesanan

**Informasi yang dicatat**: nama pelanggan, nomor meja, item yang dipesan, jumlah, waktu pesanan, status pesanan

## Alur Aplikasi

### Akses Awal

* Pengguna mengunjungi `index.php`
* Tampilan default menunjukkan daftar pesanan
* Menu navigasi tersedia untuk mengakses kategori menu, item menu, dan pesanan

### Contoh Alur Data (Menambah Pesanan)

**Input Pengguna (Form)** → `index.php` → `OrderViewModel` → Model `Order` → **Database**

1. Pengguna mengisi form pesanan
2. Data dikirim ke `index.php`
3. `OrderViewModel` memproses data
4. Model `Order` menyimpan data ke database

## Fitur Teknis

### Arsitektur MVVM

* **Model**: Akses data dan interaksi database (`MenuCategory`, `MenuItem`, `Order`)
* **ViewModel**: Logika bisnis dan data binding (`MenuCategoryViewModel`, `MenuItemViewModel`, `OrderViewModel`)
* **View**: Tampilan antarmuka pengguna (form, tabel list)

## Keamanan

* Menggunakan **PDO** untuk koneksi database
* Menggunakan **Prepared Statements** untuk semua query
* **Parameter Binding** untuk validasi dan mencegah SQL Injection

## Dokumentasi

https://github.com/user-attachments/assets/d09be939-e820-44a7-a172-ffd138ffec28


