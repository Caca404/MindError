@extends('layouts.main')

@section('title',  $title)

@section('content')

@php
    $multiple = false;
    if(count($produtos) > 0) $multiple = true;
@endphp

<div class="row mt-3">
    <div class="d-flex flex-row align-content-around flex-wrap h-100">
        @if($multiple)
            @foreach ($produtos as $produto)
                <a href="/produto/{{ $produto->id }}" class="card_link">
                    <div class="card">
                        <img src="{{ $produto->image == "" ? '/img/Camisa3.jpg' : '/img/produtos/'.$produto->image }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $produto->nome }}</h5>
                            <p class="card-text">{{ $produto->descricao }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        @else
            <h3>Sem resultados.</h3>
        @endif
    </div>
</div>



@endsection