@extends('main.layouts')

@section('title', 'Adminka')

@section('content')
<!-- main -->
<main>
	<link rel="stylesheet" href="/css/adminpanel.css">
	<div class="container">
		<div>
			<p class="menu" id="menu">Админ панель</p>
		</div>
		<div class="menu_bar">
			<ul>
				<li><a href="#" class="nav_bar2">Новинки</a></li>
				<li><a href="#" class="nav_bar2">Ланчи и комбо</a></li>
				<li><a href="#" class="nav_bar2">Баскеты</a></li>
				<li><a href="#" class="nav_bar2">Бургеры</a></li>
				<li><a href="#" class="nav_bar2">Твистеры</a></li>
				<li><a href="#" class="nav_bar2">Картофель и снеки</a></li>
				<li><a href="#" class="nav_bar2">Соусы</a></li>
				<li><a href="#" class="nav_bar2">Холодные напитки</a></li>
			</ul>
		</div>
		<div class="panel">
			<div class="form_header">
				<p class="form_header_p">Товары</p>
				<a class="form_header_a text-decoration-none" href="{{ route('adminpanel.create') }}">Добавить новый товар</a>
			</div>
			@foreach ($tovar as $item)
			<div class="cards">
				<div class="card">
					<div class="d-flex">
						<div class="card_image"><img src="{{ asset('/storage/tovarimages/' . $item->image) }}" alt="tovar" class="tovar"></div>
						<div class="d-flex">
							<div class="d-flex align-items-center ms-4">
								<div>
									<p class="tovar_name">{{ $item->name }}</p>
									<p class="tovar_category">{{ $item->category->name }}</p>
								</div>
							</div>
							<div class="d-flex align-items-center ms-4">
								<p class="tovar_sostav m-0">{{ $item->description }}</p>
							</div>
							<div class="info_price">
								<p class="tovar_price mb-0">{{ $item->price }} ₽</p>
							</div>
						</div>
					</div>
					
					<div class="d-flex justify-content-center">
						<div class="form2">
							<a class="tovar_redact text-decoration-none" href="{{ route('adminpanel.edit', ['tovar' => $item->id]) }}">Редактировать</a>
						</div>
						<form action="{{ route('adminpanel.destroy', ['tovar' => $item->id]) }}" method="post">
							@csrf
							@method('delete')
							<input type="submit" value="Удалить">
						</form>
					</div>
					
				</div>
			</div>
			@endforeach
			<div class="form_footer">
				<p class="form_footer_p"></p>
			</div>
		</div>
	</div>
	
</main>
@endsection