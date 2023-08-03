<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CharactersController;
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
    return view('personajes');
});

Route::get('/', [CharactersController::class, 'index'])
->name('personajes');

Route::post('/', [CharactersController::class, 'create'])
->name('personajes_create');

Route::get('/{id}', [CharactersController::class, 'show'])
->name('personajes_show');

Route::patch('/{id}', [CharactersController::class, 'update'])
->name('personajes_update');

Route::delete('/{id}', [CharactersController::class, 'destroy'])
->name('personajes_destroy');