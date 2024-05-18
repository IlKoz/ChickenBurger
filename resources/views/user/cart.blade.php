@extends('main.layouts')

@section('title', 'card')

@section('content')
<main>
	<link rel="stylesheet" href="/css/cart.css">
	<div class="container">
		<div>
			<p class="fs-1 fw-bold mb-1">Корзина</p>
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
					<p class="menu fs-1 fw-bold mb-1">Товары:</p>
				</div>

				<div class="row mb-3 tovars">
					@foreach($userCart as $tovarId => $tovarData)
					<div class="pt-2 pb-2 col-md-3 col-6 d-flex flex-column" id="{{ $tovarId }}">
						<a href="{{ route('main.show', ['tovar' => $tovarId]) }}" class="a_card text-decoration-none">
							<div class="align-items-center m-1 p-4 card-div">
								<div class="card_image text-center"><img src="{{ asset('/storage/tovarimages/' . $tovarData['tovar_image']) }}" alt="tovar" class="tovar" width="100%"></div>
								<div><p class="tovar_name text-center mb-5 fs-5">{{ $tovarData['tovar_name'] }}</p></div>
								<div class="tovar_info">
									<div class="d-flex justify-content-between mb-2">
										<p class="cena m-0 fw-bold fs-4">{{ $tovarData['tovar_price'] }} ₽</p>
										<p class="cena m-0 fw-bold fs-4">Кол-во: {{ $tovarData['tovar_count'] }}</p>
									</div>
									<div class="d-flex justify-content-between">
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

					{{-- <div class="tovars">
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
					</div> --}}
			@endif
		
			{{-- Проверить, есть ли купоны в корзине --}}
			@if (!empty($userCartCoupons))
				<div>
					<p class="menu fs-1 fw-bold mb-1">Купоны:</p>
				</div>

				<div class="row mb-3 tovars">
					@foreach($userCartCoupons as $couponId => $couponData)
					<div class="pt-2 pb-2 col-md-3 col-6 d-flex flex-column" id="{{ $couponId }}">
						<a href="{{ route('coupons.show', ['coupon' => $couponId]) }}" class="a_card text-decoration-none">
							<div class="align-items-center m-1 p-4 card-div">
								<div class="card_image text-center"><img src="{{ asset('/storage/couponimages/' . $couponData['coupon_image']) }}" alt="tovar" class="tovar" width="100%"></div>
								<div><p class="tovar_name text-center mb-5 fs-5">{{ $couponData['coupon_name'] }}</p></div>
								<div><p class="tovar_name text-center mb-5 fs-5">{{ $couponData['coupon_description'] }}</p></div>
								<div class="tovar_info">
									<div class="d-flex justify-content-between mb-2">
										<p class="cena m-0 fw-bold fs-4">{{ $couponData['coupon_price'] }} ₽</p>
										<p class="cena m-0 fw-bold fs-4">Кол-во: {{ $couponData['coupon_count'] }}</p>
									</div>
									<div class="d-flex justify-content-between">
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

				{{-- <div class="tovars">
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
				</div> --}}

			@endif
		
			{{-- Если и товары, и купоны отсутствуют в корзине --}}
			@if (empty($userCart) && empty($userCartCoupons))
				<p>Корзина пуста.</p>
			@endif
			@if (!empty($userCart) || !empty($userCartCoupons))
				@if(session()->has('user_data'))
				<div class="fff">
					<p class="symma fw-bold fs-4">Общая сумма: {{ $totalPrice + $totalPriceCoupons }} ₽</p>
					<div>
						<form action="{{ route('order.create') }}" method="post">
							@csrf
							<input type="hidden" name="user_id" value="{{ session('user_data')['id'] }}">
							<input type="hidden" name="tovars" value="{{ json_encode($userCart) }}">
							<input type="hidden" name="coupons" value="{{ json_encode($userCartCoupons) }}">
							<input type="hidden" name="price" value="{{ $totalPrice + $totalPriceCoupons }}">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="oplata1" id="flexCheckCheckedDisabled" checked disabled>
								<label class="form-check-label" for="flexCheckCheckedDisabled">
								  Оплата при получении заказа
								</label>
							  </div>
							<input class="in_card" type="submit" value="Оформить заказ">
						</form>
					</div>
				</div>
				@else
					<p>Зарегистрируйтесь чтобы оформить заказ!</p>
				@endif
			@endif
		</div>
	</div>
	
	
	
</main>
@endsection