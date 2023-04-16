@extends('layouts.main')

@section('title', 'ErrorMind')

@section('style', 'main')

@section('content')


    <div id="destaques">
        <div class="row">
            <h2 class="text-center col-12">Destaques</h2>
        </div>
        <div class="row mt-3">
            <div class="grid-container h-100">
                @for($i = 0; $i < 7; $i++)
                    <div class="card" class="card_link" data-id="{{ $i }}">
                        <img src="img/Camisa3.jpg" class="card-img-top cardImgDefault" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">estranho{{ $i }}</h5>
                            <p class="card-text">Estranho{{ $i }}</p>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>
    <div id="posters" class="mt-5">
        <h2 class="text-center">Pôsters</h2>
        <div class="owl-carousel owl-theme mt-4">
            @for($i = 0; $i < 10; $i++)
                <div class="card">
                    <img src="" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the
                            bulk of the card's content.</p>
                    </div>
                </div>
            @endfor
        </div>
    </div>
@endsection

@section('script', 'main')