@include('inclusao/cabecalho')

<body data-spy="scroll" data-target=".menu-navegacao" data-offset="80" ng-controller="adocoes">
<!--Nav-->
@include('inclusao/navbar_usuario')

{{-- left sidebar --}}
@include('inclusao/nav_lateral')


<div class="container">


    <div style="margin-bottom: 20px;">
        <h1> Relatório Geral</h1>
    </div>

    @if(session('mensagem'))
        <div class="col-xs-10">
            <p class="bg-info aviso" style="padding: 10px; border-radius: 10px;">
                {{ session('mensagem') }}
            </p>
        </div>
    @endif

    <form name="frmContato" target="_blank" action="{{ route('adocoes.relatorio') }}" method="POST" id="formContato">

        <div class="col-md-8">
            <div class="row">

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="Nome">Data de início</label>
                        <input class="form-control" type="date" name="data_inicio" required/>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label" for="Data_Fim">Data de fim</label>
                        <input class="form-control" type="date" name="data_fim" value="{{ date('Y-m-d', strtotime(date('Ymd'). ' + 1 days')) }}" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <button type="submit" class="btn btn-success">
                        <span class="fas fa-search" aria-hidden="true"></span>
                        Pesquisar
                    </button>
                </div>

            </div>
        </div>
    </form>
</div>

</div>

{{--<div class="container" >--}}
{{--<div class="card-group" style="margin-left: 200px;">--}}

{{--<div class="content-wrapper" style="margin-left: 340px; margin-right: 30px;">--}}

{{--<div class="row">--}}
{{--<div class="col-md-12">--}}
{{--<div class="card">--}}
{{--<div class="card-body">--}}

{{--<table class="table table-hover table-bordered" id="relatorio">--}}
{{--<thead>--}}
{{--<tr>--}}
{{--<th>Nome</th>--}}
{{--<th>Email</th>--}}
{{--<th>Rua</th>--}}
{{--<th>Número</th>--}}
{{--<th>Bairro</th>--}}
{{--<th>Cidade</th>--}}
{{--<th>Estado</th>--}}
{{--<th>Nome do animal</th>--}}
{{--<th>Status do animal</th>--}}
{{--<th>Status da adoção</th>--}}
{{--<th>Data de cadastro</th>--}}
{{--</tr>--}}
{{--</thead>--}}

{{--<tbody>--}}
{{--@if(count($adocoes) > 0)--}}
{{--@foreach($adocoes as $adocao)--}}

{{--<tr>--}}
{{--<th>{{ $adocao->ps_nome }}</th>--}}
{{--<th>{{ $adocao->us_email }} </th>--}}
{{--<th>{{ $adocao->ed_rua }} </th>--}}
{{--<th>{{ $adocao->ed_numero }}</th>--}}
{{--<th>{{ $adocao->ed_bairro }}</th>--}}
{{--<th>{{ $adocao->ed_cidade }}</th>--}}
{{--<th>{{ $adocao->ed_estado }}</th>--}}
{{--<th>{{ $adocao->an_nome }}</th>--}}
{{--<th>{{ $adocao->an_status == 'A' ? 'Ativo' : 'Inativo' }}</th>--}}
{{--<th>{{ $adocao->ad_adotado == 'S' ? 'Adotado' : 'Não adotado' }}</th>--}}
{{--<th>{{ preg_replace('/[\.]/', '/', date('d.m.Y', strtotime($adocao->ad_criado)))  }}</th>--}}
{{--</tr>--}}

{{--@endforeach--}}
{{--@endif--}}
{{--</tbody>--}}
{{--</table>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}


{{--</div>--}}
{{--</div>--}}


<!-- // voluntariado -->
@include('inclusao/js')

    {{--<script src="{{ asset('angular/adocoesController.js') }}"></script>--}}
    {{--<script src="{{ asset('jquery/adocoes.js') }}"></script>--}}

    {{--<script type="text/javascript">--}}

    {{--jQuery(document).ready(function(){--}}

    {{--var table = $('#relatorio').DataTable({--}}
    {{--"language": {--}}
    {{--"sEmptyTable": "Nenhum registro encontrado",--}}
    {{--"sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",--}}
    {{--"sInfoEmpty": "Mostrando 0 até 0 de 0 registros",--}}
    {{--"sInfoFiltered": "(Filtrados de _MAX_ registros)",--}}
    {{--"sInfoPostFix": "",--}}
    {{--"sInfoThousands": ".",--}}
    {{--"sLengthMenu": "Exibir _MENU_ por página",--}}
    {{--"sLoadingRecords": "Carregando...",--}}
    {{--"sProcessing": "Processando...",--}}
    {{--"sZeroRecords": "Nenhum registro encontrado",--}}
    {{--"sSearch": "Pesquisar",--}}
    {{--"oPaginate": {--}}
    {{--"sNext": "Próximo",--}}
    {{--"sPrevious": "Anterior",--}}
    {{--"sFirst": "Primeiro",--}}
    {{--"sLast": "Último"--}}
    {{--},--}}
    {{--"oAria": {--}}
    {{--"sSortAscending": ": Ordenar colunas de forma ascendente",--}}
    {{--"sSortDescending": ": Ordenar colunas de forma descendente"--}}
    {{--}--}}
    {{--}--}}
    {{--});--}}


    {{--});--}}

    </script>
