<?php

namespace App\Http\Controllers;

use DemeterChain\A;
use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Model\Animal;
use App\Model\Telefone;
use App\Model\Pessoa;
use App\Model\Usuarios;
use App\Model\Enderecos;
use App\Model\Adocao;
use Mpdf\Mpdf;

class AdocaoController extends Controller
{


    //Listagem de adoções
    public function grade()
    {
        if (!session()->has('token')) {
            return redirect('login')->with('mensagem', 'Você precisa esta logado para acessar essa pagina');
        }

        $_adocao = new Adocao();
        $_adocao->addWhere('adocaos.adotado', '=', 'S');
        $adocoes = $_adocao->findAll();

        return view('Adocao/grade', ['adocoes' => $adocoes]);

    }

    public function formulario(Request $request)
    {
        //Verifica se pessoa esta logada
        if (!session()->has('token')) {
            return redirect('login')->with('mensagem', 'Você precisa esta logado para acessar essa pagina');
        }

        if ($request->isMethod('GET')) {
            if ($request->id) {
                $animal = Animal::where('id', '=', $request->id)->get();
                return view('Adocao/formulario', ['animal' => $animal]);
            }
        } else if ($request->isMethod('POST')) {

            $senha = $request->senha;
            $confSenha = $request->conf_senha;

            try {
                if ($senha == $confSenha) {

                    $_usuarios = new Usuarios();
                    $_pessoa = new Pessoa();
                    $_endereco = new Enderecos();
                    $_telefones = new Telefone();
                    $_adocao = new Adocao();

                    $_endereco->rua = $request->rua;
                    $_endereco->numero = $request->numero;
                    $_endereco->bairro = $request->bairro;
                    $_endereco->cidade = $request->cidade;
                    $_endereco->estado = $request->estado;
                    $_endereco->cep = $request->cep;
                    $_endereco->resumo = '';
                    $_endereco->save();

                    $_pessoa->id_endereco = $_endereco->id;
                    $_pessoa->nome = $request->nome;
                    $_pessoa->codigo = $request->codigo;
                    $_pessoa->sexo = $request->sexo;
                    $_pessoa->dt_nasc = $request->dt_nasc;
                    $_pessoa->save();

                    $_telefones->id_pessoa = $_pessoa->id;
                    $_telefones->numero = $request->celular;
                    $_telefones->save();

                    $_usuarios->id_pessoa = $_pessoa->id;
                    $_usuarios->nivel = 'AD';
                    $_usuarios->email = $request->email;
                    $_usuarios->senha = $request->senha;
                    $_usuarios->status = 'I';
                    $_usuarios->token = '';
                    $_usuarios->save();

                    $_adocao->id_pessoa = $_pessoa->id;
                    $_adocao->id_animal = $request->animal_id;
                    $_adocao->save();

                    return back()->with('mensagem', 'registre de adoção relizado com sucesso , aguarde a libração do acesso pelo ADM');
                } else {
                    return back()->with('mensagem', 'As senha não não são iguais');
                }
            } catch (\PDOException $ex) {
                return back()->with('mensagem', 'Erro não foi possível inserir os dados. ' . $ex->getMessage());
            }

        }
    }



    //Lista as adoções para o adm e permite a ele aceitar a adoção
    public function solicitacoes(Request $request){

        if(!session()->has('token')){
            return redirect()->back()->with('mensagem', 'Você precisa esta logado para acessar essa pagina');
        }

        if($request->isMethod('GET')) {

            $_adocao = new Adocao();
            $_adocao->addWhere('adocaos.adotado', '=', 'N');
            $adocaos = $_adocao->findAll();

            $rows = array();
            foreach($adocaos as $key => $value){
                $enderecos = Enderecos::where('id_pessoa', '=', $value->pessoa_id)->get()->toArray()[0];
                $rows[$key]['pessoa'] = $value;
                $rows[$key]['endereco'] = $enderecos;//                $rows[$key]
            }

//            dd($rows);

            return view('Adocao/solicitacoes', ['adocaos' => $rows]);

        }else if($request->isMethod('POST')){
            $request = $request->all();

            $_adocao = Adocao::find($request['id_adocao']);
            $_adocao->adotado = 'S';
            $_adocao->save();
        }
    }

    // chama a view de acoções
    public function solicitarAdocao() {

        if(!session()->has('token')){
            return redirect('login')->with('mensagem', 'Você precisa esta logado para acessar essa pagina');
        }

        $animais = DB::select(DB::raw('SELECT * FROM animals an WHERE an.id NOT IN (select id_animal FROM adocaos ad WHERE ad.adotado != "R") AND an.status = "A";'));

        return view('Adocao/adotar', ['animais' => $animais]);
    }

    public function aceitarSolicitacao($id = null){

        if(!session()->has('token')){
            return redirect(route('adm.login'))->with('mensagem', 'Você precisa esta logado para acessar essa pagina');
        }

        $date = date('Y-m.d');
        if($id){
            $_adocao = Adocao::find($id);
            $_adocao->adotado = 'S';
            $_adocao->data_adocao = $date;
            $_adocao->save();

            $_animais = Animal::find($_adocao->id_animal);
            $_animais->status = 'I';
            $_animais->save();

            return redirect(route('adocoes.solicitacoes'));

        }else{
            throw new \Exception('Erro');
        }
    }


    public function recusarSolicitacao($id){

        if(!session()->has('token')){
            return redirect('login')->with('mensagem', 'Você precisa esta logado para acessar essa pagina');
        }

        if(!session()->has('token')){
            return redirect('login')->with('mensagem', 'Você precisa esta logado para acessar essa pagina');
        }

        $date = date('Ymd');

        if($id){
            $_adocao = Adocao::find($id);
            $_adocao->data_recusa = $date;
            $_adocao->adotado = 'R';
            $_adocao->save();

            return redirect(route('adocoes.solicitacoes'));
        }else {
            throw new \Exception('Erro');
        }

    }

    //Realiza a adoção via ajax e lista os animais para adoção
    public function adocaoAnimais($id = null){

        if(!session()->has('token')){
            return redirect('login')->with('mensagem', 'Você precisa esta logado para acessar essa pagina');
        }

        if(!$id){
            throw new \Exception('Erro ao solicitar adoção, animal desconhecido!');
        }
        $date = date('Ymd');

        $_adocoes = new Adocao();
        $_adocoes->id_pessoa = session()->get('id_pessoa');
        $_adocoes->id_animal = $id;
        $_adocoes->adotado = 'N';
        $_adocoes->data_pedido_ad = $date;
        $_adocoes->save();

        return redirect(route('adocoes.pedidos-adocoes'));
    }


    public function listarPedidos() {

        if(!session()->has('token')){
            return redirect('login')->with('mensagem', 'Você precisa esta logado para acessar essa pagina');
        }

        $idUsuario = session()->get('id_pessoa');

        if($idUsuario){

            $_adocao = new Adocao();
            $_adocao->addWhere('adocaos.id_pessoa', '=', $idUsuario);
            $animais = $_adocao->findAll();

//            dd($adocoes);

//            $adocoes = Adocao::where('id_pessoa', '=',  $idUsuario)->get()->toArray();
//
//            $animais = array();
//            foreach($adocoes as $adocao){
//                $animal = Animal::where('id', '=', $adocao['id_animal'])->get()->toArray()[0];
//                $animal['status_adocao'] = $adocao['adotado'];
//                $animal['id_pessoa'] = $adocao['id_pessoa'];
//                $animais[] = $animal;
//            }



            return view('Adocao/verificarPedidos', ['animais' => $animais]);
        }else{
            throw new \Exception('Erro ao buscar os dados');
        }
    }


    public function relatorio(Request $request){

        if(!session()->has('token')){
            return redirect('login')->with('mensagem', 'Você precisa esta logado para acessar essa pagina');
        }

        if($request->isMethod('GET')) {

            return view('Adocao/relatorio');
        }else if($request->isMethod('POST')){

            $data = $request->all();
            $_adocoes = new Adocao();

            $_adocoes->addWhere('adocaos.created_at', '>=', $data['data_inicio']);
            $_adocoes->addWhere('adocaos.created_at', '<=', $data['data_fim']);
            $adocoes = $_adocoes->findAll();

            if(!$adocoes){
                return redirect()->back()->with('mensagem', 'Não foram encontrados relatóro de adoções para as data de inicio ' . formatDate($data['data_inicio']) . ' e fim ' . formatDate($data['data_fim']) . '.');
            }else{
//                return view('Adocao/PDF', ['adocoes' => $adocoes, 'mpdf' => $mpdf]);
                return view('Adocao/PDF', ['adocoes' => $adocoes,'datas' => $data]);
            }
        }
    }



}

