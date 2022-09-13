{{-- @dd($animais) --}}

@include('inclusao/cabecalho')

<body class="fixed-header ">

<!-- Menu da aplicação -->
@include('inclusao/barra_navegacao')
<!-- // Menu da aplicação -->

<!-- slider da aplicação -->
<div class="divslider">
    <div class="container">
        <div class="col-xs-26">
            <div id="sliderprincipal" class="carousel slide" data-ride="carousel">

                <ol class="carousel-indicators">
                    <li data-target="#sliderprincipal" data-slide-to="0" class="active"></li>
                    <li data-target="#sliderprincipal" data-slide-to="1"></li>
                    <li data-target="#sliderprincipal" data-slide-to="2"></li>
                </ol>

                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="{{ asset('/imagens/slider/slider1.jpg') }}" alt="Imagem slider 1">
                    </div>
                    <div class="item">
                        <img src="{{ asset('/imagens/slider/slider2.jpg') }}" alt="Imagem slider 2">
                    </div>
                    <div class="item">
                        <img src="{{ asset('/imagens/slider/slider3.jpg') }}" alt="Imagem slider 3">
                    </div>
                </div>

                <a class="left carousel-control" href="#sliderprincipal" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Anterior</span>
                </a>

                <a class="right carousel-control" href="#sliderprincipal" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Próximo</span>
                </a>

            </div>
        </div>
    </div>
</div>
<!-- slider da aplicação -->

<!-- Titulo -->
<div class="container">
    <div class="page-header">
        <h1>
            <small>Adote um animal agora!</small>
        </h1>
    </div>
</div>
<!-- Titulo -->


<!-- Card animais-->

<!-- Card animais-->
<div class="card-group">
    <div class="container">

        @if($animais)
            @foreach($animais as $animal)
                <div class="card">
                    <div class="col-md-3 col-sm-6">
                        <div class="thumbnail">

                            @if($animal->imagem)
                                <img src="{{ asset('storage/imagens') }}/{{ $animal->imagem }}" alt="Card image cap">
                            @else
                                <img src="{{ asset('imagens/logo-aaano-1.png') }}" alt="Card image cap">
                            @endif

                            <div class="caption">

                                <h3>{{ $animal->nome }}</h3>
                                <p> {{ $animal->descricao }} </p>

                                <button type="button" data-toggle="modal" data-target="" href="#abriranimal{{ $animal->id }}" class="btn btn-block">
                                    <span class="fas fa-eye" aria-hidden="true"></span>
                                </button>

                            </div>
                        </div>
                    </div>
                </div>

            @endforeach
        @endif


        <!-- localização -->
        <section id="localizacao" class="div_colorida" style="margin: 20px;">

                <div class="row">
                    <div class="col-xs-12">
                        <div class="page-header">
                            <h1>
                                <small>Veja onde estamos</small>
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3677.790025599657!2d-47.31492768580156!3d-22.810243040166057!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c8986d4e1b8277%3A0xa9375230d7cb3430!2sAssocia%C3%A7%C3%A3o+Amigos+dos+Animais+de+Nova+Odessa!5e0!3m2!1spt-BR!2sbr!4v1531771081059"
                            width="1150" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>

        </section>
        <!-- // localização -->


        <!-- Modal das Informação dos Animal -->
        @foreach($animais as $animal)

            <div class="modal fade" id="abriranimal{{ $animal->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title font-weight-bold" id="myModalLabel">Ted</h4>
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
                                        <th scope="row">Deficiência:</th>
                                        <td>{{ $animal->deficiencia == 1 ? 'Sim' : 'Não' }}</td>
                                    </tr>

                                    <tr>
                                        <th scope="row">Sexo:</th>
                                        <td>{{ $animal->sexo == 'M' ? 'Masculino' : 'Feminino' }}</td>
                                    </tr>

                                    <tr>
                                        <th scope="row">Registro de Cadastro:</th>
                                        <td>{{ $animal->castrado == 1 ? 'Sim' : 'Não' }}</td>
                                    </tr>

                                    <tr>
                                        <th scope="row">Patologia:</th>
                                        <td>{{ $animal->patologia == 'S' ? 'Sim' : 'Não' }}</td>
                                    </tr>

                                    <tr>
                                        <th scope="row">Situação do Animal:</th>
                                        <td>{{ $animal->situacao == 'B' ? 'Bem' : 'Mal' }}</td>
                                    </tr>

                                    <tr>
                                        <th scope="row">Vacinado:</th>
                                        <td>{{ $animal->vacinado == 1 ? 'Sim' : 'Não' }}</td>
                                    </tr>

                                    <tr>
                                        <th scope="row">Data de Registro:</th>
                                    <td> {{  formatDate($animal->dt_registro) }} </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                <span class="fas fa-times" aria-hidden="true"></span>
                            </button>
                        </div>

                    </div>
                </div>
            </div>

        @endforeach

    </div>
</div>

<!-- Modal das Informação dos Animal -->
@include('inclusao/rodape')
@include('inclusao/js')
