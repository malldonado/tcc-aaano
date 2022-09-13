@include('inclusao/cabecalho')

<body class="fixed-header" data-spy="scroll" data-target=".menu-navegacao" data-offset="80" ng-controller="animais">

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
                        <p class="bg-info aviso">Cadastre um animal</p>
                    @endif
                </div>
            </div>

            <div class="row " style="margin-top: -70px;">
                <div class="col-xs-12">

                    <form action="{{ route('adm.add-animal') }}" method="POST" name="frmContato" id="formContato" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="nome">Nome</label>
                                        <input type="text" name="nome" class="form-control input-sm" placeholder="Nome *" required />
                                    </div>

                                    <div class="form-group">
                                        <label for="raca">Raça</label>
                                        <input type="text" name="raca" class="form-control input-sm" placeholder="Raça *" required />
                                    </div>

                                    <div class="form-group">
                                        <label for="idade">Idade</label>
                                        <input type="text" name="idade" class="form-control input-sm" placeholder="Idade *" required />
                                    </div>

                                    <div class="form-group">
                                        <label for="cor">Cor</label>
                                        <input type="text" name="cor" class="form-control input-sm" placeholder="Cor *" required />
                                    </div>

                                    <div class="form-group">
                                        <label for="porte">Porte</label>
                                        <input type="text" name="porte" class="form-control input-sm" placeholder="Porte *" required />
                                    </div>


                                    <div class="form-group">
                                        <label for="sexo">Sexo</label>
                                        <select class="form-control input-sm" name="sexo"  required>
                                            <option value="" selected>Selecione uma opção</option>
                                            <option value="M">Macho</option>
                                            <option value="F">Fêmea</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="situacao">Situação</label>
                                        <textarea name="situacao" class="form-control" name="situacao" cols="30" rows="10"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="vacinado">Vacinado</label>
                                        <select class="form-control input-sm" name="vacinado" >
                                            <option value="" selected> Selecione uma opção</option>
                                            <option value="S">Sim</option>
                                            <option value="N">Não</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                            <label for="deficiencia">Deficiência</label>
                                            <select class="form-control input-sm" name="deficiencia" required>
                                                <option value="" selected required>Escolha um valor</option>
                                                <option value="S" selected>Sim</option>
                                                <option value="N" selected>Não</option>
                                            </select>
                                        </div>

                                    <div class="form-group">
                                        <label for="data_registro">Data de registro</label>
                                        <input name="dt_registro" type="date" class="form-control input-sm" required />
                                    </div>

                                    <div class="form-group">
                                        <label for="castrado">Castrado</label>
                                        <select name="castrado" class="form-control">
                                            <option value="" selected>Selecione uma opção</option>
                                            <option value="S">Sim</option>
                                            <option value="N">Não</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="patologia">Patologia</label>
                                        <select name="patologia" class="form-control">
                                            <option value="" selected>Selecione uma opção</option>
                                            <option value="S">Sim</option>
                                            <option value="N">Não</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="imagem">Escolha uma imagem</label>
                                        <input type="file" name="imagem" class="form-control">
                                    </div>


                                    <div class="form-group">
                                        <label for="descricao">Descricao</label>
                                        <textarea name="descricao" cols="30" rows="10" class="form-control"></textarea>
                                    </div>


                                </div>

                                </br>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="#myModal" data-toggle="modal" data-target="#myModal" required>
                                        <label class="form-check-label" for="invalidCheck2">
                                            Concordo com os termos e condições
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="confirmacao-email.html">
                            <button type="submit" class="btn btn-success btn-lg">
                                <span class="fas fa-plus-circle" aria-hidden="true"></span>
                                Cadastrar
                            </button>
                        </a>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- // voluntariado -->

@include('inclusao/modal_compromisso')


@include('inclusao/js')
