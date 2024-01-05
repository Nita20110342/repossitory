<?php

use App\Http\Controllers\MyRepositoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RepositoryController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



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
    return view('auth.login');
});

//Auth::routes();

Route::get('user', [UserController::class, 'index'])->name('user');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::get('/user/show', [UserController::class, 'show'])->name('user.show');
Route::get('/user/edit', [UserController::class, 'edit'])->name('user.edit');
Route::get('/user/update', [UserController::class, 'update'])->name('user.update');
Route::get('/user/delete', [UserController::class, 'delete'])->name('user.delete');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('repository', RepositoryController::class)->middleware('auth');
Route::resource('user', UserController::class)->middleware(['auth', 'can:isAdmin']);
Route::get('/myrepositories', [MyRepositoryController::class, 'index'])->name('myrepo');


