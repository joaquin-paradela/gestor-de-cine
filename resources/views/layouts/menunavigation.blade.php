<nav class="navbar navbar-expand-lg 8 navbar navbar-expand-mg 11 bg-dark opacity-100" data-bs-theme="dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav nav-underline mx-auto">
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="{{ url('/bienvenida') }}">Cartelera</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/contacto') }}">Contacto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/bienvenida') }}"><img id="logo-principal"
                    src="{{ secure_asset('Imagenes/ICONOS/Logo cine png.png') }}" alt="Logo"></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/ayuda') }}">Ayuda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/promociones') }}">Promociones</a>
                </li>
                <li class="nav-item dropdown">
                @auth 
                @if(auth()->user()->rol_id == 2)
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Admin
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('admin.peliculas.index') }}">Peliculas</a>
                        <a class="dropdown-item" href="{{ route('admin.funciones.index') }}">Funciones</a>
                        <a class="dropdown-item" href="{{ route('admin.salas.index') }}">Salas</a>
                        <a class="dropdown-item" href="{{ route('admin.generos.index') }}">Generos</a>
                       
                    </div>
                    @endif
                    @endauth
                </li>
             
                <li class="nav-item">
                    @auth 
                        @if(auth()->user()->rol_id == 1)
                            <a class="nav-link" href="{{ url('/historial') }}">Historial de compra</a>
                        @endif
                    @endauth
                </li>
            </ul>


            <div >
                @if (Route::has('login'))
                    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                        @auth
                           
                        @else
                            <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Ingresar</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Registrarse</a>
                            @endif
                        @endauth
                    </div>
                @endif
          </div>
            <!-- Settings Dropdown -->
            @auth
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('profile.edit') }}">
                            {{ __('Mi perfil') }}
                        </a>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Salir') }}
                            </a>
                        </form>
                    </div>
                </li>
            </ul>
          @endauth
        </div>
    </div>
</nav>


      
     