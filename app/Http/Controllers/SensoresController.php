<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SensoresController extends Controller
{
    public function getSensoresData(){
        $response = Http::get('https://iotsensor-production-aab2.up.railway.app/sensors');
        $objectResponse = $response->object();
        return view('listaSensores',[
            'sensores'=>$objectResponse
        ]);
    }

    public function getSensoresDataHistory(){
        $response = Http::get('https://iothist-production-cc48.up.railway.app/sensors');
        $objectResponse = $response->object();
        return view('historialSensores',[
            'registros'=>$objectResponse
        ]);
    }

    public function getSensorDataHistory($sensor){
        $response = Http::get('https://iothist-production-cc48.up.railway.app/sensors');
        $objectResponse = $response->object();
        return view('historialSensor',[
            "sensor"=>$sensor,
            'registros'=>$objectResponse
        ]);
    }
}
