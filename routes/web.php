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

Route::get('/', [JeuxController::class, 'vue_tableau_jeux'])->name('index');

Route::post('/addGame', [JeuxController::class, 'addGame'])->name('addGame');

Route::get('/game/{id}', [JeuxController::class, 'showGame'])->name('showGame');

Route::delete('/jeux/{id}/delete', [JeuxController::class, 'deleteGame'])->name('deleteGame');
