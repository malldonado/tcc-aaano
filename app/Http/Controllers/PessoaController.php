<?php

namespace App\Http\Controllers;

use App\Model\Telefone;
use Illuminate\Http\Request;
use Illuminate\Foundation\Console\Presets\React;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

use App\Model\Pessoa;
use App\Model\Animal;
use App\Model\Usuarios;
use App\Model\Enderecos;



    class PessoaController extends Controller
    {

        public function __construct()
        {

        }

        public function grade(Request $request)
        {
             if(!session()->has('token')){
                 return redirect(route('adm.login'))->with('mensagem', 'Você precisa esta logado para acessar essa pagina');
             }

            if($request->isMethod('GET')){

                $usuarios = array();
                $_usuario = new Usuarios();

                if(session()->get('nivel') == 'A') {
                    $_usuario->addWhere('usuarios.nivel', '=', 'V');
                    $_usuario->addWhere('usuarios.id_pessoa', '=', session()->get('id_pessoa'), 'or');
                }

                $usuarios = $_usuario->findAll();

                return view('Pessoa/grade', ['usuarios' => $usuarios]);
            }
        }

        public function formulario(Request $request)
        {

             if(!session()->has('token')){
                 return redirect('login')->with('mensagem', 'Você precisa esta logado para acessar essa pagina');
             }

            if($request->isMethod('GET'))
            {

                $estados = [
                    'AC' => 'Acre',
                    'AL' => 'Alagoas',
                    'AP' => 'Amapá',
                    'AM' => 'Amazonas',
                    'BA' => 'Bahia',
                    'CE' => 'Ceará',
                    'DF' => 'Distrito Federal',
                    'ES' => 'Espírito Santo',
                    'GO' => 'Goiás',
                    'MA' => 'Maranhão',
                    'MT' => 'Mato Grosso',
                    'MS' => 'Mato Grosso do Sul',
                    'MG' => 'Minas Gerais',
                    'PA' => 'Pará',
                    'PB' => 'Paraíba',
                    'PR' =>  'Paraná',
                    'PE' => 'Pernambuco',
                    'PI' => 'Piauí',
                    'RJ' => 'Rio de Janeiro',
                    'RN' => 'Rio Grande do Norte',
                    'RS' => 'Rio Grande do Sul',
                    'RO' => 'Rondônia',
                    'RR' => 'Roraima',
                    'SC' => 'Santa Catarina',
                    'SP' => 'São Paulo',
                    'SE' => 'Sergipe',
                    'TO' => 'Tocantins'
                ];

                 return view('Pessoa/formulario', ['estados' => $estados]);

            }else if($request->isMethod('POST')){

                $data = $request->all();
                try {

                    if ($data['senha'] && $data['conf_senha']
                        && ($data['senha'] == $data['conf_senha'])) {

                        if($request->hasFile('imagem') && $request->file('imagem')->isValid()) {

                            $imagemNome = kebab_case($data['nome']); //kebab_case ex: Carlos Ferreira => calos-ferreira
                            $extensao = $request->imagem->extension();
                            $nomeImagem = "{$imagemNome}.{$extensao}";

                            $upload = $request->imagem->storeAs('imagens', $nomeImagem);

                            if(!$upload){
                                return redirect()->back()->with('mensagem', 'Erro ao inserir imagem');
                            }else{
                                $data['foto'] = $nomeImagem;
                            }
                        }

                        $_usuario  = new Usuarios();
                        $_pessoa   = new Pessoa();
                        $_endereco = new Enderecos();
                        $_telefone = new Telefone();

                        $result = $_pessoa->formErrors($data);

                        if($result){
                            return redirect()->back()->with('mensagem', $result);
                        }

                        $exists = $_usuario->exists($data['email']);

                        if($exists){
                            return redirect()->back()->with('mensagem',  'Usuário com este email já esta cadastrado');
                        }

                        $_pessoa->nome     = $data['nome'];
                        $_pessoa->codigo   = $data['codigo'];
                        $_pessoa->sexo     = $data['sexo'];
                        $_pessoa->dt_nasc  = $data['dt_nasc'];
                        $_pessoa->save();

//                        $_pessoa = Pessoa::find($_pessoa->id);
//                        $_pessoa->id_pai = $_pessoa->id;
//                        $_pessoa->save();

                        $_endereco->id_pessoa = $_pessoa->id;
                        $_endereco->rua = $data['rua'];
                        $_endereco->numero = $data['numero'];
                        $_endereco->bairro = $data['bairro'];
                        $_endereco->cidade = $data['cidade'];
                        $_endereco->estado = $data['estado'];
                        $_endereco->cep = $data['cep'];
                        $_endereco->resumo = $_endereco->montarResumo();
                        $_endereco->save();

                        $_telefone->id_pessoa = $_pessoa->id;
                        $_telefone->numero = $data['numero'];
                        $_telefone->save();

                        $_usuario->id_pessoa = $_pessoa->id;
                        $_usuario->email = $data['email'];
                        $_usuario->senha = $data['senha'];
                        $_usuario->nivel = $data['nivel'];
                        $_usuario->status = 'I';
                        $_usuario->token = bcrypt($data['email'] . $data['nivel'] . $data['senha']);
                        $_usuario->foto = $data['foto'] ? $data['foto'] : '';
                        $_usuario->save();

                        return redirect(route('adm.grade'))->with('mensagem', 'Cadastro realizado com sucesso');

                    } else {

                        return redirect()->back()->with('mensagem', 'As senha não são iguais');
                    }

                }catch (\Exception $ex){

                    return redirect()->back()->with('mensagem', 'Erro ao inserir os dados ' . $ex->getMessage());
                }
            }

        }


        public function atualizar(Request $request, $id = null)
        {
             if(!$request){
                 return back()->with('mensagem', 'Erro ao atualizar dados');
             }

            if($request->isMethod('GET')){

                $estados = [
                    'AC' => 'Acre',
                    'AL' => 'Alagoas',
                    'AP' => 'Amapá',
                    'AM' => 'Amazonas',
                    'BA' => 'Bahia',
                    'CE' => 'Ceará',
                    'DF' => 'Distrito Federal',
                    'ES' => 'Espírito Santo',
                    'GO' => 'Goiás',
                    'MA' => 'Maranhão',
                    'MT' => 'Mato Grosso',
                    'MS' => 'Mato Grosso do Sul',
                    'MG' => 'Minas Gerais',
                    'PA' => 'Pará',
                    'PB' => 'Paraíba',
                    'PR' =>  'Paraná',
                    'PE' => 'Pernambuco',
                    'PI' => 'Piauí',
                    'RJ' => 'Rio de Janeiro',
                    'RN' => 'Rio Grande do Norte',
                    'RS' => 'Rio Grande do Sul',
                    'RO' => 'Rondônia',
                    'RR' => 'Roraima',
                    'SC' => 'Santa Catarina',
                    'SP' => 'São Paulo',
                    'SE' => 'Sergipe',
                    'TO' => 'Tocantins'
                ];

                $_usuario = new Usuarios();
                $_usuario->addWhere('usuarios.id_pessoa', '=', $id);
                $usuario = $_usuario->findAll();

                return view('Pessoa/atualizar', ['usuarios' => $usuario, 'estados' => $estados]);

            }else if($request->isMethod('POST')) {

                $data = $request->all();



                try{

                    if ($data['senha'] && $data['conf_senha']
                        && ($data['senha'] == $data['conf_senha'])) {

                        $usuario  = Usuarios::where('id_pessoa', '=', $data['id'])->get()->toArray();
                        $telefone = Telefone::where('id_pessoa', '=', $data['id'])->get()->toArray();
                        $endereco = Enderecos::where('id_pessoa', '=', $data['id'])->get()->toArray();

                        $_pessoa   = Pessoa::find($data['id']);
                        $_usuario  = Usuarios::find($usuario[0]['id']);
                        $_telefone = Telefone::find($telefone[0]['id']);
                        $_endereco = Enderecos::find($endereco[0]['id']);

                        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {

                            $imagemNome = kebab_case($data['nome']); //kebab_case ex: Carlos Ferreira => calos-ferreira
                            $extensao = $request->imagem->extension();
                            $nomeImagem = "{$imagemNome}.{$extensao}";

                            $upload = $request->imagem->storeAs('imagens', $nomeImagem);

                            if (!$upload) {
                                return redirect()->back()->with('mensagem', 'Erro ao inserir imagem');
                            } else {
                                $data['foto'] = $nomeImagem;
                            }
                        }

                        $result = $_pessoa->formErrors($data);

                        if($result){
                            return redirect()->back()->with('mensagem', $result);
                        }

                        $_pessoa->nome = $data['nome'];
                        $_pessoa->codigo = $data['codigo'];
                        $_pessoa->save();

                        $_endereco->id_pessoa = $_pessoa->id;
                        $_endereco->rua = $data['rua'];
                        $_endereco->numero = $data['numero'];
                        $_endereco->bairro = $data['bairro'];
                        $_endereco->cidade = $data['cidade'];
                        $_endereco->estado = $data['estado'];
                        $_endereco->cep = $data['cep'];
                        $_endereco->save();

                        $_telefone->id_pessoa = $_pessoa->id;
                        $_telefone->numero = $data['numero'];
                        $_telefone->save();

                        $_usuario->id_pessoa = $_pessoa->id;
                        $_usuario->email = $data['email'];
                        $_usuario->senha = $data['senha'];
                        $_usuario->nivel = $data['nivel'];
                        $_usuario->status = $data['status'];
                        $_usuario->token = bcrypt($data['email'] . $data['nivel'] . $data['senha']);
                        $_usuario->foto = isset($data['foto']) ? $data['foto'] : $_usuario->foto;
                        $_usuario->save();

                        return redirect(route('adm.grade'));

                    }

                }catch(\Exception $ex){

                    return redirect()->back()->with('mensagem', 'Erro ao atualiza dados ' . $ex->getMessage());
                }
            }
        }

        public function deletar($id){

            $_pessoa = new Pessoa();
            $result = $_pessoa->deletar($id);

            if($result){
                return redirect()->back();
            }else{
                throw new \Exception('Erro ao excluir');
            }

        }


    }
