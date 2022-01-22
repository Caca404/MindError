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
<!-- <form action="/" method="GET">
                                <input type="text" id="search" name="search" class="form-control" placeholder="Procurar..." />
                            </form> -->
        <link rel="stylesheet" type="text/css" href="/css/main.css">
    </head>
    <body style="background-color: #5d4c7a">
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #22005f;">
                <div class="container">
                    <div class="d-flex">
                        <button class="navbar-toggler h-50 align-self-center" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <a href="/" class="navbar-brand text-center">
                            <h1 id="nome_site">ErrorMind</h1>
                        </a>
                    </div>
                    <form class="d-flex col-5" id="search">
                        <input class="form-control me-2" type="search" placeholder="Pesquisar..." aria-label="Search">
                        <button class="btn btn-success" type="submit">Buscar</button>
                    </form>
                    @guest
                        <span class="text-center"><a href="/login" id="teste">Login</a> ou <a href="/register">Crie uma conta</a></span>    
                    @endguest
                </div>
            </nav>
            <nav class="navbar navbar-expand-lg navbar-dark bg-success">
                <div class="collapse navbar-collapse w-100" id="navbar">
                    <ul class="navbar-nav w-100 justify-content-around">
                        <li class="nav-item mx-3 mt-2 mx-lg-0 mt-lg-0" id="search-li">
                            <form class="d-flex ">
                                <input class="form-control me-2" type="search" placeholder="Pesquisar..." aria-label="Search">
                                <button class="btn btn-purple-li" type="submit">Buscar</button>
                            </form>
                        </li>
                        <hr>
                        <li class="nav-item ms-3 ms-lg-0 dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Vestuário
                            </a>
                            <ul class="dropdown-menu me-3 ms-lg-0" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="/vestuario/chapeus">Chapéus</a></li>
                                <li><a class="dropdown-item" href="/vestuario/oculos">Óculos</a></li>
                                <li><a class="dropdown-item" href="/vestuario/moletons">Moletons</a></li>
                                <li><a class="dropdown-item" href="/vestuario/camisas">Camisas</a></li>
                            </ul>
                        </li>
                        <li class="nav-item ms-3 ms-lg-0 dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Jogos
                            </a>
                            <ul class="dropdown-menu me-3 ms-lg-0" aria-labelledby="navbarDropdownMenuLink1">
                                <li><a class="dropdown-item" href="/jogos/tabuleiros">Tabuleiros</a></li>
                                <li><a class="dropdown-item" href="/jogos/rpg">RPG</a></li>
                            </ul>
                        </li>
                        <li class="nav-item ms-3 ms-lg-0 dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Colecionáveis
                            </a>
                            <ul class="dropdown-menu me-3 ms-lg-0" aria-labelledby="navbarDropdownMenuLink2">
                                <li><a class="dropdown-item" href="/colecionaveis/posters">Pôsters</a></li>
                                <li><a class="dropdown-item" href="/colecionaveis/actionFigures">Action figures</a></li>
                                <li><a class="dropdown-item" href="/colecionaveis/pop">Pop</a></li>
                                <li><a class="dropdown-item" href="/colecionaveis/pelucias">Pelúcias</a></li>
                                <li><a class="dropdown-item" href="/colecionaveis/lego">Lego</a></li>
                            </ul>
                        </li>
                        <li class="nav-item ms-3 ms-lg-0 dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink3" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Acessórios
                            </a>
                            <ul class="dropdown-menu me-3 ms-lg-0" aria-labelledby="navbarDropdownMenuLink3">
                                <li><a class="dropdown-item" href="/acessorios/">Mochilas</a></li>
                                <li><a class="dropdown-item" href="/acessorios/chaveiros">Chaveiros</a></li>
                                <li><a class="dropdown-item" href="/acessorios/maquiagem">Maquiagem</a></li>
                                <li><a class="dropdown-item" href="/acessorios/bijuterias">Bijuterias</a></li>
                                <li><a class="dropdown-item" href="/acessorios/fones">Fones personalizados</a></li>
                            </ul>
                        </li>
                    </ul>     
                </div>
            </nav>
        </header>
        <main class="container-xl bg-light p-5">

            @yield('content')

        </main>
        <footer class="container-fluid text-white" style="background-color: #22005f;">
            <div class="row">
                <div class="mx-auto pt-3" id="contato">
                    <ul>
                        <li><i class="fab fa-whatsapp fa-lg me-1"></i> +55 (84)92342-4223</li>
                        <li><i class="fab fa-facebook fa-lg me-1"></i> <a href="#" class="text-white">facebook.com/2x>y</a></li>
                        <li><i class="fab fa-twitter fa-lg me-1"></i> <a href="#" class="text-white">@2x>y</a></li>
                    </ul>
                </div>
            </div>
        </footer>
    </body>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(".card").click(function(){
            window.location.reload();
        });

        $(".dropdown-toggle").mouseenter(function(){
            $(".dropdown-toggle").each(function(){
                (new bootstrap.Dropdown($(this))).hide();
            });
            (new bootstrap.Dropdown($(this))).show();
            $(this).css('outline', 'none');
        });
    </script>
</html>