@extends('layouts.main')

@section('title',  "teste")

@section('content')

    <style>
        .tamanhos div{
            cursor: pointer;
            background-color: rgb(228, 228, 228);
            width: 10%;
            text-align: center;
            font-size: 22px;
        }

        .tamanhos div:not(:first-child){
            margin: 0 10px;
        }

        .tamanhos div:first-child{
            margin-right:10px;
        }

        .tamanhos div:hover{
            background-color: darkgray;
        }


        .tamanhos{
            -webkit-touch-callout: none; /* iOS Safari */
            -webkit-user-select: none; /* Safari */
            -khtml-user-select: none; /* Konqueror HTML */
            -moz-user-select: none; /* Old versions of Firefox */
            -ms-user-select: none; /* Internet Explorer/Edge */
            user-select: none;
            display: flex;
        }
    </style>
    <section class="container">
        <div class="row">
            <div class="image_produto col-12 col-md-6">
                <img src="/img/Poster3.png" class="card-img-top" alt="..." style="width: 24em">
            </div>
            <div class="produto col-12 col-md-6">
                <h2 class="mb-md-4">{{ $produto->nome }}</h2>
                <h4>{{ "R$".number_format($produto->preco, 2, ",", ".") }}</h4>
                <p>{{ $produto->descricao }}</p>

                <div class="tamanhos">
                    <div>PP</div>
                    <div>P</div>
                    <div>M</div>
                    <div>G</div>
                    <div>GG</div>
                </div>
                <form action="POST">
                    @csrf

                    <input type="hidden" id="tam_camisa">
                    <input type="submit" class="btn btn-success" value="Comprar">
                </form>
            </div>
        </div>
    </section>




@endsection