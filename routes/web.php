<?php

use App\Http\Controllers\backend\BackendController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DealsController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\Frontend\CategoryFrontendController;
use App\Http\Controllers\frontend\FrontendController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderImageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [BackendController::class, 'index'])->name('admin');
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/order', [OrderController::class, 'index'])->name('order');
    Route::get('/category', [CategoryController::class, 'index'])->name('category');
    Route::get('/orderimg', [OrderImageController::class, 'index'])->name('orderimg');

    Route::get('/user/show/{id}', [UserController::class, 'show'])->name('users.show');
    Route::get('/user/delete/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/user/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/user/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/user/update', [UserController::class, 'update'])->name('users.update');

    Route::get('/order/show/{id}', [OrderController::class, 'show'])->name('order.show');
    Route::delete('/orders/{order}', [OrderController::class, 'destroy'])->name('order.destroy');
    Route::get('/order/create', [OrderController::class, 'create'])->name('order.create');
    Route::get('/order/edit/{id}', [OrderController::class, 'edit'])->name('order.edit');
    Route::post('/order/update', [OrderController::class, 'update'])->name('order.update');
    Route::post('/orders/{order}/toggle-publish', [OrderController::class, 'togglePublish'])->name('order.toggle.publish');

    Route::get('/admin/category/{id}', [CategoryController::class, 'show'])->name('category.show');
    Route::post('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/update', [CategoryController::class, 'update'])->name('category.update');
    Route::post('category/toggle-publish/{category}', [CategoryController::class, 'togglePublish'])->name('category.toggle-publish');

    Route::get('/orderimg/delete/{id}', [OrderImageController::class, 'destroy'])->name('orderimg.destroy');

    Route::get('/orders/accepted', [OrderController::class, 'accepted'])->name('order.accepted');
    Route::get('/orders/rejected', [OrderController::class, 'rejected'])->name('order.rejected');
    Route::get('/orders/distinguish/{order}', [OrderController::class, 'distinguish'])->name('order.distinguish');
    Route::get('/orders/undistinguish/{order}', [OrderController::class, 'undistinguish'])->name('order.undistinguish');
    Route::get('/orderimg/show/{order}', [OrderImageController::class, 'show'])->name('orderimg.show');
    Route::get('/orders/{order}/accept', [OrderController::class, 'acceptOrder'])->name('order.accept');
    Route::get('/orders/{order}/reject', [OrderController::class, 'rejectOrder'])->name('order.reject');

    Route::get('deals', [DealsController::class, 'index'])->name('deals');
    Route::get('deals/create', [DealsController::class, 'create'])->name('deals.create');
    Route::post('deals/store', [DealsController::class, 'store'])->name('deals.store');
    Route::get('deals/edit/{id}', [DealsController::class, 'edit'])->name('deals.edit');
    Route::post('deals/update/{id}', [DealsController::class, 'update'])->name('deals.update');
    Route::post('deals/delete/{id}', [DealsController::class, 'destroy'])->name('deals.destroy');
    Route::post('deals/toggle-publish/{deal}', [DealsController::class, 'togglePublish'])->name('deals.toggle-publish');
});



Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/sections', [FrontendController::class, 'showAllCategories'])->name('sections.index');
Route::post('/orders/toggle-favorite/{order}', [FavoriteController::class, 'toggleFavorite'])->name('order.toggleFavorite');
Route::get('/favorites/count', [FavoriteController::class, 'getFavoritesCount'])->name('favorites.count');
Route::get('/favorites', [FavoriteController::class, 'showFavorites'])->name('orders.favorites');
Route::get('/order-details/{order}', [OrderController::class, 'orderDetails'])->name('order.details');
Route::get('/categories/{id}/orders', [CategoryController::class, 'showOrders'])->name('categories.orders');
Route::get('/orders/search', [OrderController::class, 'search'])->name('orders.search');
Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');

require __DIR__ . '/auth.php';
