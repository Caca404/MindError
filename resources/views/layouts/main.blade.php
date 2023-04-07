<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>

        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <link rel="stylesheet" href="css/owlCarousel/owl.carousel.min.css">
        <link rel="stylesheet" href="css/owlCarousel/owl.theme.default.min.css">

        <link rel="stylesheet" type="text/css" href="/css/app.css">
        <link rel="stylesheet" href="css/@yield('style').css" />

    </head>
    <body style="background-color: #5d4c7a">
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #22005f;">
                <div class="container px-md-0">
                    <div class="d-flex">
                        <button class="navbar-toggler h-50 align-self-center" 
                            type="button" data-bs-toggle="collapse" data-bs-target="#navbar" 
                            aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">

                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <a href="/" class="navbar-brand text-center ms-3 ms-lg-0">
                            <h1 id="nome_site">ErrorMind</h1>
                        </a>
                    </div>
                    <form class="d-none d-lg-flex col-5" id="search" action="/pesquisa" method="GET">
                        @csrf
                        <div class="input-group">
                            <input class="form-control" type="search" placeholder="Pesquisar..." aria-label="Search" name="search" autocomplete="off">
                            <button class="btn btn-secondary" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                    @auth
                        <li class="nav-item dropstart dropdown" style="list-style-type: none">
                            <picture class="user dropdown-toggle" id="user_account" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img style="color:white;" src="/img/account.svg" alt="TEste"> 
                            </picture>
                            <ul class="dropdown-menu me-3 ms-lg-0" aria-labelledby="user_account">
                                <li>
                                    <a class="dropdown-item" href="/addProduto">Adicionar Produto</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/meusProdutos">Meus Produtos</a>
                                </li>
                                <li>
                                    <form action="/logout" method="POST">
                                        @csrf
                                        <a class="dropdown-item" href="/logout" onclick="event.preventDefault();this.closest('form').submit();">
                                            Sair
                                        </a>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endauth
                    @guest
                        <div>
                            <div class="btn-group accountEnter me-3">
                                <a class="" href="#" id="shopCart" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                                    <i class="fas fa-shopping-cart"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end p-2" aria-labelledby="shopCart">
                                    Alguma coisa
                                </div>
                            </div>
                            <div class="btn-group accountEnter">
                                <a class="" href="#" id="conta" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="true">
                                    <i class="fas fa-user"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end mt-0" aria-labelledby="conta">
                                    <li><a class="dropdown-item" href="/login">Login</a></li>
                                    <li><a class="dropdown-item" href="/register">Criar conta</a></li>
                                </ul>
                            </div>
                        </div>
                        
                    @endguest
                </div>
            </nav>
            <nav class="navbar navbar-expand-lg navbar-dark bg-success">
                <div class="collapse navbar-collapse w-100 px-0" id="navbar">
                    <ul class="navbar-nav w-100 container-lg justify-content-between">
                        <li class="nav-item mx-3 mt-2 mx-lg-0 mt-lg-0 d-lg-none" id="search-li">
                            <form class="d-flex d-lg-none" action="/pesquisa" method="GET">
                                @csrf
                                <div class="input-group">
                                    <input class="form-control" type="search" placeholder="Pesquisar..." aria-label="Search" name="search" autocomplete="off">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                            <hr>
                        </li>
                        <li class="nav-item ms-3 ms-lg-0 dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="true">
                                Vestuário
                            </a>
                            <ul class="dropdown-menu me-3 ms-lg-0" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="/vestuario/chapeu">Chapéus</a></li>
                                <li><a class="dropdown-item" href="/vestuario/oculos">Óculos</a></li>
                                <li><a class="dropdown-item" href="/vestuario/moletom">Moletons</a></li>
                                <li><a class="dropdown-item" href="/vestuario/camisa">Camisas</a></li>
                            </ul>
                        </li>
                        <li class="nav-item ms-3 ms-lg-0 dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink1" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="true">
                                Jogos
                            </a>
                            <ul class="dropdown-menu me-3 ms-lg-0" aria-labelledby="navbarDropdownMenuLink1">
                                <li><a class="dropdown-item" href="/jogos/tabuleiro">Tabuleiros</a></li>
                                <li><a class="dropdown-item" href="/jogos/rpg">RPG</a></li>
                            </ul>
                        </li>
                        <li class="nav-item ms-3 ms-lg-0 dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink2" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="true">
                                Colecionáveis
                            </a>
                            <ul class="dropdown-menu me-3 ms-lg-0" aria-labelledby="navbarDropdownMenuLink2">
                                <li><a class="dropdown-item" href="/colecionaveis/poster">Pôsters</a></li>
                                <li><a class="dropdown-item" href="/colecionaveis/actionFigure">Action figures</a></li>
                                <li><a class="dropdown-item" href="/colecionaveis/pop">Pop</a></li>
                                <li><a class="dropdown-item" href="/colecionaveis/pelucia">Pelúcias</a></li>
                                <li><a class="dropdown-item" href="/colecionaveis/lego">Lego</a></li>
                            </ul>
                        </li>
                        <li class="nav-item ms-3 ms-lg-0 dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink3" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="true">
                                Acessórios
                            </a>
                            <ul class="dropdown-menu me-3 ms-lg-0" aria-labelledby="navbarDropdownMenuLink3">
                                <li><a class="dropdown-item" href="/acessorios/mochila">Mochilas</a></li>
                                <li><a class="dropdown-item" href="/acessorios/chaveiro">Chaveiros</a></li>
                                <li><a class="dropdown-item" href="/acessorios/maquiagem">Maquiagem</a></li>
                                <li><a class="dropdown-item" href="/acessorios/bijuteria">Bijuterias</a></li>
                                <li><a class="dropdown-item" href="/acessorios/fones">Fones personalizados</a></li>
                            </ul>
                        </li>
                    </ul>     
                </div>
            </nav>
        </header>
        <main class="container-xl mx-auto bg-light p-5">

            @yield('content')

        </main>
        <footer class="text-white p-3" style="background-color: #22005f;">
            <div class="container-lg d-flex justify-content-between align-items-center">
                <div>
                    <p>Todos os direitos reservados.</p>
                </div>
                <ul class="inlineList">
                    <li class="me-md-2">
                        <i class="fab fa-whatsapp fa-lg"></i> +55 (84) 92342-4223
                    </li>
                    <li class="me-md-2">
                        <i class="fab fa-facebook fa-lg"></i> <a href="#" class="text-white">facebook.com/2x>y</a>
                    </li>
                    <li class="me-md-2">
                        <i class="fab fa-twitter fa-lg"></i> <a href="#" class="text-white">@2x>y</a>
                    </li>
                </ul>
            </div>
        </footer>
    </body>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="js/owlCarousel/owl.carousel.min.js"></script>
    <script src="js/@yield('script').js"></script>
</html>