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
					<div class="pt-2 pb-2 col-md-3 col-6 d-flex" id="{{ $tovarId }}">
						<div class="w-100 d-flex flex-column h-100">
							<div class="a_card text-decoration-none d-flex flex-column h-100">
								<div class="align-items-center m-1 p-4 card-div">
									<div class="card_image text-center">
										<img src="{{ asset('/storage/tovarimages/' . $tovarData['tovar_image']) }}" alt="tovar" class="tovar img-fluid">
									</div>
									<div class="my-2 tovar_name">
										<p class="text-center fs-5 m-0">{{ $tovarData['tovar_name'] }}</p>
									</div>
									<div class="tovar_info p-0">
										<div class="d-flex justify-content-between align-items-center mb-2">
											<p class="cena fw-bold fs-5">Кол-во: {{ $tovarData['tovar_count'] }}</p>
											<p class="cena fw-bold fs-5">{{ $tovarData['tovar_price'] }} ₽</p>
										</div>
										<div class="d-flex justify-content-between">
											<form action="{{ route('cart.deleteAll') }}" method="post" class="me-2">
												@csrf
												<input type="hidden" name="tovar_id" value="{{ $tovarId }}">
												<input class="in_card" type="submit" value="Удалить всё">
											</form>
											<form action="{{ route('cart.delete') }}" method="post">
												@csrf
												<input type="hidden" name="tovar_id" value="{{ $tovarId }}">
												<input class="in_card" type="submit" value="Удалить 1">
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					@endforeach 
				</div>
			@endif
		
			{{-- Проверить, есть ли купоны в корзине --}}
			@if (!empty($userCartCoupons))
				<div>
					<p class="menu fs-1 fw-bold mb-1">Купоны:</p>
				</div>

				<div class="row mb-3 tovars">
					@foreach($userCartCoupons as $couponId => $couponData)
					<div class="pt-2 pb-2 col-md-3 col-12 d-flex flex-column" id="{{ $couponId }}">
						<a href="{{ route('coupons.show', ['coupon' => $couponId]) }}" class="a_card text-decoration-none d-flex flex-column h-100">
							<div class="align-items-center m-1 p-4 card-div">
								<div class="card_image text-center">
									<img src="{{ asset('/storage/couponimages/' . $couponData['coupon_image']) }}" alt="tovar" class="tovar img-fluid">
								</div>
								<div class="my-2 tovar_name">
									<p class="text-center fs-5 m-0">{{ $couponData['coupon_name'] }}</p>
								</div>
								<div class="my-2 tovar_name">
									<p class="text-center fs-5 m-0">{{ $couponData['coupon_description'] }}</p>
								</div>
								<div class="tovar_info p-0">
									<div class="d-flex justify-content-between align-items-center mb-2">
										<p class="cena fw-bold fs-5">{{ $couponData['coupon_price'] }} ₽</p>
										<p class="cena fw-bold fs-5">Кол-во: {{ $couponData['coupon_count'] }}</p>
									</div>
									<div class="d-flex justify-content-between">
										<form action="{{ route('coupons.deleteAll') }}" method="post" class="me-2">
											@csrf
											<input type="hidden" name="coupon_id" value="{{ $couponId }}">
											<input class="in_card" type="submit" value="Удалить всё">
										</form>
										<form action="{{ route('coupons.delete') }}" method="post">
											@csrf
											<input type="hidden" name="coupon_id" value="{{ $couponId }}">
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
					<p class="symma fw-bold fs-4 m-0">Общая сумма: {{ $totalPrice + $totalPriceCoupons }} ₽</p>
					<div class="form_oformit">
						<form action="{{ route('order.create') }}" method="post">
							@csrf
							<input type="hidden" name="user_id" value="{{ session('user_data')['id'] }}">
							<input type="hidden" name="tovars" value="{{ json_encode($userCart) }}">
							<input type="hidden" name="coupons" value="{{ json_encode($userCartCoupons) }}">
							<input type="hidden" name="price" value="{{ $totalPrice + $totalPriceCoupons }}">
							<div class="form-group col-4">
								<label for="restourant" class="fw-bold fs-4 mt-1">Выберите ресторан:</label>
								<select name="restourant" id="restourant" class="form-select mb-3" aria-label="Default select example">
									@foreach($restourants as $restourant)
										<option value="{{ $restourant->id }}">{{ $restourant->address }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-check mb-3">
								<input class="form-check-input" type="checkbox" value="oplata1" id="flexCheckCheckedDisabled" checked disabled>
								<label class="form-check-label" for="flexCheckCheckedDisabled">
								  Оплата при получении заказа
								</label>
							  </div>
							<input class="in_card oformit" type="submit" value="Оформить заказ">
						</form>
					</div>
				</div>
				@else
					<p class="fw-bold fs-2">Зарегистрируйтесь чтобы оформить заказ!</p>
				@endif
			@endif
		</div>
	</div>
	
	
	
</main>
@endsection