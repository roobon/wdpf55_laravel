<?php

use App\Http\Controllers\HomeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::post('/contact', [HomeController::class, 'store']);
Route::get('/contact/list', [HomeController::class, 'contactList']);
Route::get('/contact/delete/{mid}', [HomeController::class, 'delete']);
Route::get('/contact/edit/{mid}', [HomeController::class, 'edit']);
Route::post('/contact/update/{mid}', [HomeController::class, 'update']);

