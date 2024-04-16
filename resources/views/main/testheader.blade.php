<header class="sticky-top p-1">
	<div class="container">
		<div class="d-flex flex-wrap mb-2 justify-content-between desctop">
			{{-- Левая часть хедера --}}
			<div class="d-flex align-items-center header_div">
				{{-- Лого и название --}}
				<div class="d-flex align-items-center">
					<a href="{{ route('main.index') }}" class="a_logo d-flex align-items-center">
						<img src="/image/icon.png" alt="logo" class="logo me-2" width="40px">
						<h1 class="me-5 mb-0 company_name">Chicken Burger</h1>
					</a>
				</div>
                <!-- Список ссылок -->
                <ul class="nav nav-pills nav-links d-none d-lg-flex">
                    <li class="nav-item me-5 fs-5"><a href="{{ route('main.index') }}#menu" class="nav_bar">Меню</a></li>
                    <li class="nav-item me-5 fs-5"><a href="{{ route('coupons.index') }}" class="nav_bar">Купоны</a></li>
                    <li class="nav-item me-5 fs-5"><a href="{{ route('main.promo') }}" class="nav_bar">Акции</a></li>
                    <li class="nav-item me-5 fs-5"><a href="{{ route('main.map') }}" class="nav_bar">Рестораны</a></li>
                </ul>
			</div>
			<!-- Иконка бургер-меню -->
			<div class="burger-menu align-items-center d-lg-none m-0 d-flex">
				{{-- Кнопка бургер-меню --}}
				<button type="button" class="btn p-0" id="burgerButton">
					<img src="/image/burger_menu.png" alt="Burger Menu" class="burger-icon" width="50px">
				</button>
				<!-- бургер-меню -->
				<div id="Bmenu" class="Bmenu">
					<div class="d-flex align-items-end flex-column me-4 Bmenu2">
						<button type="button" class="btn p-0 mt-3 mb-3" id="burgerButton2">
							<img src="/image/burger_menu.png" alt="Burger Menu" class="burger-icon" width="50px">
						</button>
						<ul class="nav nav-pills nav-links-mobile d-lg-none">
							<li class="nav-item fs-5">
								<a href="{{ route('cart.show') }}" class="d-flex align-items-center">
									<img src="/image/cart_white.png" alt="" width="32px" height="32px" class="me-2">
									<p class="nav_bar korzina_p m-0">Корзина</p>
								</a>
							</li>
							{{-- Если пользователь авторизован, отобразить ссылку на профиль --}}
							@if(auth()->check())
							<li class="nav-item fs-5">
								<a href="{{ route('dashboard') }}" class="d-flex align-items-center">
									<img src="/image/profile_white.png" alt="" width="32px" height="32px" class="me-2">
									<p class="nav_bar profile_p m-0">Профиль</p>
								</a>
							</li>
							@else
							<li class="nav-item fs-5">
								<a href="{{ route('login') }}" class="d-flex align-items-center">
									<img src="/image/profile_white.png" alt="" width="32px" height="32px" class="me-2">
									<p class="nav_bar login_p m-0">Профиль</p>
								</a>
							</li>
							@endif
							<li class="nav-item fs-5"><a href="{{ route('main.index') }}#menu" class="nav_bar">Меню</a></li>
							<li class="nav-item fs-5"><a href="{{ route('coupons.index') }}" class="nav_bar">Купоны</a></li>
							<li class="nav-item fs-5"><a href="{{ route('main.promo') }}" class="nav_bar">Акции</a></li>
							<li class="nav-item fs-5"><a href="{{ route('main.map') }}" class="nav_bar">Рестораны</a></li>
						</ul>
					</div>
					<div>
						<div class="d-flex justify-content-center mb-2">
							<a href="{{ route('main.index') }}" class="a_logo d-flex align-items-center">
								<img src="/image/icon.png" alt="logo" class="logo me-2" width="40px">
								<h1 class="mb-0 company_name">Chicken Burger</h1>
							</a>
						</div>
						<div class="d-flex justify-content-center mb-2">
							<p>© «Chicken Burger», 2024. Все права защищены.</p>
						</div>
					</div>
				</div>
			</div>
			<div class="d-flex align-items-center d-none d-lg-flex btns">
				<ul class="nav nav-pills">
					<li class="nav-item align-items-center me-5 fs-5">
						<a href="{{ route('cart.show') }}" class="d-flex align-items-center qwe">
							<img src="/image/cart_white.png" alt="" width="20px" height="20px" class="me-1">
							<p class="nav_bar korzina_p m-0">Корзина</p>
						</a>
					</li>
					{{-- Если пользователь авторизован, отобразить ссылку на профиль --}}
					@if(auth()->check())
					<li class="nav-item align-items-center me-5 fs-5">
						<a href="{{ route('dashboard') }}" class="d-flex align-items-center qwe">
							<img src="/image/profile_white.png" alt="" width="20px" height="20px" class="me-1">
							<p class="nav_bar profile_p m-0">Профиль</p>
						</a>
					</li>
					@else
					<li class="nav-item align-items-center fs-5">
						<a href="{{ route('login') }}" class="d-flex align-items-center qwe">
							<img src="/image/profile_white.png" alt="" width="20px" height="20px" class="me-1">
							<p class="nav_bar login_p m-0">Профиль</p>
						</a>
					</li>
					@endif
				</ul>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>
		// Дождемся полной загрузки документа
		$(document).ready(function() {
			// Скрываем список ссылок для мобильных устройств при загрузке страницы
			$('.nav-links-mobile').hide();

			// Добавляем обработчик события клика на иконку бургер-меню
			$('.burger-icon').click(function(event) {
				// Переключаем видимость списка ссылок для мобильных устройств
				$('.nav-links-mobile').slideToggle();
			});
		});


		// Открытие/закрытие бургер-меню
		$(document).ready(function(){
        	// При нажатии на кнопку бургера
			$("#burgerButton").click(function(){
				// Отображаем или скрываем меню
				$("#Bmenu").toggle();
			});
			// При нажатии на кнопку бургера2
			$("#burgerButton2").click(function(){
				// Отображаем или скрываем меню
				$("#Bmenu").toggle();
			});
		});

	</script>
</header>