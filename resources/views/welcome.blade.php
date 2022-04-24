@extends('layouts.main')

@section('title', 'ErrorMind')

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
                                @if(count($produto['imgs']) > 0)
                                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            @foreach($produto['imgs'] as $img)
                                                <div class="carousel-item active">
                                                    @if($img->dataBase64 != null)
                                                        <img src="@php 
                                                            $temp_file = tempnam(sys_get_temp_dir(), 'prod');
                                                            file_put_contents($temp_file, 'data:'.$img->data_type.';base64,'.$img->dataBase64);
                                                            echo file_get_contents($temp_file); 
                                                        @endphp" class="d-block w-100" alt="...">
                                                    @elseif(isset($img->imagem))
                                                        <img src="{{ 'img/produtos/' . $img->imagem; }}" class="d-block w-100" alt="...">
                                                    @else
                                                        <img src="img/Camisa3.jpg" class="d-block w-100" alt="...">
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                        <button class="carousel-control-prev" type="button"
                                            data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button"
                                            data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                @else
                                    <img src="img/Camisa3.jpg" class="card-img-top" alt="...">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $produto['produto']->nome }}</h5>
                                    <p class="card-text">{{ $produto['produto']->descricao }}</p>
                                </div>
                            </div>
                        </a>
                        {{-- <img src="@php
                            
                            if(isset($produto['imgs'][0]->dataBase64)){
                                $temp_file = tempnam(sys_get_temp_dir(), 'prod');;
                                file_put_contents($temp_file, 'data:'.$produto['imgs'][0]->data_type.';base64,'.$produto['imgs'][0]->dataBase64);
                                echo file_get_contents($temp_file);
                            }
                        @endphp"/> --}}
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
                            <p class="card-text">Some quick example text to build on the card title and make up the
                                bulk of the card's content.</p>
                        </div>
                    </div>
                    <div class="card col-12 col-md-5 col-lg-3 mt-4 mt-md-0">
                        <img src="/img/Poster2.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the
                                bulk of the card's content.</p>
                        </div>
                    </div>
                    <div class="card col-12 col-md-5 col-lg-3 mt-4 mt-md-0">
                        <img src="/img/Poster3.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the
                                bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
