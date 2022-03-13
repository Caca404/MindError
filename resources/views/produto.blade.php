@extends('layouts.main')

@section('title',  "teste")

@section('content')

    <style>
        .tamanhos div{
            cursor: pointer;
            background-color: rgb(228, 228, 228);
            width: 17%;
            text-align: center;
            font-size: 22px;
            padding: 14px;
            border-radius: 10px;
        }
        /* .tamanhos div:not(:first-child){
            margin: 0 10px;
        }
        .tamanhos div:first-child{
            margin-right:10px;
        } */
        .tamanhos div:hover{
            background-color: darkgray;
        }
        .clicked{
            background-color: rgb(122,0,146) !important;
            color: white!important;
        }
        .clicked:hover{
            background-color: rgb(150, 25, 175) !important;
        }


        .tamanhos{
            -webkit-touch-callout: none; /* iOS Safari */
            -webkit-user-select: none; /* Safari */
            -khtml-user-select: none; /* Konqueror HTML */
            -moz-user-select: none; /* Old versions of Firefox */
            -ms-user-select: none; /* Internet Explorer/Edge */
            user-select: none;
            margin-bottom: 25px;
        }

        .produto{
            border: 2px solid rgb(93, 76, 122);
            padding: 35px;
            border-radius: 20px;
            height: 100%;
        }
        
    </style>
    <section class="container">
        <div class="row">
            <div class="image_produto col-12 col-md-6 me-5">
                <img src="/img/Poster3.png" class="card-img-top" alt="..." style="width: 24em">
            </div>
            <div class="produto col-12 col-md-5 ms-4">
                <h2 class="mb-md-4">{{ $produto->nome }}</h2>
                <h4>{{ "R$".number_format($produto->preco, 2, ",", ".") }}</h4>
                <p>{{ $produto->descricao }}</p>

                <div class="tamanhos d-flex flex-row justify-content-between">
                    <div>PP</div>
                    <div>P</div>
                    <div>M</div>
                    <div>G</div>
                    <div>GG</div>
                </div>
                <form action="POST">
                    @csrf

                    <input type="hidden" id="tam_camisa">
                    <input type="submit" class="btn btn-success col-12" value="Comprar">
                </form>
            </div>
        </div>
    </section>




@endsection