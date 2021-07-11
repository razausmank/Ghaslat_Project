<?php

use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EntityTypeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductStockController;
use App\Http\Controllers\RemarkController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\testController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Authenticate;
use App\Models\User;
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


Route::middleware([Authenticate::class])->group(function () {
    //
    // Pade Module Routes
    Route::get('admin/page/page-hierarchy', [PageController::class, 'pageHierarchy'])->name('page.page_hierarchy');
    Route::post('admin/page/update-page-hierarchy', [PageController::class, 'updatePageHierarchy'])->name('page.update_page_hierarchy');
    Route::resource('admin/page', PageController::class);

    Route::resource('user', UserController::class);
    Route::get('/user/{user}/edit_user_roles', [UserController::class, 'edit_user_roles'])->name('user.edit_user_roles');
    Route::post('/user/{user}/update_user_roles', [UserController::class, 'update_user_roles'])->name('user.update_user_roles');

    //Product Category Routes
    Route::resource('productcategory', ProductCategoryController::class);

    //Product Category Routes
    Route::resource('product', ProductController::class);
    Route::post('product/activate/{product}', [ProductController::class, 'activateProduct'])->name('product.activate');
    Route::post('product/deactivate/{product}', [ProductController::class, 'deactivateProduct'])->name('product.deactivate');

    //Customer Routes
    Route::resource('customer', CustomerController::class);

    // roles
    Route::resource('role', RoleController::class);

    // orders
    Route::resource('order', OrderController::class);

    Route::get('/test', [testController::class, 'show']);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/', [ProductController::class, 'index'])->name('dashboard');

// Route::middleware(['auth:sanctum', 'verified'])->get('/productcategory', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::get('/symlink', function () {
    symlink('/home4/rhassank/public_html/ghaslat/Ghaslat_project/storage/app/public', '/home4/rhassank/public_html/ghaslat/Ghaslat_project/public/storage');
});
