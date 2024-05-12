<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UserController;
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

Route::get('/', [FrontController::class, 'index'])->name('accueil');
Route::get('/menu', [FrontController::class, 'menu'])->name('menu');
Route::get('/menu/product/{id}', [FrontController::class, 'show_by_category'])->name('menu/product/');
Route::post('reservation', [ReservationController::class, 'take_reservation'])->name('reservation');
Route::get('/voir_reservation', [ReservationController::class, 'show_reservation'])->name('voir_reservation');
Route::delete('/supprimer_reservation/{reservation}', [ReservationController::class, 'delete_reservation'])->name('supprimerReservation');
Route::post('approuver_reservation', [ReservationController::class, 'update'])->name('approved');
Route::get('/voir_plus', [FrontController::class, 'voir_plus'])->name('voir');
Route::get('/voir_plus/{id}', [FrontController::class, 'voir_details'])->name('voir_plus.id');
Route::get('/contact',[FrontController::class,'contact'])->name('VoirContact');
Route::get('/apropos',[FrontController::class,'apropos'])->name('VoirApropos');
// ROUTES DES PANIERS
Route::get('/voir_panier', [PanierController::class, 'VoirPanier'])->middleware('auth')->name('voir_panier');
Route::get('/ajouter_panier/{id}', [PanierController::class, 'AjouterPanier'])->middleware('auth')->name('AjouterPanier');
Route::get('/augmenter/{id}', [PanierController::class, 'Augmenter_qty'])->middleware('auth')->name('augmenterQuantite');
Route::get('/diminuer/{id}', [PanierController::class, 'Diminuer_qty'])->middleware('auth')->name('diminuerQuantite');
Route::get('/supprimer_item/{id}', [PanierController::class, 'SuprimmerItem'])->middleware('auth')->name('supprimerItem');
route::get('/voir_commande/{id}', [PanierController::class, 'VoirCommande'])->name('voirCommande');
route::post('/commander', [PanierController::class, 'Commander'])->name('Commander');

// ROUTES DES FORMULAIRES D'INSCRIPTION DES USER
Route::get('/inscription', [ClientController::class, 'inscription'])->name('inscription');
Route::post('/inscrire', [ClientController::class, 'inscrire'])->name('inscrire');
Route::get('/connexion', [ClientController::class, 'connexion'])->name('connexion');
Route::post('/connecter', [ClientController::class, 'connecter'])->name('connecter');
Route::post('/deconnexion', [ClientController::class, 'deconnexion'])->name('deconnexion');

// LES ROUTES DE MA PARTIE ADMINISTRATIONS
route::namespace('Admin')->group(function () {
    route::get('showRegister', [AdminController::class, 'showRegister'])->name('showRegister');
    route::get('showLogin', [AdminController::class, 'showLogin'])->name('showLogin');
    route::post('Register', [AdminController::class, 'Register'])->name('Register');
    route::post('Login', [AdminController::class, 'Login'])->name('Login');
    route::post('logout', [AdminController::class, 'logout'])->name('logout');
    route::post('update', [AdminController::class, 'updateUser'])->name('update');
    route::get('showParametre', [AdminController::class, 'showParametre'])->name('showParametre');
});
// LES ROUTES DES CRUD
route::get('admin/index', [DashboardController::class, 'ShowDashboard'])->name('index');
route::get('admin/user_list', [UserController::class, 'user_list'])->name('user_list');
route::delete('user/{user}', [UserController::class, 'delete_user'])->name('user.delete');
route::get('/commande', [AdminController::class, 'Commande'])->name('admin.commande');
route::post('/modifier_commande/{id}', [AdminController::class, 'updateCommande'])->name('ModifierCommande');
Route::prefix('admin')->name('admin.')->group(function () {
    route::resource('product', ProductController::class)->except('show');
    route::resource('category', CategoryController::class)->except('show');
    route::resource('slider', SliderController::class)->except('show');
});
// LES ROUTES MA PARTIE CLIENT.
