@extends('main.layouts')

@section('title', 'Купоны')

@section('content')
	<main>
		<link rel="stylesheet" href="/css/promo.css">
		<div>
			<p class="menu">Акции</p>
		</div>
		<div class="tovars">
			@foreach ($promo as $prom)
			<div class="cardd">
				<p class="name">{{ $prom->name }}</p>
				<p class="description">{{ $prom->description }}</p>
			</div>
			@endforeach
		</div>
	</main>
@endsection