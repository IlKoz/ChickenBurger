@extends('main.layouts')

@section('title', 'Купоны')

@section('content')
	<main>
		<div class="container">
			<link rel="stylesheet" href="/css/promo.css">
			<div>
				<p class="menu fs-1 fw-bold mb-1">Акции</p>
			</div>
			<div class="tovars row">
				@foreach ($promo as $prom)
				<div class="col-md-6 col-12">
					<div class="cardd p-3 m-2 @if($loop->index % 2 == 1) black-card @endif">
						<p class="name">{{ $prom->name }}</p>
						<p class="description">{{ $prom->description }}</p>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</main>
@endsection