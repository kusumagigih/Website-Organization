<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\AdminActivityController;
use App\Http\Controllers\AdminTentangController;
use App\Http\Controllers\AdminKontakController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\KontakController;
use App\Models\Activity;
use App\Models\Tentang;
use App\Models\Kontak;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::get('/kontak', [HomeController::class, 'contact'])->name('contact');
// Route::get('/admin/blog', [AdminBlogController::class, 'index'])->name('blogs.index');

Route::resource('tentang', TentangController::class)->parameters([
    'tentang' => 'tentang:slug'
])->only([
    'index','show'
]);

Route::resource('blogs', BlogController::class)->parameters([
    'blogs' => 'blog:slug'
])->only([
    'index', 'show'
]);

Route::resource('activity', ActivityController::class)->parameters([
    'activity' => 'activity:slug'
])->only([
    'index', 'show'
]);

Route::resource('kontak', KontakController::class)->parameters([
    'kontak' => 'kontak:slug'
])->only([
    'index'
]);

Route::resource('admin/blog', AdminBlogController::class);
Route::resource('admin/activiti', AdminActivityController::class);
Route::resource('admin/tentangg', AdminTentangController::class);
Route::resource('admin/kontakk', AdminKontakController::class);

require __DIR__.'/auth.php';