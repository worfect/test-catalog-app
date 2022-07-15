@extends('app')

@section('content')
    @parent

    <h1 class="my-md-5 my-4">Редактировать категорию</h1>
    <div class="row">
        <div class="col-lg-5 col-md-8">
            <form method="POST" action="{{ route('category.update', $category->id) }}">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                           placeholder="Напишите название" name="title" value="{{ $category->title }}">
                    <label for="floatingName">Название</label>
                    @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button class="btn btn-primary" type="submit">Сохранить</button>
            </form>
        </div>
    </div>

@endsection
