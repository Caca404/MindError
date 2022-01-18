@extends('layouts.main')

@section('title', "ErrorMind")

@section('content')
    
    <div class="row">
        <h1 class="text-center col-12">Destaques</h1>
    </div>
    <div class="row mt-5">
        <div class="col-12">
            <div class="row justify-content-around">
                <div class="card col-12 col-md-5 col-lg-3">
                    <img src="/img/Camisa1.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
                <div class="card col-12 col-md-5 col-lg-3 mt-4 mt-lg-0">
                    <img src="/img/Camisa2.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
                <div class="card col-12 col-md-5 col-lg-3 mt-4 mt-lg-0">
                    <img src="/img/Camisa3.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection