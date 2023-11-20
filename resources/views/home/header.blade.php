<header class="site-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header-logo">
                        <a href="{{url('/')}}">
                            <img src="homev2/assets2/loguito.png" width="60" height="90" alt="Logo">
                        </a>
                    </div>
                </div>
                <div class="col-lg-10">

<!--------------------------------------------------------- ESTE ES MI NAVBAR ----------------------------------- -->

                    <div class="main-navigation">
                        <button class="menu-toggle"><span></span><span></span></button>
                        <nav class="header-menu">
                            <ul class=" navbar-mini menu food-nav-menu">
                                <li><a href="{{url('/')}}">INICIO</a></li>
                                <li><a href="#about">NOSOTROS</a></li>
                                <li><a href="#menu">ESPECIALIDADES</a></li>
                                <li><a href="#gallery">GALERIA</a></li>
                                <li><a href="#contact">CONTACTO</a></li>
                                <li><a href="{{URL('show_cart')}}">CARRITO</a></li>
                                @if (Route::has('login'))

                                @auth
        
                                <x-app-layout>
        
                                </x-app-layout>
        
                                 @else
        
                                <li class="nav-item">
                                   <a class="btn btn-primary"  href="{{ route('login') }}" id="logincss" >iniciar sesion</a>
                                </li>
                                <li class="nav-item">
                                   <a class="btn btn-success" href="{{ route('register') }}">registrarse</a>
                                </li>
                                @endauth
        
                                @endif
                                
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>