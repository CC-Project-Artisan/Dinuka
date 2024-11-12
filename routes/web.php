<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Page Routes
Route::get('/', [PageController::class, 'index'])->name('welcome');
Route::get('/layouts/pages/shop', [PageController::class, 'shop'])->name('pages.shop');
Route::get('/layouts/pages/about', [PageController::class, 'about'])->name('pages.about');

Route::get('/shop', [ProductController::class, 'index'])->name('shop');
// Route::get('/products', [ProductController::class, 'index']);

//Dashboard Routes
Route::get('/dashboard', [PageController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');









//test admin middleware (make the function in the controller and the middleware and register it in the kernel)
Route::get('/admintest', [PageController::class, 'admintest'])->middleware('admin', 'auth')->name('testAdmin');

require __DIR__.'/auth.php';
