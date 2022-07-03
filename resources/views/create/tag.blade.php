@extends('create.create')

@section('menu')
    @parent
@endsection

@section('content')
    @parent

    <h1 class="my-md-5 my-4">Добавить тег</h1>
    <div class="row">
        <div class="col-lg-5 col-md-8">
            <form method="POST" action="{{ route('tag.store') }}">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                                placeholder="Напишите название" name="title" value="{{ old('title') }}">
                    <label for="floatingName">Название</label>
                    @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button class="btn btn-primary" type="submit">Добавить</button>
            </form>
        </div>
    </div>

@endsection

@section('footer')
    @parent
@show
