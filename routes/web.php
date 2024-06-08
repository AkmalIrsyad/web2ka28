<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\commentController;
use App\Http\Controllers\infoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('auth/login');
// });


// Izinkan akses tamu ke dashboard dan tampilan artikel
Route::get('/dashboard', [infoController::class, 'index'])->name('dashboard');
Route::get('/techStack', [infoController::class, 'showTechStack'])->name('showTechStack');
Route::get('artikel/{id}', [infoController::class, 'show']);
// Route::get('/dashboard', [infoController::class, 'index'])->middleware(['auth','verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    // Rute Profil
    Route::post('artikel/{id}',[commentController::class,'store'])->name('comments.store');
    Route::delete('artikel/{id}',[commentController::class,'destroy'])->name('comments.destroy')->middleware('auth');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


// Route::get('artikel/{id}',[infoController::class,'show']);
});

Route::get('admin/dashboard',[HomeController::class,'index'])->middleware(['auth','admin'])->name('admin');

Route::middleware('admin')->group(function() {
Route::get('admin/dashboard/create',[HomeController::class,'create']);
Route::post('admin/dashboard/store',[HomeController::class,'store']);
Route::get('admin/artikel/{id}/edit',[HomeController::class,'edit']);
Route::put('admin/artikel/{id}',[HomeController::class,'update']);
Route::delete('admin/artikel/{id}',[HomeController::class,'destroy'])->name('artikel.destroy');
});
require __DIR__.'/auth.php';






