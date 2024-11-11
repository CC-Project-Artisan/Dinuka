<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });


Route::post('/dashboard/updatedUserInformatio', [UserController::class, 'update'])->name('user-profile.update');

//Page Routes
Route::get('/', [PageController::class, 'index'])->name('welcome');
Route::get('/shop', [PageController::class, 'shop'])->name('pages.shop');
Route::get('/about', [PageController::class, 'about'])->name('pages.about');


// Route::get('/products', [ProductController::class, 'index']);

//Dashboard Routes
Route::get('/dashboard', [PageController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');









//test admin middleware (make the function in the controller and the middleware and register it in the kernel)
Route::get('/admintest', [PageController::class, 'admintest'])->middleware('admin', 'auth')->name('testAdmin');

require __DIR__.'/auth.php';
