<?php

use App\Http\Controllers\ThreadController;
use App\Models\Thread;
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

Route::get('/',[ThreadController::class, 'index'])
        ->name('root');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('threads',ThreadController::class)
        ->only(['create', 'store', 'edit', 'update', 'destroy'])
        ->middleware('auth');

Route::resource('threads', ThreadController::class)
        ->only(['show', 'index']);

// Route::post('/threads/create', [ThreadController::class, 'create']);

// Route::get('/threads', [ThreadController::class, 'index'])->name('threads');

// Route::get('/threads', function () {
    // return view('threads.index');
// })->name('threads');

require __DIR__.'/auth.php';
