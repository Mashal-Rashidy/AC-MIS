<?php

use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Illuminate\Support\Facades\Auth::routes();

Route::get('/', function () {
    return redirect()->route('login');
})->name('/');

Route::middleware('auth')->group(function () {
    Route::controller(HomeController::class)->group(function () {
        Route::get('/home', 'dashboard')->name('home');
    });
    # --------------------------------- Users Routes ---------------------------------
    Route::controller(UserController::class)->group(function () {
        Route::get('/users', 'index')->name('users.index');
        Route::post('/users-store', 'store')->name('users.store');
        Route::get('/users-edit/{id?}', 'edit')->name('users.edit');
        Route::post('/users-update', 'update')->name('users.update');
        Route::get('/reset-password', 'reset_password')->name('users.reset.password');
        Route::get('/user-delete/{id}', 'destroy')->name('users.delete');
        Route::post('change-user-password', 'change_password')->name('change-user-password');
        Route::post('change-user-image', 'changeUserImage')->name('change-user-image');

        Route::get('user-roles', 'roles')->name('roles.index');
        Route::post('store-role', 'store_role')->name('role.store');
        Route::post('update_role', 'update_role')->name('role.update');
        Route::get('role-details/{type}', 'role_details')->name('role.details');

        Route::get('permission-create', 'permission_create')->name('create.permission');
        Route::get('permission-details/{type}', 'permission_details')->name('permission.details');

        Route::get('/user/deactive/{id?}', 'deactive')->name('user.deactive');
        Route::get('/user/active/{id?}', 'active')->name('user.active');
        Route::post('/user/change/password', 'changePasswordByAdmin')->name('user.changePassword');
    });
    # --------------------------------- End Users Routes ---------------------------------

    Route::controller(EmployeesController::class)->group(function () {
        Route::post('/employee-create', 'employeeCreate')->name('employee-create');
        Route::get('/employee-edit/{id?}', 'employeeEdit')->name('employee-edit');
        Route::post('/employee-update', 'employeeUpdate')->name('employee-update');
        Route::get('/employee-list', 'employeeList')->name('employee-list');
        Route::get('/employee-card-print/{id?}', 'employeeCardPrint')->name('employee-card-print');
        Route::get('/employee-card-update-status/{id?}', 'employeeCardUpdateStatus')->name('employee-card-status');
        Route::get('/employee-card-check-page', 'employeeCardCheckPage')->name('employee-card-check-page');
        Route::get('/employee-card-check', 'employeeCardCheck')->name('employee-card-check');
    });

});
