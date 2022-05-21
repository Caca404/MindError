<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    public function imagens(){
        return $this->hasMany('App\Models\ImagensProduto');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
