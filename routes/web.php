<?php

use App\Models\Car;
use App\Models\Maintenance;
use App\Http\Controllers\CarController;
use App\Http\Controllers\MaintenanceController;

//CAR ROUTES
Route::get('/', 'CarController@index')->name('car.index');
Route::get('car/create', 'CarController@create')->name('car.create');
Route::post('car/store', 'CarController@store')->name('car.store');
Route::get('car/edit/{car}', 'CarController@edit')->name('car.edit');
Route::post('car/edit/{car}', 'CarController@update')->name('car.update');
Route::get('car/destroy/{car}', 'CarController@destroy')->name('car.destroy');

//MAINTENANCE ROUTES
Route::get('/maintenance/index/{car}', 'MaintenanceController@index')->name('car.maintenance');
Route::get('/maintenance/view/{car}', 'MaintenanceController@show')->name('maintenance.view');
Route::get('maintenance/create', 'MaintenanceController@create')->name('maintenance.create');
Route::post('maintenance/store', 'MaintenanceController@store')->name('maintenance.store');
Route::get('maintenance/edit/{maintenance}', 'MaintenanceController@edit')->name('maintenance.edit');
Route::post('maintenance/edit/{maintenance}', 'MaintenanceController@update')->name('maintenance.update');
Route::get('maintenance/destroy/{maintenance}', 'MaintenanceController@destroy')->name('maintenance.destroy');


//EXPORT ROUTES
Route::get('export', 'MyController@export')->name('export');
// Route::get('exportMaintenance', 'MyController@exportMaintenance')->name('exportMaintenance');
Route::get('importExportView', 'MyController@importExportView');
