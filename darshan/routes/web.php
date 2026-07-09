<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserOrderController;
use App\Http\Controllers\AdminSettingsController;
use App\Http\Controllers\LoginController;



/*
|--------------------------------------------------------------------------
| Home
|--------------------------------------------------------------------------
*/

Route::get('/', [ShopController::class, 'home']);

// Category page (from Home categories cards)
Route::get('/category/{category}', [ShopController::class, 'category'])->name('category');




/*
|--------------------------------------------------------------------------
| Auth User Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::redirect('/dashboard', '/')->name('dashboard');

    /*
    | Profile
    */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /*
    | Shop
    */
    Route::get('/shop', [ShopController::class, 'index']);
    
    
    /*
    | Cart
    */
    Route::get('/add-to-cart/{id}', [CartController::class, 'addToCart']);
    Route::get('/cart', [CartController::class, 'index']);
    Route::get('/remove-cart/{id}', [CartController::class, 'remove']);
    Route::get('/cart-plus/{id}', [CartController::class, 'plus']);
    Route::get('/cart-minus/{id}', [CartController::class, 'minus']);
    Route::post('/place-order', [CartController::class, 'placeOrder']);

    /*
    | User Orders
    */
    Route::get('/orders', [UserOrderController::class, 'index']);
    Route::get('/cancel-order/{id}', [UserOrderController::class, 'cancel']);

    /*
    | Admin Dashboard
    */
    Route::get('/admin/dashboard', function () {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }

        return view('admin.dashboard');
    });

    Route::resource('admin/products', ProductController::class);
    Route::resource('admin/customers', CustomerController::class);
    Route::resource('admin/orders', OrderController::class);
    Route::get('/complete-order/{id}', [OrderController::class, 'complete']);
    Route::get('/admin/settings', [AdminSettingsController::class, 'index']);
    Route::post('/admin/settings', [AdminSettingsController::class, 'update']);
});

/*
|--------------------------------------------------------------------------
| Laravel Auth Routes
|--------------------------------------------------------------------------
*/


require __DIR__.'/auth.php';

