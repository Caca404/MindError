@extends('layouts.main')

@section('title', 'Meus produtos | ErrorMind')

@section('content')

    <div id="destaques">
        <div class="row">
            <h1 class="text-center col-12">Meus produtos</h1>
        </div>
        @if (count($produtos) > 0)
            <div class="row mt-3">
                <div class="d-flex flex-row align-content-around flex-wrap h-100">
                    @foreach ($produtos as $produto)
                            <div class="card" class="card_link" data-id="{{ $produto['produto']->id }}">
                                @if(count($produto['imgs']) == 1)
                                    @if($produto['imgs'][0]->dataBase64 != null)
                                        <img src="@php
                                            $temp_file = tempnam(sys_get_temp_dir(), 'prod');
                                            file_put_contents($temp_file, 'data:'.$produto['imgs'][0]->data_type.';base64,'.$produto['imgs'][0]->dataBase64);
                                            echo file_get_contents($temp_file); 
                                        @endphp" class="d-block w-100" alt="...">
                                    @elseif(isset($produto['imgs'][0]->imagem))
                                        <img src="{{ 'img/produtos/' . $produto['imgs'][0]->imagem; }}" class="d-block w-100" alt="...">
                                    @else
                                        <img src="img/Camisa3.jpg" class="d-block w-100" alt="...">
                                    @endif
                                @else
                                    <img src="img/Camisa3.jpg" class="card-img-top cardImgDefault" alt="...">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $produto['produto']->nome }}</h5>
                                    <p class="card-text">{{ $produto['produto']->descricao }}</p>
                                </div>
                            </div>
                    @endforeach
                </div>
            </div>
        @else
            <div class="row mt-3">
                <h4>Você não publicou nenhum produto.</h4>
            </div>
        @endif
    </div>


@endsection