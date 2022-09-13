
@include('inclusao/cabecalho')

    <body class="fixed-header" data-spy="scroll" data-target=".menu-navegacao" data-offset="80" ng-controller="adocoes">

<!--Nav-->
@include('inclusao/navbar_usuario')

{{-- left sidebar --}}
@include('inclusao/nav_lateral')

        <h1> {{ "Adoções" }} </h1>

        @if($adocoes)

            @foreach($adocoes as $usuario)

                <div class="col-md-3 col-sm-6">
                    <div style="color:#000" class="card" style="width: 18rem;">
                        <img style="height:200px; width: 200px" class="card-img-top" id="borderradios" src="{{ asset('imagens/perfil/avatar.jpg') }}" alt="Card image cap">
                        <div style="color:#000" class="card-block">
                            <div class="card-title">
                                <h4 style="margin-left: 20px"> {{ $usuario->ps_nome }} </h4>
                                <button type="button" data-toggle="modal" data-target="#myModal{{ $usuario->ps_id }}" style="margin-left: 45px; width: 100px" href="#" class="btn btn-info">
                                    <span class="fas fa-eye" aria-hidden="true"></span>
                                </button>
                            </div>
                            </br>
                        </div>
                    </div>
                </div>


                <div class="modal fade" id="myModal{{ $usuario->ps_id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel">Relatório</h4>
                            </div>
                            <div class="modal-body">
                                <table class="table table-striped">

                                    <thead>
                                        <tr>
                                            <th scope="col">Usuário</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <th scope="row">Nome:</th>
                                            <td>{{ $usuario->ps_nome }}</td>

                                        </tr>
                                        <tr>
                                            <th scope="row">RG/CPF:</th>
                                            <td>{{ $usuario->ps_codigo }}</td>
                                        </tr>

                                        <tr>
                                            <th scope="row">Sexo:</th>
                                            <td>{{ $usuario->ps_sexo == 'M' ? 'Masculino' : 'Feminino' }}</td>
                                        </tr>

                                        <tr>
                                            <th scope="row">Rua:</th>
                                            <td>{{ $usuario->ed_rua }}</td>

                                        </tr>
                                        <tr>
                                            <th scope="row">N°:</th>
                                            <td>{{ $usuario->ed_numero }}</td>

                                        </tr>
                                        <tr>
                                            <th scope="row">Bairro:</th>
                                            <td>{{ $usuario->ed_bairro }}</td>

                                        </tr>
                                        <tr>
                                            <th scope="row">CEP:</th>
                                            <td>{{ $usuario->ed_cep }}</td>

                                        </tr>

                                        <tr>
                                            <th scope="row">Cidade:</th>
                                            <td>{{ $usuario->ed_cidade }}</td>
                                        </tr>

                                        <thead>
                                        <tr>
                                            <th scope="row"></th>
                                            <th scope="row"></th>


                                        </tr>
                                        <tr>
                                            <th scope="row"></th>
                                            <th scope="row"></th>


                                        </tr>
                                        <tr>
                                            <th scope="col">Animal</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <th scope="row">Nome:</th>
                                            <td>{{ $usuario->an_nome }}</td>

                                        </tr>
                                        <tr>
                                            <th scope="row">Idade:</th>
                                            <td>{{ $usuario->an_idade }}</td>

                                        </tr>
                                        <tr>
                                            <th scope="row">Raça:</th>
                                            <td>{{ $usuario->an_raca }}</td>

                                        </tr>
                                        <tr>
                                            <th scope="row">Cor:</th>
                                            <td>{{ $usuario->an_cor }}</td>

                                        </tr>
                                        <tr>
                                            <th scope="row">Porte:</th>
                                            <td>{{ $usuario->an_porte }}</td>

                                        </tr>
                                        <tr>
                                            <th scope="row">Deficiência:</th>
                                            <td>{{ $usuario->an_deficiencia == 'S' ? 'Sim' : 'Não' }}</td>

                                        </tr>
                                        <tr>
                                            <th scope="row">Sexo:</th>
                                            <td>{{ $usuario->an_sexo == 'M' ? 'Macho' : 'Fêmea' }}</td>

                                        </tr>
                                        <tr>
                                            <th scope="row">Registro de Cadastro:</th>
                                            <td>{{  preg_replace('/[\.]/', '/', date('d.m.Y', strtotime($usuario->an_create))) }}</td>

                                        </tr>
                                        <tr>
                                            <th scope="row">Patologia:</th>
                                            <td>{{ $usuario->an_patologia == 'S' ? 'Sim' : 'Não' }}</td>

                                        </tr>
                                        <tr>
                                            <th scope="row">Situação do Animal:</th>
                                            <td>{{ $usuario->an_situacao }}</td>

                                        </tr>

                                        <tr>
                                            <th scope="row">Vacinado:</th>
                                            <td>{{ $usuario->an_vacinado == 'S' ? 'Sim' : 'Não' }}</td>
                                        </tr>

                                        <tr>
                                            <th scope="row">Data de Registro:</th>
                                            <td>{{ preg_replace('/[\.]/', '/', date('d.m.Y', strtotime($usuario->an_dt_registro))) }}</td>
                                        </tr>

                                        <tr>
                                            <th scope="row">Adotado</th>
                                            <td>{{ $usuario->ad_adotado == 'S' ? 'Sim' : 'Não' }}</td>
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

        @else

            <h1>Não foram encontrados adoções</h1>

        @endif


@include('inclusao/js')

    <script src="{{ asset('/angular/adocoesController.js') }}"></script>
    <script src="{{ asset('/jquery/adocoes.js') }}"></script>
    </body>
</html>
