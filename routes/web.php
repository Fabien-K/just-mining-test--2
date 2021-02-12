<?php

use App\Http\Controllers\ProduitController;
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

Route::get('/', 'ProduitController@shop')
->name('shop');


/**
 *  Produit
 */
Route::get('/liste_des_produits', 'ProduitController@index')
    ->name('accueil');
/**
 * Crud produit
 * Create
 */
Route::get('/ajouter-un-produit', 'ProduitController@create')
->name('ajoutProduit');


Route::post('/enregistrer', 'ProduitController@store')
    ->name('enregistrerProduit');
// edit & update
Route::post('/modifier-un-produit','ProduitController@edit')
    ->name('modifierProduit');
Route::put('/MAJ-Produit','ProduitController@update')
    ->name('Maj-Produit');
// delete
Route::post('/supprimer', 'ProduitController@destroy')
    ->name('supprimerProduit');

