<?php

namespace App\Http\Controllers;

use App\Model\Adocao;
use App\Model\Pessoa;
use App\Model\Usuarios;
use Illuminate\Http\Request;

class TesteController extends Controller
{
    //
    public function dbTeste(){
        $_pessoa  = new Pessoa();
        $_usuario = new Usuarios();
        $_adocao  = new Adocao();

//        $where = ['column' => 'nome', 'operator' => 'like', 'value' => 'Mi%'];

        dd($_pessoa->recordSet());




    }

}
