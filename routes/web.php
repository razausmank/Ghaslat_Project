<?php

use App\Http\Controllers\admin\PageController;
use App\Http\Controllers\admin\CustomerController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\ProductCategoryController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\POS\AuthController;
use App\Http\Controllers\POS\OrderController as POSOrderController;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\RedirectIfAuthenticated;
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

    Route::resource('admin/user', UserController::class);
    Route::get('admin/user/{user}/edit_user_roles', [UserController::class, 'edit_user_roles'])->name('user.edit_user_roles');
    Route::post('admin/user/{user}/update_user_roles', [UserController::class, 'update_user_roles'])->name('user.update_user_roles');

    //Product Category Routes
    Route::resource('admin/productcategory', ProductCategoryController::class);

    //Product Category Routes
    Route::resource('admin/product', ProductController::class);
    Route::post('admin/product/activate/{product}', [ProductController::class, 'activateProduct'])->name('product.activate');
    Route::post('admin/product/deactivate/{product}', [ProductController::class, 'deactivateProduct'])->name('product.deactivate');

    //Customer Routes
    Route::resource('admin/customer', CustomerController::class);

    // roles
    Route::resource('admin/role', RoleController::class);

    // orders
    Route::resource('admin/order', OrderController::class);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/', [ProductController::class, 'index'])->name('dashboard');

// Route::middleware(['auth:sanctum', 'verified'])->get('/productcategory', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::get('/symlink', function () {
    symlink('/home4/rhassank/public_html/ghaslat/Ghaslat_project/storage/app/public', '/home4/rhassank/public_html/ghaslat/Ghaslat_project/public/storage');
});

Route::middleware([RedirectIfAuthenticated::class])->group(function () {
    Route::get('pos/login', [AuthController::class, 'login_view'])->name('pos.login_view');
    Route::post('pos/login', [AuthController::class, 'login'])->name('pos.login');
});

Route::get('pos/order/create', [POSOrderController::class, 'create'])->name('pos.order.create');
Route::post('pos/order/store', [POSOrderController::class, 'store'])->name('pos.order.store');
