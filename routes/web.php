<?php

use App\Http\Controllers\User\AdminController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\VendorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExhibitionController;
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
Route::get('/shop', [PageController::class, 'shop'])->name('pages.shop');
Route::get('/about', [PageController::class, 'about'])->name('pages.about');
Route::get('/product-display', [PageController::class, 'productView'])->name('pages.product-display');
Route::get('/cart', [PageController::class, 'cartview'])->name('pages.cart');

// Route::get('/shop', [ProductController::class, 'index'])->name('pages.shop');
// Route::get('/products', [ProductController::class, 'index']);

//Dashboard Routes
Route::get('/dashboard', [PageController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

// Vendor Routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('dashboard')->group(function () {
        //Update User Information
        Route::post('/dashboard/updatedUserInformation', [UserController::class, 'update'])->name('user-profile.update');

        //Vendor Routes
        Route::post('/register-vendor', [VendorController::class, 'registerVendor'])->name('vendor.register');
        Route::post('/update-store-details', [VendorController::class, 'updateStoreDetails'])->name('vendor.update');
        Route::get('/create-listing', [ProductController::class, 'index'])->name('product.create');
        Route::post('/store-listing', [ProductController::class, 'store'])->name('product.store');

        //Exhibition Routes
        Route::get('/create-exhibition', [ExhibitionController::class, 'create'])->name('exhibition.create');
    });
});

// Admin Routes
Route::middleware('auth')->group(function () {
    Route::get('/admin/users', [AdminController::class, 'showUsers'])->name('admin.users');
    Route::post('/admin/create', [AdminController::class, 'createAdmin'])->name('admin.create');

    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/{id}', [CategoryController::class, 'show'])->name('category.show');
    Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    
    Route::post('/admin/users/{user}/deactivate', [AdminController::class, 'deactivateUser'])->name('admin.users.deactivate');
    Route::post('/admin/users/{user}/activate', [AdminController::class, 'activateUser'])->name('admin.users.activate');
});



//test admin middleware (make the function in the controller and the middleware and register it in the kernel)
Route::get('/admintest', [PageController::class, 'admintest'])->middleware('admin', 'auth')->name('testAdmin');

require __DIR__ . '/auth.php';
