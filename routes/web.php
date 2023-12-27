<?php

use App\Http\Controllers\JeuxController;
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

//page d'accueil avec index pour developpement
Route::get('/', [JeuxController::class, 'vue_tableau_jeux'])->name('index');

//exemple filtrage avec un bouton qui affiche uniquement les jeux ayant un a dans leur nom
Route::get('/filterGames', [JeuxController::class, 'filterGames'])->name('filterGames');

//formulaire pour ajouter un jeu (dans la base de donné de l'api)
Route::post('/addGame', [JeuxController::class, 'addGame'])->name('addGame');

//bouton qui renvoi sur la page de détail d'un jeu
Route::get('/game/{id}', [JeuxController::class, 'showGame'])->name('showGame');

//suppression d'un jeu
Route::delete('/jeux/{id}/delete', [JeuxController::class, 'deleteGame'])->name('deleteGame');
