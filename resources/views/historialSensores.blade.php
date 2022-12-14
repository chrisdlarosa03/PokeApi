@extends('layout')
@section('title', 'Historial | INCUBADORA')
@section('content')
    <div class="row text-center fixed-top mt-5 headers">
        <h5>Historial de todos los Sensores</h5>
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
                            @endphp
                            <tr class="{{$claseColor}}">
                                <td>{{$i++}}</td>
                                <td>{{$registro->$identificador}}</td>
                                <td>{{$registro->$data}}</td>
                                <td>{{$registro->$string}}</td>
                                <td>{{$fecha}}</td>
                                <td>{{$hora}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
@endsection
@section('footer', 'texto del footer')
