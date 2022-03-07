@extends('layout')
@section('MOSTRAR POKEMON')
@section('content')
@section('title', $pokeName)
<div class="row text-center fixed-top mt-5 blue red">
    <h2>>{{$pokeName}}<</h2>
</div>
<div class="row justify-content-md-center" style="margin-top: 8em">
    <div class="col-md-8">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner text-center bg-dark">
                @php
                    $i=1;
                @endphp
                @foreach ($spritesArray as $sprite)
                <div class="carousel-item @if($i==1){{'active'}}@endif">
                    <img src="{{$sprite}}" class="w-25 h-25" alt="...">
                  </div>
                  @php
                    $i=2;
                @endphp
                @endforeach
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
    </div>

    <div class="col-md-12">
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Caracteristicas
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <ul>
                    <li>HIEGHT {{$pokemon->height}}</li>
                    <li>WEIGHT {{$pokemon->weight}}</li>
                    <li>EXPERIENCE {{$pokemon->base_experience}}</li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Habilidades
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <ul>
                    @foreach ($pokemon->abilities as $habilidad )
                        <li>{{$habilidad->ability->name}}</li>
                    @endforeach
                  </ul>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Movimientos
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <ul>
                    @foreach ($pokemon->moves as $movimiento )
                        <li>{{$movimiento->move->name}}</li>
                    @endforeach
                  </ul>
                </div>
              </div>
            </div>
          </div>
    </div>
</div>
@endsection
