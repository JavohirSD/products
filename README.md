Required: <br />
PHP version 8.1+<br />
NPM version 8.1+<br />


Vat value can be changed in "/config/vat.php" configuration file.



After running seeders Admin user will be created with for testing.
Email: admin@example.com
Password: admin123



COMMANDS TO INSTALL PROJECT:

composer update
php artisan migrate
php artisan db:seed
php artisan db:seed --class=ProductsSeeder
composer require laravel/ui
php artisan ui bootstrap --auth
npm install && npm run dev



COMMAND FOR RUNNING TEST:

php artisan test
