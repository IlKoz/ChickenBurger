@extends('main.layouts')

@section('title', 'Админ панель')

@section('content')
<!-- main -->
<main>
    <link rel="stylesheet" href="/css/adminpanel.css">
    <div class="container py-5">
        <div class=" mb-4">
            <h1 class="fw-bold">Админ панель</h1>
        </div>
        <div class="d-flex justify-content-center mb-4">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link {{ request('category') ? '' : 'active' }}" href="{{ route('adminpanel.index') }}">Все</a>
                </li>
                @foreach ($categories as $category)
                    <li class="nav-item">
                        <a class="nav-link {{ request('category') == $category->id ? 'active' : '' }}" href="{{ route('adminpanel.index', ['category' => $category->id]) }}">{{ $category->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2 class="mb-0">Товары</h2>
                <a class="btn btn-danger" href="{{ route('adminpanel.create') }}">Добавить новый товар</a>
            </div>
            <div class="card-body">

				<div class="row mb-3 tovars">
					@foreach ($tovar as $item)
					<div class="pt-2 pb-2 col-md-4 col-12 d-flex" id="{{ $item->id }}">
						<div class="w-100 d-flex flex-column h-100">
								<div class=" m-1 p-4 card-div d-flex flex-column h-100">
									<div class="card_image text-center mb-2">
										<img src="{{ asset('/storage/tovarimages/' . $item->image) }}" alt="tovar" class="tovar img-fluid">
									</div>
									<div class="d-flex flex-column flex-grow-1">
										<p class="tovar_name text-center fs-5 fw-bold">{{ $item->name }}</p>
									</div>
									<div class="d-flex flex-column flex-grow-1">
										<p class="tovar_name text-center fs-5">{{ $item->category->name }}</p>
									</div>
									<div class="d-flex flex-column flex-grow-1">
										<p class="tovar_name text-center fs-5 fw-light">{{ $item->description }}</p>
									</div>
									<div class="d-flex flex-column flex-grow-1">
										<p class="tovar_name text-center fs-4 fw-bold">{{ $item->price }} ₽</p>
									</div>
									{{-- <div class="tovar_info d-flex justify-content-between align-items-center mt-auto">
										<p class="cena text-center m-0 fw-bold fs-4">{{ $item->price }} ₽</p>
										
									</div> --}}
									<div class="d-flex justify-content-between">
										<a class="btn btn-warning" href="{{ route('adminpanel.edit', ['tovar' => $item->id]) }}">Редактировать</a>
										<form action="{{ route('adminpanel.destroy', ['tovar' => $item->id]) }}" method="post">
											@csrf
											@method('delete')
											<button type="submit" class="btn btn-danger">Удалить</button>
										</form>
									</div>
								</div>
						</div>
					</div>
					@endforeach
				</div>
            </div>
        </div>
    </div>
</main>
@endsection
