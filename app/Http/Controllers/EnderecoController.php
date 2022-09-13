<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EnderecoController extends Controller
{

//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    public function grade(){
        return view('Endereco/grid');
    }

    public function formulario(){
        return view('Endereco/form');
    }

}
