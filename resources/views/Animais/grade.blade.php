@include('inclusao/cabecalho')

<body class="fixed-header " ng-controller="animais">

    <!--Nav-->
    @include('inclusao/navbar_usuario')
    <!--Nav-->

    @include('inclusao/nav_lateral')

    <!--Inicio dos tela Funcionário  -->
    <div class="container" >
        <div class="card-group" style="margin-left: 200px;">

            @if($animais)
                @foreach($animais as $animal)

                    {{--@dd($animal)--}}

                    <div class="col-md-3 col-sm-6 top-spc-20">
                        <div style="color:#000" class="card" style="width: 18rem;">
                            <img style="height:200px; width: 200px" class="card-img-top"
                            src="{{ asset('storage/imagens') }}/{{ $animal->animal_imagem }}" alt="Card image cap">
                            {{-- @{{animal.imagem}} --}}
                            <div style="color:#000;" class="card-block" >
                                <div class="card-title" style="margin-top: 10px;">
                                    <div style="margin-left: 35px;">
                                        <h4> {{ $animal->animal_nome }}</h4>

                                        <button type="button" class="btn btn-info" data-toggle="modal"
                                                data-target="#myModal{{ $animal->animal_id }}" href="#">
                                            <span class="fas fa-eye" aria-hidden="true"></span>
                                        </button>

                                        <a type="button" href="{{ route('adm.atualizar.animal', $animal->animal_id) }}" class="btn btn-warning">
                                            <span class="fas fa-edit" aria-hidden="true"></span>
                                        </a>

                                        <a type="button" href="{{ route('adm.deletar.animais', $animal->animal_id) }}" class="btn btn-danger">
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
    </div>
    <!--Fim dos tela Funcionário  -->


    <!-- Inicio da Página de Numeração -->
    {{--<div class="container" align="center" style="margin-top: 50px;">--}}
        {{--<nav aria-label="Page navigation example" align="center">--}}

            {{--<ul class="pagination">--}}

                {{--<li class="page-item">--}}
                    {{--<a class="page-link" href="#" aria-label="Previous">--}}
                        {{--<span aria-hidden="true">&laquo;</span>--}}
                        {{--<span class="sr-only">Anterior</span>--}}
                    {{--</a>--}}
                {{--</li>--}}

                {{--<li class="page-item">--}}
                    {{--<a class="page-link" href="#">1</a>--}}
                {{--</li>--}}

                {{--<li class="page-item">--}}
                    {{--<a class="page-link" href="#">2</a>--}}
                {{--</li>--}}

                {{--<li class="page-item">--}}
                    {{--<a class="page-link" href="#">3</a>--}}
                {{--</li>--}}

                {{--<li class="page-item">--}}
                    {{--<a class="page-link" href="#" aria-label="Next">--}}
                        {{--<span aria-hidden="true">&raquo;</span>--}}
                        {{--<span class="sr-only">Próximo</span>--}}
                    {{--</a>--}}
                {{--</li>--}}

            {{--</ul>--}}

        {{--</nav>--}}
    {{--</div>--}}
    {{--<!-- Fim da Página de Numeração -->--}}


    <!-- Visualiar -->
    @if($animais)
        @foreach($animais as $animal)

            <div class="modal fade" id="myModal{{ $animal->animal_id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">{{ $animal->animal_nome }}</h4>
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
                                        <td>{{ $animal->animal_nome }}</td>
                                    </tr>

                                    <tr>
                                        <th scope="row">Raça:</th>
                                        <td>{{ $animal->animal_raca }}</td>
                                    </tr>

                                    <tr>
                                        <th scope="row">Cor:</th>
                                        <td>{{ $animal->animal_cor }}</td>
                                    </tr>

                                    <tr>
                                        <th scope="row">Idade:</th>
                                        <td>{{ $animal->animal_idade }}</td>
                                    </tr>

                                    <tr>
                                        <th scope="row">Sexo:</th>
                                        <td>{{ $animal->animal_sexo == 'M' ? 'Masculino' : 'Feminino' }}</td>
                                    </tr>

                                    <tr>
                                        <th scope="row">Porte:</th>
                                        <td>{{ $animal->animal_porte }}</td>
                                    </tr>

                                    <tr>
                                        <th scope="row">Situação:</th>
                                        <td>{{ $animal->animal_situacao }}</td>
                                    </tr>

                                    <tr>
                                        <th scope="row">Status:</th>
                                        <td>{{ $animal->animal_status == 'A' ? 'Ativo' : 'Inativo' }}</td>
                                    </tr>

                                    <tr>
                                        <th scope="row">Vacinado:</th>
                                        <td>{{ $animal->animal_vacinado == 'S' ? 'Sim' : 'Não' }}</td>
                                    </tr>

                                    <tr>
                                        <th scope="row">Deficiência:</th>
                                        <td>{{ $animal->animal_deficiencia == 'S' ? 'Sim' : 'Não' }}</td>
                                    </tr>

                                    <tr>
                                        <th scope="row">Patologia:</th>
                                        <td>{{ $animal->animal_patologia == 'S' ? 'Sim' : 'Não' }}</td>
                                    </tr>

                                    <tr>
                                        <th scope="row">Data de registro:</th>
                                        <td>{{ formatDate($animal->animal_dt_registro) }}</td>
                                    </tr>

                                    <tr>
                                        <th scope="row">Descrição:</th>
                                        <td>{{ $animal->animal_descricao }}</td>
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

    <!-- Editar -->
    <div class="modal fade" id="myModalEdit@{{ animal.id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ng-repeat="animal in dados.animais">

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Informações do Animal</h4>
                </div>

                <div class="modal-body">
                    <form>
                        <div class="form-row">

                            <div class="col-md-6 mb-3">
                                <label for="validationDefault05">Nome:</label>
                                <input type="text" ng-value="animal.nome" ng-model="animal.nome" class="form-control" id="validationDefault05"
                                       required >
                            </div>

                            <div class="col-md-6 mb-3">
                                    <label for="validationDefault05">Raça:</label>
                                    <input type="text" ng-value="animal.raca" ng-model="animal.raca" class="form-control" id="validationDefault05"
                                           required >
                            </div>

                            <div class="col-md-6 mb-3">
                                    <label for="validationDefault05">Cor:</label>
                                    <input type="text" ng-value="animal.cor" ng-model="animal.cor" class="form-control" id="validationDefault05"
                                           required >
                            </div>

                            <div class="col-md-6 mb-3">
                                    <label for="validationDefault05">Idade:</label>
                                    <input type="text" ng-value="animal.idade" ng-model="animal.idade" class="form-control" id="validationDefault05"
                                           required >
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="validationDefault05">Sexo:</label>
                                <select class="form-control" ng-value="animal.sexo" ng-model="animal.sexo">
                                    <option value="M">Masculino</option>
                                    <option value="F">Feminino</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="validationDefault05">Porte:</label>
                                <input  type="text" ng-value="animal.porte" ng-model="animal.porte" class="form-control" id="validationDefault05"
                                        required >
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="validationDefault05">Vacinado:</label>
                                <select class="form-control" ng-value="animal.vacinado" ng-model="animal.vacinado">
                                    <option value="S">Sim</option>
                                    <option value="N">Não</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="validationDefault05">Data de registro</label>
                                <input class="form-control" type="date" ng-model="animal.dt_registro" value="@{{animal.dt_registro}}">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="validationDefault05">Castrado</label>
                                <select class="form-control" ng-value="animal.castrado" ng-model="animal.castrado">
                                    <option value="S">Sim</option>
                                    <option value="N">Não</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="validationDefault05">Patologia</label>
                                <select class="form-control" ng-value="animal.patologia" ng-model="animal.patologia">
                                    <option value="S">Sim</option>
                                    <option value="N">Não</option>
                                </select>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="validationDefault05">Status</label>
                                <select class="form-control" ng-value="animal.status" ng-model="animal.status">
                                    <option value="A">Ativo</option>
                                    <option value="I">Inativo</option>
                                </select>
                            </div>

                            <div class="col-md-12 mb-6">
                                <label for="validationDefault05">Situacao:</label>
                                <textarea rows="2" class="form-control" ng-model="animal.situacao"></textarea>
                            </div>

                            <div class="col-md-12 mb-6">
                                <label for="validationDefault05">Descricao</label>
                                <textarea rows="2" class="form-control" ng-model="animal.descricao"></textarea>
                            </div>


                        </div>
                    </form>
                </div>

                <div class="modal-footer">

                    <button style="margin-top: 25px" type="button" class="btn btn-default" data-dismiss="modal">
                        <span class="fas fa-times" aria-hidden="true"></span>
                    </button>

                    <button type="button" ng-click="atualizar(animal)" style="margin-top: 25px" class="btn btn-default">
                        <span class="fas fa-check" aria-hidden="true"></span>
                    </button>

                </div>

            </div>
        </div>
    </div>

    <!-- Fim Editar -->


@include('inclusao/js')
{{--<script src="{{ asset('/angular/animalController.js') }}"></script>--}}
{{--<script src="{{ asset('/jquery/animais.js') }}"></script>--}}
