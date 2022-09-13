<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Telefone;

class TelefoneController extends Controller
{

//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    public function grade(){
        return view('Fotos/grid');
    }

    public function formulario(){
        return view('Fotos/form');
    }

    public function cadastrar(Request $resquest){
        $_telefone = new Telefone();
        $_telefone->save($resquest);
    }

}
