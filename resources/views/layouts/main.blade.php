<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/owlCarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owlCarousel/owl.theme.default.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="css/@yield('style').css" />

</head>

<body>
    <header x-data="{ openPrincipalNav: false }">
        <nav style="background-color: #22005f;" class="p-3">
            <div class="md:container md:px-5 flex flex-row justify-between md:mx-auto items-center">
                <a href="/" class="text-white text-center ml-3 lg:ml-0">
                    <h1 id="nome_site">ErrorMind</h1>
                </a>
                <form class="hidden md:flex md:w-1/2" id="search" action="/pesquisa" method="GET">
                    @csrf
                    <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
                    <div class="relative w-full">
                        <input type="search" id="search" class="block w-full p-4 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Pesquisar..." required>
                        <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
                @auth
                    <div class="md:flex md:flex-row">
                        <div class="md:relative md:block hidden md:mr-10" x-data="{ open: false }" @click.away="open = false">
                            <button id="shopCart"  @click="open = !open">
                                <i class="fas fa-shopping-cart text-white fa-lg"></i>
                            </button>
                            <div x-show="open"
                                x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="transform opacity-0 scale-95"
                                x-transition:enter-end="transform opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="transform opacity-100 scale-100"
                                x-transition:leave-end="transform opacity-0 scale-95"
                                class="z-10 bg-white absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48" style="display:none;">
                                    <div class="flex flex-col divide-y divide-gray-400">
                                        <div class="shoppHeader text-center">
                                            <h5 class="p-2"><b>Carrinho</b></h5>
                                        </div>
                                        <div class="shoppBody p-2">
                                            O carrinho está vazio.
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="md:relative md:block hidden" x-data="{ open: false }" @click.away="open = false">
                            <button id="conta" @click="open = !open">
                                <i class="fas fa-user text-white fa-lg"></i>
                            </button>
                            <div x-show="open"
                                x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="transform opacity-0 scale-95"
                                x-transition:enter-end="transform opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="transform opacity-100 scale-100"
                                x-transition:leave-end="transform opacity-0 scale-95"
                                class="dropdownNavbar z-10 bg-white absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48" style="display:none;">
                                    <div class="flex flex-col p-2 w-full">
                                        <form action="/logout" method="POST" class="p-1 rounded w-full block">
                                            @csrf
                                            <a class="p-1 rounded w-full block" href="/logout"
                                                onclick="event.preventDefault();this.closest('form').submit();">
                                                Sair
                                            </a>
                                        </form>
                                    </div>
                            </div>
                        </div>
                        <button class="md:hidden rounded-lg focus:outline-none focus:shadow-outline text-white"
                            @click="openPrincipalNav = !openPrincipalNav">
                            <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                                <path x-show="!openPrincipalNav" fill-rule="evenodd"
                                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                                    clip-rule="evenodd"></path>
                                <path x-show="openPrincipalNav" fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                @endauth
                @guest
                    <div class="md:flex md:flex-row">
                        <div class="md:relative md:block hidden md:mr-10" x-data="{ open: false }" @click.away="open = false">
                            <button id="shopCart"  @click="open = !open">
                                <i class="fas fa-shopping-cart text-white fa-lg"></i>
                            </button>
                            <div x-show="open"
                                x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="transform opacity-0 scale-95"
                                x-transition:enter-end="transform opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="transform opacity-100 scale-100"
                                x-transition:leave-end="transform opacity-0 scale-95"
                                class="z-10 bg-white absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48" style="display:none;">
                                    <div class="flex flex-col divide-y divide-gray-400">
                                        <div class="shoppHeader text-center">
                                            <h5 class="p-2"><b>Carrinho</b></h5>
                                        </div>
                                        <div class="shoppBody p-2">
                                            O carrinho está vazio.
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="md:relative md:block hidden" x-data="{ open: false }" @click.away="open = false">
                            <button id="conta" @click="open = !open">
                                <i class="fas fa-user text-white fa-lg"></i>
                            </button>
                            <div x-show="open"
                                x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="transform opacity-0 scale-95"
                                x-transition:enter-end="transform opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="transform opacity-100 scale-100"
                                x-transition:leave-end="transform opacity-0 scale-95"
                                class="dropdownNavbar z-10 bg-white absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48" style="display:none;">
                                    <div class="flex flex-col p-2">
                                        <a class="p-1 rounded" href="/login">Login</a>
                                        <a class="p-1 rounded" href="/register">Criar conta</a>
                                    </div>
                            </div>
                        </div>
                        <button class="md:hidden rounded-lg focus:outline-none focus:shadow-outline text-white"
                            @click="openPrincipalNav = !openPrincipalNav">
                            <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                                <path x-show="!openPrincipalNav" fill-rule="evenodd"
                                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                                    clip-rule="evenodd"></path>
                                <path x-show="openPrincipalNav" fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                @endguest
            </div>
        </nav>
        <div class="bg-green-700 p-3">
            <nav class="container px-5 flex-col flex-grow md:pb-0 md:flex md:justify-around md:flex-row md:mx-auto" id="navbar" 
                :class="{ 'flex': openPrincipalNav, 'hidden': !openPrincipalNav }">
                <div class="my-4 md:m-0 md:hidden" id="search-li">
                    <form class="flex lg:hidden w-full" action="/pesquisa" method="GET">
                        @csrf
                        <label for="search-li" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                        <div class="relative w-full">
                            <input type="search" id="search-li" class="block w-full p-4 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Pesquisar..." required>
                            <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="relative" x-data="{ open: false }" @click.away="open = false">
                    <button id="navbarDropdownMenuLink" @click="open = !open" class="text-gray-200 w-full md:w-auto md:border-0 md:py-0 border-b border-slate-300 py-2">
                        Vestuário <i class="fas fa-caret-down fa-sm"></i>
                    </button>
                    <div x-show="open"
                        x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
                        class="dropdownNavbar z-10 bg-white absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-32" style="display:none;">
                        
                        <div class="flex flex-col p-2">
                            <a class="p-1 rounded" href="/vestuario/chapeu">Chapéus</a>
                            <a class="p-1 rounded" href="/vestuario/oculos">Óculos</a>
                            <a class="p-1 rounded" href="/vestuario/moletom">Moletons</a>
                            <a class="p-1 rounded" href="/vestuario/camisa">Camisas</a>
                        </div>
                    </div>
                </div>
                <div class="relative" x-data="{ open: false }" @click.away="open = false">
                    <button id="navbarDropdownMenuLink1" @click="open = !open" class="text-gray-200 w-full md:w-auto md:border-0 md:py-0 border-b border-slate-300 py-2">
                        Jogos <i class="fas fa-caret-down fa-sm"></i>
                    </button>
                    <div x-show="open"
                        x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
    
                        class="dropdownNavbar z-10 bg-white absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-40" style="display:none;">
                        
                        <div class="flex flex-col p-3">
                            <a class="p-1 rounded" href="/jogos/tabuleiro">Tabuleiros</a>
                            <a class="p-1 rounded" href="/jogos/rpg">RPG</a>
                        </div>
                    </div>
                </div>
                <div class="relative" x-data="{ open: false }" @click.away="open = false">
                    <button id="navbarDropdownMenuLink2" @click="open = !open" class="text-gray-200 w-full md:w-auto md:border-0 md:py-0 border-b border-slate-300 py-2">
                        Colecionáveis <i class="fas fa-caret-down fa-sm"></i>
                    </button>
                    <div x-show="open"
                        x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
    
                        class="dropdownNavbar z-10 bg-white absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-40" style="display:none;">
                        <div class="p-3 flex flex-col">
                            <a class="p-1 rounded" href="/colecionaveis/poster">Pôsters</a>
                            <a class="p-1 rounded" href="/colecionaveis/actionFigure">Action figures</a>
                            <a class="p-1 rounded" href="/colecionaveis/pop">Pop</a>
                            <a class="p-1 rounded" href="/colecionaveis/pelucia">Pelúcias</a>
                            <a class="p-1 rounded" href="/colecionaveis/lego">Lego</a>
                        </div>
                    </div>
                </div>
                <div class="relative" x-data="{ open: false }" @click.away="open = false">
                    <button id="navbarDropdownMenuLink3" @click="open = !open" class="text-gray-200 w-full md:w-auto md:py-0 py-2">
                        Acessórios <i class="fas fa-caret-down fa-sm"></i>
                    </button>
                    <div x-show="open"
                        x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
    
                        class="dropdownNavbar z-10 bg-white absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-40" style="display:none;">
    
                            <div class="flex flex-col p-3">
                                <a class="p-1 rounded" href="/acessorios/mochila">Mochilas</a>
                                <a class="p-1 rounded" href="/acessorios/chaveiro">Chaveiros</a>
                                <a class="p-1 rounded" href="/acessorios/maquiagem">Maquiagem</a>
                                <a class="p-1 rounded" href="/acessorios/bijuteria">Bijuterias</a>
                                <a class="p-1 rounded" href="/acessorios/fones">Fones personalizados</a>
                            </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    
    <main class="xl:container xl:mx-auto bg-slate-200 p-5">

        @yield('content')

    </main>
    <footer class="text-white p-3" style="background-color: #22005f;">
        <div class="lg:container lg:mx-auto lg:px-5 flex justify-between items-center">
            <div>
                <p>Todos os direitos reservados.</p>
            </div>
            <ul class="flex flex-col md:block">
                <li class="md:me-2 mb-2 md:mb-0 md:inline md:float-left">
                    <i class="fab fa-whatsapp fa-lg"></i> +55 (84) 92342-4223
                </li>
                <li class="md:me-2 mb-2 md:mb-0 md:inline md:float-left">
                    <i class="fab fa-facebook fa-lg"></i> <a href="#" class="text-white">facebook.com/2x>y</a>
                </li>
                <li class="md:me-2 md:inline md:float-left">
                    <i class="fab fa-twitter fa-lg"></i> <a href="#" class="text-white">@2x>y</a>
                </li>
            </ul>
        </div>
    </footer>
</body>

<!-- Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="js/owlCarousel/owl.carousel.min.js"></script>
<script src="js/@yield('script').js"></script>

</html>