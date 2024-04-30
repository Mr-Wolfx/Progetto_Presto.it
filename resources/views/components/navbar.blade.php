<div class="position-relative">
    <div class="navbar navbar-expand-xl ">
        <div class="container-fluid">
            <a class="navbar-brand titolo2" href="{{ route('welcome') }}">PRESTO.IT</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('welcome') }}">Home</a>
                    </li>

                    @auth
                        <li class="nav-item">
                            <a class="nav-link"
                                href="{{ route('article.create') }}">{{ __('ui.Inserisci un annuncio') }}</a>
                        </li>
                    @endauth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('article.index') }}">{{ __('ui.Annunci') }}</a>
                    </li>


                    {{-- Categoria --}}
                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">{{ __('ui.Categorie') }}</a>

                        <ul class="dropdown-menu" style="background: rgb(0, 0, 0);">

                            @foreach ($categories as $category)
                                <li><a class="dropdown-item text-center "
                                        href="{{ route('categoryShow', compact('category')) }}"><b>{{__('ui.'.$category->name) }}</b></a>
                                </li>
                            @endforeach
                        </ul>
                    </li>




                    {{-- Utente/login/register/loguot --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ __('ui.Ciao') }} {{ Auth::user()->name ?? 'Utente' }}
                        </a>
                        <ul class="dropdown-menu" style="background: rgb(0, 0, 0);">
                            @guest
                                <li><a class="dropdown-item text-center" href="{{ route('login') }}"><b>
                                            {{ __('ui.Accedi') }}</b></a></li>
                                <li><a class="dropdown-item text-center"
                                        href="{{ route('register') }}"><b>{{ __('ui.Registrati') }}</b></a></li>
                            @else
                                <li>
                                    {{-- @if (Auth::user()->is_admin)
                                            <li><a class="dropdown-item" href="{{('admin.dashboard')}}">Dashboard</a></li>
                                            @endif --}}
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button class="btn btn-danger w-100" type="submit">Logout</button>
                                    </form>
                                </li>
                                @if (Auth::user()->is_revisor)
                                    <li>
                                        <a class="card-glow4 btn w-100"
                                            href="{{ route('revisor.index') }}">{{ __('ui.Revisore') }}
                                            <span class=" text-danger">
                                                {{ App\Models\Article::toBeRevisionedCount() }}
                                                <span
                                                    class="visually-hidden">{{ __('ui.Articoli non revisionati') }}</span>
                                            </span>
                                        </a>

                                    </li>
                                @endif
                            @endguest
                        </ul>
                    </li>
                </ul>


                {{-- le flag per la selezione della lingua --}}

                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">{{ __('ui.IT') }}</a>

                        <ul class="dropdown-menu card-glow3" style="min-width: 50%;">
                            <li><x-_locale lang="it" nation='it' /></li>
                            <li><x-_locale lang="en" nation='gb' /></li>
                            <li><x-_locale lang="es" nation='es' /></li>
                        </ul>
                    </li>
                </ul>

                {{-- Profilo colori --}}

                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">{{ __('ui.Colori') }}</a>

                        <ul class="dropdown-menu card-glow3" style="max-width: 50%;">

                            <div class="d-flex align-items-center">
                                <button id="profilo1" class="profilo1"></button>
                                <p class="my-2">Alba</p>
                            </div>
                            <div class="d-flex align-items-center">
                                <button id="profilo2" class="profilo2"></button>
                                <p class="my-2">Tramonto</p>
                            </div>
                            <div class="d-flex align-items-center">
                                <button id="profilo3" class="profilo3"></button>
                                <p class="my-2">Sera</p>
                            </div>
                            <div class="d-flex align-items-center">
                                <button id="profilo4" class="profilo4"></button>
                                <p class="my-2">Mezzanotte</p>
                            </div>

                        </ul>
                    </li>
                </ul>

                <script>
                    let body = document.querySelector('body');

                    function saveBackground(color) {
                        localStorage.setItem('backgroundColor', color);
                    }

                    document.addEventListener('DOMContentLoaded', (event) => {
                        const savedColor = localStorage.getItem('backgroundColor');
                        if (savedColor) {
                            body.style.background = savedColor;
                        }
                    });

                    document.addEventListener('DOMContentLoaded', (event) => {
                        const savedColor = localStorage.getItem('backgroundColor');
                        if (savedColor) {
                            body.style.background = savedColor;
                        }
                    });
                    

                    document.querySelector('#profilo1').addEventListener('click', function() {
                        const color = 'linear-gradient(to top,#00cd5c, #00bea8)';
                        body.style.background = color;
                        saveBackground(color);
                        document.querySelector('.img-bg').style.backgroundImage = "url('/img/4-full.jpg')";
                    });
                    document.querySelector('#profilo2').addEventListener('click', function() {
                        const color = 'linear-gradient(to top,#ff0000, #ada700)';
                        body.style.background = color;
                        saveBackground(color);
                        document.querySelector('.img-bg').style.backgroundImage = "url('/img/4-full2.jpg')";
                    });
                    document.querySelector('#profilo3').addEventListener('click', function() {
                        const color = 'linear-gradient(to top,#000acd, #00ff84)';
                        body.style.background = color;
                        saveBackground(color);
                        document.querySelector('.img-bg').style.backgroundImage = "url('/img/4-full3.jpg')";
                    });
                    document.querySelector('#profilo4').addEventListener('click', function() {
                        const color = 'linear-gradient(to top,#210064, #330130)';
                        body.style.background = color;
                        saveBackground(color);
                        document.querySelector('.img-bg').style.backgroundImage = "url('/img/4-full4.jpg')";
                    });
                </script>

                <form action="{{ route('articles.search') }}" method="GET" class="d-flex">
                    <input name="searched" class="form-control me-2"
                        style="background-color: transparent; border: white solid 1px;" type="search"
                        placeholder="{{ __('ui.Cerca') }}" aria-label="search">
                    <button class="btn btn-outline-light" type="submit">{{ __('ui.Cerca') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
