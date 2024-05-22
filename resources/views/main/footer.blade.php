<footer>
	<div class="container">
		<hr>
		<div class="footer_content">
			<div class="d-flex justify-content-center">
				<a href="{{ route('main.index') }}" class="a_logo d-flex align-items-center mb-3">
					<img src="/image/icon.png" alt="logo" class="logo me-2" width="40px">
					<h1 class="m-0 chick_foot">Chicken Burger</h1>
				</a>
			</div>
			<div class="row mb-3">
				<div class="p-2 col-md-3 col-6 d-flex flex-column text-center">
					<h5>Компания</h5>
					<a href="#"><span class="underline-one text-black">О нас</span></a>
					<a href="{{ route('main.map') }}"><span class="underline-one text-black">Мы на карте</span></a>
					<a href="#"><span class="underline-one text-black">Работа у нас</span></a>
				</div>
				<div class="p-2 col-md-3 col-6 d-flex flex-column text-center">
					<h5>Клиентам</h5>
					<a href="{{ route('main.index') }}#menu"><span class="underline-one text-black">Меню</span></a>
					<a href="{{ route('main.promo') }}"><span class="underline-one text-black">Акции</span></a>
					<a href="{{ route('coupons.index') }}"><span class="underline-one text-black">Купоны</span></a>
				</div>
				<div class="p-2 col-md-3 col-6 d-flex flex-column text-center">
					<h5>Мы рядом</h5>
					<a href="#" class="d-flex align-items-center justify-content-center">
						<span class="d-flex align-items-center justify-content-center underline-one text-black">
							<img src="/image/imgvk.png" alt="" width="16px" class="me-1 align-self-center">
							<p class="m-0 align-self-center">Вконтакте</p>
						</span>
					</a>
					<a href="#" class="d-flex align-items-center justify-content-center">
						<span class="d-flex align-items-center justify-content-center underline-one text-black">
							<img src="/image/imgtg.png" alt="" width="16px" class="me-1 align-self-center">
							<p class="m-0 align-self-center">Телеграм</p>
						</span>
					</a>
				</div>
				<div class="p-2 col-md-3 col-6 d-flex flex-column text-center">
					<h5>Контакты</h5>
					<a href="#" class="align-items-center justify-content-center">
						<div class="d-flex align-items-center justify-content-center">
							<img src="/image/imgemail.png" alt="" width="16px" class="me-1 align-self-center">
							<p class="m-0 align-self-center">Почта:</p>
						</div>
						<p class="m-0">ilia.kozlov.y@mail.ru</p>
					</a>
					<a href="#" class="align-items-center justify-content-center">
						<div class="d-flex align-items-center justify-content-center">
							<img src="/image/imgphone.png" alt="" width="16px" class="me-1 align-self-center">
							<p class="m-0 align-self-center">Телефон:</p>
						</div>
						<p class="m-0">+7 (960) 759-74-46</p>
					</a>
				</div>
			</div>

			<div class="d-flex justify-content-center">
				<p>© «Chicken Burger», 2024. Все права защищены.</p>
			</div>
		</div>
	</div>
	<style>
        .bottom-nav {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #fff;
            border-top: 1px solid #ddd;
            z-index: 1000;
        }
        .bottom-nav .nav-link {
            color: #000;
            text-align: center;
            padding: 10px 0;
        }
        .bottom-nav .nav-link:hover {
            background-color: #f8f9fa;
        }
    </style>
	<!-- Bottom Navigation Bar -->
<nav class="bottom-nav d-block d-md-none">
    <div class="container-fluid">
        <div class="row no-gutters">
            <div class="col">
                <a href="{{ route('main.index') }}#menu" class="nav-link">
					<i class="fa fa-utensils"></i>
                    <span>Меню</span>
                </a>
            </div>
            <div class="col">
                <a href="{{ route('main.promo') }}" class="nav-link">
                    <i class="fa fa-tags"></i>
                    <span>Акции</span>
                </a>
            </div>
            <div class="col">
                <a href="{{ route('cart.show') }}" class="nav-link">
                    <i class="fa fa-shopping-cart"></i>
                    <span>Корзина</span>
                </a>
            </div>
			<div class="col">
                <a href="{{ route('coupons.index') }}" class="nav-link">
					<i class="fa fa-ticket-alt"></i>
                    <span>Купоны</span>
                </a>
            </div>
            <div class="col">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <i class="fa fa-user"></i>
                    <span>Профиль</span>
                </a>
            </div>
            
        </div>
    </div>
</nav>
</footer>