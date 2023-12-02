@extends('layouts.product')
@section('title', 'Clean | Моющие средство')
@section('content')

<div class="for-product">
    <div class="thumb">
        <a href="{{ URL('/') }}"><span>Главная</span></a>
        <span>/</span>
        <a href="{{ route('categories') }}"><span>Категории</span></a>
        <span>/</span>
        <a href="{{ route('category', $product->category_id) }}"><span>{{ $product->category->title }}</span></a>
    </div>

    <h2>{{ $product->category->caption }}</h2>
    <div class="product">

        <div class="product-item">
            <div class="product-one-image">
                <div class="product-item-1 img">
                    <img src="/{{ $product->image1 }}" alt="">
                </div>
            </div>
            <h3>{{ $product->title }}</h3>
            <h2>{{ $product->price }} &#8381;</h2>
            <div class="qty">
                <div class="qty-field">
                    <div class="qty-minus" id="qtyMinus">-</div>
                    <div class="qty-count" id="qtyCount">1</div>
                    <div class="qty-plus" id="qtyPlus">+</div>
                </div>
            </div>

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
                        <img src="{{asset('images/favorites.png')}}" alt="">
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

        <div class="product-item-image">
            <div class="product-one-image2">
                <div class="product-item-1 img">
                    <img src="/{{ $product->image2 }}" alt="">
                </div>
            </div>
            <div class="product-item-desc">
                <div class="product-item-desc-1">
                    @if($product->pack)<p>Упаковка</p>@endif
                    @if($product->washing)<p>Вид стирки</p>@endif
                    @if($product->release)<p>Форма выпуска</p>@endif
                    @if($product->quantity)<p>Количество</p>@endif
                    @if($product->aroma)<p>Аромат</p>@endif
                    @if($product->brand)<p>Бренд</p>@endif
                    @if($product->pack)<p>Упаковка</p>@endif
                    @if($product->model)<p>Модель</p>@endif
                    @if($product->forma)<p>Форма</p>@endif
                    @if($product->material)<p>Материал</p>@endif
                    @if($product->color)<p>Цвет</p>@endif
                    @if($product->purpose)<p>Назначение</p>@endif
                    @if($product->arm)<p>Ручка</p>@endif
                    @if($product->machine)<p>Механизм</p>@endif
                    @if($product->bracing)<p>Крепление</p>@endif
                    @if($product->mop)<p>МОПы</p>@endif
                    @if($product->country)<p>Страна</p>@endif
                    @if($product->series)<p>Серия</p>@endif
                    @if($product->density)<p>Плотность при 25°C</p>@endif
                    @if($product->ph)<p>pH</p>@endif
                    @if($product->weight)<p>Вес</p>@endif
                    @if($product->volume)<p>Объем</p>@endif
                </div>
                <div class="product-item-desc-2">
                    @if($product->pack)<p>{{ $product->pack }}</p>@endif
                    @if($product->washing)<p>{{ $product->washing }}</p>@endif
                    @if($product->release)<p>{{ $product->release }}</p>@endif
                    @if($product->quantity)<p>{{ $product->quantity }} шт.</p>@endif
                    @if($product->aroma)<p>{{ $product->aroma }}</p>@endif
                    @if($product->brand)<p>{{ $product->brand }}</p>@endif
                    @if($product->pack)<p>{{ $product->pack }}</p>@endif
                    @if($product->model)<p>{{ $product->model }}</p>@endif
                    @if($product->forma)<p>{{ $product->forma }}</p>@endif
                    @if($product->material)<p>{{ $product->material }}</p>@endif
                    @if($product->color)<p>{{ $product->color }}</p>@endif
                    @if($product->purpose)<p>{{ $product->purpose }}</p>@endif
                    @if($product->arm)<p>{{ $product->arm }}</p>@endif
                    @if($product->machine)<p>{{ $product->machine }}</p>@endif
                    @if($product->bracing)<p>{{ $product->bracing }}</p>@endif
                    @if($product->mop)<p>{{ $product->mop }}</p>@endif
                    @if($product->country)<p>{{ $product->country }}</p>@endif
                    @if($product->series)<p>{{ $product->series }}</p>@endif
                    @if($product->density)<p>{{ $product->density }} гр./см³</p>@endif
                    @if($product->ph)<p>{{ $product->ph }}</p>@endif
                    @if($product->weight)<p>{{ $product->weight }} г.</p>@endif
                    @if($product->volume)<p>{{ $product->volume }} мл.</p>@endif
                </div>
            </div>
        </div>

        <div class="product-item-desc-3">
            {!! $product->desc !!}
            {!! $product->about !!}
        </div>

    </div>

</div>

@endsection
