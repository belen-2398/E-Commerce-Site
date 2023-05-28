<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController as AdminSliderController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\FrontendController\UserController;
use App\Http\Livewire\Admin\Brand\Index;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::controller(FrontendController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/collections', 'categories');
    Route::get('/collections/{category_slug}', 'products');
    Route::get('/collections/{category_slug}/{product_slug}', 'productView');

    Route::get('/new-arrivals', 'newArrival');
    Route::get('/featured-products', 'featuredProducts');

    Route::get('/search', 'searchProducts');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/wishlist', [WishlistController::class, 'index']);
    Route::get('cart', [CartController::class, 'index']);
    Route::get('checkout', [CheckoutController::class, 'index']);

    Route::get('orders', [OrderController::class, 'index']);
    Route::get('orders/{orderId}', [OrderController::class, 'show']);

    Route::get('profile', [UserController::class, 'index']);
    Route::post('profile', [UserController::class, 'updateUserDetails']);

    Route::get('change-password', [UserController::class, 'passwordCreate']);
    Route::post('change-password', [UserController::class, 'passwordChange']);
});

Route::get('thank-you', [FrontEndController::class, 'thankyou']);


Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::resource('/category', CategoryController::class);

    Route::get('/brands', Index::class);

    Route::resource('/products', ProductController::class)->except(['show']);
    Route::get('product-image/{product_image_id}/delete', [ProductController::class, 'destroyImage']);
    Route::post('product-color/{prod_color_id}', [ProductController::class, 'updateProdColorQty']);
    Route::get('product-color/{prod_color_id}/delete', [ProductController::class, 'deleteProdColor']);

    Route::resource('/colors', ColorController::class);

    Route::controller(AdminOrderController::class)->group(function () {
        Route::get('/orders', 'index');
        Route::get('/orders/{orderId}', 'show');
        Route::put('/orders/{orderId}', 'updateOrderStatus');

        Route::get('/invoice/{orderId}', 'viewInvoice');
        Route::put('/invoice/{orderId}/generate', 'generateInvoice')->name('generate.invoice');
        Route::get('/invoice/{orderId}/mail', 'mailInvoice');
    });

    Route::resource('/users', AdminUserController::class);

    Route::get('/settings', [SettingController::class, 'index']);
    Route::post('/settings', [SettingController::class, 'store']);

    Route::resource('/sliders', AdminSliderController::class);
});
