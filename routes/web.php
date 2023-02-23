<?php

use App\Http\Controllers\MoviesController;
use App\Http\Controllers\ProfileController;
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
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('profile.partials.home');
    })->name('dashboard');
}); 

// Route::middleware(['auth'])->group(function () {
//     Route::get('/dashboard', function () { return view('profile.partials.home'); })->name('dashboard');
//     // Route::get('/movies', [function () { return view('movies.index'); }]);
//     Route::resource('/movies', MoviesController::class);
// });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('/movies', MoviesController::class);

Route::get('/home', function() {
    return view('profile.partials.home');
});

require __DIR__.'/auth.php';



// Route::get('/dashboard', function () {
//     return view('/movies/index', [MoviesController::class, 'index']);
// })->middleware(['auth', 'verified'])->name('dashboard');