<?php

// LOGIN.SHOW ROUTE
Route::get('/', function () {
    return view('auth/login');
});

// LOGIN/LOGOUT (AUTHENTICATION ROUTES) - Registration Prevented
$this->get('/', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('/', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');

// AVATAR / IMAGE ROUTING
Route::resource('avatar', 'AvatarController');
Route::get('images/{image}/download-one-image', 'AssetImageController@downloadOneImage'); // Download Single Image
Route::get('images/{image}/download-all-images', 'AssetImageController@downloadAllImages'); // Download All Images
Route::resource('images', 'AssetImageController');
// Route::resource('logo', 'LogoController');

// DASHBOARD ROUTE
Route::group( ['middleware' => 'auth' ], function() {
	Route::get('/dashboard', function () {
	    return view('dashboard');
	});
});

// ACCOUNT RELATED ROUTES
Route::get('accounts/export', 'AccountController@export'); // Export To CSV
Route::resource('accounts', 'AccountController');
Route::resource('accountTypes', 'AccountTypeController');

// ASSET RELATED ROUTES
Route::get('assets/export', 'AssetController@export'); // Export To CSV
Route::resource('assets', 'AssetController');
Route::resource('assetTypes', 'AssetTypeController');

// COMPANY RELATED ROUTES
Route::get('companies/export', 'CompanyController@export'); // Export To CSV
Route::resource('companies', 'CompanyController');
Route::resource('companyTypes', 'CompanyTypeController');

// HODGEPODGE ROUTES
Route::resource('contracts', 'ContractController');
Route::resource('invoices', 'InvoiceController');
Route::resource('notes', 'NoteController');
// Route::resource('images', 'ImageController');
Route::resource('payments', 'PaymentController');
Route::resource('priorities', 'PriorityController');
Route::resource('repeats', 'RepeatController');
Route::resource('statuses', 'StatusController');

// TASK RELATED ROUTES
Route::resource('tasks', 'TaskController');
Route::resource('taskTypes', 'TaskTypeController');

// TENANT RELATED ROUTES
Route::get('tenants/export', 'TenantController@export'); // Export To CSV
Route::resource('tenants', 'TenantController');

// USER RELATED ROUTES
Route::get('users/{user}/edit-pw', 'UserController@editPassword'); // Change Password view
Route::put('users/{user}/update-pw', 'UserController@updatePassword'); // Change Password save
Route::get('users/export', 'UserController@export'); // Export To CSV
Route::resource('users', 'UserController');

