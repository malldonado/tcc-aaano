


@include('inclusao/cabecalho')

<body class="fixed-header " >

<!--Nav-->
@include('inclusao/navbar_usuario')
<!--Nav-->

@include('inclusao/nav_lateral')

<!-- voluntariado -->
<section id="voluntariado">
    <div class="container">

        <div class="row">
            <div class="col-xs-12">
                <div class="page-header">
                    <h1>
                        <small>Altere os campos a serem editados</small>
                    </h1>
                </div>
            </div>
        </div>

        <div class="row contato">
            <div class="col-xs-12">
                <p class="bg-info aviso">

                    @if (session('mensagem'))

                        {{ session('mensagem') }}

                    @endif

                </p>
            </div>
        </div>

        @if($usuarios)

        <div class="row contato">
            <div class="col-xs-12">

                <form name="frmContato" action="{{ route('adm.atualizar.cad') }}" method="POST" id="formContato" enctype="multipart/form-data">
                    <div class="row">

                        <input type="hidden" value="{{ $usuarios[0]->pessoa_id}}" name="id">

                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="Nome">Nome</label>
                                <input type="text" name="nome" class="form-control input-sm"
                                       placeholder="Qual seu nome? *"
                                       required value="{{ $usuarios[0]->pessoa_nome }}"/>
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="CPF">RG/CPF</label>
                                <input type="text" name="codigo" class="form-control input-sm" placeholder="Digite seu CPF *" required value="{{ $usuarios[0]->pessoa_codigo }}"/>
                            </div>

                            <div class="form-group">
                                <label for="Celular">Celular</label>
                                <input type="text" name="celular" class="form-control input-sm"
                                       placeholder="Celular para contato *" required value="{{ $usuarios[0]->telefone_numero  }}"/>
                            </div>

                            <div class="form-group">
                                <label for="Email">Email</label>
                                <input type="text" name="email" class="form-control input-sm" placeholder="Digite seu email *" required value="{{ $usuarios[0]->usuario_email }}"/>
                            </div>

                            <div class="form-group">
                                <label for="Senha">Senha</label>
                                <input type="password" name="senha" class="form-control input-sm" placeholder="Digite sua senha *" required/>
                            </div>

                            <div class="form-group">
                                <label for="Cidade">Status</label>
                                <select class="form-control" name="status">
                                    @if($usuarios[0]->usuario_status == 'A')
                                        <option value="A" selected>Ativo</option>
                                        <option value="I">Inativo<option>
                                    @else
                                        <option value="A" >Ativo</option>
                                        <option value="I" selected>Inativo<option>
                                    @endif
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="Confirmar senha">Tipo de usuário</label>
                                <select class="form-control" name="nivel" value="{{ $usuarios[0]->usuario_nivel }}">
                                    @if(session()->get('nivel') == 'S')
                                        <option value="S">Super Administrador</option>
                                        <option value="A">Administrador</option>
                                        <option value="V">Voluntario</option>
                                    @elseif(session()->get('nivel') == 'A')
                                        <option value="V" selected>Voluntario</option>
                                    @endif
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="imagem">Escolha uma imagem de perfil</label>
                                <input type="file" name="imagem" class="form-control">
                            </div>

                        </div>

                        <div class="col-xs-6">

                            <div class="form-group">
                                <label for="Rua">Rua</label>
                                <input type="text" name="rua" class="form-control input-sm"
                                       placeholder="Qual sua rua? *"
                                       required value="{{ $usuarios[0]->endereco_rua }}"/>
                            </div>

                            <div class="form-group">
                                <label for="Número da Casa">Número da casa</label>
                                <input type="text" name="numero" class="form-control input-sm"
                                       placeholder="Número da casa *"
                                       required value="{{ $usuarios[0]->endereco_numero }}"/>
                            </div>

                            <div class="form-group">
                                <label for="Bairro">Bairro</label>
                                <input type="text" name="bairro" class="form-control input-sm"
                                       placeholder="Qual seu bairro? *"
                                       required value="{{ $usuarios[0]->endereco_bairro }}"/>
                            </div>

                            <div class="form-group">
                                <label for="CEP">CEP</label>
                                <input type="text" name="cep" class="form-control input-sm"
                                       placeholder="Qual seu cep? *"
                                       required value="{{ $usuarios[0]->endereco_cep }}"/>
                            </div>

                            <div class="form-group">
                                <label for="Cidade">Cidade</label>
                                <input type="text" name="cidade" class="form-control input-sm" placeholder="Mora em qual Cidade? *" required value="{{ $usuarios[0]->endereco_cidade }}"/>
                            </div>



                            <div class="form-group">
                                <label for="Estado">Estado</label>
                                <select class="form-control" name="estado" id="estado" value="{{ $usuarios[0]->endereco_estado }}">
                                    @foreach($estados as $sigla => $nome)
                                        <option value="{{ $sigla }}"> {{ $nome }} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="Confirmar senha">Confirmar senha</label>
                                <input type="password" name="conf_senha" class="form-control input-sm"
                                       placeholder="Confirme sua senha *" required/>
                            </div>




                        </div>


                    </div>
            </div>

            <br />

            <a href="confirmacao-email.html">
                <button type="submit" class="btn btn-success btn-lg">
                    <span class="fas fa-check" aria-hidden="true"></span>
                    Alterar Informações
                </button>
            </a>

            </form>
        </div>

    @endif

    </div>
    </div>
</section>
<!-- // voluntariado -->



@include('inclusao/js')
