
@extends('app')


@section('menu')
    @parent
@endsection

@section('content')
    {{ $name }}
@endsection

@section('footer')
    @parent
@endsection
