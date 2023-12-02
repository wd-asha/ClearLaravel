@extends('layouts.categories')
@section('title', 'Clean | Категории товаров')
@section('content')

<div class="products">
    <div class="thumb">
        <a href="{{ URL('/') }}"><span>Главная</span></a>
        <span>/</span>
        <a><span>Категории</span></a>
    </div>

    <h2>Товары по категориям</h2>
    @foreach($categories as $category)
        <div class="products-item">
            <a href="{{ route('category', $category->id) }}">
                <img src="{{ $category->image }}" alt="">
                <h3>{{ $category->caption }}</h3>
                {!! $category->about !!}
            </a>
        </div>
    @endforeach
</div>

@endsection
