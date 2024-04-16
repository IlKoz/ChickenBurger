@extends('main.layouts')

@section('title', 'Главная')

@section('content')
<!-- main -->
<main>
	<link rel="stylesheet" href="/css/main.css">
	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
	@if(session('success'))
		<div class="alert alert-success">
			{{ session('success') }}
		</div>
	@endif
	<div class="baners">
		<div><img src="/image/banner1.png" alt="banner1" class="banner"></div>
		<div><img src="/image/banner2.png" alt="banner2" class="banner"></div>
	</div>
	<div>
		<p class="menu" id="menu">Меню</p>
	</div>
	<div class="menu_bar">
		<ul>
			@foreach ($category as $cat)
			<li><a href="#{{ $cat->name }}" class="nav_bar2">{{ $cat->name }}</a></li>
			@endforeach
		</ul>
	</div>
	
	@foreach ($category as $cat)
	<div>
		<p class="category" id="{{ $cat->name }}">{{ $cat->name }}</p>
	</div>
	<div class="tovars">
		@foreach ($cat->tovars as $item)
		<div class="cardd" id="{{ $item->id }}">
			<a href="{{ route('main.show', ['tovar' => $item->id]) }}" class="a_card">
				<div class="card">
					<div class="card_image"><img src="{{ asset('/storage/tovarimages/' . $item->image) }}" alt="tovar" class="tovar"></div>
					<div><p class="tovar_name">{{ $item->name }}</p></div>
					<div class="tovar_info">
						<p class="cena">{{ $item->price }} ₽</p>
						<form action="{{ route('cart.create') }}" method="post" id="addToCartForm">
							@csrf
							<input type="hidden" name="tovar_id" value={{ $item->id }}>
							<input type="hidden" name="tovar_count" value=1>
							<input class="in_card" type="submit" value="В корзину">
						</form>
						{{-- <a href="#" class="in_card">В корзину</a> --}}
					</div>
				</div>
			</a>
		</div>
		@endforeach
	</div>
	@endforeach
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
</main>
@endsection