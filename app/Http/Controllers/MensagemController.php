<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MensagemController extends Controller
{

//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    public function grade(){
        return view('Mensagem/grid');
    }

    public function formulario(){
        return view('Mensagem/form');
    }//
}
