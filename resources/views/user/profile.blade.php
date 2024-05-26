@extends('main.layouts')

@section('title', 'card')

@section('content')
<main>
	<link rel="stylesheet" href="/css/profile.css">
	<div class="container">
		<div>
			<p class="menu fs-1 fw-bold mb-1">Профиль</p>
		</div>
		<div class="info">
			@if(session()->has('user_data'))
			<div>
				<p class="name">Имя: {{ session('user_data')['name'] }}</p>
				<p class="name">Почта: {{ session('user_data')['email'] }}</p>
			</div>
			<div>
	
			</div>
			@endif
			@if(auth()->user()->role === 'admin')
			<div class="adminpamell-div">
				<a class="adminpamell p-1 ps-3 pe-3 fw-bold hover-zoom text-decoration-none text-white" href="{{ route('adminpanel.index') }}">Админ-панель</a>
			</div>
			@elseif(auth()->user()->role === 'worker')
			<div class="adminpamell-div">
				<a class="adminpamell p-1 ps-3 pe-3 fw-bold text-decoration-none text-white hover-zoom" href="{{ route('workerpanel.index') }}">Панель-работника</a>
			</div>
			@endif
			@auth
				<form method="POST" action="{{ route('logout') }}">
					@csrf
					<button class="submit p-1 ps-3 pe-3 fw-bold hover-zoom exit_btn" type="submit">Выход</button>
				</form>
			@endauth
		</div>
		<div>
			<p class="menu fs-1 fw-bold mb-1">Заказы</p>
		</div>
		@forelse ($orders as $order)
			<div class="order">
				<h2>Заказ #{{ $order->id }}</h2>
				<p><span class="fw-bold fs-4">Статус: </span><span class="status fs-4 @if($order->status === 'Ожидается') expected
						@elseif($order->status === 'Готовится') preparing
						@elseif($order->status === 'Готов') ready
						@elseif($order->status === 'Выдан') taken
						@elseif($order->status === 'Отменен') canceled
						@endif">{{ $order->status }}</span></p>
				<p><span class="fw-bold fs-4">Цена: </span><span class="fs-4">{{ $order->price }} ₽</span></p>
				@php
					$tovars = json_decode($order->tovars, true);
				@endphp

				@if (!empty($tovars))
					<h3>Товары:</h3>
					<div class="row mb-3 tovars">
						@foreach (json_decode($order->tovars, true) as $tovar)
							<div class="pt-2 pb-2 col-md-3 col-6 d-flex" id="{{ $tovar['tovar_id'] }}">
								<div class="w-100 d-flex flex-column h-100">
									<a href="{{ route('main.show', ['tovar' => $tovar['tovar_id']]) }}" class="a_card text-decoration-none d-flex flex-column h-100">
										<div class="m-1 p-4 card-div hover-zoom d-flex flex-column h-100">
											<div class="card_image text-center mb-2">
												<img src="{{ asset('/storage/tovarimages/' . $tovar['tovar_image']) }}" alt="tovar" class="tovar img-fluid">
											</div>
											<div class="d-flex flex-column flex-grow-1">
												<p class="tovar_name text-center fs-5">{{ $tovar['tovar_name'] }}</p>
											</div>
											<div class="tovar_info d-flex justify-content-between align-items-center mt-auto">
												<p class="cena m-0 fw-bold fs-4">{{ $tovar['tovar_price'] }} ₽</p>
												<form action="{{ route('cart.create') }}" method="post" id="addToCartForm" class="d-flex flex-column justify-content-center align-items-center">
													@csrf
													<input type="hidden" name="tovar_id" value="{{ $tovar['tovar_id'] }}">
													<input type="hidden" name="tovar_count" value="1">
													<input class="in_card fw-bolder addToCartButton desktop" type="submit" value="В корзину" id="addToCartButton">
													<input class="in_card fw-bolder addToCartButtonMobile mobile ps-2 pe-2" type="submit" value="+" id="addToCartButton">
												</form>
											</div>
										</div>
									</a>
								</div>
							</div>
						@endforeach
					</div>
					
				@endif
	
				@php
					$coupons = json_decode($order->coupons, true);
				@endphp

				@if (!empty($coupons))
					<h3>Купоны:</h3>
					<div class="row mb-3 tovars">

					@foreach (json_decode($order->coupons, true) as $coupon)

						<div class="pt-2 pb-2 col-md-4 col-12 d-flex flex-column">
							<a href="{{ route('coupons.show', ['coupon' => $coupon['coupon_id']]) }}" class="text-decoration-none">
								<div class="align-items-center m-1 p-4 card-div hover-zoom-c">
									<div class="card_image text-center"><img src="{{ asset('/storage/couponimages/' .$coupon['coupon_image']) }}" alt="coupon" class="tovar" width="100%"></div>
									<div><p class="tovar_name text-center fs-5">{{ $coupon['coupon_name'] }}</p></div>
									<div><p class="tovar_description text-center fs-5">{{ $coupon['coupon_description'] }}</p></div>
									<div class="tovar_info d-flex justify-content-between">
										<div class="div_cena d-flex align-items-center me-5">
											<p class="cena fw-bold fs-4 me-1 m-0">{{ $coupon['coupon_price'] }} ₽</p>
										</div>
										<div class="ms-5">
											<form action="{{ route('coupons.create') }}" method="post">
												@csrf
												<input type="hidden" name="coupon_id" value={{ $coupon['coupon_id'] }}>
												<input type="hidden" name="coupon_count" value=1>
												<input class="in_card fw-bolder" type="submit" value="В корзину">
											</form>
										</div>
										
									</div>
								</div>
							</a>
						</div>
						@endforeach
					</div>
				@endif
	
				<p><span class="fw-bold fs-4">Адрес заказа: </span> <span class="fs-4">{{ $order->restourant->address }}</span></p>
				<p><span class="fw-bold fs-4">Дата заказа: </span> <span class="fs-4">{{ $order->created_at->diffForHumans() }}</span></p>
			</div>
		@empty
			<div>
				<p class="">Здесь будут отображаться ваши заказы, но пока их нет :(</p>
			</div>
		@endforelse
	</div>
	
</main>
@endsection