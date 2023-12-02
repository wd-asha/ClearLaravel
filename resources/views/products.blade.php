@extends('layouts.categories')
@section('title', 'Clean | Товары')
@section('content')

<div class="for-glass">
    <div class="thumb">
        <a href="{{ URL('/') }}"><span>Главная</span></a>
        <span>/</span>
        <a href="{{ route('categories') }}"><span>Категории</span></a>
        <span>/</span>
        <span>Все</span>
    </div>

    <div class="categories">
        <div class="hex-row">
            <div class="hex active">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
                <a href="{{ route('products') }}">Все</a>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
                <a href="{{ route('category', 1) }}">Стекло</a>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
                <a href="{{ route('category', 2) }}">Камень</a>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
                <a href="{{ route('category', 3) }}">Дерево</a>
            </div>
            <div class="hex ">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
                <a href="{{ route('category', 4) }}">Инвентарь</a>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
                <a href="{{ route('category', 5) }}">Хозтовары</a>
            </div>
            <div class="hex">
                <div class="top"></div>
                <div class="middle"></div>
                <div class="bottom"></div>
                <a href="{{ route('category', 6) }}">Стирка</a>
            </div>
        </div>
    </div>

    <h2>Все категории</h2>
    <div class="products-glass">
        @foreach($products as $product)
            @if($product->status === 1)
                @if($product->amount > 0)
                <div class="products-glass-item">
                    <div class="product-image">
                        <div class="products-glass-item-1 img">
                            <img src="/{{ $product->image1 }}" alt="" style="width: 100%; height: auto">
                        </div>
                        <div class="overlay">
                            <a href="{{ route('product', [$product->id, $product->category->id]) }}" class="overlay-link">
                                <img src="{{asset('images/eye.png')}}" alt="">
                            </a>
                        </div>
                    </div>
                    <h3>{{ $product->title }}</h3>
                    {!! $product->desc !!}
                    <h2>{{ $product->price }} &#8381;</h2>
                    @if($product->news === 1)
                        <div class="bar-new">Новинка</div>
                    @endif
                    @if($product->hits === 1)
                        <div class="bar-hit">Хит продаж</div>
                    @endif
                    @if($product->promo === 1)
                        <div class="bar-act">Акция -10%</div>
                    @endif
                    @auth
                        @php $d = false; @endphp
                        @foreach($wishlists as $wishlist)
                            @if ( (int)$wishlist->product_id == $product->id AND (int)$wishlist->user_id == Auth::user()->id)
                                @php $d = true @endphp
                            @endif
                        @endforeach
                        @if($d == false)
                            <a href="{{ route('favorite', $product->id) }}" class="favorites">
                                <img src="/{{asset('images/favorites.png')}}" alt="">
                            </a>
                        @endif
                    @endauth
                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="qtyH" id="qtyH" value="1">
                        <button href="" type="submit" name="submit" class="btn_cartadd">
                            <img src="{{asset('images/cartadd.png')}}" alt="">
                        </button>
                    </form>
                </div>
                @endif
            @endif
        @endforeach

    </div>

    {{ $products->links('vendor.pagination.bootstrap-4') }}

</div>

@endsection
