<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index(){

//        session()->forget('token');
//        session()->forget('nivel');
//        session()->forget('id_pessoa');
//        session()->flush();

        $animais = DB::select(DB::raw('SELECT * FROM animals an WHERE an.id NOT IN (select id_animal FROM adocaos) AND an.status = "A";'));

        return view('index', ['animais' => $animais]);
    }

    public function contato(){
        return view('contato');
    }

    public function cadastro(){
        return view('cadastro');
    }

    public function conhecaAnimais() {

        $animais = DB::table('animals')->where('status', '=',  'A')->get();
        return view('conheca_animais', ['animais' => $animais]);
    }

    public function login(){

        session()->forget('token');
        session()->forget('nivel');
        session()->forget('id_pessoa');
        session()->flush();


        return view('login');
    }
}
