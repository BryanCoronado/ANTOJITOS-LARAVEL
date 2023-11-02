<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;


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

route::get('/', [HomeController::class, 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

route::get('/redirect', [HomeController::class, 'redirect']);

route::get('/view_category', [AdminController::class, 'view_category']);


route::post('/add_category', [AdminController::class, 'add_category']);

route::get('/delete_category/{id}', [AdminController::class, 'delete_category']);

route::get('/view_product', [AdminController::class, 'view_product']);
