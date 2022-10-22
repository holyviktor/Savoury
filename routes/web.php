<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\PostController;
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

Route::get('/', [MainController::class, 'landing'])->name('landing');

Route::get('/about', [MainController::class, 'about'])->name('about');

Route::get('/menu', [MainController::class, 'menu'])->name('menu');

Route::get('/basket', [MainController::class, 'basket'])->name('basket');

Route::post('/basket', [PostController::class, 'postBasket']);

Route::post('/', [PostController::class, 'addToCartMain']);

Route::post('/menu', [PostController::class, 'addToCartMenu']);

Route::get('/api/ordering/{phone_number}', [MainController::class, 'ordering'])->name('ordering');

Route::get('/api/ordering', [MainController::class, 'ordering_price'])->name('ordering_price');
