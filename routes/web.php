<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\SocialLoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/products', [ProductController::class, 'index'])->name('products');
    Route::post('/checkout', [ProductController::class, 'checkout'])->name('checkout');
    Route::get('/success', [ProductController::class, 'success'])->name('checkout.success');
    Route::get('/cancel', [ProductController::class, 'cancel'])->name('checkout.cancel');
});

Route::post('/webhook', [ProductController::class, 'webhook'])->name('checkout.webhook');

Route::get('/auth/{provider}/callback', [SocialLoginController::class, 'handleProviderCallback']);
Route::get('/auth/{provider}', [SocialLoginController::class, 'redirectToProvider'])->name('social.redirect');
