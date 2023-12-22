@echo off
@REM Directory of Laravel project
cd /d F:\project-laravel\Dashboard\SuperAdmin

@REM Run clear cache
php artisan cache:clear

@REM Run database migrations
php artisan migrate

@REM Run user data into table
php artisan db:seed --class=UserSeeder

@REM Run landing page data seeder into table
php artisan db:seed --class=AboutUsDescriptionSeeder
php artisan db:seed --class=AboutUsTeamSeeder
php artisan db:seed --class=ContactUsCard1Seeder
php artisan db:seed --class=ContactUsCard2Seeder
php artisan db:seed --class=FooterSeeder
php artisan db:seed --class=HomeSeeder
php artisan db:seed --class=MessageSeeder
php artisan db:seed --class=NavbarSeeder

@REM Run project data seeder into table
php artisan db:seed --class=OurProjectSeeder
php artisan db:seed --class=PortalLoginSeeder

@REM Running server
php artisan serve --port=8000