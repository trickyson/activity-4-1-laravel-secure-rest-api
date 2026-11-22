# Activity 4.1 — Laravel 11 Secure REST API

**NEUST MSIT — Create and Secure a REST API**

This repository contains **Laravel 11 project overlay files**, not the full Laravel framework skeleton or vendor dependencies. GitHub Actions assembles a fresh Laravel 11 skeleton and runs feature tests automatically. Local XAMPP and Postman evidence must be captured separately.

## Windows 11 installation
1. Install XAMPP (PHP 8.2+), Composer, and Postman. Start Apache and MySQL.
2. Create a MySQL database named `testdb` in phpMyAdmin.
3. Open CMD:
```cmd
cd /d C:\xampp\htdocs
composer create-project laravel/laravel laravelapi "^11.0"
cd laravelapi
php artisan install:api
```
4. Download this repository as ZIP and copy its `app`, `routes`, `tests`, `public`, and `docs` content into `C:\xampp\htdocs\laravelapi`, preserving folder structure.
5. Update the local Laravel `.env`:
```ini
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=testdb
DB_USERNAME=root
DB_PASSWORD=
```
6. Run `php artisan config:clear`, `php artisan migrate`, and `php artisan serve`.
7. Visit `http://127.0.0.1:8000/api/users` and `http://127.0.0.1:8000/docs/`.
8. Import `postman/Activity_4_1.postman_collection.json` into Postman.

## Security
The API validates names, email uniqueness, and password confirmation; Eloquent hashes passwords, responses omit password fields, and the endpoints use Laravel's API rate limiter. These endpoints are public for the classroom exercise, **not authenticated**. Do not use production data or publish .env secrets.

## Submission
The professor also requires a one-page report, Swagger/Postman screenshots, and a GitHub link or ZIP. Automated tests are supplemental and **do not prove XAMPP or Postman were run locally**.
