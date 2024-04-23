@extends('main.layouts')

@section('title', 'card')

@section('content')
<main>
	<link rel="stylesheet" href="/css/profile.css">
	<div class="container">
		<div>
			<p class="menu">Профиль</p>
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
				<a class="adminpamell" href="{{ route('adminpanel.index') }}">Админ-панель</a>
			</div>
			@elseif(auth()->user()->role === 'worker')
			<div class="adminpamell-div">
				<a class="adminpamell" href="{{ route('workerpanel.index') }}">Панель-работника</a>
			</div>
			@endif
			@auth
				<form method="POST" action="{{ route('logout') }}">
					@csrf
					<button class="submit" type="submit">Выход</button>
				</form>
			@endauth
		</div>
		<div>
			<p class="menu">Заказы</p>
		</div>
		@forelse ($orders as $order)
			<div class="order">
				<h2>Заказ #{{ $order->id }}</h2>
				<p>Статус: <span class="status @if($order->status === 'Ожидается') expected
						@elseif($order->status === 'Готовится') preparing
						@elseif($order->status === 'Готов') ready
						@elseif($order->status === 'Выдан') taken
						@elseif($order->status === 'Отменен') canceled
						@endif">{{ $order->status }}</span></p>
				<p>Цена: {{ $order->price }} ₽</p>
	
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
		@endforelse
	</div>
	
</main>
@endsection