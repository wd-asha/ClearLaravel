@extends('layouts.wishlist')
@section('title', 'Clean | Избранное')
@section('content')

    <div class="for-cart">
        <div class="thumb">
            <a href="{{ URL('/') }}"><span>Главная</span></a>
            <span>/</span>
            <a href="{{ route('wishlist') }}"><span>Избранное</span></a>
        </div>

        <h2 id="title">Избранное</h2>
        <div class="cart">

            @php $count = 0; @endphp
            @foreach($wishlists as $wishlist)
                @if($wishlist->user_id == Auth::user()->id)
                    @php $count = $count + 1 @endphp
                    @foreach($products as $product)
                        @if($wishlist->product_id == $product->id)

                            <div class="cart-item">
                                <div class="cart-item-img">
                                    <img src="{{ $product->image1 }}" alt="">
                                </div>
                                <a href="{{ route('product', $product->id) }}" class="name-product" target="_blank">
                                    <h3>{{ $product->title }}</h3>
                                </a>
                                <a class="price">
                                    <h2>{{ $product->price }} &#8381;</h2>
                                </a>
                                <a href="{{route('wishlist.destroy', $wishlist->id)}}" class="delete">&times;</a>
                            </div>

                        @endif
                    @endforeach
                @endif
            @endforeach
            @if($count === 0)
                <p style="margin: 2rem 0;">Список избранного пуст</p>
            @endif

        </div>

    </div>

    @endsection