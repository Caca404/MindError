@extends('layouts.main')

@section('title', "ErrorMind")

@section('content')

    <div id="destaques">
        <div class="row">
            <h1 class="text-center col-12">Destaques</h1>
        </div>
        @if (count($produtos) > 0)
            <div class="row mt-3">
                <div class="d-flex flex-row align-content-around flex-wrap h-100">
                    @foreach ($produtos as $produto)
                        <a href="/produto/{{ $produto['produto']->id }}" class="card_link">
                            <div class="card">
                                <img src="{{ count($produto['imgs']) > 0 ? 'img/produtos/'.$produto['imgs'][0]->imagem : 'img/Camisa3.jpg' }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $produto['produto']->nome }}</h5>
                                    <p class="card-text">{{ $produto['produto']->descricao }}</p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @else
            <div class="row mt-3">
                <h4>Está sem produtos em destaque. 😥</h4>
            </div>
        @endif
    </div>
    <div id="posters" class="mt-5">
        <div class="row">
            <h1 class="text-center col-12">Pôsters</h1>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <div class="row justify-content-around">
                    <div class="card col-12 col-md-5 col-lg-3">
                        <img src="/img/Poster1.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                    <div class="card col-12 col-md-5 col-lg-3 mt-4 mt-md-0">
                        <img src="/img/Poster2.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                    <div class="card col-12 col-md-5 col-lg-3 mt-4 mt-md-0">
                        <img src="/img/Poster3.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection