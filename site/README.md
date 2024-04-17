<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Case Laravel Restapi Schema
* Laravel Resource
* Laravel Request
* Laravel Spatie Role & Permission
* Laravel Passport
* Laravel Services Repository Pattern 
* Laravel Observer
* Laravel Rest Api Response
* Error Handling Control
* Composer v2.5.8

###### Kurulum
- Docker ile kurulum için
- Terminalden proje dizinine gelip;
- docker-compose up -d
- docker exec -it api-app bash 
- composer install
- php artisan migrate && php artisan db:seed && php artisan passport:install

###### Normal kurulum
- Proje dizinide;
- composer install
- php artisan migrate && php artisan db:seed && php artisan passport:install




###### Not
 - Kullanıcı ve ürünler seed ile otomatik oluşturuluyor.
 - Oluşturulan user bilgileri; 
 - Email: `test@test.com`
 - Password: `12345`
 - postman colletionu import edip kontrol edebilirsiniz
 - localhost:8000/api ... api docker url 
 - localhost:8001 ... phpmyadmin -> giriş bilgileri 
 - `host= api.mysql`, `kullanıcı adı= user`, `şifre = root`

