<?php

use App\Classes\Twillio;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Main\MainController;
use App\Http\Controllers\Pos\AuthController;
use App\Http\Controllers\Pos\OrderController as POSOrderController;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Mail\TestEmail;
use Faker\Provider\Lorem;
use Illuminate\Support\Facades\Mail;
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
    // Route::get('admin/page/page-hierarchy', [PageController::class, 'pageHierarchy'])->name('page.page_hierarchy');
    // Route::post('admin/page/update-page-hierarchy', [PageController::class, 'updatePageHierarchy'])->name('page.update_page_hierarchy');
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

    // dashboard
    // Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('admin/dashboard/getCustomers', [DashboardController::class, 'getCustomers'])->name('dashboard.get_customers');
    Route::get('admin/dashboard/getOrders', [DashboardController::class, 'getOrders'])->name('dashboard.get_orders');
    Route::get('admin/dashboard/getData', [DashboardController::class, 'getData'])->name('dashboard.get_data');



    //contact us

    Route::get('admin/contact_us/{contact_us}', [ContactUsController::class, 'show'])->name('contactus.show');
    Route::get('admin/contact_us', [ContactUsController::class, 'index'])->name('contactus.index');
    Route::delete('admin/contact_us/{message}', [ContactUsController::class, 'destroy'])->name('contactus.destroy');

    // pos
    Route::get('pos/order/create', [POSOrderController::class, 'create'])->name('pos.order.create');
    Route::post('pos/order/store', [POSOrderController::class, 'store'])->name('pos.order.store');
    Route::get('pos/order/show/{order}', [POSOrderController::class, 'show'])->name('pos.order.show');
    Route::get('pos/order/get_basic_data', [POSOrderController::class, 'getBasicPosData'])->name('pos.order.get_basic_data');
    Route::post('pos/order/update', [POSOrderController::class, 'orderUpdate'])->name('pos.order.update');
    Route::post('pos/order/search', [POSOrderController::class, 'searchOrder'])->name('pos.order.search');

});


Route::middleware(['auth:sanctum', 'verified'])->get('admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');

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


// main routes

Route::get('/' , [MainController::class, 'home'])->name('main.home');
Route::get('/about_us' , [MainController::class, 'about_us'])->name('main.about_us');
Route::get('/services' , [MainController::class, 'services'])->name('main.services');
Route::get('/prices' , [MainController::class, 'prices'])->name('main.prices');
Route::get('/faq' , [MainController::class, 'faq'])->name('main.faq');
Route::get('/contact' , [MainController::class, 'contact'])->name('main.contact');



// contact us

Route::post('admin/contact_us', [ContactUsController::class, 'store'])->name('contactus.store');


// ajax-content-routes
Route::get('/ajax-content/include-mobile-layout',  [MainController::class, 'include_mobile_layout']);
Route::get('/ajax-content/mainslider-desktop',  [MainController::class, 'mainslider_desktop']);
Route::get('/ajax-content/mainslider-mobile',  [MainController::class, 'mainslider_mobile']);


Route::get('/test' , function() {
    Mail::to('razausmankhan97@gmail.com')->send(new TestEmail("this is just some dummy content thtat is goign to fill the void in the black hole piece of shit moron", 'testing template'));
    // Twillio::sendSms('+923212421713', "testing message");
});
