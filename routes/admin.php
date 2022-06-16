<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\ModelController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RegionController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\SellerController;
use App\Http\Controllers\Admin\ShopController;

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

Route::prefix('admin')->group(function () {
    Route::middleware('verified:admin')->group(function () {
        Route::get('/', IndexController::class)->name('admin');
        Route::group(["prefix" => 'brands', 'as' => 'brands.', 'controller' => BrandController::class], function () {
            Route::get('/', "index")->name('index');
            Route::get('/craete', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::put('/update', 'update')->name('update');
            Route::get('/edit/{brand}', 'edit')->name('edit');
            Route::delete('/destroy/{brand}', 'destroy')->name('destroy');
        });
        Route::prefix('models')->name('models.')->controller(ModelController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::put("/update", 'update')->name('update');
            Route::delete('/destroy', 'destroy')->name('destroy');
        });
      
        Route::group(['prefix' => 'products', 'as' => 'products.', 'controller' => ProductController::class], function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('{id}/edit', 'edit')->name('edit');
            Route::put('update', 'update')->name('update');
            Route::delete('destroy/{id}', 'destroy')->name('destroy');
        });
        Route::resource('cities', CityController::class)->except('show');
        Route::resource('roles', RolesController::class)->except('show');
        Route::resource('admins', AdminController::class)->except('show');
        Route::resource('categories', CategoryController::class)->except('show');
        Route::resource('regions',RegionController::class)->except('show');
        Route::resource('sellers',SellerController::class)->except('show');
        Route::resource('shops',ShopController::class)->except('show');
        Route::get('profile', [ProfileController::class, 'index'])->name('profile');
        Route::put('profile/update/{admin}', [ProfileController::class, 'update'])->name('profile.update');
        Route::get('profile/password-reset', [ProfileController::class, 'passwordReset'])->name('profile.password-reset');
        Route::put('profile/password-update', [ProfileController::class, 'passwordUpdate'])->name('profile.password-update');
    });
    Auth::routes(['verify' => true, 'register' => (bool)config('app.admins')]);
});
