<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\MyCustomLoginController;
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


Route::get('/',
    [PostController::class, 'index'])->name('blog.index');

Route::get('blog/index',
    [PostController::class, 'index'])->name('blog.index');

Route::get('blog/post/{id}',
    [PostController::class, 'show'])->name('blog.post');

Route::get('blog/post/{id}/like',
    [PostController::class, 'like'])->name('blog.post.like');

Route::view('about', 'other.about')->name('other.about');



Route::middleware(['auth'])->group(function () {
    Route::get('/admin',
        [PostController::class, 'adminIndex'])->name('admin.index');


    Route::get('admin/edit/{id}',
        [PostController::class, 'edit'])->name('admin.edit');

    Route::post('admin/update',
        [PostController::class, 'update'])->name('admin.update');

    Route::get('admin/delete/{id}',
        [PostController::class, 'destroy'])->name('admin.delete');


    Route::get('admin/create',
        [PostController::class, 'create'])->name('admin.create');

    Route::post('admin/store',
        [PostController::class, 'store'])->name('admin.store');

});




Route::middleware(['auth:web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::post('/login', [MyCustomLoginController::class, 'login']);
