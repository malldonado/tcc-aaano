
<!--Inicio tela de canto-->
<div class="row-fluid">
    <div class="col-sm-2">


        @if(session()->has('nivel') && (session()->get('nivel') == 'A' || session()->get('nivel') == 'S'))_
        <!-- menu navegação lateral -->
            <div class="panel panel-danger">
                <div id="panel-color" id="colGroup1" role="tab" class="panel-heading">
                    <h4 class="panel-title">
                        <a id="painel-color-text" href="#colListGroup1" aria-controls="colListGroup1"
                           aria-expanded="false"
                           data-toggle="collapse">
                            Adoções
                        </a>
                    </h4>
                </div>

                <div role="tabpanel" class="panel-collapse collapse" id="colListGroup1" aria-expanded="false">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a style="color:#000" href="{{ route('adocoes.solicitacoes') }}">Solicitações</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /.menu navegação lateral -->

            <!-- menu navegação lateral -->
            <div class="panel panel-danger">
                <div id="panel-color" id="colGroup3" role="tab" class="panel-heading">
                    <h4 class="panel-title">
                        <a id="painel-color-text" href="#colListGroup3" aria-controls="colListGroup3"
                           aria-expanded="false"
                           data-toggle="collapse">
                            Gerenciar Pessoas
                        </a>
                    </h4>
                </div>

                <div role="tabpanel" class="panel-collapse collapse" id="colListGroup3" aria-expanded="false">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a style="color:#000" href=" {{ route('adm.grade') }}">Funcionários</a>
                        </li>
                        <li class="list-group-item">
                            <a style="color:#000" href=" {{ route('adm.formulario.cad') }}">Novo</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /.menu navegação lateral -->

            <!-- menu navegação lateral -->
            <div class="panel panel-danger">

                <div id="panel-color" id="colGroup4" role="tab" class="panel-heading">
                    <h4 class="panel-title">
                        <a id="painel-color-text" href="#colListGroup4" aria-controls="colListGroup4"
                           aria-expanded="false"
                           data-toggle="collapse">
                            Animais
                        </a>
                    </h4>
                </div>

                <div role="tabpanel" class="panel-collapse collapse" id="colListGroup4" aria-expanded="false">
                    <ul class="list-group">

                        <li class="list-group-item">
                            <a style="color:#000" href="{{ route('adm.grade.animais') }}">Animais</a>
                        </li>

                        <li class="list-group-item">
                            <a style="color:#000" href="{{ route('adm.add-animal') }}">Novo</a>
                        </li>

                    </ul>
                </div>

            </div>
            <!-- /.menu navegação lateral -->

            <!-- menu navegação lateral -->
            <div class="panel panel-danger">

                <div id="panel-color" id="colGroup5" role="tab" class="panel-heading">
                    <h4 class="panel-title">
                        <a id="painel-color-text" href="#colListGroup5" aria-controls="colListGroup5" aria-expanded="false" data-toggle="collapse">
                            Relatórios
                        </a>
                    </h4>
                </div>

                <div role="tabpanel" class="panel-collapse collapse" id="colListGroup5" aria-expanded="false">

                    <ul class="list-group">
                        <li class="list-group-item">
                            <a style="color:#000" href="{{ route('adocoes.relatorio') }}" > Relatório</a>
                        </li>

                    </ul>
                </div>
            </div>

        @else

            <div class="panel panel-danger">
                <div id="panel-color" id="colGroup5" role="tab" class="panel-heading">
                    <h4 class="panel-title">
                        <a id="painel-color-text" href="#colListGroup5" aria-controls="colListGroup5" aria-expanded="false" data-toggle="collapse">
                            Solicitar Adocao
                        </a>
                    </h4>
                </div>

                <div role="tabpanel" class="panel-collapse collapse" id="colListGroup5" aria-expanded="false">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a style="color:#000" href="{{ route('adocoes.solicitarAdocao') }}" >Adotar animal</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="panel panel-danger">

                <div id="panel-color" id="colGroup5" role="tab" class="panel-heading">
                    <h4 class="panel-title">
                        <a id="painel-color-text" href="#adocoesRealizadas" aria-controls="colListGroup5" aria-expanded="false" data-toggle="collapse">
                            Pedidos de adoção
                        </a>
                    </h4>
                </div>

                <div role="tabpanel" class="panel-collapse collapse" id="adocoesRealizadas" aria-expanded="false">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a style="color:#000" href="{{ route('adocoes.pedidos-adocoes') }}" >Pedidos de adoção</a>
                        </li>
                    </ul>
                </div>

            </div>


        @endif
        <!-- /.menu navegação lateral -->
    </div>
</div>
<!--Fim da tela -->
