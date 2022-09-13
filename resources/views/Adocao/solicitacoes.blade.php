
@include('inclusao/cabecalho')

    <body data-spy="scroll" data-target=".menu-navegacao" data-offset="80" ng-controller="adocoes">
<!--Nav-->
@include('inclusao/navbar_usuario')

{{-- left sidebar --}}
@include('inclusao/nav_lateral')

<div class="container">
    <div class="row">

        <h1> Solicitações de adoção </h1>

        @if($adocaos)
            @foreach($adocaos as $adocao)

                <div class="card-group">
                    <div class="col-md-3 col-sm-6">
                        <div style="color:#000" class="card" style="width: 18rem;">

                            <img style="height:200px; width: 200px" class="card-img-top" id="borderradios" src="{{ asset("storage/imagens") }}/{{ $adocao['pessoa']->animal_imagem  }}" alt="Card image cap">

                            <div style="color:#000" class="card-block">
                                <div class="card-title" >

                                    <h4 style="margin-left: 20px"> {{ $adocao['pessoa']->pessoa_nome }}</h4>

                                    <div style="margin-left: 40px;">
                                        <button type="button" data-toggle="modal" data-target="#myModal{{ $adocao['pessoa']->pessoa_id }}" href="#" class="btn btn-info">
                                            <span class="fas fa-eye" aria-hidden="true"></span>
                                        </button>

                                        <a type="button" data-toggle="modal" href="{{ route('adocoes.aceitar', $adocao['pessoa']->adocao_id) }}" class="btn btn-success">
                                            <span class="fas fa-thumbs-up" aria-hidden="true"></span>
                                        </a>

                                        <a type="button" data-toggle="modal" href="{{ route('adocoes.recusar', $adocao['pessoa']->adocao_id) }}" class="btn btn-danger">
                                            <span class="fas fa-thumbs-down" aria-hidden="true"></span>
                                        </a>

                                    </div>

                                </div>
                                </br>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach

            @else

                <div style="margin-left: 100px;" class="alert alert-success alert-block">
                    <strong>Não há solicitações no momento</strong>
                </div>
        @endif


    @if($adocaos)
        @foreach($adocaos as $adocao)
        <!-- Modal das Informação do Adotante -->
        <div class="modal fade" id="myModal{{ $adocao['pessoa']->pessoa_id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >

            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                        <h4 class="modal-title" id="myModalLabel"> {{ $adocao['pessoa']->pessoa_nome }}</h4>
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
                                    <th scope="row">Nome</th>
                                    <td>{{ $adocao['pessoa']->pessoa_nome }}</td>

                                </tr>
                                <tr>
                                    <th scope="row">Email:</th>
                                    <td>{{ $adocao['pessoa']->usuario_email }}</td>

                                </tr>
                                <tr>

                                <tr>
                                    <th scope="row">Sexo:</th>
                                    <td>{{ $adocao['pessoa']->animal_sexo == 'M' ? 'Masculino' : 'Feminino' }}</td>
                                </tr>

                                <tr>
                                    <th scope="row">Rua:</th>
                                    <td>{{ $adocao['endereco']['rua'] }}</td>

                                </tr>

                                <tr>
                                    <th scope="row">N°:</th>
                                    <td>{{ $adocao['endereco']['numero'] }}</td>

                                </tr>
                                <tr>
                                    <th scope="row">Bairro:</th>
                                    <td>{{ $adocao['endereco']['bairro'] }}</td>

                                </tr>
                                <tr>
                                    <th scope="row">CEP:</th>
                                    <td>{{ $adocao['endereco']['cep'] }}</td>

                                </tr>

                                <tr>
                                    <th scope="row">Cidade:</th>
                                    <td>{{ $adocao['endereco']['cidade'] }}</td>

                                </tr>
                            </tbody>
                            <thead>
                            <tr>
                                <th scope="col">Animal adotado:</th>
                            </tr>
                            <tr>
                                <th scope="row">Raça</th>
                                <td>{{ $adocao['pessoa']->animal_raca }}</td>

                            </tr>
                            <tr>
                                <th scope="row">Nome</th>
                                <td>{{ $adocao['pessoa']->animal_nome }}</td>

                            </tr>

                            </thead>
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
        <!-- Modal das Informação do Adotante -->


    </div>
</div>

<!-- // voluntariado -->
@include('inclusao/js')
    <script src="{{ asset('angular/adocoesController.js') }}"></script>
    <script src="{{ asset('jquery/adocoes.js') }}"></script>
