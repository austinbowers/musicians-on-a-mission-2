<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\CharitiesController;
use App\Http\Controllers\MembersListController;

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

Route::get('/', [HomepageController::class, 'index'])->name('home');

Route::get('/members', [MembersListController::class, 'index'])->name('members');
Route::get('/members/{user}', [MembersListController::class, 'show']);

Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/charities', [CharitiesController::class, 'index'])->name('charities');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/success', function () {
    return view('pages.membership.success');
})->middleware(['auth', 'verified'])->name('success');

Route::middleware('auth')->group(function () {
    Route::get('/membership', [StripeController::class, 'index'])->name('membership');
    Route::post('/membership', [StripeController::class, 'checkout'])->name('membership');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
