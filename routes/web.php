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

// LOGIN ROUTE - IF LOGGED IN, GOING TO / WILL REDIRECT TO /dashboard
Route::get('/', function () {
    return view('auth/login');
});

// LOGIN/LOGOUT (AUTHENTICATION ROUTES) - Registration Prevented
$this->get('/', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('/', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');

// DASHBOARD ROUTE
Route::get('/dashboard', function () {
    return view('dashboard');
});

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
Route::get('users/{user}/edit-pw', 'UserController@editPassword'); // Change Password view
Route::put('users/{user}/update-pw', 'UserController@updatePassword'); // Change Password save
Route::resource('users', 'UserController');

