<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RackController;
use App\Http\Controllers\ShelfController;

// Admin Login Routes
Route::get('admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login.form');
Route::post('admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// Protected Routes (Require Admin Login)
Route::middleware('checkAdminLogin')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/', [HomeController::class, 'index']); // Redirect root to dashboard
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('stocks', StockController::class);
    Route::resource('warehouses', WarehouseController::class);
    Route::get('/warehouses/{id}', [WarehouseController::class, 'show']);
    Route::resource('history', HistoryController::class)->only(['index']);
    Route::get('products/{product}/qrcode', [ProductController::class, 'showQrCode'])->name('products.qrcode');
    Route::get('/products/{id}/details', [ProductController::class, 'showDetails'])->name('products.details');
    Route::get('/chart-data', [HomeController::class, 'getChartData'])->name('chart.data');
    Route::get('products/create', function () {
        $categories = App\Models\Category::all(); // Fetch categories directly in the route
        return view('products.create', compact('categories'));
    })->name('products.create');
    Route::resource('racks', RackController::class);
Route::resource('shelves', ShelfController::class);
Route::resource('products', ProductController::class);
});

