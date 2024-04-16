@extends('main.layouts')

@section('title', 'CouponsCard')

@section('content')
<main>
	<link rel="stylesheet" href="/css/couponsCard.css">
	<div>
		<p class="menu" id="menu">Карточка</p>
	</div>
	
	<div class="all">
		<div class="card_image">
			<img class="tovar" src="{{ asset('/storage/couponimages/' . $coupon->image) }}" alt="tovar">
		</div>
		<div class="card_info">
			<p class="p1">{{ $coupon->name }}</p>
			<p class="p2">{{ $coupon->price }} ₽</p>
			<p class="p3">{{ $coupon->description }}</p>
			<div class="niz">
				
				<div>
					<form action="{{ route('coupons.create') }}" method="post">
						@csrf

						<div class="quantity_inner">        
							<button type="button" class="bt_minus">
								<svg viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"></line></svg>
							</button>
							<input name="coupon_count" type="text" value="1" size="2" class="quantity" data-max-count="99" />
							<button type="button" class="bt_plus">
								<svg viewBox="0 0 24 24"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
							</button>
						</div>

						<input type="hidden" name="coupon_id" value={{ $coupon->id }}>
						<input class="in_card" type="submit" value="В корзину">
					</form>
				</div>

			</div>
		</div>
	</div>
	<div>
		<p class="Sostoitiz">Состоит из:</p>
	</div>
	<div class="tovars2">
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
</main>
@endsection