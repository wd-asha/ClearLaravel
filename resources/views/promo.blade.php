@extends('layouts.promo')
@section('title', 'Clean | Акции')
@section('content')

    <div class="shipping">

        <div class="thumb">
            <a href="{{ URL('/') }}"><span>Главная</span></a>
            <span>/</span>
            <a href="{{ route('promo') }}"><span>Акции и скидки</span></a>
        </div>

        <h2>Акции и скидки</h2>

        <div class="shipping-table">
            <div class="shipping-table-items">
                <div class="shipping-table-item">
                    <p>Скидки <span>до 60%</span> на покупки в больших упаковках</p>
                    <p style="padding-top: .25rem;">Осталось <span>3 дня</span></p>
                </div>
                <div class="shipping-table-item">
                    <p>Скидка <span>10%</span> для первые 3 заказа для юридических лиц</p>
                    <p style="padding-top: .25rem;">Осталось <span>12 дней</span></p>
                </div>
                <div class="shipping-table-item">
                    <p>Прощай, пакет с пакетами. Забираем пакеты на переработку</p>
                </div>
                <div class="shipping-table-item">
                    <p>Секретный кешбэк для подписчиков</p>
                    <p style="padding-top: .25rem;">Осталось <span>7 дней</span></p>
                </div>
                <div class="shipping-table-item">
                    <p>Быстрая достака. Привезем заказ сегодня. Теперь и для юридических лиц</p>
                    <p style="padding-top: .25rem;">Доставка до 2 часов</p>
                </div>
                <div class="shipping-table-item">
                    <p>Скидка <span>до 20%</span> на экологические средства для стирки от BioMio.</p>
                    <p style="padding-top: .25rem;">Осталось <span>5 дней</span></p>
                </div>
                <div class="shipping-table-item">
                    <p>Где Ваш бизнесс – так и наша доставкаю Теперь и по Челябинской области</p>
                    <p style="padding-top: .25rem;">До 31 декабря</p>
                </div>
                <div class="shipping-table-item">
                    <p>Время пробывать новое. Скидка до <span>15%</span> на инновационные товары</p>
                    <p style="padding-top: .25rem;">Осталось <span>12 дней</span></p>
                </div>
            </div>

            <div class="products-new">
                @foreach($products as $product)
                <div class="products-glass-item">
                    <div class="product-image">
                        <div class="products-glass-item-3 img">
                            <img src="{{ $product->image1 }}" alt="">
                        </div>
                        <div class="overlay">
                            <a href="{{ route('product', $product->id) }}" class="overlay-link">
                                <img src="{{asset('images/eye.png')}}">
                            </a>
                        </div>
                    </div>
                    <h3>{{ $product->title }}</h3>
                    {!! $product->desc !!}
                    <h2>{{ $product->price }} &#8381;</h2>
                    <div class="bar-act">Акция -10%</div>
                    @auth
                    <div class="favorites">
                        <img src="{{asset('images/favorites.png')}}">
                    </div>
                    @endauth
                    <a href="#"><img src="{{asset('images/cartadd.png')}}"></a>
                </div>
                @endforeach
            </div>

        </div>
    </div>

    @endsection