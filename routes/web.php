<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PokeApiController;

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
/*
Route::get('/', function () {
    $pokemonContr = new PokeApiController();
    $POKEMONS = $pokemonContr->getPokemons(null);
    return view('welcome')->with([
        'var'=>"valor",
        'pokemons'=>$POKEMONS
    ]);
});
*/
//Route::get('/',[PokeApiController::class,'getPokemons']);

Route::get('/listaPokemon',[PokeApiController::class,'getPokemons']);

Route::get('/mostrarPokemon/{name}', [PokeApiController::class,'mostrarPokemon']);

