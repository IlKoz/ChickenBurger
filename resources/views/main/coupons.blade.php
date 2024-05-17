@extends('main.layouts')

@section('title', 'Купоны')

@section('content')
	<main>
		<link rel="stylesheet" href="/css/coupons.css">
		<div class="container">
			@if(session('success'))
				<div class="alert alert-success">
					{{ session('success') }}
				</div>
			@endif
			<div>
				<p class="menu fs-1 fw-bold mb-1">Купоны</p>
			</div>
			<div class="row mb-3 tovars">
				@foreach ($coupon as $item)
				<div class="pt-2 pb-2 col-md-4 col-12 d-flex flex-column">
					<a href="{{ route('coupons.show', ['coupon' => $item->id]) }}" class="text-decoration-none">
						<div class="align-items-center m-1 p-4 card-div hover-zoom">
							<div class="card_image text-center"><img src="{{ asset('/storage/couponimages/' . $item->image) }}" alt="coupon" class="tovar" width="100%"></div>
							<div><p class="tovar_name text-center mb-5 fs-5">{{ $item->name }}</p></div>
							<div><p class="tovar_description text-center mb-5 fs-5">{{ $item->description }}</p></div>
							<div class="tovar_info d-flex justify-content-between">
								<div class="div_cena d-flex align-items-center">
									<p class="cena fw-bold fs-4 me-1">{{ $item->price }} ₽</p>
									<p class="old_cena text-decoration-line-through fs-6">{{ $item->old_price }} ₽</p>
								</div>
								<form action="{{ route('coupons.create') }}" method="post">
									@csrf
									<input type="hidden" name="coupon_id" value={{ $item->id }}>
									<input type="hidden" name="coupon_count" value=1>
									<input class="in_card fw-bolder" type="submit" value="В корзину">
								</form>
							</div>
						</div>
					</a>
				</div>
				@endforeach
			</div>
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
	@if(session('scrollTo'))
	<script>
		   // Прокрутка к элементу с указанным идентификатором
		   var element = document.getElementById('{{ session('scrollTo') }}');
		if (element) {
			element.scrollIntoView({ behavior: 'smooth', block: 'start' });
		}
	</script>
	@endif
@endsection