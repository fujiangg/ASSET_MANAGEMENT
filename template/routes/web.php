<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ConfigurationStatusController;
use App\Http\Controllers\DataTableController;
use App\Http\Controllers\DataTableImageController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\PositionStatusController;
use App\Http\Controllers\TempImageController;
use App\Http\Controllers\CombinedController;
use App\Http\Controllers\DataTableColumnController;
use App\Http\Controllers\DynamicDataTableController;
use App\Http\Controllers\SettingTitleController;
use App\Http\Controllers\UserManagementController;


Route::get('/', function () {
//     return view('welcome');
        return redirect()->route('login');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function() {

// User Profile
Route::get('/user-profile', [UserProfileController::class, 'index'])->name('user-profile');
Route::post('/user-profile/update-personal-information', [UserProfileController::class, 'updatePersonalInformation'])->name('user-profile.update-personal-information');
Route::post('/user-profile/change-profile-picture', [UserProfileController::class, 'changeProfilePicture'])->name('user-profile.change-profile-picture');
Route::post('/user-profile/change-password', [UserProfileController::class, 'changePassword'])->name('user-profile.change-password');

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('pages.dashboard');

// Dashboard - Filter Result
Route::get('/dynamic-table/filter-results/item/{item}', [DashboardController::class, 'getItem'])->name('pages.data-tables.filter-results.item');
Route::get('/dynamic-table/filter-results/manufacturer/{manufacturer}', [DashboardController::class, 'getManufacturer'])->name('pages.data-tables.filter-results.manufacturer');
Route::get('/dynamic-table/filter-results/configuration-status/{configuration_status}', [DashboardController::class, 'getConfigurationStatus'])->name('pages.data-tables.filter-results.configuration-status');
Route::get('/dynamic-table/filter-results/location/{location}', [DashboardController::class, 'getLocation'])->name('pages.data-tables.filter-results.location');
Route::get('/dynamic-table/filter-results/position-status/{position_status}', [DashboardController::class, 'getPositionStatus'])->name('pages.data-tables.filter-results.position-status');
Route::get('/dynamic-table/filter-results/item/{item}/show', [DynamicDataTableController::class, 'show'])->name('data-tables.filter-results.item.show');

// Asset Management
Route::get('/dynamic-table', [DynamicDataTableController::class, 'index'])->name('dynamic-table.index');
Route::get('/dynamic-table/create', [DynamicDataTableController::class, 'create'])->name('dynamic-table.create');
Route::post('/dynamic-table/create', [DynamicDataTableController::class, 'store'])->name('dynamic-table.store');
Route::get('/dynamic-table/{id}/edit', [DynamicDataTableController::class, 'edit'])->name('dynamic-table.edit');
Route::post('/dynamic-table/{id}/edit/update', [DynamicDataTableController::class, 'update'])->name('dynamic-table.update');
Route::get('/dynamic-table/{id}/show', [DynamicDataTableController::class, 'show'])->name('dynamic-table.show');
Route::get('/dynamic-table/soft-delete/{id}', [DynamicDataTableController::class, 'softDelete'])->name('dynamic-table.soft-delete');

// Asset Management - Temp Images
Route::post('/dynamic-table/temp-images', [TempImageController::class, 'store'])->name('pages.data-tables.temp-images.store');

// Asset Management - Images
Route::post('/dynamic-table/dynamic-table-images', [DataTableImageController::class, 'store'])->name('pages.data-tables.data-table-images.store');
Route::delete('/dynamic-table/dynamic-table-images/{image}', [DataTableImageController::class, 'destroy'])->name('pages.data-tables.data-table-images.destroy');

// Import Excel
Route::post('/dynamic-table/import-excel',[DynamicDataTableController::class, 'importexcel'])->name('dynamic-table.import-excel');

// Recycle Bin
Route::get('/dynamic-table/recycle-bin', [DynamicDataTableController::class, 'trashed'])->name('dynamic-table.recycle-bin');
Route::get('/dynamic-table/restore/{id}', [DynamicDataTableController::class, 'restore'])->name('dynamic-table.restore');
Route::get('/dynamic-table/force-delete/{id}', [DynamicDataTableController::class, 'forceDelete'])->name('dynamic-table.force-delete');

// Column Management
Route::get('/dynamic-table/column-management', [DataTableColumnController::class, 'index'])->name('dynamic-table.column-management.index');
Route::get('/dynamic-table/column-managemet/add-column', [DataTableColumnController::class, 'addColumnName'])->name('dynamic-table.column-management.add-column');
Route::post('/dynamic-table/column-management/add-column', [DataTableColumnController::class, 'saveColumnName'])->name('dynamic-table.column-management.save-column');
Route::get('/dynamic-table/column-management/edit-column/{selected_column}', [DataTableColumnController::class, 'edit'])->name('dynamic-table.column-management.edit');
Route::put('/dynamic-table/column-management/edit-column/{selected_column}/update-column', [DataTableColumnController::class, 'update'])->name('dynamic-table.column-management.update');
Route::delete('/dynamic-table/column-management/delete-column/{selected_column}', [DataTableColumnController::class, 'destroy'])->name('dynamic-table.column-management.delete');
Route::get('/dynamic-table/column-management/edit-new-column/{id}', [DataTableColumnController::class, 'editNewColumn'])->name('dynamic-table.column-management.edit-new-column');
Route::put('/dynamic-table/column-management/edit-new-column/{id}/update-column', [DataTableColumnController::class, 'updateNewColumn'])->name('dynamic-table.column-management.update-new-column');
Route::delete('/dynamic-table/column-management/delete-new-column/{id}', [DataTableColumnController::class, 'destroyNewColumn'])->name('dynamic-table.column-management.delete-new-column');

// Options Management
Route::get('/dynamic-table/option-management', [CombinedController::class, 'index'])->name('pages.management.index');

// Options Management - Items
Route::get('/dynamic-table/option-management/items/create', [ItemController::class, 'create'])->name('pages.management.items.create');
Route::post('/dynamic-table/option-management/items', [ItemController::class, 'store'])->name('pages.management.items.store');
Route::get('/dynamic-table/option-management/items/{item}/edit', [ItemController::class, 'edit'])->name('pages.management.items.edit');
Route::post('/dynamic-table/option-management/items/{item}/update', [ItemController::class, 'update'])->name('pages.management.items.update');
Route::delete('/dynamic-table/option-management/items/{item}/destroy', [ItemController::class, 'destroy'])->name('pages.management.items.destroy');

// Options Management - Manufacturers
Route::get('/dynamic-table/option-management/manufacturers/create', [ManufacturerController::class, 'create'])->name('pages.management.manufacturers.create');
Route::post('/dynamic-table/option-management/manufacturers', [ManufacturerController::class, 'store'])->name('pages.management.manufacturers.store');
Route::get('/dynamic-table/option-management/manufacturers/{manufacturer}/edit', [ManufacturerController::class, 'edit'])->name('pages.management.manufacturers.edit');
Route::post('/dynamic-table/option-management/manufacturers/{manufacturer}/update', [ManufacturerController::class, 'update'])->name('pages.management.manufacturers.update');
Route::delete('/dynamic-table/option-management/manufacturers/{manufacturer}/destroy', [ManufacturerController::class, 'destroy'])->name('pages.management.manufacturers.destroy');

// Options Management - Configuration Statuses
Route::get('/dynamic-table/option-management/configuration-statuses/create', [ConfigurationStatusController::class, 'create'])->name('pages.management.configuration-statuses.create');
Route::post('/dynamic-table/option-management/configuration-statuses', [ConfigurationStatusController::class, 'store'])->name('pages.management.configuration-statuses.store');
Route::get('/dynamic-table/option-management/configuration-statuses/{configuration_status}/edit', [ConfigurationStatusController::class, 'edit'])->name('pages.management.configuration-statuses.edit');
Route::post('/dynamic-table/option-management/configuration-statuses/{configuration_status}/update', [ConfigurationStatusController::class, 'update'])->name('pages.management.configuration-statuses.update');
Route::delete('/dynamic-table/option-management/configuration-statuses/{configuration_status}/destroy', [ConfigurationStatusController::class, 'destroy'])->name('pages.management.configuration-statuses.destroy');

// Options Management - Locations
Route::get('/dynamic-table/option-management/locations/marker', [LocationController::class, 'marker']);
Route::get('/dynamic-table/option-management/locations/create', [LocationController::class, 'create'])->name('pages.management.locations.create');
Route::post('/dynamic-table/option-management/locations', [LocationController::class, 'store'])->name('pages.management.locations.store');
Route::get('/dynamic-table/option-management/locations/{location}/edit', [LocationController::class, 'edit'])->name('pages.management.locations.edit');
Route::post('/dynamic-table/option-management/locations/{location}/update', [LocationController::class, 'update'])->name('pages.management.locations.update');
Route::delete('/dynamic-table/option-management/locations/{location}/destroy', [LocationController::class, 'destroy'])->name('pages.management.locations.destroy');

// Options Management - Position Statuses
Route::get('/dynamic-table/option-management/position-statuses/create', [PositionStatusController::class, 'create'])->name('pages.management.position-statuses.create');
Route::post('/dynamic-table/option-management/position-statuses', [PositionStatusController::class, 'store'])->name('pages.management.position-statuses.store');
Route::get('/dynamic-table/option-management/position-statuses/{position_status}/edit', [PositionStatusController::class, 'edit'])->name('pages.management.position-statuses.edit');
Route::post('/dynamic-table/option-management/position-statuses/{position_status}/update', [PositionStatusController::class, 'update'])->name('pages.management.position-statuses.update');
Route::delete('/dynamic-table/option-management/position-statuses/{position_status}/destroy', [PositionStatusController::class, 'destroy'])->name('pages.management.position-statuses.destroy');

// User Management
Route::get('/user-management', [UserManagementController::class, 'index'])->name('user-management.index');
Route::get('/user-management/add-new-user', [UserManagementController::class, 'create'])->name('user-management.create');
Route::post('/user-management/store', [UserManagementController::class, 'store'])->name('user-management.store');
Route::get('/user-management/{user}/edit', [UserManagementController::class, 'edit'])->name('user-management.edit');
Route::post('/user-management/{user}/update', [UserManagementController::class, 'update'])->name('user-management.update');
Route::delete('/user-management/{user}/destroy', [UserManagementController::class, 'destroy'])->name('user-management.destroy');

// Activity Log
Route::resource('activity-log', ActivityLogController::class);
Route::get('/asset-management/log', [DataTableController::class, 'log'])->name('pages.data-tables.log');
Route::get('/dynamic-table/log', [DynamicDataTableController::class, 'log'])->name('dynamic-table.log');
Route::get('dynamic-table/log/{id}', [DynamicDataTableController::class, 'showLogDetail'])->name('dynamic-table.log-detail');
Route::get('/activity-log/{id}/show-detail', [DynamicDataTableController::class, 'show'])->name('activity-log.show-detail');

// Customize Dashboard
Route::get('/customize-dashboard', [SettingTitleController::class, 'edit'])->name('customize-dashboard.edit');
Route::post('/customize-dashboard/update', [SettingTitleController::class, 'update'])->name('customize-dashboard.update');

});