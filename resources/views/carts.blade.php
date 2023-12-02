@extends('layouts.carts')
@section('title', 'Clean | Корзина')
@section('content')

    <div class="for-cart">
        <div class="thumb">
            <a href="{{ URL('/') }}"><span>Главная</span></a>
            <span>/</span>
            <a href="{{ route('carts') }}"><span>Корзина</span></a>
        </div>

        <h2 id="title">Ваша корзина</h2>
        <div class="cart">
            @if(Cart::count() !== 0)
                @foreach($cartItems as $cartItem)
                    <div class="cart-item">
                        <form action="{{ route('cart.update') }}" method="POST" id="form-update">
                            @csrf
                            <input type="hidden" name="rowId" value="{{ $cartItem->rowId }}">
                            <div class="cart-item-img">
                                <img src="{{ $cartItem->options->image1 }}" alt="">
                            </div>
                            <a href="{{ route('product', $cartItem->id) }}" class="name-product">
                                <h3>{{ $cartItem->name }}</h3>
                            </a>
                            <a href="" class="price">
                                <h2>{{ $cartItem->price }} &#8381;</h2>
                            </a>
                            <div class="quantity-subtotal">
                                <div class="quantity">
                                    <input type="text" name="qty" value="{{ $cartItem->qty }}" class="quantity-item" id="qty-input">
                                    <div class="quantity-item quantity-has-select">+</div>
                                    <div class="quantity-item quantity-has-select">-</div>
                                </div>
                                <button type="submit" class="recalc" name="submit">Обновить</button>

                                <a href="" class="subtotal">
                                    <h2>{{ $cartItem->subtotal() }} &#8381;</h2>
                                </a>
                            </div>
                            @php $rowId = $cartItem->rowId @endphp
                            <a href="{{ route('cart.delete', $rowId) }}" class="delete">&times;</a>
                        </form>
                    </div>
                @endforeach

                <div class="cart-item-last">
                    <div class="cart-item-img"></div>
                    <h3>Всего</h3>
                    <a href="#" class="price">
                        <h2></h2>
                    </a>
                    <h2 id="total">{{ Cart::total() }} &#8381;</h2>
                </div>
                @else
                <div class="cart-item-last">
                    <a href="{{ route('products') }}" class="shipping-btn">Добавте полезные товары</a>
                </div>
            @endif
        </div>

    @if(Cart::count() !== 0)
        <h2 class="shipping" id="shipping">Методы оплаты</h2>

            <ul class="wc_payment_methods payment_methods methods">
                <li class="wc_payment_method payment_method_cod">

                    <input id="payment_method_cod" type="radio" class="input-radio" name="payment_method" value="cod" checked="checked" data-order_button_text="">
                    <label for="payment_method_cod">Оплата наличными при получении заказа</label>

                    <form action="{{ route('check') }}" method="post" class="form-carts">
                        @csrf
                        @auth
                            <div class="fields-control">
                                <input type="text" name="user_id" hidden value="{{ Auth::user()->id }}">
                                <input type="text" name="name" class="shipping-input" placeholder="Имя" value="{{ Auth::user()->name }}">
                                @error('name')
                                <div style="color: red; font-size: .8rem; width: 100%; transform: translateY(-.75rem);">
                                    <p style="text-align: center; width: 100%; margin: 0; padding: 0">{{ $message }}</p>
                                </div>
                                @enderror
                                <input type="text" name="email" class="shipping-input" placeholder="Email" value="{{ Auth::user()->email }}">
                                @error('email')
                                <div style="color: red; font-size: .8rem; width: 100%; transform: translateY(-.75rem);">
                                    <p style="text-align: center; width: 100%; margin: 0; padding: 0">{{ $message }}</p>
                                </div>
                                @enderror
                            </div>
                            <div class="fields-control">
                                <input type="text" name="delivery" class="shipping-input" placeholder="Адрес доставки" value="{{ Auth::user()->shipping }}">
                                @error('delivery')
                                <div style="color: red; font-size: .8rem; width: 100%; transform: translateY(-.75rem);">
                                    <p style="text-align: center; width: 100%; margin: 0; padding: 0">{{ $message }}</p>
                                </div>
                                @enderror
                                <input type="text" name="date" class="shipping-input" placeholder="Дата и время доставки">
                                @error('date')
                                <div style="color: red; font-size: .8rem; width: 100%; transform: translateY(-.75rem);">
                                    <p style="text-align: center; width: 100%; margin: 0; padding: 0">{{ $message }}</p>
                                </div>
                                @enderror
                            </div>
                            <div class="fields-control">
                                <input type="text" name="phone" class="shipping-input" placeholder="Телефон" value="{{ Auth::user()->phone }}">
                                @error('phone')
                                <div style="color: red; font-size: .8rem; width: 100%; transform: translateY(-.75rem);">
                                    <p style="text-align: center; width: 100%; margin: 0; padding: 0">{{ $message }}</p>
                                </div>
                                @enderror
                                <button type="submit" name="submit" class="shipping-btn">Заказать</button>
                            </div>
                        @endauth
                        @guest
                            <div class="fields-control">
                                <input type="text" name="name" class="shipping-input" placeholder="Имя">
                                @error('name')
                                <div style="color: red; font-size: .8rem; width: 100%; transform: translateY(-.75rem);">
                                    <p style="text-align: center; width: 100%; margin: 0; padding: 0">{{ $message }}</p>
                                </div>
                                @enderror
                                <input type="text" name="email" class="shipping-input" placeholder="Email">
                                @error('email')
                                <div style="color: red; font-size: .8rem; width: 100%; transform: translateY(-.75rem);">
                                    <p style="text-align: center; width: 100%; margin: 0; padding: 0">{{ $message }}</p>
                                </div>
                                @enderror
                            </div>
                            <div class="fields-control">
                                <input type="text" name="delivery" class="shipping-input" placeholder="Адрес доставки">
                                @error('delivery')
                                <div style="color: red; font-size: .8rem; width: 100%; transform: translateY(-.75rem);">
                                    <p style="text-align: center; width: 100%; margin: 0; padding: 0">{{ $message }}</p>
                                </div>
                                @enderror
                                <input type="text" name="date" class="shipping-input" placeholder="Дата и время доставки">
                                @error('date')
                                <div style="color: red; font-size: .8rem; width: 100%; transform: translateY(-.75rem);">
                                    <p style="text-align: center; width: 100%; margin: 0; padding: 0">{{ $message }}</p>
                                </div>
                                @enderror
                            </div>
                            <div class="fields-control">
                                <input type="text" name="phone" class="shipping-input" placeholder="Телефон">
                                @error('phone')
                                <div style="color: red; font-size: .8rem; width: 100%; transform: translateY(-.75rem);">
                                    <p style="text-align: center; width: 100%; margin: 0; padding: 0">{{ $message }}</p>
                                </div>
                                @enderror
                                <button type="submit" name="submit" class="shipping-btn">Заказать</button>
                            </div>
                        @endguest
                    </form>

                </li>

                <li class="wc_payment_method payment_method_all">

                    <input id="payment_method_all" type="radio" class="input-radio" name="payment_method" value="all" data-order_button_text="">
                    <label for="payment_method_all">Оплата банковской картой и web-кошельки</label>
                    <p class="offer">Я прочитал <a href="http://sneakers/offer/">Публичную оферту</a> и согласен с ее положениями</p>
                    <div class="payments">
                        <img src="{{asset('images/payment/mastercard.png')}}"> 
                        <img src="{{asset('images/payment/paypal.png')}}"> 
                        <img src="{{asset('images/payment/qiwi.png')}}"> 
                        <img src="{{asset('images/payment/robokassa2.png')}}"> 
                        <img src="{{asset('images/payment/visa.png')}}"> 
                        <img src="{{asset('images/payment/webmoney.png')}}"> 
                    </div>

                </li>
            </ul>

        @endif
    </div>

@endsection
