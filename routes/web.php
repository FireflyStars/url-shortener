<?php

use Illuminate\Support\Facades\Route;
use App\Models\Url;
use App\Http\Controllers\UrlController;
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
Route::redirect('/', '/login');

Route::get('/dashboard', [UrlController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::resource('shortened-url', UrlController::class)->only([
    'show', 'store'
])->missing(function (Request $request) {
    return redirect()->route('dashboard');
});
require __DIR__.'/auth.php';
