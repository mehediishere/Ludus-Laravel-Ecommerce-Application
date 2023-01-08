<?php

use App\Http\Controllers\AddressBookController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\UserDashboardController;
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
// All public routes
Route::controller(GuestController::class)->group(function (){
    Route::get('/', 'index')->name('index');
    Route::get('/product/{id}/{title}', 'productDetails')->name('page.product.details');
    Route::get('/product', 'mainSearch')->name('page.main.search');
    Route::get('/cart', 'cart')->name('cart');
});

// All Ajax requests
Route::controller(AjaxController::class)->group(function (){
    Route::post('/quick-view', 'quickView');
    Route::post('/add-to-cart', 'addToCart');
    Route::delete('/add-to-cart', 'removeCartItem');
    Route::put('/add-to-cart', 'updateCartItem');
    Route::get('/ajx/shipping-address', 'getShippingAddress');
});


// Default. Later will work on
Route::get('/dashboard', function () {
    return view('profile.dashboard');
})->middleware(['auth', 'verified'])->name('user.dashboard');

Route::middleware('auth')->group(function () {

    Route::prefix('profile')->controller(ProfileController::class)->group(function (){
        Route::get('/', 'profile')->name('profile.page');
        Route::put('/update', 'update')->name('profile.update');
        Route::get('/edit', 'edit')->name('profile.edit');
    });

    Route::prefix('address')->controller(AddressBookController::class)->group(function (){
        Route::get('/', 'addressBook')->name('address.book');
        Route::get('/add', 'newAddressBook')->name('address.book.new');
        Route::post('/add', 'saveNewAddress')->name('address.book.save');
        Route::get('/update/{id}', 'updateAddressBook')->name('address.book.update');
        Route::post('/update', 'saveUpdatedAddressBook')->name('address.book.update.save');
        Route::get('/default', 'makeDefaultAddress')->name('address.book.default');
        Route::post('/default/shipping', 'savedefaultShippingAddress')->name('default.shippingAddress.save');
        Route::post('/default/billing', 'savedefaultBillingAddress')->name('default.billingAddress.save');
    });

    Route::controller(UserDashboardController::class)->group(function (){
        Route::get('/my-orders', 'allOrder')->name('all.order');
        Route::get('/order/{order}', 'manageOrder')->name('manage.order');
        Route::get('/track-order', 'trackOrder')->name('track.order');
        Route::post('/track-order', 'showTrackOrder')->name('show.track.order');
        Route::get('/checkout', 'checkout')->name('checkout');
        Route::post('/order', 'placeOrder')->name('place.order');
    });

});

// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END

require __DIR__.'/auth.php';
