<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('backend.pages.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/test', function () {
    return view('backend.pages.dashboard');
});
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('user-logout', [UserController::class, 'logout'])->name('user-logout');


    Route::get('/roles', [RoleController::class, 'index'])->middleware('permission:role-menu|role-list')->name('roles.index');
    Route::get('/roles/create', [RoleController::class, 'create'])->middleware('permission:role-create')->name('roles.create');
    Route::post('/roles/store', [RoleController::class, 'store'])->middleware('permission:role-create')->name('roles.store');
    Route::get('/roles/{id}/edit', [RoleController::class, 'edit'])->middleware('permission:role-edit')->name('roles.edit');
    Route::put('/roles/{id}/update', [RoleController::class, 'update'])->middleware('permission:role-edit')->name('roles.update');
    Route::delete('/roles/{id}/destroy', [RoleController::class, 'destroy'])->middleware('permission:role-delete')->name('roles.destroy');

    // Users Routes
    Route::get('/users', [UserController::class, 'index'])->middleware('permission:user-menu|user-list')->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->middleware('permission:user-create')->name('users.create');
    Route::post('/users/store', [UserController::class, 'store'])->middleware('permission:user-create')->name('users.store');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->middleware('permission:user-edit')->name('users.edit');
    Route::put('/users/{id}/update', [UserController::class, 'update'])->middleware('permission:user-edit')->name('users.update');
    Route::delete('/users/{id}/destroy', [UserController::class, 'destroy'])->middleware('permission:user-delete')->name('users.destroy');


    Route::get('/products', [ProductController::class, 'index'])->middleware('permission:product-menu|product-list')->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->middleware('permission:product-create')->name('products.create');
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->middleware('permission:product-edit')->name('products.edit');
    Route::put('/products/{id}/update', [ProductController::class, 'update'])->middleware('permission:product-edit')->name('products.update');
    Route::delete('/products/{id}/destroy', [ProductController::class, 'destroy'])->middleware('permission:product-delete')->name('products.destroy');
    // Route::get('/products/{id}/show',[ProductController::class,'show'])->name('products.show');

});
Route::post('/products/store', [ProductController::class, 'store'])->middleware('permission:product-create')->name('products.store');
