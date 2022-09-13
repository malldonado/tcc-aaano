 <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu-navegacao"></button>
                <a class="navbar-brand" href="#page-top">
                    <img align="right" style="margin-top:-10px" class="logoAdm" img src="{{ asset('imagens/logo.png') }}">
                </a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <img src="{{ asset('storage/imagens') }}/{{ session()->get('imagem') }}" style="width: 35px; height: 35px; border-radius: 20px;">
                            <span></span>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">

                            <li>
                                <a href="trocar-senha.html">
                                	<span class="fas fa-exchange-alt" style="color: red;"></span>
                                    <b>	Trocar Senha </b>
                                </a>
                            </li>

                            <li class="divider"></li>

                            <li>
                                <a href="{{ route('index') }}">
                                	<span class="fas fa-sign-out-alt" style="color: red;"></span>
                                    <b> Efetuar Logoff </b>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
