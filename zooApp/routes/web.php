<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\auth;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PhotoAdminController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\BreedController;
use App\Http\Controllers\Admin\UserController;

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('users', UserController::class);
});

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Types CRUD
    Route::resource('types', TypeController::class);

    // Breeds CRUD
    Route::resource('breeds', BreedController::class);

    // Animals CRUD
    Route::resource('animals', AnimalController::class);
});

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('users', UserController::class);
});

Route::get('/', function () {
    $animals = \App\Models\Animal::latest()->take(10)->get();
    return view('welcome', compact('animals'));
});

Route::middleware(['auth'])->group(function () {
    
    Route::get('/admin/photos', [PhotoAdminController::class, 'index'])->name('admin.photos.index');
    Route::post('/admin/photos', [PhotoAdminController::class, 'store'])->name('admin.photos.store');
    Route::get('/admin/photos/{photo}/edit', [PhotoAdminController::class, 'edit'])->name('admin.photos.edit');
    Route::patch('/admin/photos/{photo}', [PhotoAdminController::class, 'update'])->name('admin.photos.update');
    Route::delete('/admin/photos/{photo}', [PhotoAdminController::class, 'destroy'])->name('admin.photos.destroy');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/photos', [PhotoController::class, 'index'])->name('photos.index');
    Route::post('/photos', [PhotoController::class, 'store'])->name('photos.store');
    Route::delete('/photos/{photo}', [PhotoController::class, 'destroy'])->name('photos.destroy');
});

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
