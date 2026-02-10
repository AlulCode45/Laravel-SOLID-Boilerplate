# Solid Boilerplate (Laravel)

Boilerplate Laravel dengan penerapan SOLID sederhana menggunakan pola Service + Repository + Interface. Contoh domain yang tersedia adalah `User`.

## Stack

- PHP 8.2
- Laravel 12
- Pest

## Struktur Utama

- Service contract: app/Contracts/Interfaces/UserServiceInterface.php
- Repository contract: app/Contracts/Repositories/UserRepositoryInterface.php
- Service: app/Services/UserService.php
- Repository: app/Repositories/EloquentUserRepository.php
- Controller: app/Http/Controllers/UserController.php
- Enum: app/Enums/UserStatus.php
- Helper: app/Helpers/helpers.php

## Dependency Injection

Binding interface ke implementasi ada di app/Providers/AppServiceProvider.php:

- UserRepositoryInterface -> EloquentUserRepository
- UserServiceInterface -> UserService

## Helper Autoload

Helper global dimuat lewat Composer files autoload. Jalankan:

```
composer dump-autoload
```

Contoh helper:

```
user_display_name($user)
```

## Routes

Resource `users` sudah disediakan di routes/web.php dan mengembalikan JSON.

- GET /users
- GET /users/{id}
- POST /users
- PUT /users/{id}
- DELETE /users/{id}

## Quick Start

```
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

## Catatan SOLID

- Controller hanya koordinasi request/response
- Service berisi aturan bisnis sederhana
- Repository mengisolasi akses data
- Kontrak menjaga dependensi tetap pada abstraction

## Lisensi

MIT
