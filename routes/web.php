<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\EntreeController;
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

//Route::middleware(['auth'])->group(function () {

 Route::resource('categories',CategorieController::class);
 Route::resource('produits',ProduitController::class);
 Route::resource('fournisseurs',FournisseurController::class);
 Route::resource('commandes',CommandeController::class);
 Route::resource('entrees',EntreeController::class);
 
 Route::get('/admin',[AdminController::class,'index'])->name('admin');
 
 Route::resource('users',UserController::class);
 Route::post('desactiver',[UserController::class,'desactiver'])->name('desactiver');
 Route::get('profile/{id}',[UserController::class,'profile'])->name('profile');


 

//});

Route::get('/',[AccueilController::class,'index'])->name('index');
Route::get('lirePlus/{id}',[AccueilController::class,'lireArticle'])->name('lirePlus');

Auth::routes();

