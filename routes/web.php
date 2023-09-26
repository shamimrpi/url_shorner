<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlShortenerController;
use App\Http\Controllers\UserController;

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


Auth::routes();


Route::middleware('auth')->group(function() {
    Route::get('/user',[UserController::class,'index']);
    Route::get('user/{id}/access', [UserController::class,'user_access_by_id']);
    Route::post('user/acess/update',[UserController::class,'update_user_access_by_id']);
    Route::get('/{shortCode}', [UrlShortenerController::class, 'redirect']);
    Route::get('/', [UrlShortenerController::class, 'dashboard'])->name('dashboard');
    Route::resource('url', UrlShortenerController::class)->except(['index']);
   
    
});
