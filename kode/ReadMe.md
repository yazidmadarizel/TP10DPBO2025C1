# Sistem Manajemen Restoran

Sistem Manajemen Restoran adalah program web berbasis PHP yang didesain untuk membantu pengelolaan operasional restoran, termasuk manajemen kategori menu, item menu, dan pesanan. Program ini menggunakan pola arsitektur MVVM (Model-View-ViewModel) dan database MySQL.

## Desain Sistem

### Arsitektur Program (MVVM)

Program ini dibuat dengan pola arsitektur MVVM (Model-View-ViewModel) yang membagi program menjadi tiga lapisan utama:

1. **Model**: Bertanggung jawab untuk interaksi langsung dengan database
   - `MenuCategory.php` - Model untuk tabel kategori menu
   - `MenuItem.php` - Model untuk tabel item menu
   - `Order.php` - Model untuk tabel pesanan

2. **ViewModel**: Bertindak sebagai perantara antara Model dan View, menyediakan logika bisnis
   - `MenuCategoryViewModel.php` - ViewModel untuk kategori menu
   - `MenuItemViewModel.php` - ViewModel untuk item menu
   - `OrderViewModel.php` - ViewModel untuk pesanan

3. **View**: Menampilkan data kepada pengguna
   - Form dan tampilan daftar untuk setiap entitas

### Struktur Database

Database terdiri dari tiga tabel utama:

1. **menu_category**: Menyimpan kategori menu
   - `id`: ID unik kategori (primary key)
   - `name`: Nama kategori
   - `description`: Deskripsi kategori

2. **menu_item**: Menyimpan item menu
   - `id`: ID unik item menu (primary key)
   - `name`: Nama item menu
   - `description`: Deskripsi item menu
   - `price`: Harga item menu
   - `category_id`: ID kategori (foreign key ke tabel menu_category)
   - `is_available`: Status ketersediaan item menu

3. **order**: Menyimpan pesanan
   - `id`: ID unik pesanan (primary key)
   - `customer_name`: Nama pelanggan
   - `table_number`: Nomor meja
   - `menu_item_id`: ID item menu yang dipesan (foreign key ke tabel menu_item)
   - `quantity`: Jumlah item yang dipesan
   - `order_time`: Waktu pesanan dibuat
   - `status`: Status pesanan (pending, preparing, served, paid)

## Alur Program

### 1. Alur Menu Kategori

- **Daftar Kategori**: User dapat melihat semua kategori menu yang tersedia
  - URL: `index.php?entity=menu_category&action=list`
  - View: `menu_category_list.php`

- **Tambah Kategori**: User dapat menambahkan kategori menu baru
  - URL: `index.php?entity=menu_category&action=add`
  - Form: `menu_category_form.php`
  - Proses: Data kategori baru disimpan ke database melalui `MenuCategoryViewModel`

- **Edit Kategori**: User dapat mengubah kategori menu yang sudah ada
  - URL: `index.php?entity=menu_category&action=edit&id=X`
  - Form: `menu_category_form.php` (pre-filled dengan data kategori)
  - Proses: Data kategori diperbarui melalui `MenuCategoryViewModel`

- **Hapus Kategori**: User dapat menghapus kategori menu
  - URL: `index.php?entity=menu_category&action=delete&id=X`
  - Proses: Kategori dihapus dari database melalui `MenuCategoryViewModel`

### 2. Alur Item Menu

- **Daftar Item Menu**: User dapat melihat semua item menu yang tersedia
  - URL: `index.php?entity=menu_item&action=list`
  - View: `menu_item_list.php`

- **Tambah Item Menu**: User dapat menambahkan item menu baru
  - URL: `index.php?entity=menu_item&action=add`
  - Form: `menu_item_form.php` (dengan dropdown kategori)
  - Proses: Data item menu baru disimpan ke database melalui `MenuItemViewModel`

- **Edit Item Menu**: User dapat mengubah item menu yang sudah ada
  - URL: `index.php?entity=menu_item&action=edit&id=X`
  - Form: `menu_item_form.php` (pre-filled dengan data item menu)
  - Proses: Data item menu diperbarui melalui `MenuItemViewModel`

- **Hapus Item Menu**: User dapat menghapus item menu
  - URL: `index.php?entity=menu_item&action=delete&id=X`
  - Proses: Item menu dihapus dari database melalui `MenuItemViewModel`

### 3. Alur Pesanan

- **Daftar Pesanan**: User dapat melihat semua pesanan yang ada
  - URL: `index.php?entity=order&action=list` (default)
  - View: `order_list.php`

- **Tambah Pesanan**: User dapat menambahkan pesanan baru
  - URL: `index.php?entity=order&action=add`
  - Form: `order_form.php` (dengan dropdown item menu)
  - Proses: Data pesanan baru disimpan ke database melalui `OrderViewModel`

- **Edit Pesanan**: User dapat mengubah pesanan yang sudah ada
  - URL: `index.php?entity=order&action=edit&id=X`
  - Form: `order_form.php` (pre-filled dengan data pesanan)
  - Proses: Data pesanan diperbarui melalui `OrderViewModel`

- **Hapus Pesanan**: User dapat menghapus pesanan
  - URL: `index.php?entity=order&action=delete&id=X`
  - Proses: Pesanan dihapus dari database melalui `OrderViewModel`

## Fitur Data Binding

program mengimplementasikan fitur data binding untuk memudahkan transfer data antara ViewModel dan View:

1. **List Binding**:
   - Data dari ViewModel diambil dan diikat ke tampilan list (misal: `$categoryList = $viewModel->getCategoryList()`)
   - Data ditampilkan dengan loop di view (misal: `foreach ($categoryList as $category)`)

2. **Form Binding**:
   - Data untuk formulir edit diambil dari ViewModel (misal: `$category = $viewModel->getCategoryById($_GET['id'])`)
   - Data digunakan untuk mengisi nilai default input form

3. **Foreign Key Binding**:
   - Data relasi untuk dropdown di form diambil dengan binding (misal: daftar kategori untuk form menu item)

## Keamanan

Sistem mengimplementasikan keamanan dengan menggunakan:

1. **PDO (PHP Data Objects)** untuk koneksi database
2. **Prepared Statements** untuk mencegah SQL injection pada setiap query
3. **Parameter Binding** untuk memastikan data yang diinput aman

## Cara Penggunaan

1. Import file `restaurant.sql` ke dalam database MySQL
2. Konfigurasikan koneksi database di file `config/Database.php`
3. Akses program melalui browser dengan URL `http://localhost/restaurant/index.php`

