<?php

use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\login\UserController;
use App\Http\Controllers\login\SocialAuthController;
use Illuminate\Support\Facades\Route;
use App\Models\login\User;

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
Route::get('/', function () {
    return view('user.layout.master', ['list' => User::all()]);
})->name('dashboard');

Route::resource('/admin', DashboardController::class);
Route::resource('/Admin/Category', CategoryController::class);
Route::resource('/Admin/Product', ProductController::class);



// Route::get('/login', function () {
//     return view('login.login');
// // });
// Route::get('/register', function () {
//     return view('login.register');
// });
Route::get('login', [UserController::class, 'loginIndex'])->name('login');
Route::post('login', [UserController::class, 'authentication'])->name('login');

Route::get('register', [UserController::class, 'registerIndex'])->name('register');
Route::post('register', [UserController::class, 'save'])->name('register');

Route::get('logout', [UserController::class, 'logout'])->name('logout');

//login with google part
Route::get('/redirect', [socialAuthController::class,'redirectToProvider'])->name('googleLogin');
Route::get('/auth/google/callback', [socialAuthController::class,'handleCallback'])->name('google.login.callback');

//login with facebook part
Route::get('/facebookRedirect', [socialAuthController::class, 'redirectToFacebookProvider'])->name('facebookLogin');
Route::get('/auth/facebook/callback', [socialAuthController::class, 'handleFacebookCallback'])->name('facebook.login.callback');