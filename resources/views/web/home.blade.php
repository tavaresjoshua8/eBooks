@extends('layouts.app') 

@section('content')
<center>
    {{-- Images-Carousel (Slider) --}}
    <div class="container-carrousel mb-3">
        <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselIndicators" data-slide-to="1"></li>
                <li data-target="#carouselIndicators" data-slide-to="2"></li>
                <li data-target="#carouselIndicators" data-slide-to="3"></li>
            </ol>
            {{-- /.carousel-indicator --}}
            {{-- Images, items for the slider --}}
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{ asset('imgs/B1.jpeg') }}" alt="Primer slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('imgs/B2.jpeg') }}" alt="Segundo slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('imgs/B3.jpeg') }}" alt="Tercer slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('imgs/B4.jpeg') }}" alt="Cuarto slide">
                </div>
            </div>
            {{-- /.carousel-inner --}}
            <a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        {{-- /.carousel --}}
    </div>
    {{-- /container-carrousel --}}
    {{-- Script for the carrousel timing --}}
    <script>$('.carousel').carousel({interval: 4000});</script>
</center>
@endsection
