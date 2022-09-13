@include('inclusao/cabecalho')

<body data-spy="scroll" data-target=".menu-navegacao" data-offset="80">

@include('inclusao/barra_navegacao')

<!--Formulario de login -->
<div style="margin-left:480px" class="container-fluid">
    <div class="row-fluid">
        <div class="col-xs-4">

                @if(session('mensagem'))

                    <div class="alert alert-danger alert-block">
                        <strong>{{ session('mensagem') }}</strong>
                    </div>

                @endif

                {!! Form::open(['route' => 'usuario.validaLogin', 'method' => 'POST']) !!}

                    <div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </div>
                    {{-- <form action="{{ route('usuario.validaLogin')}}" method="POST"> --}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        {{-- <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="Enter email"> --}}
                        {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'email']) !!}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Senha</label>
                        {{-- <input type="password" name="senha" class="form-control" id="exampleInputPassword1" placeholder="Password"> --}}
                        {!! Form::password('senha', ['class' => 'form-control', 'placeholder' => 'senha']) !!}
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" name="logado" for="exampleCheck1">Manter salvo?</label>
                    </div>

                    <button type="submit" class="btn btn-block btn-primary">
                        Login
                    </button>
                  {{-- </form> --}}
                {!! Form::close() !!}



        </div>
    </div>
</div>
<!--Formulario de login -->

@include('inclusao/js')

