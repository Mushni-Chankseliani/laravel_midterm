<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect(route('companies'));
});


Route::get('/companies', '\App\Http\Controllers\CompanyController@getCompanies')->name('companies');
Route::post('/companies/create/', '\App\Http\Controllers\CompanyController@createCompany')->name('companies.create');
Route::get('/companies/edit/{id}', '\App\Http\Controllers\CompanyController@editCompany')->name('companies.edit');
Route::post('/companies/update/', '\App\Http\Controllers\CompanyController@updateCompany')->name('companies.update');
Route::post('/companies/delete/', '\App\Http\Controllers\CompanyController@deleteCompany')->name('companies.delete');

Route::get('/employees', '\App\Http\Controllers\EmployeeController@getEmployees')->name('employees');
Route::post('/employees/create/', '\App\Http\Controllers\EmployeeController@createEmployee')->name('employees.create');
Route::get('/employees/edit/{id}', '\App\Http\Controllers\EmployeeController@editEmployee')->name('employees.edit');
Route::post('/employees/update/', '\App\Http\Controllers\EmployeeController@updateEmployee')->name('employees.update');
Route::post('/employees/delete/', '\App\Http\Controllers\EmployeeController@deleteEmployee')->name('employees.delete');
