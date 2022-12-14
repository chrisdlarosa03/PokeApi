@extends('layout')
@section('title', 'Sensores | INCUBADORA')
@section('content')
    <div class="row text-center fixed-top mt-5 headers">
        <h5>Inicio</h5>
        <p>Tabla de sensores en tiempo real</p>
    </div>
    <div class="row justify-content-md-center" style="margin-top: 8em">
        <div class="col-md-8">
            @php
                $i = 1;
                $nombre = "NombreSensor";
                $tipo = "TipoSensor";
                $identificador = "Identificador";
                $data = "Data";
                $string = "DataString";
                $fechaHora = "FechaHora";
            @endphp
            @foreach ($sensores as $sensor)
                <div class="card text-center">
                    <div class="card-header">
                        {{$sensor->$nombre}}
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{$sensor->$string}}<span class="badge badge-secondary">{{$sensor->$tipo}}</span></h5>
                            @if(strpos($sensor->$string, 'Temperatura') !== false)
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: {{$sensor->$data}}%;" aria-valuenow="{{$sensor->$data}}" aria-valuemin="0" aria-valuemax="50">{{$sensor->$data}}C</div>
                                </div>
                            @endif
                            @if(strpos($sensor->$string, 'Humedad') !== false)
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: {{$sensor->$data}}%;" aria-valuenow="{{$sensor->$data}}" aria-valuemin="0" aria-valuemax="100">{{$sensor->$data}}%</div>
                                </div>
                            @endif
                            @if(strpos($sensor->$string, 'Magnetico') !== false)
                            @php
                                if($sensor->$data == 1){
                                    $claseColorMag = "text-success";
                                }
                                else {
                                    $claseColorMag = "text-danger";
                                }
                            @endphp
                             <div class="spinner-grow {{$claseColorMag}}" role="status">
                                <span class="sr-only">Loading...</span>
                              </div>
                              <br>
                            @endif

                            <br>
                        <a href="/historialSensor/{{$sensor->$identificador}}" class="btn btn-primary">Historial</a>
                    </div>
                        <div class="card-footer text-muted">
                            @php
                                $fecha = substr($sensor->$fechaHora, 1, 11);
                                $hora = substr($sensor->$fechaHora, 13, -1);
                            @endphp
                            {{$fecha}}
                            {{$hora}}
                        </div>
                </div>
                <br>
                @endforeach
                </div>
        </div>
    </div>
@endsection
@section('footer', 'texto del footer')
