<?php

namespace App\Http\Controllers;

use App\Models\ImagemProduto;
use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\ImagensProduto;

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

        $produtos = array();
        $todos = Produto::all();
        $aux = 0;
        foreach ($todos as $produto) {
            $imgs = ImagensProduto::whereRaw("id_produto = ?", [$produto->id])->get();

            $produtos[$aux]['produto'] = $produto;
            $produtos[$aux++]['imgs'] = $imgs;
        }

    	return view("welcome", [
            "produtos" => $produtos
        ]);
    }

    public function produto($id){
        $produtoWithImgs = array();
        $produto = Produto::findOrFail($id);
        $imgs = ImagensProduto::whereRaw("id_produto = ?", [$produto->id])->get();

        $produtoWithImgs['produto'] = $produto;
        $produtoWithImgs['imgs'] = $imgs;

    	return view("produto", [
            "title" => $produto->nome." | ErrorMind",
            "produto" => $produtoWithImgs
        ]);
    }

    public function addProdutoView(){

    	return view("addProduto");
    }

    public function myProdutos()
    {
        $produtos = array();
        $todosProdutos = Produto::whereRaw("id_user = ?", [auth()->user()->id])->get();

        $aux = 0;
        foreach ($todosProdutos as $produto) {
            $imgs = ImagensProduto::whereRaw("id_produto = ?", [$produto->id])->get();

            $produtos[$aux]['produto'] = $produto;
            $produtos[$aux++]['imgs'] = $imgs;
        }

        return view("meusProdutos", [
            "produtos" => $produtos
        ]);
    }

    public function removeProduto(Request $request)
    {
        
    }

    public function editProdutoView()
    {
        
    }

    public function editProduto(Request $request)
    {
        
    }

    public function addProduto(Request $request){

        $produto = new Produto();
        $produto->nome = $request->nome;
        $produto->quant_estoque = 10;
        $produto->preco = $request->preco;
        $produto->tipo = $request->tipo;
        $produto->descricao = $request->descricao;
        $produto->id_user = auth()->user()->id;

        $produto->save();
        $id_produto = $produto->id;

        if($request->hasFile('img')){

            foreach ($request->file('img') as $img) {
                if($img->isValid()) {

                    $new_img = new ImagensProduto();

                    $requestImage = $img;

                    $extension = $requestImage->extension();

                    $imageName = md5($requestImage->getClientOriginalName().strtotime('now').".".$extension);
        
                    $data = base64_encode(file_get_contents($requestImage->getPathName()));
        
                    $new_img->dataBase64 = $data;
                    $new_img->imagem = $imageName;
                    $new_img->data_type = $requestImage->getMimeType();
                    $new_img->id_produto = $id_produto;

                    $new_img->save();
                }
            }
        }

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