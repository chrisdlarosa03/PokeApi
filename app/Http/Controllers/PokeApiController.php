<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PokeApiController extends Controller
{
    //
    public function getPokemons(){
        $response = Http::get('https://pokeapi.co/api/v2/pokemon/');
        $objectResponse = $response->object();
        $name = "Christian";
        return view('listaPokemons',[
            'minombre'=> $name,
            'pokemons'=>$objectResponse->results
        ]);



        //CONVERTIR RESPONSE DE JSON A OBJETO
        //$objetoRespuesa = $resPokeApi->body();
        //$objetoRespuesa = $response->object();

        //acceder al atributo que necesita
        //return $resPokeApi->object()->results;

        //$pokemons = $objetoRespuesa->results;
        //return $pokemons;
        //return json_encode($pokemons);
    }
    /*
    public function mostrarPokemon($name){
        $response = Http::get('https://pokeapi.co/api/v2/pokemon/'.$name);
        $pokemon = $response->object();
        return view('mostrarPokemon',[
            "pokemon"=>$pokemon
        ]);
    }
    */
    public function mostrarPokemon($name){
        $response = Http::get('https://pokeapi.co/api/v2/pokemon/'.$name);
        $pokemon = $response->object();
        $spritesArray = self::getSprites($pokemon->sprites);
        return view('mostrarPokemon',[
            "pokemon"=>$pokemon,
            "pokeName"=> strtoupper($name),
            "spritesArray"=>$spritesArray
        ]);
    }
    //autoreferencia
    //una funcion se llama asi misma
    public function getSprites($spritesObject){
        $sprites = [];
        foreach($spritesObject as $sprite){
            if(is_string($sprite)){
                array_push($sprites,$sprite);
                //$sprites[] = $sprite;
            } else if($sprite != null) {
                $sprites2 = self::getSprites($sprite);
                foreach($sprites2 as $sprite2){
                    array_push($sprites,$sprite2);
                }
            }
        }
        return $sprites;
    }
}
