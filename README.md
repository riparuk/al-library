# al-library

al-library adalah proyek untuk mengelola data buku sederhana menggunakan Laravel 11. Proyek ini memiliki fitur-fitur berikut:

- **Support Dark Mode**: Tampilan yang mendukung mode gelap.
- **Tampilan yang Bagus**: Desain antarmuka yang menarik dan user-friendly.
- **Autentikasi**: login dan register.
- **Menggunakan Database SQLite**: Database yang ringan dan mudah digunakan, tidak perlu mengaktifkan service tersendiri.
- **Cocok Dijadikan Starter**: Ideal untuk dijadikan proyek awal.
- **Support Pagination**: Mendukung paginasi untuk navigasi data yang lebih mudah.

## Instalasi

Ikuti langkah-langkah berikut untuk menginstal proyek ini:

1. Clone repository ini ke lokal Anda:
    ```bash
    git clone https://github.com/username/al-library.git
    ```
2. Navigasi ke direktori proyek:
    ```bash
    cd al-library
    ```
3. Instal dependensi menggunakan Composer:
    ```bash
    composer install
    ```
4. Salin file `.env.example` menjadi `.env`:
    ```bash
    cp .env.example .env
    ```
5. Generate application key:
    ```bash
    php artisan key:generate
    ```
6. Jalankan migrasi database:
    ```bash
    php artisan migrate
    ```
7. Jalankan seeder untuk membuat data admin dan data buku otomatis:
    ```bash
    php artisan db:seed
    ```
    Seeder ini akan membuat akun admin dengan email `admin@example.com` dan password `password`, serta 5 data buku otomatis.

8. Jalankan server Laravel:
    ```bash
    php artisan serve
    ```
9. Buka browser dan akses `http://localhost:8000`.

## Penggunaan

1. Mulai dengan login atau daftar akun terlebih dahulu.
2. Setelah login, Anda akan diarahkan ke halaman dashboard.

Selamat menggunakan al-library!