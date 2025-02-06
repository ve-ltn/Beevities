<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\AdminController;

Route::get('/', [AuthController::class, 'loginForm'])->name('login');
Route::post('/', [AuthController::class, 'login']);
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::prefix('/admin/products')->name('admin.products.')->group(function () {
        Route::get('/', [AdminProductController::class, 'index'])->name('index'); // List Produk
        Route::get('/create', [AdminProductController::class, 'create'])->name('create'); // Form Tambah
        Route::post('/store', [AdminProductController::class, 'store'])->name('store'); // Simpan Data
        Route::get('/edit/{id}', [AdminProductController::class, 'edit'])->name('edit'); // Form Edit
        Route::post('/update/{id}', [AdminProductController::class, 'update'])->name('update'); // Update Data
        Route::delete('/delete/{id}', [AdminProductController::class, 'destroy'])->name('destroy'); // Hapus Data
    });
});






Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/user/dashboard', function () {return view('user.dashboard');})->name('user.dashboard');

    Route::get('/user/catalog', [ProductController::class, 'catalog'])->name('user.catalog');
    Route::get('/user/catalog/filter', [ProductController::class, 'filterByCategory'])->name('user.catalog.filter');
    
    Route::get('/user/cart', [CartController::class, 'cart'])->name('user.cart');
    Route::post('/user/cart/add/{id}', [CartController::class, 'addToCart'])->name('user.cart.add');
    Route::post('/user/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('user.cart.remove');

    Route::post('/user/checkout', [CheckoutController::class, 'checkout'])->name('user.checkout');
    Route::post('/user/checkout/process', [CheckoutController::class, 'processCheckout'])->name('user.checkout.process');

    Route::get('/user/checkout/view', [CheckoutController::class, 'viewCheckout'])->name('user.checkout.view');

    Route::get('/user/invoice/{id}', [CheckoutController::class, 'invoice'])->name('user.invoice');
    Route::post('/user/cart/add/{id}', [CartController::class, 'addToCart'])->name('user.cart.add');


    Route::get('/user/history', [CheckoutController::class, 'history'])->name('user.history');

});
