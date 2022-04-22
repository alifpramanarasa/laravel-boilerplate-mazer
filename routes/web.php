<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MyAccountController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes(['verify' => true]);

Route::get('/', function() {
    return redirect('/dashboard');
});
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware(['auth', 'verified']);

Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions.index')->middleware('auth');
Route::post('/permissions', [PermissionController::class, 'store'])->name('permissions.store')->middleware('auth');
Route::get('/permissions/{id}', [PermissionController::class, 'edit'])->name('permissions.show')->middleware('auth');
Route::patch('/permissions/{permission}', [PermissionController::class, 'update'])->name('permissions.update')->middleware('auth');
Route::delete('/permissions/{permission}', [PermissionController::class, 'destroy'])->name('permissions.delete')->middleware('auth');

Route::resource('/roles', RoleController::class, ['names' => 'roles'])->middleware('auth');
Route::resource('/users', UserController::class, ['names' => 'users'])->middleware('auth');

Route::get('/my-account', [MyAccountController::class, 'show'])->name('profile.index')->middleware('auth');
Route::post('/my-account', [MyAccountController::class, 'updateAccount'])->name('profile.update')->middleware('auth');
Route::post('/my-account/update-password', [MyAccountController::class, 'updatePassword'])->name('profile.password')->middleware('auth');
