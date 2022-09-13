
@include('inclusao/cabecalho')

<body data-spy="scroll" data-target=".menu-navegacao" data-offset="80" ng-controller="adocoes">
<!--Nav-->
@include('inclusao/navbar_usuario')

{{-- left sidebar --}}
@include('inclusao/nav_lateral')

<div class="container" >
    <div class="card-group" style="margin-left: 200px;">


        @if($animais)
            @foreach($animais as $animal)

            <div class="col-md-3 col-sm-6 top-spc-20" >
                <div style="color:#000" class="card" style="width: 18rem;">
                    <img style="height:200px; width: 200px" class="card-img-top"
                         src="{{ asset('storage/imagens') }}/{{ $animal->imagem }}" alt="Card image cap">
                    {{-- @{{animal.imagem}} --}}
                    <div style="color:#000;" class="card-block" >
                        <div class="card-title" style="margin-top: 10px;">
                            <div style="margin-left: 35px;">
                                <h4> {{ $animal->nome }}</h4>

                                <a type="button" class="btn btn-info" data-toggle="modal"
                                        data-target="#myModal{{ $animal->id }}" href="#">
                                    <span class="fas fa-eye" aria-hidden="true"></span>
                                </a>

                                <a type="button" href="{{ route('adocoes.adocao.animal', $animal->id) }}" class="btn btn-success">
                                    <span class="fas fa-check" aria-hidden="true"></span>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        @else

            <div class="col-xs-12" style="margin: 20px;">
                <p class="bg-info aviso" style="width: 100%; padding: 10px; border-radius: 10px;">
                    Não há animais cadastrados para adoção
                </p>
            </div>

        @endif

    </div>
</div>


@if($animais)

    @foreach($animais as $animal)

        <div class="modal fade" id="myModal{{ $animal->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >

            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">{{ $animal->nome }}</h4>
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
                                <td>{{ $animal->nome }}</td>

                            </tr>
                            <tr>
                                <th scope="row">Idade:</th>
                                <td>{{ $animal->idade }}</td>

                            </tr>
                            <tr>
                                <th scope="row">Raça:</th>
                                <td>{{ $animal->raca }}</td>

                            </tr>
                            <tr>
                                <th scope="row">Cor:</th>
                                <td>{{ $animal->cor }}</td>

                            </tr>
                            <tr>
                                <th scope="row">Porte:</th>
                                <td>{{ $animal->porte }}</td>

                            </tr>
                            <tr>
                                <th scope="row">Deficiência:</th>
                                <td>{{ $animal->deficiencia == 'S' ? 'Sim' : 'Não' }}</td>

                            </tr>
                            <tr>
                                <th scope="row">Sexo:</th>
                                <td>{{ $animal->sexo == 'M' ? 'Macho' : 'Fêmea' }} </td>

                            </tr>
                            <tr>
                                <th scope="row">Registro de Cadastro:</th>
                                <td> {{ formatDate($animal->created_at) }}</td>

                            </tr>
                            <tr>
                                <th scope="row">Patologia:</th>
                                <td>{{ $animal->patologia == 'S' ? 'Sim' : 'Não' }}</td>

                            </tr>
                            <tr>
                                <th scope="row">Situação do Animal:</th>
                                <td>{{ $animal->situacao }}</td>

                            </tr>
                            <tr>
                                <th scope="row">Vacinado:</th>
                                <td> {{ $animal->vacinado == 'S' ? 'Sim' : 'Não' }}</td>

                            </tr>
                            <tr>
                                <th scope="row">Data de Registro:</th>
                                <td> {{ formatDate($animal->dt_registro) }}</td>

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
<!-- Modal das Informação dos Animal -->


<!-- // voluntariado -->
@include('inclusao/js')
<script src="{{ asset('angular/adocoesController.js') }}"></script>
<script src="{{ asset('jquery/adocoes.js') }}"></script>
