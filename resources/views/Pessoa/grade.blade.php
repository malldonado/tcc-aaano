

@include('inclusao/cabecalho')

<body class="fixed-header " >

<!--Nav-->
@include('inclusao/navbar_usuario')
<!--Nav-->

@include('inclusao/nav_lateral')

<!--Inicio dos tela Funcionário  -->
<div class="container">

        <div class="card-group" style="margin-left: 200px;">

            @if($usuarios)
                @foreach($usuarios as $usuario)

                    <div class="col-md-3 col-sm-6">
                        <div style="color:#000" class="card" style="width: 18rem;">

                            @if($usuario->usuario_foto)
                                <img style="height:200px; width: 200px; border-radius: 40px;"  class="card-img-top" src="{{ asset('storage/imagens') }}/{{ $usuario->usuario_foto }}" alt="Card image cap">
                            @else
                                <img style="height:200px; width: 200px; border-radius: 40px;"  class="card-img-top" src="{{ asset('imagens/perfil/avatar.jpg') }}" alt="Card image cap">
                            @endif

                            <div style="color:#000;" class="card-block" >
                                <div class="card-title" style="margin-top: 10px;">
                                    <div style="margin-left: 35px;">

                                        <h4> {{ $usuario->pessoa_nome }} </h4>

                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal{{ $usuario->pessoa_id }}" href="#">
                                            <span class="fas fa-eye" aria-hidden="true"></span>
                                        </button>

                                        <a type="button" href="{{ route('adm.atualizar.cad', $usuario->pessoa_id) }}" class="btn btn-warning">
                                            <span class="fas fa-edit" aria-hidden="true"></span>
                                        </a>

                                        <a type="button" class="btn btn-danger" href="{{ route('adm.deletar', $usuario->pessoa_id) }}">
                                            <span class="fas fa-trash-alt" aria-hidden="true"></span>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
            @endif
         </div>

<!--Fim dos tela Funcionário  -->



<!-- Visualiar -->

    @if($usuarios)
        @foreach($usuarios as $usuario)

            <div class="modal fade" id="myModal{{ $usuario->pessoa_id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"

                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel"> {{ $usuario->pessoa_nome }} </h4>
                        </div>

                        <div class="modal-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Informações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Nome:</th>
                                        <td>{{ $usuario->pessoa_nome }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Email:</th>
                                        <td>{{ $usuario->usuario_email }}</td>

                                    </tr>
                                    <tr>
                                        <th scope="row">RG/CPF</th>
                                        <td>{{ $usuario->pessoa_codigo }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Rua:</th>
                                        <td>{{ $usuario->endereco_rua }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">N°:</th>
                                        <td>{{ $usuario->endereco_numero }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Bairro:</th>
                                        <td> {{ $usuario->endereco_bairro }} </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Cidade:</th>
                                        <td> {{ $usuario->endereco_cidade }}</td>

                                    </tr>

                                    <tr>
                                        <th scope="row">Nível:</th>
                                        <td> {{ $usuario->usuario_nivel == 'A' ? 'Administrador' : 'Voluntário'}}</td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
<!-- Fim visualiar -->


@include('inclusao/js')
<script src="{{ asset('/angular/pessoaController.js') }}"></script>
<script src="{{ asset('/jquery/pessoa.js') }}"></script>

