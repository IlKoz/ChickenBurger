@extends('main.layouts')

@section('title', 'Главная')

@section('content')
<!-- main -->
<main>
	<div class="container">
		@if(session('success'))
			<div class="alert alert-success">
				{{ session('success') }}
			</div>
		@endif
		<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
			<div class="carousel-indicators mb-1">
			  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
			  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
			  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
			</div>
			<div class="carousel-inner rounded">
			  <div class="carousel-item active">
				<img src="/image/banner.png" class="d-block w-100" alt="...">
			  </div>
			  <div class="carousel-item">
				<img src="/image/banner.png" class="d-block w-100" alt="...">
			  </div>
			  <div class="carousel-item">
				<img src="/image/banner.png" class="d-block w-100" alt="...">
			  </div>
			</div>
			<button class="carousel-control-prev justify-content-start" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
			  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			  <span class="visually-hidden">Previous</span>
			</button>
			<button class="carousel-control-next justify-content-end" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
			  <span class="carousel-control-next-icon" aria-hidden="true"></span>
			  <span class="visually-hidden">Next</span>
			</button>
		</div>
	</div>
	<div class="container">
		<div>
			<p class="menu fs-1 fw-bold mb-1" id="menu">Меню</p>
		</div>
		<div class="menu_bar">
			<div class="categories-wrapper">
				<ul class="nav nav-pills d-flex">
					@foreach ($category as $cat)
						<li class="nav-item align-items-center fs-4 mb-2"><a href="javascript:void(0)" class="nav_bar2 text-decoration-none" onclick="scrollToAnchor('{{ $cat->name }}')">{{ $cat->name }}</a></li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
	<div class="container">
		@foreach ($category as $cat)
		<div>
			<p class="category fs-3 fw-bolder" id="{{ $cat->name }}">{{ $cat->name }}</p>
		</div>
		
		<div class="row mb-3 tovars">
			@foreach ($cat->tovars as $item)
			<div class="pt-2 pb-2 col-md-3 col-6 d-flex flex-column" id="{{ $item->id }}">
				<a href="{{ route('main.show', ['tovar' => $item->id]) }}" class="a_card text-decoration-none">
					<div class="align-items-center m-1 p-4 card-div">
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
		</div>
		@endforeach 
	</div>
		
		
		


		<link rel="stylesheet" href="/css/main.css">
		<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
		@if(session('success'))
			<div class="alert alert-success">
				{{ session('success') }}
			</div>
		@endif
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
		
		<script>
			function scrollToAnchor(anchorId) {
				// Получаем элемент, к которому нужно прокрутиться
				var target = document.getElementById(anchorId);

				if (target) {
					// Учитываем высоту хэдера (например, если его класс - header)
					var headerHeight = document.querySelector('.sticky-top').offsetHeight;

					// Вычисляем позицию прокрутки с учетом высоты хэдера
					var offsetPosition = target.offsetTop - headerHeight;

					// Прокручиваем страницу к нужному элементу с учетом смещения
					window.scrollTo({
						top: offsetPosition,
						behavior: "smooth" // Добавляет плавную анимацию
					});
				}
			}
		</script>
</main>
@endsection