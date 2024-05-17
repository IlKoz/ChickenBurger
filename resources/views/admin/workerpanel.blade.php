@extends('main.layouts')

@section('title', 'card')

@section('content')
<main>
	<link rel="stylesheet" href="/css/workerpanel.css">
	<div class="container">
		<div>
			<p class="menu">Панель работника</p>
		</div>
		
		<div>
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
		@endforelse
	</div>
	
</main>
@endsection