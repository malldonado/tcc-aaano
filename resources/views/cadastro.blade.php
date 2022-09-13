@php
    $estados = array(
        'AC'=>'Acre',
        'AL'=>'Alagoas',
        'AP'=>'Amapá',
        'AM'=>'Amazonas',
        'BA'=>'Bahia',
        'CE'=>'Ceará',
        'DF'=>'Distrito Federal',
        'ES'=>'Espírito Santo',
        'GO'=>'Goiás',
        'MA'=>'Maranhão',
        'MT'=>'Mato Grosso',
        'MS'=>'Mato Grosso do Sul',
        'MG'=>'Minas Gerais',
        'PA'=>'Pará',
        'PB'=>'Paraíba',
        'PR'=>'Paraná',
        'PE'=>'Pernambuco',
        'PI'=>'Piauí',
        'RJ'=>'Rio de Janeiro',
        'RN'=>'Rio Grande do Norte',
        'RS'=>'Rio Grande do Sul',
        'RO'=>'Rondônia',
        'RR'=>'Roraima',
        'SC'=>'Santa Catarina',
        'SP'=>'São Paulo',
        'SE'=>'Sergipe',
        'TO'=>'Tocantins'
    );
@endphp

@include('inclusao/cabecalho')


<body data-spy="scroll" data-target=".menu-navegacao" data-offset="80">

@include('inclusao/barra_navegacao')



<!-- voluntariado -->
<section id="voluntariado">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="page-header">
                    <h1>
                        <small>Preencha os dados para se cadastrar</small>
                    </h1>
                </div>
            </div>
        </div>

        <div class="row contato">
            <div class="col-xs-12">
                <p class="bg-info aviso">

                    @if (session('mensagem'))

                        {{ session('mensagem') }}
                    @else
                    
                        Preencha o formulário abaixo para se cadastrar! Lembre-se que o cadastro está
                        sujeito a aprovação do(a) Adminitrador(ra).
                    @endif

                </p>
            </div>
        </div>

        <div class="row contato">
            <div class="col-xs-12">

                <form name="frmContato" action="{{ route('usuario.formulario') }}" method="POST" id="formContato">
                    <div class="row">

                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="Nome">Nome</label>
                                <input type="text" name="nome" class="form-control input-sm"
                                       placeholder="Qual seu nome? *"
                                       required/>
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="CPF">RG/CPF</label>
                                <input type="text" name="codigo" class="form-control input-sm"
                                       placeholder="Digite seu CPF *"
                                       required/>
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="CPF">Sexo</label>
                                <select class="form-control" name="sexo">
                                    <option selected>Secione seu sexo</option>
                                    <option value="M">Masculino</option>
                                    <option value="F">Feminino</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="Data de Nascimento">Data de Nascimento</label>
                                <input type="date" name="dt_nasc" class="form-control input-sm"
                                       placeholder="Data Nascimento*"
                                       required/>
                            </div>


                            <div class="form-group">
                                <label for="Celular">Celular</label>
                                <input type="text" name="celular" class="form-control input-sm"
                                       placeholder="Celular para contato *" required/>
                            </div>

                            <div class="form-group">
                                <label for="Email">Email</label>
                                <input type="text" name="email" class="form-control input-sm" placeholder="Digite seu email *" required/>
                            </div>

                            <div class="form-group">
                                <label for="Senha">Senha</label>
                                <input type="password" name="senha" class="form-control input-sm" placeholder="Digite sua senha *" required/>
                            </div>



                        </div>

                        <div class="col-xs-6">

                            <div class="form-group">
                                <label for="Rua">Rua</label>
                                <input type="text" name="rua" class="form-control input-sm"
                                       placeholder="Qual sua rua? *"
                                       required/>
                            </div>

                            <div class="form-group">
                                <label for="Número da Casa">Número da casa</label>
                                <input type="text" name="numero" class="form-control input-sm"
                                       placeholder="Número da casa *"
                                       required/>
                            </div>

                            <div class="form-group">
                                <label for="Bairro">Bairro</label>
                                <input type="text" name="bairro" class="form-control input-sm"
                                       placeholder="Qual seu bairro? *"
                                       required/>
                            </div>

                            <div class="form-group">
                                <label for="CEP">CEP</label>
                                <input type="text" name="cep" class="form-control input-sm"
                                       placeholder="Qual seu cep? *"
                                       required/>
                            </div>

                            <div class="form-group">
                                <label for="Cidade">Cidade</label>
                                <input type="text" name="cidade" class="form-control input-sm" placeholder="Mora em qual Cidade? *" required/>
                            </div>

                            <div class="form-group">
                                <label for="Estado">Estado</label>
                                <select class="form-control" name="estado" id="estado">
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

                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="#myModal"
                                   data-toggle="modal" data-target="#myModal" required>
                            <label class="form-check-label" for="invalidCheck2">
                                Concordo com os termos e condições
                            </label>
                        </div>
                    </div>

                    <a href="confirmacao-email.html">
                        <button type="submit" class="btn btn-success btn-lg">
                            <span class="fas fa-check" aria-hidden="true"></span>
                            Solicitar
                        </button>
                    </a>

                </form>
            </div>
        </div>
    </div>
</section>
<!-- // voluntariado -->

<!-- Modal do Termo de Compromisso -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Termo de adoção</h4>
            </div>            

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
                </button>
            </div>

        </div>
    </div>
</div>
<!-- Modal do Termo de Compromisso -->


@include('inclusao/js')
