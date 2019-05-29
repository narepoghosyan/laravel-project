<?php

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

use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/properties', 'PropertiesController@index')->name('properties')->middleware('auth');
Route::get('/properties/create', 'PropertiesController@create')->name('properties.create');
Route::get('/properties/{property}', 'PropertiesController@show');
Route::post('/properties', 'PropertiesController@store')->middleware('auth');
Route::get('/properties/{property}/edit', 'PropertiesController@edit');
Route::patch('/properties/{property}', 'PropertiesController@update');
Route::delete('/properties/{property}', 'PropertiesController@destroy');


Route::get('/tenants', 'TenantsController@index')->name('tenants')->middleware('auth');
Route::get('/tenants/create', 'TenantsController@create')->middleware('auth')->name('tenants.create');
Route::post('/tenants', 'TenantsController@store');
Route::get('/tenants/{tenant}', 'TenantsController@show');
Route::get('/tenants/{tenant}/edit', 'TenantsController@edit');
Route::patch('/tenants/{tenant}', 'TenantsController@update');
Route::delete('/tenants/{tenant}', 'TenantsController@destroy');

Route::get('/tenancies', 'TenanciesController@index')->name('tenancies')->middleware('auth');
Route::get('/tenancies/create', 'TenanciesController@create')->middleware('auth')->name('tenancies.create');
Route::post('/tenancies', 'TenanciesController@store');
Route::get('/tenancies/{tenancy}', 'TenanciesController@show');
Route::get('/tenancies/{tenancy}/edit', 'TenanciesController@edit');
Route::patch('/tenancies/{tenancy}', 'TenanciesController@update');
Route::delete('/tenancies/{tenancy}', 'TenanciesController@destroy');

Route::get('/customers', 'CustomersController@index')->name('customers')->middleware('auth');
Route::get('/customers/create', 'CustomersController@create')->middleware('auth')->name('customers.create');
Route::post('/customers', 'CustomersController@store');
Route::get('/customers/customer_tenancy', 'CustomersController@customer_tenancy')->name('customer_tenancy');


Route::get('/any', function(){
    return 'any page from branch!!!';
});





