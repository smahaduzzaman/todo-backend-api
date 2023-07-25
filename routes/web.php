<?php

use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/user-registration', [UserController::class, 'UserRegistration']);
Route::post('/user-login', [UserController::class, 'UserLogin']);

// Create todo route group with controller
Route::controller(TodoController::class)->group(function () {
    Route::post('/create', 'create')->name('todo.create');
    Route::get('/list', 'list')->name('todo.list');
    Route::get('/{id}', 'get')->name('todo.get');
    Route::put('/{id}/update', 'update')->name('todo.update');
    Route::delete('/{id}/delete', 'delete')->name('todo.delete');
    // Todo Search by title route with controller
    Route::get('/search/{title}', 'search')->name('todo.search');
    // Todo Search by status route with controller
    Route::get('/search/{status}', 'search')->name('todo.search');
});


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
    return view('welcome');
});
