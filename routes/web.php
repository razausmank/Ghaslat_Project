<?php

use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EntityTypeController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductStockController;
use App\Http\Controllers\RemarkController;
use App\Http\Controllers\testController;
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
// Pade Module Routes
Route::get('admin/page/page-hierarchy', [PageController::class, 'pageHierarchy'])->name('page.page_hierarchy');
Route::post('admin/page/update-page-hierarchy', [PageController::class, 'updatePageHierarchy'])->name('page.update_page_hierarchy');
Route::resource('admin/page', PageController::class);


//Product Category Routes
Route::resource('productcategory', ProductCategoryController::class);

//Product Category Routes
Route::resource('product', ProductController::class);

//Customer Routes
Route::resource('customer', CustomerController::class);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', [testController::class, 'show']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
