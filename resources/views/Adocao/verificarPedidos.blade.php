
@include('inclusao/cabecalho')

<body data-spy="scroll" data-target=".menu-navegacao" data-offset="80" ng-controller="adocoes">
<!--Nav-->
@include('inclusao/navbar_usuario')

{{-- left sidebar --}}
@include('inclusao/nav_lateral')


<div class="container" >
    <div class="card-group" style="margin-left: 200px;">


        @if($animais && is_array($animais))

            @foreach($animais as $animal)

                <div class="col-md-3 col-sm-6 top-spc-20" style="border: 1px solid lightgray; padding: 0px; margin: 10px;">
                    <div style="color:#000" class="card" style="width: 18rem;">
                        <img style="height:200px; width: 100%;" class="card-img-top"
                             src="{{ asset('storage/imagens') }}/{{ $animal->animal_imagem }}" alt="Card image cap">
                        {{-- @{{animal.imagem}} --}}
                        <div style="color:#000;" class="card-block" >
                            <div class="card-title" style="margin-top: 10px;">
                                    <h4 style="text-align: center;">
                                        {{ $animal->animal_nome }}
                                    </h4>

                                    <p style="border-top: 1px solid black; text-align: center; border-bottom: 1px solid black; padding: 10px;">
                                       @if($animal->adocao_adotado == 'S')
                                            Adoção liberada
                                           <p style="text-align: center;"> {{ formatDate($animal->adocao_dt_adocao) }}</p>
                                       @elseif($animal->adocao_adotado == 'N')
                                            Adoção esperando aprovação!
                                           <p style="text-align: center;"> {{ formatDate($animal->adocao_dt_inclusao) }} </p>
                                       @elseif($animal->adocao_adotado == 'R')
                                            Adoção recusada
                                           <p style="text-align: center;">{{ formatDate($animal->adocao_dt_recusa) }}</p>
                                        @endif
                                    </p>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach

        @endif
    </div>
</div>


{{--<!-- Modal das Informação dos Animal -->--}}
{{--<div class="modal fade" id="myModal@{{ animal.id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ng-repeat="animal in dados.animais">--}}

    {{--<div class="modal-dialog" role="document">--}}

        {{--<div class="modal-content">--}}

            {{--<div class="modal-header">--}}
                {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                    {{--<span aria-hidden="true">&times;</span>--}}
                {{--</button>--}}
                {{--<h4 class="modal-title" id="myModalLabel">@{{ animal.nome }}</h4>--}}
            {{--</div>--}}

            {{--<div class="modal-body">--}}

                {{--<table class="table table-striped">--}}
                    {{--<thead>--}}
                    {{--<tr>--}}
                        {{--<th scope="col">Informações</th>--}}

                    {{--</tr>--}}
                    {{--</thead>--}}
                    {{--<tbody>--}}
                    {{--<tr>--}}
                        {{--<th scope="row">Nome:</th>--}}
                        {{--<td>@{{ animal.nome }}</td>--}}

                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<th scope="row">Idade:</th>--}}
                        {{--<td>@{{ animal.idade }}</td>--}}

                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<th scope="row">Raça:</th>--}}
                        {{--<td>@{{ animal.raca }}</td>--}}

                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<th scope="row">Cor:</th>--}}
                        {{--<td>@{{ animal.cor }}</td>--}}

                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<th scope="row">Porte:</th>--}}
                        {{--<td>@{{ animal.porte }}</td>--}}

                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<th scope="row">Deficiência:</th>--}}
                        {{--<td>@{{ animal.deficiencia == 'S' ? 'Sim' : 'Não' }}</td>--}}

                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<th scope="row">Sexo:</th>--}}
                        {{--<td>@{{ animal.sexo == 'M' ? 'Macho' : 'Fêmea' }} </td>--}}

                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<th scope="row">Registro de Cadastro:</th>--}}
                        {{--<td> @{{ animal.created_at }}</td>--}}

                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<th scope="row">Patologia:</th>--}}
                        {{--<td>@{{ animal.patologia == 'S' ? 'Sim' : 'Não' }}</td>--}}

                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<th scope="row">Situação do Animal:</th>--}}
                        {{--<td>@{{ animal.situacao }}</td>--}}

                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<th scope="row">Vacinado:</th>--}}
                        {{--<td> @{{ animal.vacinado == 'S' ? 'Sim' : 'Não' }}</td>--}}

                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<th scope="row">Data de Registro:</th>--}}
                        {{--<td> @{{ animal.dt_registro }}</td>--}}

                    {{--</tr>--}}
                    {{--</tbody>--}}
                {{--</table>--}}
            {{--</div>--}}
            {{--<div class="modal-footer">--}}
                {{--<button type="button" class="btn btn-default" data-dismiss="modal">--}}
                    {{--<span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>--}}
                {{--</button>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
{{--<!-- Modal das Informação dos Animal -->--}}


<!-- // voluntariado -->
@include('inclusao/js')
<script src="{{ asset('angular/adocoesController.js') }}"></script>
<script src="{{ asset('jquery/adocoes.js') }}"></script>
