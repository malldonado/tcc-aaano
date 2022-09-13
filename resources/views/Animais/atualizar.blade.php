@include('inclusao/cabecalho')

<body class="fixed-header" data-spy="scroll" data-target=".menu-navegacao">

<!--Nav-->
@include('inclusao/navbar_usuario')
<!--Nav-->

@include('inclusao/nav_lateral')

<section>
    <div class="container" >
        <div class="card-group" style="margin-left: 200px;">

            <div class="row contato">
                <div class="col-xs-12">

                    @if(session('mensagem'))
                        <p class="bg-info aviso">{{ session('mensagem') }}</p>
                    @else
                        <p class="bg-info aviso">Atualize os dados um animal</p>
                    @endif

                </div>
            </div>

            <div class="row " style="margin-top: -70px;">
                <div class="col-xs-12">

                    @if($animal)
                        <form action="{{ route('adm.atualizar.animal') }}" method="POST" enctype="multipart/form-data" >

                            <input type="hidden" name="id" value="{{ $animal['id'] }}">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="nome">Nome</label>
                                            <input type="text" value="{{ $animal['nome'] }}" name="nome" class="form-control input-sm" placeholder="Nome *" required />
                                        </div>

                                        <div class="form-group">
                                            <label for="raca">Raça</label>
                                            <input type="text" value="{{ $animal['raca'] }}" name="raca" class="form-control input-sm" placeholder="Raça *" required />
                                        </div>

                                        <div class="form-group">
                                            <label for="idade">Idade</label>
                                            <input type="text" value="{{ $animal['idade'] }}" name="idade" class="form-control input-sm" placeholder="Idade *" required />
                                        </div>

                                        <div class="form-group">
                                            <label for="cor">Cor</label>
                                            <input type="text" value="{{ $animal['cor'] }}" name="cor" class="form-control input-sm" placeholder="Cor *" required />
                                        </div>

                                        <div class="form-group">
                                            <label for="porte">Porte</label>
                                            <input type="text" value="{{ $animal['porte'] }}" name="porte" class="form-control input-sm" placeholder="Porte *" required />
                                        </div>


                                        <div class="form-group">
                                            <label for="sexo">Sexo</label>
                                            <select class="form-control input-sm" name="sexo" value="{{ $animal['sexo'] }}" required>
                                                <option value="" selected>Selecione uma opção</option>

                                                @if($animal['sexo'] == 'M')
                                                    <option value="M" selected>Macho</option>
                                                    <option value="F">Fêmea</option>
                                                @else
                                                    <option value="M">Macho</option>
                                                    <option value="F" selected>Fêmea</option>
                                                @endif
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="situacao">Situação</label>
                                            <textarea name="situacao" class="form-control" name="situacao" cols="30" rows="5"> {{ $animal['situacao'] }} </textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="vacinado">Vacinado</label>
                                            <select class="form-control input-sm" name="vacinado" value="{{ $animal['vacinado'] }}">
                                                <option value="" selected> Selecione uma opção</option>
                                                @if($animal['vacinado'] == 'S')
                                                    <option value="S" selected>Sim</option>
                                                    <option value="N">Não</option>
                                                @else
                                                    <option value="S">Sim</option>
                                                    <option value="N" selected>Não</option>
                                                @endif
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="deficiencia">Deficiência</label>
                                            <select class="form-control input-sm" name="deficiencia" value="{{ $animal['deficiencia'] }}" required>
                                                <option value="" selected required>Escolha um valor</option>
                                                @if($animal['deficiencia'] == 'S')
                                                    <option value="S" selected>Sim</option>
                                                    <option value="N">Não</option>
                                                @else
                                                    <option value="S">Sim</option>
                                                    <option value="N" selected>Não</option>
                                                @endif
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="data_registro">Data de registro</label>
                                            <input name="dt_registro" value="{{ $animal['dt_registro'] }}" type="date" class="form-control input-sm" required />
                                        </div>

                                        <div class="form-group">
                                            <label for="castrado">Castrado</label>
                                            <select name="castrado" class="form-control" value="{{ $animal['castrado'] }}">
                                                <option value="" selected>Selecione uma opção</option>
                                                @if($animal['castrado'] == 'S')
                                                    <option value="S" selected>Sim</option>
                                                    <option value="N">Não</option>
                                                @else
                                                    <option value="S">Sim</option>
                                                    <option value="N" selected>Não</option>
                                                @endif
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="patologia">Patologia</label>
                                            <select name="patologia" class="form-control" >
                                                <option value="" selected>Selecione uma opção</option>
                                                @if($animal['patologia'] == 'S')
                                                    <option value="S" selected>Sim</option>
                                                    <option value="N">Não</option>
                                                @else
                                                    <option value="S">Sim</option>
                                                    <option value="N" selected>Não</option>
                                                @endif
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="imagem">Escolha uma imagem</label>
                                            <input type="file" name="imagem" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="sexo">Status</label>
                                            <select class="form-control input-sm" name="status" value="{{ $animal['status'] }}" required>
                                                <option value="" selected>Selecione uma opção</option>

                                                @if($animal['status'] == 'A')
                                                    <option value="A" selected>Ativo</option>
                                                    <option value="I">Inativo</option>
                                                @else
                                                    <option value="A">Ativo</option>
                                                    <option value="I" selected>Inativo</option>
                                                @endif
                                            </select>
                                        </div>


                                        <div class="form-group">
                                            <label for="descricao">Descricao</label>
                                            <textarea  name="descricao" cols="30" rows="5" class="form-control">{{ $animal['descricao'] }}</textarea>
                                        </div>



                                    </div>

                                    </br>

                                </div>
                            </div>
                            <a href="confirmacao-email.html">
                                <button type="submit" class="btn btn-success btn-lg">
                                    Atualizar dados
                                </button>
                            </a>
                    </div>
                    </form>

                @endif
            </div>
        </div>
    </div>
</section>
<!-- // voluntariado -->

@include('inclusao/modal_compromisso')


@include('inclusao/js')
