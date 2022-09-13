<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FotosController extends Controller
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
}
