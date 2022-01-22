<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
            "produtos" => null
        ]);
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