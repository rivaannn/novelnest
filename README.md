<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

## NovelNest - LifeTech

Novelnest" adalah platform digital yang mirip dengan Gramedia, tetapi dengan pendekatan yang lebih modern dan efisien. Sebagaimana Gramedia yang merupakan toko buku fisik dan penerbit besar, Novelnest menghadirkan pengalaman membaca yang seru dan akses ke berbagai karya sastra, tetapi secara eksklusif melalui dunia maya.
Evolusi digital dari pengalaman Gramedia, memberikan lebih banyak akses, interaktivitas, dan kenyamanan kepada pembaca dan penulis. Dengan menggabungkan elemen tradisional dan digital, Novelnest menciptakan ekosistem sastra yang dinamis dan relevan dalam era modern.


## Dokumentasi First Install

```bash
git clone https://github.com/rivaannn/novelnest.git
cd project-name
```
Instal semua PHP dependency dengan menjalankan perintah berikut ini
```bash
composer install
```
Jangan lupa untuk menginstall semua node package yang kita butuhkan seperti:
```bash
npm install
```
Jika ingin dikembangkan, bisa dengan menjalankan
```bash
npm run dev
```

Buat 1 file dengan nama `.env` kemudian silakan copy semua yang ada di dalam file `.env.example` ke dalam file `.env`. Kemudian buka terminal kembali untuk generasi key baru.
```bash
php artisan key:generate
```
Buat 1 database, dan sesuaikan namanya dengan konfigurasi yang ada di file `.env`.
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=novelnest
DB_USERNAME=root
DB_PASSWORD=
```
Setelah itu, jalankan perintah berikut pada terminal.
```bash
php artisan migrate
```
Setelah itu, jalankan `php artisan serve` untuk memulai server laravel nya.

Silakan buat Pull Request jika ingin membuat perubahan, Sesuaikan dengan branch nya masing-masing.
Branch yang tersedia :
- Main
- Rivan
- Rejka
- Angga
- Yudha

## Dokumentasi Git Pull dan Git Push setiap mengerjakan

sebelum itu, pindah ke branch nya masing-masing (contoh disini kita pindah branch ke branch rivan):
```bash
git checkout rivan
```

setelahh itu lanjut mengerjakan progress di masing-masing branch, jangan lupa untuk git pull dulu :
```bash
git pull origin main
```

Setelah itu, jalankan `php artisan serve` untuk memulai server laravel nya.
dan jalankan juga `npm run dev` untuk rendering bagian front-end nya.

Jika sudah mengerjakan, push ke github dengan perintah berikut :
```bash
git init
git add .
git commit -m "task apa saja yang sudah dikerjakan"
git push
```

Silakan buat Pull Request jika ingin membuat perubahan, Sesuaikan dengan branch nya masing-masing.

`Last Edited 23/11/23 @novelnest`