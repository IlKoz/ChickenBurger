@extends('main.layouts')

@section('title', 'Adminka-dobavlenie')

@section('content')
<!-- main -->
<main>
	<link rel="stylesheet" href="/css/dobavlenie.css">
	<div>
		<p class="menu" id="menu">Админ панель</p>
	</div>
	<div class="forma">
		<form action="{{ route('adminpanel.store') }}" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="form_header">
				<p>Добавление товара</p>
			</div>
			<input class="name" name="name" type="text" placeholder="Название">
			<textarea class="opisanie" name="description" type="text" placeholder="Описание" rows="3"></textarea>
			<select class="category" name="category">
				@foreach ($category as $cat)
				<option value={{ $cat->id }}>{{ $cat->name }}</option>
				@endforeach
			</select> 
			<input class="cena" name="price" type="number" placeholder="Цена">
			<div class="card_image"><img src="" class="tovar" id="tovar_image"></div>
			<input type="file" name="image" class="image" id="imgInp">
			<div class="form_footer">
				<input class="submit" type="submit" value="Сохранить">
			</div>
		</form>
	</div>
</main>
<script>
	imgInp.onchange = evt => {
		const [file] = imgInp.files
		if (file) {
			tovar_image.src = URL.createObjectURL(file)
		}
	}
</script>
@endsection