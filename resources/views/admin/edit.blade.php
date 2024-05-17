@extends('main.layouts')

@section('title', 'Adminka-edit')

@section('content')
<!-- main -->
<main>
	<link rel="stylesheet" href="/css/edit.css">
	<div class="container">
		<div>
			<p class="menu" id="menu">Админ панель</p>
		</div>
		<div class="forma">
			<form action="{{ route('adminpanel.update', ['tovar' => $tovar->id]) }}" method="POST" enctype="multipart/form-data">
				@csrf
				@method('patch')
				<div class="form_header">
					<p>Изменение товара</p>
				</div>
				<input class="name" name="name" type="text" placeholder="Название" value="{{ $tovar->name }}">
				<textarea class="opisanie" name="description" type="text" placeholder="Описание" rows="3">{{ $tovar->description }}</textarea>
				<select class="category" name="category">
					@foreach ($category as $cat)
					<option value={{ $cat->id }}>{{ $cat->name }}</option>
					@endforeach
				</select> 
				<input class="cena" name="price" type="text" placeholder="Цена" value="{{ $tovar->price }}">
				<div class="card_image"><img src="{{ asset('/storage/tovarimages/' . $tovar->image) }}" alt="tovar" class="tovar" id="tovar_image"></div>
				<input type="file" name="image" class="image" id="imgInp">
				<div class="form_footer">
					<input class="submit" type="submit" value="Сохранить">
				</div>
			</form>
		</div>
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