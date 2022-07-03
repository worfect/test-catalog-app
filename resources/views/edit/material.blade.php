@extends('edit.edit')

@section('menu')
    @parent
@endsection

@section('content')
    @parent

    <h1 class="my-md-5 my-4">Редактировать материал</h1>

    <div class="row">
        <div class="col-lg-5 col-md-8">
            <form action="{{ route('material.update', $material->id) }}" method="POST">
                @csrf
                <div class="form-floating mb-3">
                    <select class="form-select @error('typeId') is-invalid @enderror" id="floatingSelectType" name="typeId">
                        <option selected value="">Выберите тип</option>
                        @foreach($types as $type)
                            @if($type->id == $material->type->id )
                                <option selected value="{{ $type->id }}" >{{ $type->title }}</option>
                            @else()
                                <option value="{{ $type->id }}" >{{ $type->title }}</option>
                            @endif()
                        @endforeach
                        @foreach($types as $type)
                            <option value="{{ $type->id }}" >{{ $type->title }}</option>
                        @endforeach
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
                        <option  value="">Выберите категорию</option>
                        @foreach($categories as $category)
                            @if($category->id == $material->category_id )
                                <option selected value="{{ $category->id }}" >{{ $category->title }}</option>
                            @else()
                                <option value="{{ $category->id }}" >{{ $category->title }}</option>
                            @endif()
                        @endforeach
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
                           placeholder="Напишите название" id="floatingName" name="title" value="{{ old('title') ? old('title') : $material->title }}">
                    <label for="floatingName">Название</label>
                    @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" placeholder="Напишите авторов"  name="author" value="{{ old('author') ? old('author') : $material->author }}">
                    <label for="floatingName">Автор</label>
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control @error('description') is-invalid @enderror" placeholder="Напишите краткое описание"
                              id="floatingDescription" style="height: 100px" name="description" >{{ old('description') ? old('description') : $material->description }}</textarea>
                    <label for="floatingDescription">Описание</label>
                    @error('description')
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

@section('footer')
    @parent
@show
