<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ShopController extends Controller
{
    private $titles = array(
        "chapeus" => "👒 Chapéu",
        "oculos" => "🕶️ Óculos",
        "moletons" => "Moletons",
        "camisas" => "Camisas",
        "tabuleiros" => "Tabuleiros",
        "rpg" => "RPG",
        "posters" => "Pôsters",
        "actionFigures" => "Action Figures",
        "pop" => "Pop",
        "pelucias" => "Pelúcias",
        "lego" => "Lego",
        "mochilas" => "Mochilas",
        "chaveiros" => "Chaveiros",
        "maquiagem" => "Maquiagem",
        "bijuterias" => "Bijuterias",
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

    public function vestuario($type){

    	return view("vestuario", [
            "title" => $this->titles[str_replace("/vestuario/", "", $type)],
            "tipo" => $type,
            "produtos" => null
        ]);
    }

    public function jogos($type){

    	return view("jogos", [
            "title" => $this->titles[str_replace("/jogos/", "", $type)],
            "tipo" => $type,
            "produtos" => null
        ]);
    }

    public function colecionaveis($type){

    	return view("colecionaveis", [
            "title" => $this->titles[str_replace("/colecionaveis/", "", $type)],
            "tipo" => $type,
            "produtos" => null
        ]);
    }
    
    public function acessorios($type){

    	return view("acessorios", [
            "title" => $this->titles[str_replace("/acessorios/", "", $type)],
            "tipo" => $type,
            "produtos" => null
        ]);
    }
}