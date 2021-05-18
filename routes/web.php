<?php

use App\Http\Controllers\Admin\PageController;
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
Route::get('admin/page/page-hierarchy', [PageController::class,'pageHierarchy'] )->name('page.page_hierarchy');
Route::post('admin/page/update-page-hierarchy', [PageController::class ,'updatePageHierarchy'] )->name('page.update_page_hierarchy');
Route::resource('admin/page', PageController::class);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test' ,[testController::class , 'show'] );

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
