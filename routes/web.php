<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\AdminBukuController;
use App\Http\Controllers\AdminKategoriController;
use App\Http\Controllers\UserBukuController;

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
    return redirect()->route('login');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin.redirect']], function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('buku', AdminBukuController::class)
        ->except(['show'])
        ->names([
            'index' => 'admin.buku.index', 
            'store' => 'admin.buku.store',
            'update' => 'admin.buku.update',
            'destroy' => 'admin.buku.destroy',
        ]);
    Route::resource('kategori', AdminKategoriController::class)
        ->except(['show'])
        ->names([
            'index' => 'admin.kategori.index', 
            'store' => 'admin.kategori.store',
            'update' => 'admin.kategori.update',
            'destroy' => 'admin.kategori.destroy',
        ]);
    Route::get('/filter/{kategori}', [AdminDashboardController::class, 'filter'])->name('buku.filter');

});

Route::group(['prefix' => 'user', 'middleware' => ['auth', 'user.redirect']], function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
    Route::resource('buku', UserBukuController::class)
        ->except(['show'])
        ->names([
            'index' => 'user.buku.index', 
            'store' => 'user.buku.store',
            'update' => 'user.buku.update',
            'destroy' => 'user.buku.destroy',
        ]);
}); 



