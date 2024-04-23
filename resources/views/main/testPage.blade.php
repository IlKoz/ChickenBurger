@extends('main.layouts')

@section('title', 'Купоны')

@section('content')
	<main>
		<link rel="stylesheet" href="/css/coupons.css">
		<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
		@if(session('success'))
			<div class="alert alert-success">
				{{ session('success') }}
			</div>
		@endif
		<div>
			<p class="menu">Купоны</p>
		</div>
		<div class="tovars">
			@foreach ($coupon as $item)
			<div class="cardd">
				<a href="{{ route('coupons.show', ['coupon' => $item->id]) }}" class="a_card">
					<div class="card">
						<div class="card_image"><img src="{{ asset('/storage/couponimages/' . $item->image) }}" alt="coupon" class="tovar"></div>
						<div><p class="tovar_name">{{ $item->name }}</p></div>
						<div><p class="tovar_description">{{ $item->description }}</p></div>
						<div class="tovar_info">
							<div class="div_cena">
								<p class="cena">{{ $item->price }} ₽</p>
								<p class="old_cena">{{ $item->old_price }} ₽</p>
							</div>
							<form action="{{ route('coupons.create') }}" method="post">
								@csrf
								<input type="hidden" name="coupon_id" value={{ $item->id }}>
								<input type="hidden" name="coupon_count" value=1>
								<input class="in_card" type="submit" value="В корзину">
							</form>
						</div>
					</div>
				</a>
			</div>
			@endforeach
		</div>
	</main>
	<script>
		// Поиск элемента с классом .alert и скрытие его через 3 секунды
		$(document).ready(function() {
			setTimeout(function() {
				$(".alert").fadeOut("slow");
			}, 3000);
		});
	</script>
@endsection