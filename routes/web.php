<?php

use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Category\CategoryController;
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

// Route::get('/', function () {
//     return view('admin.dashboard')->name('Dashboard');
// });
Route::get('/user', function () {
    return view('user.layout.master');
});
Route::resource('/admin',DashboardController::class);
Route::resource('/Admin/Category',CategoryController::class);
Route::resource('/Admin/Product',ProductController::class);



Route::get('/login', function () {
    return view('login.login');
});
Route::get('/register', function () {
    return view('login.register');
});
