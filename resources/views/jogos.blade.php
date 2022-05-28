@extends('layouts.main')

@section('title',  $title)

@section('content')
<div class="row mt-3">
    @if (count($produtos) > 0)
        <div class="d-flex flex-row align-content-around flex-wrap h-100">
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
        </div>
       
    @else
        <div class="d-flex flex-row align-content-around flex-wrap h-100">
            <h4>Está sem {{ $tipo }}. 😥</h4>
        </div>
    @endif
</div>

@endsection

@section('script', 'main')