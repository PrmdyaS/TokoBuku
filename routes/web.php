<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\UserManagementController;
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

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;

Route::get('/', function () {
	return redirect('/dashboard'); })->middleware('auth');
Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');
Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');
Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::group(['middleware' => 'auth'], function () {
	Route::get('/user-management', [UserManagementController::class, 'index'])->name('user-management');
	Route::get('/user-management-tambah', [UserManagementController::class, 'tambah'])->name('user-management-tambah');
	Route::post('/user-management-tambah-process', [UserManagementController::class, 'add'])->name('user-management-tambah-process');
	Route::get('/user-management-edit-{id}', [UserManagementController::class, 'edit'])->name('user-management-edit');
	Route::post('/user-management-update-{id}', [UserManagementController::class, 'update'])->name('user-management-update');
	Route::get('/user-management-delete-{id}', [UserManagementController::class, 'delete'])->name('user-management-delete');

	Route::get('/buku', [BukuController::class, 'index'])->name('buku');
	Route::get('/buku-tambah', [BukuController::class, 'tambah'])->name('buku-tambah');
	Route::post('/buku-tambah-process', [BukuController::class, 'add'])->name('buku-tambah-process');
	Route::get('/buku-edit-{id}', [BukuController::class, 'edit'])->name('buku-edit');
	Route::post('/buku-update-{id}', [BukuController::class, 'update'])->name('buku-update');
	Route::get('/buku-delete-{id}', [BukuController::class, 'delete'])->name('buku-delete');
	Route::get('/buku-detail-{id}', [BukuController::class, 'detail'])->name('buku-detail');

	Route::get('/genre-buku', [BukuController::class, 'index_genre_buku'])->name('genre-buku');
	Route::get('/genre-buku-tambah', [BukuController::class, 'tambah_genre_buku'])->name('genre-buku-tambah');
	Route::post('/genre-buku-tambah-process', [BukuController::class, 'add_genre_buku'])->name('genre-buku-tambah-process');
	Route::get('/genre-buku-edit-{id}', [BukuController::class, 'edit_genre_buku'])->name('genre-buku-edit');
	Route::post('/genre-buku-edit-process-{id}', [BukuController::class, 'update_genre_buku'])->name('genre-buku-edit-process');
	Route::get('/genre-buku-delete-{id}', [BukuController::class, 'delete_genre_buku'])->name('genre-buku-delete');

	Route::get('/list-buku', [BukuController::class, 'showListBuku'])->name('list-buku');
	Route::get('/list-buku/filter', [BukuController::class, 'ListBukuFilter'])->name('/list-buku-filter');
	Route::get('/deleteFilter', [BukuController::class, 'deleteFilter'])->name('deleteFilter');
	Route::get('/beli-buku-{id}', [BukuController::class, 'beliBuku'])->name('beli-buku');
	Route::get('/process-beli-buku-{id}', [BukuController::class, 'storeBuku'])->name('beli-buku-process');

	Route::get('/riwayat-pembelian', [BukuController::class, 'RiwayatPembelian'])->name('riwayat-pembelian');

	Route::get('/virtual-reality', [PageController::class, 'vr'])->name('virtual-reality');
	Route::get('/rtl', [PageController::class, 'rtl'])->name('rtl');
	Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
	Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
	Route::get('/profile-static', [PageController::class, 'profile'])->name('profile-static');
	Route::get('/sign-in-static', [PageController::class, 'signin'])->name('sign-in-static');
	Route::get('/sign-up-static', [PageController::class, 'signup'])->name('sign-up-static');
	Route::get('/{page}', [PageController::class, 'index'])->name('page');
	Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});