<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;
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

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();


 Route::group(['middleware' => ['auth']], function () {
     Route::any('/home', [HomeController::class, 'index'])->name('home');
     Route::any('/test', [TestController::class, 'test'])->name('test');
           Route::resource('product', ProductController::class);
});