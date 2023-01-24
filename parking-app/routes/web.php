<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ParkirController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});

Route::middleware(['auth', 'mustAdmin'])->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('member', MemberController::class);
    Route::resource('kategori', KategoriController::class);
});
Route::middleware(['auth', 'petugas-masuk'])->group(function () {
    Route::get('/parkir/masuk', [ParkirController::class, 'viewMasuk'])->name('parkir.masuk');
    route::post('/parkir/store', [ParkirController::class, 'store'])->name('parkir.store');
    Route::get('/parkir/riwayatParkir', [ParkirController::class, 'riwayat'])->name('parkir.riwayatParkir');
    Route::get('generate-pdfParkir', [ParkirController::class, 'generatePDFparkir']);
});
Route::middleware(['auth', 'petugas-keluar'])->group(function () {
    route::put('/parkir/bayar/{id}', [ParkirController::class, 'bayarParkir']);
    
    Route::get('/parkir/keluar', [ParkirController::class, 'viewKeluar'])->name('parkir.keluar');
    Route::get('/parkir/bayar/{id}', [ParkirController::class, 'Bayar']);
    Route::get('/parkir/detBayar/{id}', [ParkirController::class, 'detBayar']);
    Route::get('/parkir/riwayatParkir', [ParkirController::class, 'riwayat'])->name('parkir.riwayatParkir');
    Route::get('generate-pdfParkir', [ParkirController::class, 'generatePDFparkir']);
});
route::get('/parkir/refund/{id}', [ParkirController::class, 'refund']);
route::post('/parkir/refund/{id}', [ParkirController::class, 'refund']);




require __DIR__.'/auth.php';
