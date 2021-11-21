<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Commandes;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\ProduitController;

use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
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
Auth::routes();
Route::get('/',function (){return view('auth.login');});

Route::middleware(['auth'])->group(function () {

 Route::resource('categories',CategorieController::class);
 Route::resource('produits',ProduitController::class);
 Route::resource('fournisseurs',FournisseurController::class);
 Route::get('commandes',Commandes::class);
 Route::resource('entrees',EntreeController::class);
 
 
 Route::resource('users',UserController::class);
 Route::get('desactiver/{id}',[UserController::class,'desactiver'])->name('desactiver');
 Route::get('profile/{id}',[UserController::class,'profile'])->name('profile');
 Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');
});


