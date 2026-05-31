<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BookController;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\FrontendBookController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;

Route::get('/', [HomeController::class, 'index']);


Route::get('/about', function () {
    return view('about');
});


Route::get('/menu', function () {
    $categories = \App\Models\Category::all();
    $products = \App\Models\Product::with('category')->get();
    return view('menu', compact('categories', 'products'));
});


Route::get('/book', function () {
    return view('book');
});
Route::post('/book/store', [FrontendBookController::class, 'store'])->name('book.store');
Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['ar', 'en'])) {
        session()->put('locale', $locale);
    }
    return redirect()->back();
})->name('lang.switch');
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'register'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('books', BookController::class);
    Route::resource('users', UserController::class);
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::patch('/books/{id}/status', [BookController::class, 'updateStatus'])->name('books.updateStatus');
});
Route::post('/place-order', [OrderController::class, 'store'])->name('order.store');
Route::post('/checkout-order', [OrderController::class, 'checkout'])->name('order.checkout');
