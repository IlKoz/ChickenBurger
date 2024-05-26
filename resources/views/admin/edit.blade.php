@extends('main.layouts')

@section('title', 'Adminka-edit')

@section('content')
<!-- main -->
<main>
    <link rel="stylesheet" href="/css/edit.css">
    <div class="container">
        <div class="text-center mb-4">
            <h1 class="fw-bold">Админ панель</h1>
        </div>
        <div class="d-flex justify-content-center">
            <div class="card p-4 shadow-sm">
                <div class="card-header text-white text-center mb-4">
                    <h2>Изменение товара</h2>
                </div>
                <form action="{{ route('adminpanel.update', ['tovar' => $tovar->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Название</label>
                        <input id="name" class="form-control" name="name" type="text" placeholder="Название" value="{{ $tovar->name }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="description" class="form-label">Описание</label>
                        <textarea id="description" class="form-control" name="description" placeholder="Описание" rows="3">{{ $tovar->description }}</textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="category" class="form-label">Категория</label>
                        <select id="category" class="form-control" name="category">
                            @foreach ($category as $cat)
                                <option value="{{ $cat->id }}" @if($tovar->category_id == $cat->id) selected @endif>{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="price" class="form-label">Цена</label>
                        <input id="price" class="form-control" name="price" type="number" placeholder="Цена" value="{{ $tovar->price }}">
                    </div>
                    <div class="form-group mb-3 text-center">
                        <img src="{{ asset('/storage/tovarimages/' . $tovar->image) }}" alt="tovar" class="img-thumbnail tovar" id="tovar_image" style="max-width: 300px;">
                    </div>
                    <div class="form-group mb-3">
                        <label for="image" class="form-label">Изображение</label>
                        <input id="imgInp" type="file" name="image" class="form-control">
                    </div>
                    <div class="form-footer text-center">
                        <button type="submit" class="btn btn-danger">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<script>
    imgInp.onchange = evt => {
        const [file] = imgInp.files;
        if (file) {
            tovar_image.src = URL.createObjectURL(file);
        }
    }
</script>
@endsection
