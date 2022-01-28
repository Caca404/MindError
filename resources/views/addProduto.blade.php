@extends('layouts.main')

@section('title',  "Adicionar Produto")

@section('content')

<div class="container">
    <form class="container" action="/addProduto" method="post" enctype="multipart/form-data">
        @csrf
        <h1>Adicionar Produto</h1>
        <hr  class="my-4">
        <div class="row g-3">
            <div class="col-12 col-md-6">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control" required>
            </div>
            <div class="col-12 col-md-6">
                <label for="preco" class="form-label">Preço</label>
                <input type="number" min="0" step="0.05" name="preco" id="preco" class="form-control" required>
            </div>
            <div class="col-12 col-md-6">
                <label for="img" class="form-label">Imagem</label>
                <input type="file" name="img" id="img" class="form-control">
            </div>
            <div class="col-12 col-md-6">
                <label for="tipo" class="form-label">Tipo</label>
                <select name="tipo" id="tipo" class="form-select" required>
                    <option value="" disabled selected>Escolha um tipo</option>
                    <option value="camisa">Camisa</option>
                    <option value="oculos">Óculos</option>
                    <option value="moletom">Moletom</option>
                    <option value="chapeu">Chapéu</option>
                    <option value="tabuleiro">Tabuleiro</option>
                    <option value="rpg">RPG</option>
                    <option value="actionFigure">Action Figure</option>
                    <option value="pop">Pop</option>
                    <option value="lego">Lego</option>
                    <option value="mochila">Mochila</option>
                    <option value="chaveiro">Chaveiro</option>
                    <option value="maquiagem">Maquiagem</option>
                    <option value="bijuteria">Bijuteria</option>
                    <option value="fones">Fones Personalizados</option>
                </select>
            </div>
            <div class="col-12">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea name="descricao" id="descricao" cols="30" rows="5" class="form-control" required></textarea>
            </div>
            <div class="col-12 text-center">
                <button class="btn btn-success px-5 py-2">Criar</button>
            </div>
        </div>
        


    </form>
</div>



@endsection