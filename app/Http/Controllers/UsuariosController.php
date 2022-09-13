<?php

namespace App\Http\Controllers;

use App\Model\Telefone;
use Illuminate\Http\Request;
use App\Model\Pessoa;
use App\Model\Usuarios;
use App\Model\Enderecos;
use App\Model\Pessoa_Endereco;
use Illuminate\Support\Facades\Redirect;


class UsuariosController extends Controller {


//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    public function validaLogin(Request $request){

        $request = $request->all();
        if($request['email'] && $request['senha']){

            $usuarios = Usuarios::where([
                ['email', '=', $request['email']],
                ['senha', '=', $request['senha']],
                ['status' , '=', 'A'],
            ])->get();

            if(count($usuarios) > 0) {

                session()->put('token', $usuarios[0]->token);
                session()->put('nivel', $usuarios[0]->nivel);
                session()->put('id_pessoa', $usuarios[0]->id_pessoa);
                session()->put('imagem', $usuarios[0]->foto);

                if($usuarios[0]->nivel == 'A' || $usuarios[0]->nivel == 'S') {

                    return redirect('/admin/pessoa/grade');
                }else if($usuarios[0]->nivel == 'V') {

                    return redirect('/admin/adocao/solicitarAdocao');
                }
            }else{
                return back()->with('mensagem', 'Login ou senha incorretos ou usuário foi desativado pelo adm!');
            }
        }else{
            return back()->with('mensagem', 'Preencha os campos');
        }

    }

    public function formulario(Request $request){

        if($request->isMethod('GET')){

        } else if($request->isMethod('POST')){

            $_usuario = new Usuarios();
            $exists = $_usuario->exists($request['email']);

            if($exists) {
                return back()->with('mensagem', 'Usuário já existe');
            }

            $data = $request->all();

//            dd($data);
            try {

                if ($data['senha'] && $data['conf_senha']
                && ($data['senha'] == $data['conf_senha'])) {

                    $_usuarios       = new Usuarios();
                    $_pessoa         = new Pessoa();
                    $_endereco       = new Enderecos();
                    $_telefones      = new Telefone();

                    $_pessoa->nome    = $data['nome'];
                    $_pessoa->codigo  = $data['codigo'];
                    $_pessoa->sexo    = $data['sexo'];
                    $_pessoa->dt_nasc = $data['dt_nasc'];
                    $_pessoa->save();

                    $_endereco->id_pessoa = $_pessoa->id;
                    $_endereco->rua    = $data['rua'];
                    $_endereco->numero = $data['numero'];
                    $_endereco->bairro = $data['bairro'];
                    $_endereco->cidade = $data['cidade'];
                    $_endereco->estado = $data['estado'];
                    $_endereco->cep    = $data['cep'];
                    $_endereco->resumo = $_endereco->montarResumo();
                    $_endereco->save();

                    $_telefones->id_pessoa = $_pessoa->id;
                    $_telefones->numero = $data['numero'];
                    $_telefones->save();

                    $_usuarios->id_pessoa = $_pessoa->id;
                    $_usuarios->email  = $data['email'];
                    $_usuarios->nivel = 'V';

//                    if($data['nivel']) {
//                        $_usuarios->nivel = $data['nivel'];
//                    }else {
//                        $_usuarios->nivel = 'V';
//                    }

                    $_usuarios->senha  = $data['senha'];
                    $_usuarios->status = 'I';
                    $_usuarios->token  = bcrypt($data['email'] . $_usuarios->nivel . $data['senha']);
                    $_usuarios->save();

                    return redirect('cadastro')->with('mensagem', 'Cadastro relizado com sucesso, aguarde a liberação do acesso pelo Administrador');

                } else {
                    return redirect('cadastro')->with('mensagem', 'As senha não são iguais');
                }

            }catch(\PDOException $ex){

                return redirect('cadastro')->with('mensagem', 'Erro não foi possível inserir os dados. ' . $ex->getMessage());

            }
        }
    }
}
