<?php

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

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Create and modify profile

Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
Route::post('/profile', [App\Http\Controllers\ProfileController::class, 'postCreate'])->name('profile.postCreate');
Route::get('/profile/create', [App\Http\Controllers\ProfileController::class, 'create']);
Route::get('/profile/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile/{id}/update', [App\Http\Controllers\ProfileController::class, 'postEdit'])->name('profile.postEdit');
Route::post('/profile/deletereview', [App\Http\Controllers\profileController::class, 'deleteReview'])->name('profile.deleteReview');

Route::get('/addresource', [App\Http\Controllers\addResourceController::class, 'index'])->name('addResource');
Route::post('/addresource', [App\Http\Controllers\addResourceController::class, 'postCreate'])->name('addResource.postCreate');

Route::get('/review/{resource}', [App\Http\Controllers\userReviewController::class, 'index'])->name('userReview');
Route::post('/review/{resource}', [App\Http\Controllers\userReviewController::class, 'postReview'])->name('userReview.postReview');

Route::get('/category/{category}', [App\Http\Controllers\categoryListController::class, 'index'])->name('categoryList');


