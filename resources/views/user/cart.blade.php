@extends('main.layouts')

@section('title', 'card')

@section('content')
<main>
	<link rel="stylesheet" href="/css/cart.css">
	<div>
		<p class="menu">Корзина</p>
	</div>
	<div>
		{{-- Получить $userCart из сессии --}}
		@php
			$userCart = session('user_cart', []);
			$userCartCoupons = session('user_cart_coupons', []);
		@endphp
		
		{{-- Проверить, есть ли товары в корзине --}}
		@if (!empty($userCart))
			<div>
				<p class="menu">Товары:</p>
			</div>
				<div class="tovars">
				@foreach($userCart as $tovarId => $tovarData)
					<div class="cardd" id="{{ $tovarId }}">
						<a href="{{ route('main.show', ['tovar' => $tovarId]) }}" class="a_card">
							<div class="card">
								<div class="card_image"><img src="{{ asset('/storage/tovarimages/' . $tovarData['tovar_image']) }}" alt="tovar" class="tovar"></div>
								<div><p class="tovar_name">{{ $tovarData['tovar_name'] }}</p></div>
								<div class="tovar_info">
									<div class="tovar_info2">
										<p class="cena">{{ $tovarData['tovar_price'] }} ₽</p>
										<p class="cena">Кол-во: {{ $tovarData['tovar_count'] }}</p>
									</div>
									<div class="tovar_info2">
										<form action="{{ route('cart.deleteAll') }}" method="post">
											@csrf
											<input type="hidden" name="tovar_id" value={{ $tovarId }}>
											<input class="in_card" type="submit" value="Удалить всё">
										</form>
										<form action="{{ route('cart.delete') }}" method="post">
											@csrf
											<input type="hidden" name="tovar_id" value={{ $tovarId }}>
											<input class="in_card" type="submit" value="Удалить 1">
										</form>
									</div>
								</div>
							</div>
						</a>
					</div>
				@endforeach
				</div>
		@endif
	
		{{-- Проверить, есть ли купоны в корзине --}}
		@if (!empty($userCartCoupons))
			<div>
				<p class="menu">Купоны:</p>
			</div>
			<div class="tovars">
				@foreach($userCartCoupons as $couponId => $couponData)


				<div class="cardd" id="{{ $couponId }}">
					<a href="{{ route('coupons.show', ['coupon' => $couponId]) }}" class="a_card">
						<div class="card">
							<div class="card_image"><img src="{{ asset('/storage/couponimages/' . $couponData['coupon_image']) }}" alt="tovar" class="tovar"></div>
							<div><p class="tovar_name">{{ $couponData['coupon_name'] }}</p></div>
							<div><p class="tovar_name">{{ $couponData['coupon_description'] }}</p></div>
							<div class="tovar_info">
								<div class="tovar_info2">
									<p class="cena">{{ $couponData['coupon_price'] }} ₽</p>
									<p class="cena">Кол-во: {{ $couponData['coupon_count'] }}</p>
								</div>
								<div class="tovar_info2">
									<form action="{{ route('coupons.deleteAll') }}" method="post">
										@csrf
										<input type="hidden" name="coupon_id" value={{ $couponId }}>
										<input class="in_card" type="submit" value="Удалить всё">
									</form>
									<form action="{{ route('coupons.delete') }}" method="post">
										@csrf
										<input type="hidden" name="coupon_id" value={{ $couponId }}>
										<input class="in_card" type="submit" value="Удалить 1">
									</form>
								</div>
							</div>
						</div>
					</a>
				</div>
				@endforeach
			</div>
		@endif
	
		{{-- Если и товары, и купоны отсутствуют в корзине --}}
		@if (empty($userCart) && empty($userCartCoupons))
			<p>Корзина пуста.</p>
		@endif
		@if (!empty($userCart) || !empty($userCartCoupons))
			@if(session()->has('user_data'))
			<div class="fff">
				<p class="symma">Общая сумма: {{ $totalPrice + $totalPriceCoupons }} ₽</p>
				<div>
					<form action="{{ route('order.create') }}" method="post">
						@csrf
						<input type="hidden" name="user_id" value="{{ session('user_data')['id'] }}">
						<input type="hidden" name="tovars" value="{{ json_encode($userCart) }}">
						<input type="hidden" name="coupons" value="{{ json_encode($userCartCoupons) }}">
						<input type="hidden" name="price" value="{{ $totalPrice + $totalPriceCoupons }}">
						<input class="in_card" type="submit" value="Оформить заказ">
					</form>
				</div>
			</div>
			@else
				<p>Зарегистрируйтесь чтобы оформить заказ!</p>
			@endif
		@endif
	</div>
	
	
</main>
@endsection