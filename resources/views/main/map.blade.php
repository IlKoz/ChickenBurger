@extends('main.layouts')

@section('title', 'map')

@section('content')
	<main>
		<link rel="stylesheet" href="/css/map.css">
		<div>
			<p class="menu">Рестораны</p>
		</div>
		<div class="content">
			<script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Aa5322a0d1b61aade49d1e4a79a3bf6b34e1c5abcba2218a1c945bf7b223bc413&amp;width=1090&amp;height=650&amp;lang=ru_RU&amp;scroll=true"></script>		</div>
		<div class="tovars">
			@foreach ($restourants as $restourant)
			<div class="cardd">
				<div class="cardd_1">
					<p class="address">{{ $restourant->address }}</p>
				</div>
				<div class="cardd_2">
					<p class="phone">Тел: <span>{{ $restourant->phone }}</span></p>
					<p class="working_time">Режим работы: <span>{{ $restourant->working_time }}</span></p>
				</div>
			</div>
			@endforeach
		</div>
	</main>
@endsection