<?php

use App\Http\Controllers\ContactController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('submissions', [ContactController::class, 'index'])->middleware(['auth', 'verified'])->name('submissions');
Route::get('contact-us', [ContactController::class, 'show'])->name('contact-form');
Route::post('contact-us', [ContactController::class, 'store'])->name('contact-submit');

Route::get('contact-success', function () {
    return Inertia::render('ContactSuccess');
})->name('contact-success');

require __DIR__.'/auth.php';
