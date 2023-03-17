<?php

use App\Http\Controllers\backend\AuthController;
use App\Http\Controllers\backend\BannerController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\CuponController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\PermissionController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\RoleController;
use App\Http\Controllers\backend\SubCategoryController;
use App\Http\Controllers\backend\UserRoleController;
use App\Http\Controllers\frontend\FrontController;
use App\Http\Controllers\LangController;
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
Route::get('/switch-lang/{lang}', [LangController::class, 'lang'])->name('lang');


// Admin Panel Route

Route::get('/admin', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::get('/admin-registration', [AuthController::class, 'registration'])->name('admin.registration');
Route::post('/admin-registration-processing', [AuthController::class, 'process'])->name('admin.registration.process');
Route::get('/admin-login', [AuthController::class, 'login'])->name('admin.login');
Route::post('/admin-login-processing', [AuthController::class, 'loginProcess'])->name('admin.login.process');
Route::get('/admin-logout', [AuthController::class, 'adminLogout'])->name('admin.logout');
Route::get('/admin-forget-password', [AuthController::class, 'forgetPassword'])->name('admin.forgetPassword');
Route::post('/admin-forget-password-store', [AuthController::class, 'forgetPasswordStore'])->name('admin.forget.passwordStore');
Route::get('/admin-reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('/admin-reset-password-store', [AuthController::class, 'submitResetPasswordForm'])->name('reset.password.post');

// All brand route
Route::get('/all-brand', [BrandController::class, 'brandList'])->name('all.brand');
Route::get('/brand-form', [BrandController::class, 'brandForm'])->name('create.brand');
Route::post('/brand-store', [BrandController::class, 'brandStore'])->name('store.brand');
Route::get('/brand-edit/{id}', [BrandController::class, 'brandEdit'])->name('edit.brand');
Route::put('/brand-update/{id}', [BrandController::class, 'brandUpdate'])->name('update.brand');
Route::get('/brand-delete/{id}', [BrandController::class, 'brandDelete'])->name('delete.brand');

// All category route
Route::get('/all-category', [CategoryController::class, 'categoryList'])->name('all.category');
Route::get('/category-form', [CategoryController::class, 'categoryForm'])->name('create.category');
Route::post('/category-store', [CategoryController::class, 'categoryStore'])->name('store.category');
Route::get('/category-edit/{id}', [CategoryController::class, 'categoryEdit'])->name('edit.category');
Route::put('/category-update/{id}', [CategoryController::class, 'categoryUpdate'])->name('update.category');
Route::get('/category-delete/{id}', [CategoryController::class, 'categoryDelete'])->name('delete.category');

// All SubCategory route
Route::get('/all-subcategory', [SubCategoryController::class, 'subCategoryList'])->name('all.subcategory');
Route::get('/subcategory-form', [SubCategoryController::class, 'subCategoryForm'])->name('create.subcategory');
Route::post('/subcategory-store', [SubCategoryController::class, 'subCategoryStore'])->name('store.subcategory');
Route::get('/subcategory-edit/{id}', [SubCategoryController::class, 'subCategoryEdit'])->name('edit.subcategory');
Route::put('/subcategory-update/{id}', [SubCategoryController::class, 'subCategoryUpdate'])->name('update.subcategory');
Route::get('/subcategory-delete/{id}', [SubCategoryController::class, 'subCategoryDelete'])->name('delete.subcategory');

// All Cupon route
Route::get('/all-cupon', [CuponController::class, 'cuponList'])->name('all.cupon');
Route::get('/cupon-form', [CuponController::class, 'cuponForm'])->name('create.cupon');
Route::post('/cupon-store', [CuponController::class, 'cuponStore'])->name('store.cupon');
Route::get('/cupon-edit/{id}', [CuponController::class, 'cuponEdit'])->name('edit.cupon');
Route::put('/cupon-update/{id}', [CuponController::class, 'cuponUpdate'])->name('update.cupon');
Route::get('/cupon-delete/{id}', [CuponController::class, 'cuponDelete'])->name('delete.cupon');
Route::get('/cupon-view/{id}', [CuponController::class, 'cuponView'])->name('view.cupon');

// All Slider route
Route::get('/all-slide', [CuponController::class, 'slideList'])->name('all.slide');
Route::get('/slide-form', [CuponController::class, 'slideForm'])->name('create.slide');
Route::post('/slide-store', [CuponController::class, 'slideStore'])->name('store.slide');
Route::get('/slide-edit/{id}', [CuponController::class, 'slideEdit'])->name('edit.slide');
Route::put('/slide-update/{id}', [CuponController::class, 'slideUpdate'])->name('update.slide');
Route::get('/slide-delete/{id}', [CuponController::class, 'slideDelete'])->name('delete.slide');
Route::get('/slide-view/{id}', [CuponController::class, 'slideView'])->name('view.slide');

// All Banener route
Route::get('/all-banner', [BannerController::class, 'bannerList'])->name('all.banner');
Route::get('/banner-form', [BannerController::class, 'bannerForm'])->name('create.banner');
Route::post('/banner-store', [BannerController::class, 'bannerStore'])->name('store.banner');
Route::get('/banner-edit/{id}', [BannerController::class, 'bannerEdit'])->name('edit.banner');
Route::put('/banner-update/{id}', [BannerController::class, 'bannerUpdate'])->name('update.banner');
Route::get('/banner-delete/{id}', [BannerController::class, 'bannerDelete'])->name('delete.banner');
Route::get('/banner-view/{id}', [BannerController::class, 'bannerView'])->name('view.banner');

// All Product route
Route::get('/all-product', [ProductController::class, 'productList'])->name('all.product');
Route::get('/product-form', [ProductController::class, 'productForm'])->name('create.product');
Route::post('/product-store', [ProductController::class, 'productStore'])->name('store.product');
Route::get('/product-edit/{id}', [ProductController::class, 'productEdit'])->name('edit.product');
Route::put('/product-update/{id}', [ProductController::class, 'productUpdate'])->name('update.product');
Route::get('/product-delete/{id}', [ProductController::class, 'productDelete'])->name('delete.product');
Route::get('/product-view/{id}', [ProductController::class, 'productView'])->name('view.product');

// Role & Permission route
Route::resource('/roles', RoleController::class)->except('destroy');
Route::get('/roles/delete/{id}', [RoleController::class, 'destroy'])->name('roles.delete');
Route::resource('/permissions', PermissionController::class)->except('destroy');
Route::get('/permissions/delete/{id}', [PermissionController::class, 'destroy'])->name('permissions.delete');
Route::resource('/user-role', UserRoleController::class)->except('destroy');
Route::get('/user-roles/delete/{id}', [UserRoleController::class, 'destroy'])->name('user.roles.delete');
