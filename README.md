## Requirement
 - PHP 8.1+
 - Node 20+
 - MariaDB 11.3
 - Composer 2.7+

## Installation
Run these commands:

- ``composer install`` or ``composer update``
- ``npm install``
- ``npm run build``
-  make a `.env` file by duplicating the `.env.example` file
- adjust `.env` file content as your configuration
- ``php artisan migrate``
- ``php artisan db:seed``
## Default User
See ``DatabaseSeeder.php``
```php
\App\Models\User::factory()->create([
    'name' => 'banu',
    'email' => 'banu@ihris.com',
]);
```
The password is `password`

You can add your own user, just change the line above
