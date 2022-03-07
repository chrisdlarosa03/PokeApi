@extends('layout')
@section('title', 'Tabla de PoleApi')
@section('content')
            <div class="row text-center fixed-top mt-5 blue red">
                <h2>Tabla PokeApi de {{$minombre}}</h2>
            </div>
            <div class="row justify-content-md-center" style="margin-top: 8em">
                <div class="col-md-8">
                    <table class="table table-light table-striped text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Pokemon</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 1;
                            @endphp
                            @foreach ($pokemons as $pokemon)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$pokemon->name}}</td>
                                <td>
                                    <a href="/mostrarPokemon/{{$pokemon->name}}"><button type="button" class="btn btn-primary"><i class="fa-solid fa-eye"></i></button></a>

                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection

@section('footer', 'texto del footer')
