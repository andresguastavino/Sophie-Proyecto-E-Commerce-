<header>
	<div id="top-nav">
		<div id="buscar">
			@if (substr(Request::url(),22,4) == 'home')
				<input type="text" name="search" placeholder="Buscar" value="">
				<button type="button" id="search-button">Buscar</button>
			@endif
		</div>
		<div id="titulo">
			<h1><a href="{{ route('home') }}">Sophie</a></h1>
		</div>
		<div id="usuario">
			<nav role="navigation">
				<ul>
					@if (Auth::user())
						<li><a class="nav-link" href="{{ route('perfil') }}">Perfil</a></li>
					@else
						<li><a class="nav-link" href="{{ route('login') }}">Iniciar sesión</a></li>
						<li><a class="nav-link" href="{{ route('register') }}">Registrarme</a></li>
					@endif
					<li><a class="nav-link" href="{{ route('carrito') }}">Carrito</a></li>
					@if (Auth::user())
						<li><a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">Cerrar sesion</a></li>

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
				<li><a class="nav-link" href="{{ route('home') }}">Home</a></li>
				<li><a class="nav-link" href="{{ route('faq') }}">FAQ</a></li>
				<li><a class="nav-link" href="{{ route('contacto') }}">Contacto</a></li>
			</ul>
		</nav>
	</div>
</header>
