<?php

use App\Models\Umkm;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UmkmController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DashboardCategoriesController;
use App\Models\User;
use Illuminate\Routing\Route as RoutingRoute;

Route::get('/', function () {
    return view('home', [
        'umkm' => Umkm::orderBy('dilihat', 'desc')->take(8)->get(),
        'categories' => Categories::all(),
        'umkm_categories' => Umkm::latest()->filters(request(['kategori']))->paginate(12)
    ]);
})->name('home');
Route::get('/tentang-kami', function () {
    return view('about', [
        'umkms' => UMKM::select('nama', 'latitude', 'longitude')->orderBy('dilihat', 'desc')->take(6)->get(),
    ]);
})->name('about');


Route::resource('kategori', CategoriesController::class)->only(['index', 'show']);
Route::get('/kategori/{kategori}/{umkm}', [UmkmController::class, 'show'])->name('umkm.show');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', function () {
        return view('dashboard.index', [
            'umkm_all' => Umkm::all(),
            'umkm' => Umkm::where('user_id', Auth::user()->id)->get(),
            "kategori" => Categories::all(),
        ]);
    })->name("dashboard");
    Route::resource('dashboard/umkm', UmkmController::class)->except(['show']);
});

Route::middleware(['auth', 'verified', 'admin'])->group(function() {
    Route::get('/dashboard/users', function () {
        return view('dashboard.user', [
            'users' => User::all()
        ]);
    })->name("dashboard.user");
    Route::resource('dashboard/kategori', DashboardCategoriesController::class)->except(['show'])->names([
        'index' => 'dashboard.kategori.index',
        'create' => 'dashboard.kategori.create',
        'store' => 'dashboard.kategori.store',
        'edit' => 'dashboard.kategori.edit',
        'update' => 'dashboard.kategori.update',
        'destroy' => 'dashboard.kategori.destroy',
    ]);

});

require __DIR__ . '/auth.php';
