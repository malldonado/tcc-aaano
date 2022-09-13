<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Console\Presets\React;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

use App\Model\Animal;


class AnimaisController extends Controller
{

//    public function __construct() {
//        $this->middleware('auth');
//    }

    public function grade()
    {

        if (!session()->has('token')) {
            return redirect('login')->with('mensagem', 'Você precisa esta logado para acessar essa pagina');
        }

        $_animais = new Animal();
        $_animais->addWhere('animals.status', '=', 'A');

        $animais = $_animais->findAll();

        return view('Animais/grade', ['animais' => $animais]);
    }


    public function formulario(Request $request)
    {

        if (!session()->has('token')) {
            return redirect('login')->with('mensagem', 'Você precisa esta logado para acessar essa pagina');
        }

        if ($request->isMethod('GET')) {

            return view('Animais/formulario');

        } else if ($request->isMethod('POST')) {

            $data = $request->all();

            $_animal = new Animal();
            try {

                if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {

                    $imagemNome = $data['idade'] . kebab_case($data['nome']); //kebab_case ex: Carlos Ferreira => calos-ferreira
                    $extensao = $request->imagem->extension();
                    $nomeImagem = "{$imagemNome}.{$extensao}";

                    $upload = $request->imagem->storeAs('imagens', $nomeImagem);

                    if (!$upload) {
                        return redirect()->back();
                    } else {
                        $data['imagem'] = $nomeImagem;
                    }
                }

                $erros = array();
                foreach ($data as $key => $value) {
                    if (empty($value)) {
                        $erros[] = $key;
                    }
                }


                if (count($erros) > 0) {
                    $mensagem = '';

                    foreach ($erros as $erro) {
                        $mensagem .= $erro . ', ';
                    }

                    $mensagm = "Os campos " . $mensagem . 'ficaram vazios';

                    return redirect()->back()->with('mensagem', $mensagem);
                }

                $_animal->idade = $data['idade'];
                $_animal->raca = $data['raca'];
                $_animal->nome = $data['nome'];
                $_animal->cor = $data['cor'];
                $_animal->porte = strtolower($data['porte']);
                $_animal->deficiencia = $data['deficiencia'];
                $_animal->sexo = $data['sexo'];
                $_animal->vacinado = $data['vacinado'];
                $_animal->dt_registro = $data['dt_registro'];
                $_animal->castrado = $data['castrado'];
                $_animal->patologia = $data['patologia'];
                $_animal->situacao = $data['situacao'];
                $_animal->status = 'A';
                $_animal->descricao = $data['descricao'];
                $_animal->imagem = $data['imagem'];

//                dd($_animal);

                $_animal->save();

                return redirect()->back()->with('mensagem', 'Dados salvos com sucesso');

            } catch (\Exception $exception) {
                dd($exception->getMessage());
            }
        }
    }

    public function atualizar(Request $request, $id = null)
    {

        if ($request->isMethod('GET')) {
            $animal = Animal::find($id);
            $animal = $animal->toArray();

            return view('Animais/atualizar', ['animal' => $animal]);

        } else if ($request->isMethod('POST')) {

            try {

                $data = $request->all();

                if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {

                    $imagemNome = $data['idade'] . kebab_case($data['nome']); //kebab_case ex: Carlos Ferreira => calos-ferreira
                    $extensao = $request->imagem->extension();
                    $nomeImagem = "{$imagemNome}.{$extensao}";

                    $upload = $request->imagem->storeAs('imagens', $nomeImagem);

                    if (!$upload) {
                        return redirect()->back();
                    } else {
                        $data['imagem'] = $nomeImagem;
                    }
                }

                $date = new \DateTime($data['dt_registro']);  //Por algum motivo esta adicionando mais um dia ao salvar no banco de dados
                $_animal = Animal::find($data['id']);
                $_animal->imagem      = isset($data['imagem']) ? $data['imagem'] : $_animal->imagem;
                $_animal->idade       = $data['idade'];
                $_animal->raca        = $data['raca'];
                $_animal->nome        = $data['nome'];
                $_animal->cor         = $data['cor'];
                $_animal->porte       = $data['porte'];
                $_animal->deficiencia = $data['deficiencia'];
                $_animal->sexo        = $data['sexo'];
                $_animal->vacinado    = $data['vacinado'];
                $_animal->dt_registro = $date->format('Y-m-d');
                $_animal->castrado    = $data['castrado'];
                $_animal->patologia   = $data['patologia'];
                $_animal->situacao    = $data['situacao'];
                $_animal->status      = $data['status'];
                $_animal->descricao   = $data['descricao'];
                $_animal->status      = $data['status'];
                $_animal->save();

                return redirect(route('adm.grade.animais'));

            } catch (\Exception $ex) {
                return redirect()->back()->with('mensagem', 'Erro ao atualizar dados: ' . $ex->getMessage());
            }
        }


    }

    public function deletar($id)
    {
        $result = Animal::find($id);
        $result = $result->delete();

        if($result){
            return redirect(route('adm.grade.animais'));
        }else{
            throw new \Exception('Erro ao deletar');
        }
    }

    public function opcoesAjax(Request $request)
    {
        try {
            if ($request->info && !empty($request->info)) {
                $informacoes = $request->info;
                $colunas = array();

                foreach ($informacoes as $key => $value) {
                    $colunas[] = DB::table('animals')
                        ->select($value)
                        ->distinct()
                        ->get();
                }

                $animais = array();
                foreach ($colunas as $coluna) {
                    foreach ($coluna as $key => $value) {
                        foreach ($value as $raca => $descricao) {
                            $animais[$raca][] = $descricao;
                        }
                    }
                }
                return json_encode(['status' => 'sucesso', 'dados' => json_encode($animais)]);
            }
        } catch (\PDOException $exception) {
            return json_encode(['status' => 'erro', 'dados' => $exception->getMessage()]);
        }
    }


    public function listaFiltroAjax(Request $request)
    {
        if ($request->filtro && count($request->filtro) > 0) {
            $filtro = $request->filtro;
            try {

                $search = array();
                foreach ($filtro as $key => $value) {
                    if (!empty($value)) {
                        $search = array(array($key, '=', $value));
                    }
                }

                $animais = Animal::where($search)->select('*')
                    ->get();

                return json_encode(['status' => 'sucesso', 'dados' => json_encode($animais)]);
            } catch (\PDOException $exception) {
                return json_encode(['status' => 'erro', 'dados' => $exception->getMessage()]);
            }
        }
    }


}
