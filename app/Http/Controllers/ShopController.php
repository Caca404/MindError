<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ShopController extends Controller
{
    private $titles = array(
        "chapeu" => "👒 Chapéu",
        "oculos" => "🕶️ Óculos",
        "moletom" => "Moletons",
        "camisa" => "Camisas",
        "tabuleiro" => "Tabuleiros",
        "rpg" => "RPG",
        "poster" => "Pôsters",
        "actionFigure" => "Action Figures",
        "pop" => "Pop",
        "pelucia" => "Pelúcias",
        "lego" => "Lego",
        "mochila" => "Mochilas",
        "chaveiro" => "Chaveiros",
        "maquiagem" => "Maquiagem",
        "bijuteria" => "Bijuterias",
        "fones" => "Fones Personalizados"
    );

    public function index(){
    	return view("welcome", [
            "produtos" => Produto::all()
        ]);
    }

    public function produto($id){

        $produto = Produto::findOrFail($id);

    	return view("produto", [
            "produto" => $produto
        ]);
    }

    public function addProduto(){

    	return view("addProduto");
    }

    public function adicionarProduto(Request $request){

        $produto = new Produto();
        $produto->nome = $request->nome;
        $produto->quant_estoque = 10;
        $produto->preco = $request->preco;
        $produto->tipo = $request->tipo;
        $produto->descricao = $request->descricao;
        
        if($request->hasFile('img') && $request->file('img')->isValid()){
            
            $requestImage = $request->img;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName().strtotime('now').".".$extension);

            $requestImage->move(public_path('img/produtos'), $imageName);

            $produto->image = $imageName;

        }


        $produto->save();

    	return redirect("/");
    }
    
    public function pesquisa(){

        $pesquisa = request('search');

        $resultados = Produto::where('nome', 'like', "%".$pesquisa."%")->get();

    	return view("pesquisa", [
            "search" => $pesquisa,
            "produtos" => $resultados
        ]);
    }

    public function vestuario($type){

        $resultados = Produto::where('tipo', '=', $type)->get();

    	return view("vestuario", [
            "title" => $this->titles[str_replace("/vestuario/", "", $type)],
            "tipo" => $type,
            "produtos" => $resultados
        ]);
    }

    public function jogos($type){

        $resultados = Produto::where('tipo', '=', $type)->get();

    	return view("jogos", [
            "title" => $this->titles[str_replace("/jogos/", "", $type)],
            "tipo" => $type,
            "produtos" => $resultados
        ]);
    }

    public function colecionaveis($type){

        $resultados = Produto::where('tipo', '=', $type)->get();

    	return view("colecionaveis", [
            "title" => $this->titles[str_replace("/colecionaveis/", "", $type)],
            "tipo" => $type,
            "produtos" => $resultados
        ]);
    }
    
    public function acessorios($type){

        $resultados = Produto::where('tipo', '=', $type)->get();

    	return view("acessorios", [
            "title" => $this->titles[str_replace("/acessorios/", "", $type)],
            "tipo" => $type,
            "produtos" => $resultados
        ]);
    }
}