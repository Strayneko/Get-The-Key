<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboard\CategoryController as DashboardCategory;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\Dashboard\Category\Index as DashboardCategoryIndex;
use App\Http\Livewire\Dashboard\Product\Create as DashboardProductCreate;
use App\Http\Livewire\Dashboard\Product\Index as DashboardProductIndex;
use App\Http\Livewire\Dashboard\Product\License\Index as DashboardLicenseIndex;
use App\Http\Livewire\Dashboard\Category\Create as DashboardCategoryCreate;
use App\Http\Livewire\Dashboard\Product\License\Create as DashboardLicenseCreate;
use App\Http\Livewire\Dashboard\Transaction\Index as DashboardTransactionIndex;
use App\Http\Livewire\Dashboard\Transaction\Detail as DashboardTransactionDetail;

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


// home route grouping
Route::name('home.')
    ->controller(HomeController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/openshop', 'openshop')->name('openshop')->middleware(['auth']);
        Route::get('/cart', 'cart')->name('cart')->middleware(['auth']);
        Route::get('/checkout/{id}', 'checkout')->name('checkout')->middleware(['auth']);
        Route::get('/transaction', 'transactions')->name('transaction_list')->middleware(['auth']);
    });

// Dashboard route group
Route::prefix('dashboard')
    ->name('dashboard.')
    ->group(function () {
    });

// Auth route group
Route::prefix('auth')
    ->name('auth.')
    ->controller(AuthController::class)
    ->group(function () {
        Route::get('/', 'auth')->name('auth');
        Route::get('/logout', 'logout')->name('logout');
        Route::post('/login', 'login')->name('login');
        Route::post('/registration', 'registration')->name('registration');
    });

// Dashboard route
Route::get('/dashboard/', [DashboardController::class, 'index'])->name('dashboard')->middleware(['auth', 'isAdminOrSeller']);

Route::prefix('dashboard/category')->middleware(['auth', 'isAdminOrSeller'])
    ->name('dashboard.category.')
    ->controller(CategoryController::class)
    ->group(function () {
        Route::get('/', DashboardCategoryIndex::class)->name('index');
        Route::get('/create', DashboardCategoryCreate::class)->name('create');
        Route::get('/{category_id}/edit', DashboardCategoryCreate::class)->name('edit');
    });

Route::prefix('dashboard/product')
    ->name('dashboard.product.')
    ->middleware(['auth', 'isAdminOrSeller'])
    ->group(function () {
        Route::get('/', DashboardProductIndex::class)->name('index');
        Route::get('/create', DashboardProductCreate::class)->name('create');
        Route::get('/{product_id}/license/create', DashboardLicenseCreate::class)->name('license_create');
        Route::get('/{product_id}/license', DashboardLicenseIndex::class)->name('license');
        Route::get('/license/{license_id}/edit', DashboardLicenseCreate::class)->name('license_edit');
        Route::get('/{product_id}/edit', DashboardProductCreate::class)->name('edit');
    });

Route::prefix('dashboard/transaction')
    ->name('dashboard.transaction.')
    ->middleware(['auth', 'isAdmin'])
    ->group(function () {
        Route::get('/', DashboardTransactionIndex::class)->name('index');
        Route::get('/{transaction_id}', DashboardTransactionDetail::class)->name('detail');
    });
