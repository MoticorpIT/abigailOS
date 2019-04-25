<?php

// TEST LANDING PAGE
Route::get('/bentley', function () {
	return view('bentley');
});

// LOGIN.SHOW ROUTE
Route::get('/', function () {
    return view('auth/login');
});

// LOGIN/LOGOUT (AUTHENTICATION ROUTES) - Registration Prevented
$this->get('/', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('/', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');

// DASHBOARD ROUTE
Route::get('dashboard', 'DashboardController@index')->name('dashboard');

// ACCOUNT RELATED ROUTES
Route::resource('account-logo', 'AccountLogoController');
Route::get('accounts/export', 'AccountController@export')->name('accounts.export'); // Export To CSV
Route::resource('accounts', 'AccountController');
Route::resource('account-types', 'AccountTypeController');

// ASSET RELATED ROUTES
Route::resource('images', 'AssetImageController');
Route::get('assets/{asset}/download-one-image', 'AssetImageController@downloadOneImage')->name('images.downloadOne'); // Download Single Image
Route::get('assets/{asset}/download-all-images', 'AssetImageController@downloadAllImages')->name('images.downloadAll'); // Download All Images
Route::get('assets/export', 'AssetController@export')->name('assets.export'); // Export To CSV
Route::resource('assets', 'AssetController');
Route::resource('asset-types', 'AssetTypeController');

// COMPANY RELATED ROUTES
Route::resource('company-logo', 'CompanyLogoController');
Route::get('companies/export', 'CompanyController@export')->name('companies.export'); // Export To CSV
Route::resource('companies', 'CompanyController');
Route::resource('company-types', 'CompanyTypeController');

// STAND ALONE (resourceful) ROUTES
Route::resource('contracts', 'ContractController');
Route::resource('invoices', 'InvoiceController');
Route::resource('notes', 'NoteController');
Route::resource('payments', 'PaymentController');
Route::resource('priorities', 'PriorityController');
Route::resource('repeats', 'RepeatController');
Route::resource('statuses', 'StatusController');

// TASK RELATED ROUTES
Route::resource('tasks', 'TaskController');
Route::resource('task-types', 'TaskTypeController');

// TENANT RELATED ROUTES
Route::resource('tenant-image', 'TenantImageController');
Route::get('tenants/export', 'TenantController@export')->name('tenants.export'); // Export To CSV
Route::resource('tenants', 'TenantController');

// USER RELATED ROUTES
Route::resource('avatar', 'AvatarController');
Route::get('users/{user}/edit-pw', 'UserController@editPassword')->name('passwords.edit'); // Change Password view
Route::put('users/{user}/update-pw', 'UserController@updatePassword')->name('passwords.update'); // Change Password save
Route::get('users/export', 'UserController@export')->name('users.export'); // Export To CSV
Route::resource('users', 'UserController');

