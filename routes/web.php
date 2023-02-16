<?php

use App\Http\Controllers\backend\AuthController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\frontend\FrontController;
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

Route::get('/', [FrontController::class, 'home']);


// Admin Panel Route

Route::get('/admin' , [DashboardController::class, 'dashboard']);
Route::get('/admin-registration', [AuthController::class, 'registration'])->name('admin.registration');
Route::get('/admin-login', [AuthController::class, 'login'])->name('admin.login');
Route::get('/admin-forget-password', [AuthController::class, 'forgetPassword'])->name('admin.forgetPassword');


Route::get('/all-brand', [BrandController::class, 'brandList'])->name('all.brand');
Route::get('/brand-form', [BrandController::class, 'brandForm'])->name('create.brand');
Route::post('/brand-store', [BrandController::class, 'brandStore'])->name('store.brand');
Route::get('/brand-edit/{id}', [BrandController::class, 'brandEdit'])->name('edit.brand');
Route::put('/brand-update/{id}', [BrandController::class, 'brandUpdate'])->name('update.brand');
Route::get('/brand-delete/{id}', [BrandController::class, 'brandDelete'])->name('delete.brand');
