@extends('app')

@section('content')
    @parent

    <h1 class="my-md-5 my-4">Добавить материал</h1>
    <div class="row">
        <div class="col-lg-5 col-md-8">
            <form action="{{ route('material.store') }}" method="POST">
                @csrf
                <div class="form-floating mb-3">
                    <select class="form-select @error('typeId') is-invalid @enderror" id="floatingSelectType" name="typeId">
                        @if(!old('typeId'))
                            <option  selected value="">Выберите тип</option>
                            @foreach($types as $type)
                                <option value="{{ $type->id }}">{{ $type->title }}</option>
                            @endforeach
                        @else
                            <option value="">Выберите тип</option>
                            @foreach($types as $type)
                                <option  @if(old('typeId') == $type->id) selected @endif value="{{ $type->id }}">{{ $type->title }}</option>
                            @endforeach
                        @endif
                    </select>
                    <label for="floatingSelectType">Тип</label>
                    @error('typeId')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select @error('categoryId') is-invalid @enderror" id="floatingSelectCategory" name="categoryId">
                        @if(!old('categoryId'))
                            <option  selected value="">Выберите категорию</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" >{{ $category->title }}</option>
                            @endforeach
                        @else
                            <option value="">Выберите категорию</option>
                            @foreach($categories as $category)
                                <option  @if(old('categoryId') == $category->id) selected @endif value="{{ $category->id }}" >{{ $category->title }}</option>
                            @endforeach
                        @endif
                    </select>
                    <label for="floatingSelectCategory">Категория</label>
                    @error('categoryId')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                           placeholder="Напишите название" id="floatingName" name="title" value="{{ old('title') }}">
                    <label for="floatingName">Название</label>
                    @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" placeholder="Напишите авторов"  name="author" value="{{ old('author') }}">
                    <label for="floatingName">Автор</label>
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control @error('description') is-invalid @enderror" placeholder="Напишите краткое описание"
                              id="floatingDescription" style="height: 100px" name="description" >{{ old('description') }}</textarea>
                    <label for="floatingDescription">Описание</label>
                    @error('description')
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
