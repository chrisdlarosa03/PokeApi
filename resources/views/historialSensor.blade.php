@extends('layout')
@section('title', 'Historial | '.$sensor)
@section('content')
    <div class="row text-center fixed-top mt-5 headers">
        <h5>Historial {{$sensor}}</h5>
    </div>
    <div class="row justify-content-md-center" style="margin-top: 8em">
        <div class="col-md-8">
            <table class="table text-center">
                        <thead class="headers">
                            <tr>
                                <th>id</th>
                                <th>Sensor</th>
                                <th>Datos</th>
                                <th>Mensaje</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                                $identificador = "Identificador";
                                $data = "Data";
                                $string = "DataString";
                                $fechaHora = "FechaHora";
                            @endphp
                            @foreach ($registros as $registro)
                            @php
                                $fecha = substr($registro->$fechaHora, 1, 11);
                                $hora = substr($registro->$fechaHora, 13, -1);
                                if(strpos($registro->$string, 'Error') !== false){
                                    $claseColor = "table-secondary";
                                }
                                else {
                                    $claseColor = "table-info";
                                }
                                if(strpos($registro->$string, 'Temperatura') !== false){
                                    if($registro->$data >= 25){
                                        $claseColor = "table-danger";
                                    }
                                }
                                if(strpos($registro->$string, 'Magnetico') !== false){
                                    if($registro->$data == 0){
                                        $claseColor = "table-danger";
                                    }
                                }
                            @endphp
                            @if (strpos($registro->$identificador, $sensor) !== false)
                            <tr class="{{$claseColor}}">
                                <td>{{$i++}}</td>
                                <td>{{$registro->$identificador}}</td>
                                <td>{{$registro->$data}}</td>
                                <td>{{$registro->$string}}</td>
                                <td>{{$fecha}}</td>
                                <td>{{$hora}}</td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
@endsection
@section('footer', 'texto del footer')
