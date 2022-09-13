<?php

//Route::get('/', function () {
//
//    $animais = DB::table('animals')->where('status', '=',  'A')->get();
//    return view('index', ['animais' => $animais]);
//
//})->name('index');

//Route::get('contato', function() {
//
//    return view('contato');
//
//})->name('index.contato');

//Route::get('conhecao-animais', function(){
//
//    $animais = DB::table('animals')->where('status', '=',  'A')->get();
//    return view('conheca_animais', ['animais' => $animais]);
//
//})->name('index.conhecao-animais');

Route::get('cadastro', 'IndexController@cadastro')->name('index.cadastro');

Route::get('teste', 'TesteController@dbTeste');
/* IndexCon*/
Route::get('/', 'IndexController@index')->name('index');

Route::get('contato', 'IndexController@contato')->name('index.contato');

Route::get('login', 'IndexController@login')->name('adm.login');

Route::get('/conhecao-animais', 'IndexController@conhecaAnimais')->name('index.conhecao-animais');

// //Rotas do admin
Route::group(['prefix' => 'usuario'], function(){

    Route::match(['get', 'post'], 'validaLogin', 'UsuariosController@validaLogin')->name('usuario.validaLogin');

    Route::match(['get', 'post'], 'formulario', 'UsuariosController@formulario')->name('usuario.formulario');
});

Route::group(['prefix' => 'admin'], function (){

    //Referen-se a criação e manipualção de todo tipo de pessoa pelo administrador
    Route::group(['prefix' => 'pessoa'], function(){

        Route::get('grade', 'PessoaController@grade')->name('adm.grade');

        Route::match(['get', 'post'], 'formulario', 'PessoaController@formulario')->name('adm.formulario.cad');

        Route::match(['get', 'post'], 'atualizar/{id?}', 'PessoaController@atualizar')->name('adm.atualizar.cad');

        Route::get('deletar/{id}', 'PessoaController@deletar')->name('adm.deletar');

    });

    //Referem-se a criação e manipualção de todo tipo dos animais pelo usuário
    Route::group(['prefix' => 'animais'] , function() {

        Route::match(['get', 'post'], 'atualizar/{id?}', 'AnimaisController@atualizar')->name('adm.atualizar.animal');

        Route::get('grade', 'AnimaisController@grade')->name('adm.grade.animais');

        Route::match(['get', 'post'], 'formulario', 'AnimaisController@formulario')->name('adm.add-animal');

        Route::get('deletar/{id?}', 'AnimaisController@deletar')->name('adm.deletar.animais');

    });

    //Solicitações
	Route::group(['prefix' => 'solicitacoes'], function(){

        Route::get('listar-solicitacao/{id?}', 'SolicitacaoController@listarSolitacao')->name('adm.solicitacao');
        Route::get('listar-solicitacao', 'SolicitacaoController@grade')->name('adm.solicitacoes-grade');

    });

//    	Rotas rereferentes a adoção
	Route::group(['prefix' => 'adocao'], function(){

	    Route::get('grade', 'AdocaoController@grade')->name('admin.listar-adocoes');

        Route::match(['get', 'post'], 'formulario', 'AdocaoController@formulario')->name('adocao.formulario');
        Route::match(['get', 'post'],'solicitacoes', 'AdocaoController@solicitacoes')->name('adocoes.solicitacoes');

        Route::get('solicitarAdocao', 'AdocaoController@solicitarAdocao')->name('adocoes.solicitarAdocao');
        Route::match(['get', 'post'], 'adotarAjax', 'AdocaoController@adotarAjax')->name('adocoes.adotarAjax');

        Route::get('aceitarSolicitacao/{id}', 'AdocaoController@aceitarSolicitacao')->name('adocoes.aceitar');
        Route::get('recusarSolicitacao/{id}', 'AdocaoController@recusarSolicitacao')->name('adocoes.recusar');

        Route::get('adocaoAnimais/{id?}', 'AdocaoController@adocaoAnimais')->name('adocoes.adocao.animal');

        Route::get('pedidosAdocoes', 'AdocaoController@listarPedidos')->name('adocoes.pedidos-adocoes');

        Route::match(['get', 'post'], 'relatorio', 'AdocaoController@relatorio')->name('adocoes.relatorio');

    });

});


Route::get('pdf', function(){
    return view('Adocao/PDF');
});
//Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
