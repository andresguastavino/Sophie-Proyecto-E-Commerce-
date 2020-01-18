<header>
	<div id="sm-nav">
		<nav class="navbar navbar-expand-md navbar-light bg-light row">
			<div class="col-md-6 header">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
					<i class="fas fa-bars"></i>
				</button>
				<h1><a href="{{ route('home') }}">Sophie</a></h1>
			</div>

			<div class="collapse navbar-collapse" id="navbarContent">
				<div class="div-separacion row"></div>
				<ul>
					@if (Auth::user())
						<li><a class="nav-link" href="{{ route('perfil') }}"><i class="fas fa-user-circle"></i>Ir a mi perfil</a></li>
						<li><a class="nav-link" href="/carrito"><i class="fas fa-shopping-cart"></i>Carrito</a></li>
						<li><a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
							document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i>Cerrar sesion</a></li>

							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
							</form>
					@else
						<li><a class="nav-link" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i>Iniciar sesion</a></li>
						<li><a class="nav-link" href="{{ route('register') }}"><i class="fas fa-user-plus"></i>Registrarme</a></li>
						<li><a class="nav-link" href="/carrito"><i class="fas fa-shopping-cart"></i>Carrito</a></li>
					@endif
				</ul>
				<div class="div-separacion"></div>
				<ul>
					<li><a class="nav-link" href="{{ route('home') }}"><i class="fas fa-home"></i>Home</a></li>
					<li><a class="nav-link" href="{{ route('faq') }}"><i class="fas fa-question"></i>FAQ</a></li>
					<li><a class="nav-link" href="{{ route('contacto') }}"><i class="fas fa-map-marker-alt"></i>Contacto</a></li>
					<li><a class="nav-link" href="/gestor"><i class="fas fa-tools"></i>Gestor</a></li>
				</ul>
			</div>
		</nav>
	</div>

	<div id="lg-nav">
		<div id="top-nav" class="row">
			<div id="titulo" class="col-md-6">
				<h1><a href="{{ route('home') }}">Sophie</a></h1>
			</div>

			<div id="usuario" class="col-md-6">
				<nav role="navigation">
					<ul>
						<div class="row">
							@if (Auth::user())
								<div class="col-md-4">
									<li><a class="nav-link" href="{{ route('perfil') }}"><i class="fas fa-user-circle"></i>Ir a mi perfil</a></li>
								</div>
								<div class="col-md-4">
									<li><a class="nav-link" href="/carrito"><i class="fas fa-shopping-cart"></i>Carrito</a></li>
								</div>
								<div class="col-md-4">
									<li><a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
										document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i>Cerrar sesion</a></li>

									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
										@csrf
									</form>
								</div>
							@else
								<div class="col-md-4">
									<li><a class="nav-link" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i>Iniciar sesion</a></li>
								</div>
								<div class="col-md-4">
									<li><a class="nav-link" href="{{ route('register') }}"><i class="fas fa-user-plus"></i>Registrarme</a></li>
								</div>
								<div class="col-md-4">
									<li><a class="nav-link" href="/carrito"><i class="fas fa-shopping-cart"></i>Carrito</a></li>
								</div>
							@endif
						</div>
					</ul>
				</nav>
			</div>
			<div class="div-separacion col-12"></div>
			<div id="bottom-nav" class="col-12">
				<nav role="navigation">
					<ul class="row">
						<div class="col-md-3">
							<li><a class="nav-link" href="{{ route('home') }}"><i class="fas fa-home"></i>Home</a></li>
						</div>
						<div class="col-md-3">
							<li><a class="nav-link" href="{{ route('faq') }}"><i class="fas fa-question"></i>FAQ</a></li>
						</div>
						<div class="col-md-3">
							<li><a class="nav-link" href="{{ route('contacto') }}"><i class="fas fa-map-marker-alt"></i>Contacto</a></li>
						</div>
						<div class="col-md-3">
							<li><a class="nav-link" href="/gestor"><i class="fas fa-tools"></i>Gestor</a></li>
						</div>
					</ul>
				</nav>
			</div>
		</div>
	</div>
</header>
