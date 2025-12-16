@echo off
@REM Directory of Laravel project
cd /d /Users/fujianggraeni/Documents/App/ASSET_MANAGEMENT/AMS P-1

@REM Run clear cache
php artisan cache:clear

@REM Run database migrations
php artisan migrate

@REM Run user data into table
php artisan db:seed --class=UsersSeeder

@REM Run Role data into table
php artisan db:seed --class=RolesSeeder

@REM Run dashboard name into table
php artisan db:seed --class=DashboardIdentitionSeeder

@REM Run option seeder into table
php artisan db:seed --class=ItemsSeeder
php artisan db:seed --class=ManufacturersSeeder
php artisan db:seed --class=ConfigurationStatusesSeeder
php artisan db:seed --class=LocationsSeeder
php artisan db:seed --class=PositionStatusesSeeder

@REM Directory of public (where image saved)
cd /d /Users/fujianggraeni/Documents/App/ASSET_MANAGEMENT/AMS P-1/public

@REM Remove storage (image saved)
rmdir storage

@REM Exit for public directory
cd ..

@REM Set directory of image become public and also auto created storage folder again
php artisan storage:link

@REM Running server
php artisan serve --port=8002