<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainHome;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;


Route::get('/', [BookController::class, 'index'])->name("bookList");

Route::get('/categories', [CategoryController::class,'listCategories'])->name("categorylist");

Route::get('/books/{book}', [BookController::class, 'showBookDetails'])->name('bookdetail');

Route::get('/categoriesDetail/{category}', [CategoryController::class, 'showCategoryDetails'])->name('categorydetail');

Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('bookdestroy');

Route::delete('/categoriesDel/{category}', [CategoryController::class, 'destroy'])->name('categorydestroy');

Route::get('/newCategory', [CategoryController::class, 'formulaireNewCategory'])->name('formulaireNewCategory');

Route::post('/categoriesStore', [CategoryController::class, 'enregistrerCategory'])->name('newCategory');

Route::get('/categoriesModif/{categoryId}', [CategoryController::class, 'formulaireModifCategory'])->name('categoryModif');

Route::put('/categoriesValidModif/{id}', [CategoryController::class, 'validModifCategory'])->name('validModifCategory');

Route::get('/booksModif/{bookId}', [BookController::class, 'formulaireModifBook'])->name('bookModif');

Route::put('/booksValidModif/{id}', [BookController::class, 'validModifBook'])->name('validModifBook');

Route::get('/newBook', [BookController::class, 'formulaireNewBook'])->name('formulaireNewBook');

Route::post('/booksStore', [BookController::class, 'enregistrerBook'])->name('newBook');

Route::get('/searchBook', [BookController::class, 'searchLivre'])->name('rechercheLivre');

Route::get('{any}', [BookController::class, 'index'])->where('any', '.*');
