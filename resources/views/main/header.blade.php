<header>
	<link rel="stylesheet" href="/css/header.css">
	<a href="{{ route('main.index') }}" class="a_logo"><img src="/image/icon.png" alt="logo" class="logo"></a>
	<nav class="nav_links1">
		<ul>
			<li><a href="{{ route('main.index') }}#menu" class="nav_bar">Меню</a></li>
			<li><a href="{{ route('coupons.index') }}" class="nav_bar">Купоны</a></li>
			<li><a href="{{ route('main.promo') }}" class="nav_bar">Акции</a></li>
			<li><a href="{{ route('main.map') }}" class="nav_bar">Рестораны</a></li>
		</ul>
	</nav>
	<nav class="nav_links2">
		<ul>
			<li><a href="{{ route('cart.show') }}" class="nav_bar">Корзина</a></li>
			{{-- Если пользователь авторизован, отобразить ссылку на профиль --}}
			@if(auth()->check())
			<li><a href="{{ route('dashboard') }}" class="nav_bar">Профиль</a></li>
			@else
			{{-- Если пользователь не авторизован, отобразить ссылку на вход --}}
			<li><a href="{{ route('login') }}" class="nav_bar">Войти</a></li>
			@endif
		</ul>
	</nav>
</header>