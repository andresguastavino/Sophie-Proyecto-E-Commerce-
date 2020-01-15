<header>
	<div id="top-nav">
		<div id="buscar">
			@if (strpos(Route::currentRouteName(), 'home') !== false)
				<div id="label-buscar">
					<label for="search"><i class="fas fa-search"></i></label>
				</div>
				<div id="input-buscar">
					<input type="text" name="search" id="search" placeholder="Buscar por nombre" onfocus="this.setAttribute('placeholder', '')" onblur="if(this.value == '') this.setAttribute('placeholder', 'Buscar por nombre')" value="">
				</div>
			@endif
		</div>
		<div id="titulo">
			<h1><a href="{{ route('home') }}">Sophie</a></h1>
		</div>
		<div id="usuario">
			<nav role="navigation">
				<ul>
					@if (Auth::user())
						<li><a class="nav-link" href="{{ route('perfil') }}"><i class="fas fa-user-circle"></i>Mi Perfil</a></li>
					@else
						<li><a class="nav-link" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i>Iniciar sesión</a></li>
						<li><a class="nav-link" href="{{ route('register') }}"><i class="fas fa-user-plus"></i>Registrarme</a></li>
					@endif
					<li><a class="nav-link" href="/carrito"><i class="fas fa-shopping-cart"></i>Carrito</a></li>
					@if (Auth::user())
						<li><a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i>Cerrar sesion</a></li>

						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
					@endif
				</ul>
			</nav>
		</div>
	</div>
	<div class="div-separacion"></div>
	<div id="bottom-nav">
		<nav role="navigation">
			<ul>
				<li><a class="nav-link" href="{{ route('home') }}"><i class="fas fa-home"></i>Home</a></li>
				<li><a class="nav-link" href="{{ route('faq') }}"><i class="fas fa-question"></i>FAQ</a></li>
				<li><a class="nav-link" href="{{ route('contacto') }}"><i class="fas fa-map-marker-alt"></i>Contacto</a></li>
			</ul>
		</nav>
	</div>
</header>
