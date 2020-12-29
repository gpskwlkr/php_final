<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticleController;
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

Route::get('/', [ArticleController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('is_admin')->group(function() {
   Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
   Route::get('/categories/edit/{id}', [CategoryController::class, 'editCategory'])->name('categories.edit');
   Route::put('/categories/update/{id}', [CategoryController::class, 'updateCategory'])->name('categories.update');
   Route::get('/categories/delete/{id}', [CategoryController::class, 'deleteCategory'])->name('categories.delete');
   Route::get('/articles/edit/{id}', [ArticleController::class, 'editArticle'])->name('articles.edit');
   Route::get('/articles/delete/{id}', [ArticleController::class, 'deleteArticle'])->name('articles.delete');
});

Route::prefix('articles')->group(function() {
    Route::get('/', [ArticleController::class, 'index'])->name('articles.index');
    Route::get('/{id}', [ArticleController::class, 'getFullArticle'])->name('articles.full');
});
