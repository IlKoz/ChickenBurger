@extends('main.layouts')

@section('title', 'CouponsCard')

@section('content')
<main>
	<link rel="stylesheet" href="/css/couponsCard.css">
	
	
	<div class="container">
		<style>
			.alert{
				z-index: 1050;
			}
			.alert {
    padding: 15px;
    margin-bottom: 20px;
    border: 1px solid transparent;
    border-radius: 4px;
	position: fixed;
	width: 69%;
}
@media (max-width: 768px) {
    .alert {
        width: 93%;
    }
}

.alert-success {
    color: #155724;
    background-color: #d4edda;
    border-color: #c3e6cb;
}

.alert-success a {
    color: #0c662e;
    text-decoration: underline;
}

.alert-success a:hover {
    color: #08401e;
}
		</style>
		@if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
   		@endif
		<div>
			<p class="menuu m-0" id="menu">Купон</p>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-12">
					<div class="card_image">
						<img class="tovar border rounded img-fluid" src="{{ asset('/storage/couponimages/' . $coupon->image) }}" alt="tovar">
					</div>
				</div>
				<div class="col-md-9 col-12">
					<div class="card_info">
						<p class="p1">{{ $coupon->name }}</p>
						<p class="p2">Цена: {{ $coupon->price }} ₽</p>
						<p class="p3">Состав: {{ $coupon->description }}</p>
						<div class="niz">
							<div>
								<form action="{{ route('coupons.create') }}" method="post">
									@csrf
									<div class="quantity_inner me-2">
										<button type="button" class="bt_minus">
											<svg viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"></line></svg>
										</button>
										<input name="coupon_count" type="text" value="1" size="2" class="quantity" data-max-count="99" />
										<button type="button" class="bt_plus">
											<svg viewBox="0 0 24 24"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
										</button>
									</div>
									<input type="hidden" name="coupon_id" value="{{ $coupon->id }}">
									<input class="in_card hover-zoom" type="submit" value="В корзину">
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div>
			<p class="Sostoitiz">Состоит из:</p>
		</div>
<style>

	
	.card-div {
    display: flex;
    flex-direction: column;
    height: 100%;
    justify-content: space-between;
}

.card_image {
    position: relative;
    width: 100%;
    padding-top: 75%; /* Соотношение сторон 4:3 */
}

.card_image img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: contain;
}

.tovar_name {
    flex-grow: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
}

.tovar_info {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: auto;
}
</style>

<div class="row mb-3 tovars">
	@foreach ($coupon->tovars as $item)
	<div class="pt-2 pb-2 col-md-3 col-6 d-flex" id="{{ $item->id }}">
		<div class="w-100 d-flex flex-column h-100">
			<a href="{{ route('main.show', ['tovar' => $item->id]) }}" class="a_card text-decoration-none d-flex flex-column h-100">
				<div class=" m-1 p-4 card-div hover-zoom d-flex flex-column h-100">
					<div class="card_image text-center mb-2 d-flex justify-content-center">
						<img src="{{ asset('/storage/tovarimages/' . $item->image) }}" alt="tovar" class="tovar img-fluid">
					</div>
					<div class="d-flex flex-column flex-grow-1">
						<p class="tovar_name text-center fs-5">{{ $item->name }}</p>
					</div>
					<div class="tovar_info d-flex justify-content-between align-items-center mt-auto">
						<p class="cena m-0 fw-bold fs-4">{{ $item->price }} ₽</p>
						<form action="{{ route('cart.create') }}" method="post" id="addToCartForm" class="d-flex flex-column justify-content-start align-items-center">
							@csrf
							<input type="hidden" name="tovar_id" value="{{ $item->id }}">
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


		{{-- <div class="row mb-3 tovars">
			@foreach ($coupon->tovars as $item)
			<div class="pt-2 pb-2 col-md-3 col-6 d-flex flex-column" id="{{ $item->id }}">
				<a href="{{ route('main.show', ['tovar' => $item->id]) }}" class="a_card text-decoration-none">
					<div class="align-items-center m-1 p-4 card-div hover-zoom">
						<div class="card_image text-center"><img src="{{ asset('/storage/tovarimages/' . $item->image) }}" alt="tovar" class="tovar" width="100%"></div>
						<div><p class="tovar_name text-center mb-5 fs-5">{{ $item->name }}</p></div>
						<div class="tovar_info d-flex justify-content-between">
							<p class="cena m-0 fw-bold fs-4">{{ $item->price }} ₽</p>
							<form action="{{ route('cart.create') }}" method="post" id="addToCartForm" class="d-flex flex-column justify-content-center align-items-center">
								@csrf
								<input type="hidden" name="tovar_id" value={{ $item->id }}>
								<input type="hidden" name="tovar_count" value=1>
								<input class="in_card fw-bolder addToCartButton desktop" type="submit" value="В корзину" id="addToCartButton">
								<input class="in_card fw-bolder addToCartButtonMobile mobile ps-2 pe-2" type="submit" value="+" id="addToCartButton">
							</form>
						</div>
					</div>
				</a>
			</div>
			@endforeach 
		</div> --}}

		{{-- <div class="tovars2">
		@foreach ($coupon->tovars as $item)
			<div class="cardd2">
				<a href="{{ route('main.show', ['tovar' => $item->id]) }}" class="a_card2">
					<div class="card2">
						<div class="card_image2"><img src="{{ asset('/storage/tovarimages/' . $item->image) }}" alt="tovar" class="tovar2"></div>
						<div><p class="tovar_name2">{{ $item->name }}</p></div>
						<div class="tovar_info2">
							<p class="cena2">{{ $item->price }} ₽</p>
							<a href="#" class="in_card2">В корзину</a>
						</div>
					</div>
				</a>
			</div>
		@endforeach
		</div> --}}
	</div>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script>
		// Убавляем кол-во по клику
		$('.quantity_inner .bt_minus').click(function() {
			let $input = $(this).parent().find('.quantity');
			let count = parseInt($input.val()) - 1;
			count = count < 1 ? 1 : count;
			$input.val(count);
		});
		// Прибавляем кол-во по клику
		$('.quantity_inner .bt_plus').click(function() {
			let $input = $(this).parent().find('.quantity');
			let count = parseInt($input.val()) + 1;
			count = count > parseInt($input.data('max-count')) ? parseInt($input.data('max-count')) : count;
			$input.val(parseInt(count));
		}); 
		// Убираем все лишнее и невозможное при изменении поля
		$('.quantity_inner .quantity').bind("change keyup input click", function() {
			if (this.value.match(/[^0-9]/g)) {
				this.value = this.value.replace(/[^0-9]/g, '');
			}
			if (this.value == "") {
				this.value = 1;
			}
			if (this.value > parseInt($(this).data('max-count'))) {
				this.value = parseInt($(this).data('max-count'));
			}    
		});    
	</script>

<script>
	// Поиск элемента с классом .alert и скрытие его через 3 секунды
	$(document).ready(function() {
		setTimeout(function() {
			$(".alert").fadeOut("slow");
		}, 3000);
	});
</script>
</main>
@endsection