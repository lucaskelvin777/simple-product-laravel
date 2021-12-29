<?php

use App\Http\Controllers\ProductsController;
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

Route::get('/', [ProductsController::class, 'home'])->name('home');
Route::get('/register', [ProductsController::class, 'register']);
Route::post('/register', [ProductsController::class, 'save']);
Route::get('/change/{id}', [ProductsController::class, 'change']);
Route::post('/change', [ProductsController::class, 'update']);
