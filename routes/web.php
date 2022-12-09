<?php

use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\admin\CatProController;
use App\Http\Controllers\admin\ClientsController;
use App\Http\Controllers\admin\CommandeController;
use App\Http\Controllers\admin\DetaisCommandeController;
use App\Http\Controllers\admin\LiveCommande;
use App\Http\Controllers\admin\ProduitsController;
use App\Http\Controllers\admin\VilleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\user\CatProController as UserCatProController;
use App\Http\Controllers\user\CherchController;
use App\Http\Controllers\user\dashboardController;
use App\Http\Controllers\user\produitDetaisController;
use App\Http\Controllers\user\UserHomeController;
use App\Models\Villes;
use Illuminate\Support\Facades\Auth;
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
    return view('User/dashboard');
});

Auth::routes();

Route::get('/accueil', [HomeController::class, 'index'])->name('home');
Route::middleware('auth')->group(function() {
    Route::get('/categories', [CategoriesController::class , 'index'])->name('cat.index');
    Route::get('/categories/{id}/delete', [CategoriesController::class , 'delete'])->name('cat.delete');
    Route::post('/categories/update', [CategoriesController::class , 'update'])->name('cat.update');
    Route::post('/categories/ajouter', [CategoriesController::class , 'store'])->name('cat.store');
});
Route::middleware('auth')->group(function() {
    Route::get('/produits', [ProduitsController::class , 'index'])->name('pro.index');
    Route::post('/produits/ajouter', [ProduitsController::class , 'store'])->name('pro.store');
    Route::get('/produits/{id}/delete', [ProduitsController::class , 'delete'])->name('pro.delete');
    Route::post('/produits/update', [ProduitsController::class , 'update'])->name('pro.update');
    Route::get('/produits-{name}', [ProduitsController::class , 'procat'])->name('pro.cat');
});
Route::middleware('auth')->group(function() {
    Route::get('/ville', [VilleController::class , 'index'])->name('ville.index');
    Route::post('/ville/ajouter', [VilleController::class , 'store'])->name('ville.store');
    Route::post('/ville/update', [VilleController::class , 'update'])->name('ville.update');
    Route::get('/ville/{id}/delete', [VilleController::class , 'delete'])->name('ville.delete');
});
Route::middleware('auth')->group(function() {
    Route::get('/commande', [CommandeController::class, 'index'])->name('cmd.index');
    Route::get('/commande/valider/{id}', [CommandeController::class, 'valider'])->name('cmd.valider');
    Route::get('/commande/refuser/{id}', [CommandeController::class, 'refuser'])->name('cmd.refuser');
    Route::get('commande-{id}', [DetaisCommandeController::class , 'index'])->name('detais.index');
});
Route::middleware('auth')->group(function() {
    Route::get('/clients', [ClientsController::class , 'index'])->name('clt.index');
});

Route::get('/', [UserHomeController::class , 'index'])->name('userHome');
Route::get('rechercher', [UserHomeController::class , 'rech'])->name('rech');
Route::get('/produit-{name}', [produitDetaisController::class , 'index'])->name('proDts.index');
Route::post('/produit/ajouter', [produitDetaisController::class , 'store'])->name('proDts.store');

Route::get('/{name}', [UserCatProController::class , 'index'])->name('catPro.index');
