<?php

use Illuminate\Support\Facades\Route;

Route::resource('companies', 'App\Http\Controllers\CompanyController');
Route::resource('employees', 'App\Http\Controllers\EmployeeController');

