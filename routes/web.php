<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\homeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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


//guest (blm login) 
Route::get('/', [BukuController::class, 'welcome']);


//semua level user yang login
Route::get('/home', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('home');
Route::get('/home', function (){
return view('home');
})->name('home');
// Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
// Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
Route::get('/buku/detail/{id}', [BukuController::class, 'show'])->name('buku.show');
Auth::routes();

//admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/user', [UserController::class, 'index'])->name('users.index');
    Route::get('/user/tambah', [UserController::class, 'create'])->name('users.create');
    Route::post('/user/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/user/update/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/user/hapus/{id}', [UserController::class, 'hapus'])->name('users.hapus');
});


    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori');
    Route::get('/kategori/tambah', [KategoriController::class,'create'])->name('kategori.create');
    Route::post('/kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
    Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');
    Route::get('/buku/tambah', [BukuController::class, 'create'])->name('buku.create');
    Route::post('/buku/store', [BukuController::class, 'store'])->name('buku.store');

    Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');
    Route::get('/peminjaman/tambah', [PeminjamanController::class, 'tambahPeminjaman'])->name('peminjaman.tambah');
    Route::post('/peminjaman/store', [PeminjamanController::class, 'storePeminjaman'])->name('peminjaman.store');
    Route::post('/peminjaman/selesai/{id}', [PeminjamanController::class, 'kembalikanBuku'])->name('peminjaman.kembalikan');
    Route::post('/buku/store', [BukuController::class, 'store'])->name('buku.store');
    Route::delete('/buku/hapus/{id}', [BukuController::class, 'hapus'])->name('buku.hapus');
    Route::delete('/kategori/hapus/{id}', [KategoriController::class, 'hapus'])->name('kategori.hapus');
    Route::get('/buku/edit/{id}',[BukuController::class, 'edit'])->name('buku.edit');
    Route::put('/buku/update/{id}',[BukuController::class, 'update'])->name('buku.update');
    Route::get('/kategori/edit/{id}',[KategoriController::class, 'edit'])->name('kategori.edit');
    Route::post('/kategori/update/{id}',[KategoriController::class, 'update'])->name('kategori.update');
//peminjaman
    Route::get('/report', [PeminjamanController::class, 'print'])->name('print'); 
    Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');
    Route::get('/peminjaman/tambah', [PeminjamanController::class, 'tambahPeminjaman'])->name('peminjaman.tambah');
    Route::post('/peminjaman/store', [PeminjamanController::class, 'storePeminjaman'])->name('peminjaman.store');
    Route::post('/peminjaman/selesai/{id}', [PeminjamanController::class, 'kembalikanBuku'])->name('peminjaman.kembalikan');
    Route::post('/peminjaman/denda/{id}', [PeminjamanController::class, 'bayarDenda'])->name('peminjaman.denda');
   
    Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/user', [UserController::class, 'index'])->name('users.index');
    Route::get('/user/tambah', [UserController::class, 'create'])->name('users.create');
    Route::post('/user/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/user/update/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/user/hapus/{id}', [UserController::class, 'hapus'])->name('users.hapus');
});
//user
Route::get('/user/peminjaman', [PeminjamanController::class, 'userPeminjaman'])->name('peminjaman.user')
->middleware(['auth', 'role:user']);

