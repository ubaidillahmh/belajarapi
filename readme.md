<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. 

## How to Setup #1
- Buka Terminal atau Command Line dan tulis ```git clone git@github.com:ubaidillahmh/belajarapi.git```
- Tunggu sampai proses selesai
- Jalankan ```composer install```
- Tunggu sampai proses selesai
- Selesai

## How to Setup #2
- Buka file ```.env``` dan ubah pada bagian ```DB_DATABASE```, ```DB_USERNAME```, ```DB_PASSWORD``` dan sesuaikan dengan pengaturan database lokal anda.
- Setelah database berhasil di sesuaikan, maka sekarang jalankan ```php artisan migrate```
- Selanjutnya jalankan ```php artisan db:seed```
- Dan terakhir jalankan ```php artisan server```
- Buka browser dan tulis ```http://127.0.0.1```
- Selesai

## Note
Jika memiliki masalah saat menggunakan ```git clone git@github.com:ubaidillahmh/belajarapi.git``` berarti anda harus menyesuaikan ```public``` dan ```private``` key. Solusi jika paling mudah adalah mengubah protocol dari ```ssh``` menjadi ```https``` contoh: ```git clone https://github.com/ubaidillahmh/belajarapi.git```

Untuk informasi lebih lanjut mengenai ssh, anda dapat membuka tautan [Docummentation](https://help.github.com/articles/connecting-to-github-with-ssh/) dan tambahan berupa video [Youtube](https://www.youtube.com/watch?v=Vi-WqFKYpnw)


