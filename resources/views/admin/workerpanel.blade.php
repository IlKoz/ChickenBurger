@extends('main.layouts')

@section('title', 'card')

@section('content')
<main>
	<link rel="stylesheet" href="/css/workerpanel.css">
	<div class="container">
		<div>
			<p class="fw-bold fs-1">Панель работника</p>
		</div>
		
		<div>
			<p class="menu fs-1 fw-bold mb-1">Заказы</p>
			<h2><span class="fw-bold fs-4">Адрес: </span> <span class="fs-4">{{ auth()->user()->restourant->address }}</span></h2>
		</div>
		@forelse ($orders as $order)
			<div class="order">
				<h2>Заказ #{{ $order->id }}</h2>
				<div class="">
					<form action="{{ route('workerpanel.update', ['order' => $order->id]) }}" method="post">
						@csrf
						@method('patch')
						@php
							$nextStatus = '';
							$buttonClass = '';
					
							if ($order->status === 'Ожидается') {
								$nextStatus = 'Готовится';
								$buttonClass = 'btn-warning text-white';
							} elseif ($order->status === 'Готовится') {
								$nextStatus = 'Готов';
								$buttonClass = 'btn-success text-white';
							} elseif ($order->status === 'Готов') {
								$nextStatus = 'Выдан';
								$buttonClass = 'btn-info text-white';
							}
						@endphp
						<input name="status" type="hidden" value="{{ $nextStatus }}">
						<input class="submit btn {{ $buttonClass }}" type="submit" value="{{ $nextStatus }}">
					</form>
					
				</div>
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
	
				<p><span class="fw-bold fs-4">Дата заказа: </span> <span class="fs-4">{{ $order->created_at->diffForHumans() }}</span></p>
			</div>
		@empty
			<div>
				<p class="">Здесь будут отображаться заказы, но пока их нет :(</p>
			</div>
		@endforelse


		{{-- <div>
			<p class="menu">Заказы</p>
		</div>
		@forelse ($orders as $order)
			<div class="order">
				<div class="top">
					<div>
						<h2>Заказ #{{ $order->id }}</h2>
						<p>Статус: <span class="status @if($order->status === 'Ожидается') expected
								@elseif($order->status === 'Готовится') preparing
								@elseif($order->status === 'Готов') ready
								@elseif($order->status === 'Выдан') taken
								@elseif($order->status === 'Отменен') canceled
								@endif">{{ $order->status }}</span></p>
						<p>Цена: {{ $order->price }} ₽</p>
					</div>
					<div class="sprava">
						<form action="{{ route('workerpanel.update', ['order' => $order->id]) }}" method="post">
							@csrf
							@method('patch')
							<input name="status" type="hidden" value="@if($order->status === 'Ожидается') Готовится
							@elseif($order->status === 'Готовится') Готов
							@elseif($order->status === 'Готов') Выдан
							@endif">
							<input class="submit" type="submit" value="@if($order->status === 'Ожидается') Готовится
							@elseif($order->status === 'Готовится') Готов
							@elseif($order->status === 'Готов') Выдан
							@endif">
						</form>
					</div>
				</div>
				
	
				@if (!empty($order->tovars))
					<h3>Товары:</h3>
					@foreach (json_decode($order->tovars, true) as $tovar)
					<div class="tovar">
						<div class="tovar_images">
							<img src="{{ asset('/storage/tovarimages/' . $tovar['tovar_image']) }}" alt="Товар" class="tovar-image">
						</div>
						<div class="tovar_info">
							<p>{{ $tovar['tovar_name'] }}</p>
							<p>Количество: {{ $tovar['tovar_count'] }}</p>
							<p>Цена: {{ $tovar['tovar_price'] }} ₽</p>
						</div>
					</div>
					@endforeach
				@endif
	
				@if (!empty($order->coupons))
					<h3>Купоны:</h3>
					@foreach (json_decode($order->coupons, true) as $coupon)
					<div class="tovar">
						<div class="tovar_images">
							<img src="{{ asset('/storage/couponimages/' . $coupon['coupon_image']) }}" alt="coupon" class="tovar-image">
						</div>
						<div class="tovar_info">
							<p>{{ $coupon['coupon_name'] }}</p>
							<p>Описание: {{ $coupon['coupon_description'] }}</p>
							<p>Количество: {{ $coupon['coupon_count'] }}</p>
							<p>Цена: {{ $coupon['coupon_price'] }} ₽</p>
						</div>
					</div>
					@endforeach
				@endif
	
				<p>Дата заказа: {{ $order->created_at }}</p>
			</div>
		@empty
			<div>
				<p class="">Здесь будут отображаться ваши заказы, но пока их нет :(</p>
			</div>
		@endforelse --}}
	</div>
	
</main>
@endsection