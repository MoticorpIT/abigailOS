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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('accounts', 'AccountController');
Route::resource('accountTypes', 'AccountTypeController');
Route::resource('assets', 'AssetController');
Route::resource('assetTypes', 'AssetTypeController');
Route::resource('companies', 'CompanyController');
Route::resource('companyTypes', 'CompanyTypeController');
Route::resource('contracts', 'ContractController');
Route::resource('invoices', 'InvoiceController');
Route::resource('notes', 'NoteController');
Route::resource('payments', 'PaymentController');
Route::resource('priorities', 'PriorityController');
Route::resource('repeats', 'RepeatController');
Route::resource('statuses', 'StatusController');
Route::resource('tasks', 'TaskController');
Route::resource('taskTypes', 'TaskTypeController');
Route::resource('tenants', 'TenantController');
Route::resource('users', 'UserController');