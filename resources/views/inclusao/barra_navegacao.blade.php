<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu-navegacao">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('index') }}">
                <img class="logo" src="{{ asset('/imagens/logo.png') }}">
            </a>
        </div>

        <div class="collapse navbar-collapse menu-navegacao" id="menu-navegacao">

            <ul class="nav navbar-nav navbar-right">

                <li>
                    <a class="" href="{{ route('index.conhecao-animais') }}">Conheça nossos animais</a>
                </li>

                 <li>
                    <a class="" href="{{ route('index.cadastro') }}">Seja Voluntário</a>
                </li>

                <li>
                    <a class="" href="#contato">Contato</a>
                </li>

                <li>
                    <a href="{{ route('adm.login') }}" class="btn btn-danger btn-lg">Login</a>
                </li>

            </ul>

        </div>
    </div>
</nav>
