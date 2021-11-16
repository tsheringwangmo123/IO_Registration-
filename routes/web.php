<?php

use App\Http\Controllers\OutingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserManagement\UserController;
use App\Http\Controllers\UserManagement\PermissionController;
use App\Http\Controllers\UserManagement\RoleController;

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
    return redirect('login');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::resource('/permissions', PermissionController::class);
    Route::resource('/roles', RoleController::class);
    Route::resource('/users', UserController::class);
    Route::resource('/outing', OutingController::class);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/notification', [App\Http\Controllers\OutingController::class, 'showall'])->name('notification');
Route::get('/updatestatus/{id}', [App\Http\Controllers\OutingController::class, 'status'])->name('updatestatus');
Route::get('/deleterole/{id}', [RoleController::class, 'destroy']);
Route::get('/deleteuser/{id}', [UserController::class, 'destroy']);