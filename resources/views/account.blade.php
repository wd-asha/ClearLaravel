@extends('layouts.account')
@section('title', 'Clean | Аккаунт')
@section('content')

    <div class="for-cart">
        <div class="thumb">
            <a href="{{ URL('/') }}"><span>Главная</span></a>
            <span>/</span>
            <a href="{{ route('account') }}"><span>Аккаунт</span></a>
        </div>

        <h2 id="title">Личный кабинет</h2>

        {{-- Change Personal --}}
        <div class="account-forms">
            <form action="{{ route('personal') }}" method="post" class="personal-form">
                @csrf
                <div class="fields-control">
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
                    <button type="submit" name="submit" class="personal-btn">Изменить</button>
                </div>
            </form>

            {{-- Change Password --}}
            <form action="{{ route('reset.password') }}" method="post" class="pass-form">
                @csrf
                <div class="fields-control">
                    <div style="position: relative">
                    <input type="password" name="new_pass" class="shipping-input" id='password-input1' placeholder="Новый пароль" value="">
                    <a href="#" class="password-control" onclick="return show_hide_password1(this);"></a>
                        @error('new_pass')
                        <div style="color: red; font-size: .8rem; width: 100%; transform: translateY(-.75rem);">
                            <p style="text-align: center; width: 100%; margin: 0; padding: 0">{{ $message }}</p>
                        </div>
                        @enderror
                    </div>
                    <div style="position: relative">
                    <input type="password" name="repeat_pass" class="shipping-input" id="password-input2" placeholder="Повторить" value="">
                        <a href="#" class="password-control" onclick="return show_hide_password2(this);"></a>
                        @error('repeat_pass')
                        <div style="color: red; font-size: .8rem; width: 100%; transform: translateY(-.75rem);">
                            <p style="text-align: center; width: 100%; margin: 0; padding: 0">{{ $message }}</p>
                        </div>
                        @enderror
                    </div>
                    <button type="submit" name="submit" class="personal-btn">Изменить</button>
                </div>
            </form>

            {{-- Change Address and Phone --}}
            <form action="{{ route('shipping') }}" method="post" class="shipping-form">
                @csrf
                <div class="fields-control">
                    <input type="text" name="shipping" class="shipping-input" placeholder="Адрес доставки" value="{{ Auth::user()->shipping }}">
                        @error('shipping')
                        <div style="color: red; font-size: .8rem; width: 100%; transform: translateY(-.75rem);">
                            <p style="text-align: center; width: 100%; margin: 0; padding: 0">{{ $message }}</p>
                        </div>
                        @enderror
                    <input type="text" name="phone" class="shipping-input" placeholder="Телефон" value="{{ Auth::user()->phone}}">
                        @error('phone')
                        <div style="color: red; font-size: .8rem; width: 100%; transform: translateY(-.75rem);">
                            <p style="text-align: center; width: 100%; margin: 0; padding: 0">{{ $message }}</p>
                        </div>
                        @enderror
                    <button type="submit" name="submit" class="personal-btn">Изменить</button>
                </div>
            </form>

        </div>

        <div class="orders">
            <h3>Ваши заказы</h3>
            <div class="list-items-titles">
                <div class="orders-title">№ заказа</div>
                <div class="orders-title">Всего, ₽</div>
                <div class="orders-title">Дата</div>
                <div class="orders-title">Статус</div>
            </div>
            @foreach($orders as $order)
                @if( (int)$order->user_id == Auth::user()->id )
                    <div class="list-item">
                        <div class="order-item">
                            {{ $order->id }}
                        </div>
                        <div class="order-item">
                            {{ $order->order_total }}
                        </div>
                        <div class="order-item">
                            {{ $order->created_at }}
                        </div>
                        <div class="order-item">
                            @if( $order->order_status == 0 )
                                <div class="order-item-status">принят в работу</div>
                            @endif
                            @if( $order->order_status == 1 )
                                <div class="order-item-status">в обработке</div>
                            @endif
                            @if( $order->order_status == 2 )
                                <div class="order-item-status">на стадии доставки</div>
                            @endif
                            @if( $order->order_status == 3 )
                                <div class="order-item-status">доставлен</div>
                            @endif
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <div class="account-actions">
            @if(Auth::user()->name === 'Admin')
                <a href="{{ route('admin.index') }}" class="wishlist-link" style="margin-right: 1rem">В админ панель</a>
            @endif

            <a href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                <i class="icon ion-power"></i>Выход
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>

    <script>
        function show_hide_password1(target){
            let input1 = document.getElementById('password-input1');
            if (input1.getAttribute('type') === 'password') {
                target.classList.add('view');
                input1.setAttribute('type', 'text');
            } else {
                target.classList.remove('view');
                input1.setAttribute('type', 'password');
            }
            return false;
        }
        function show_hide_password2(target){
            let input2 = document.getElementById('password-input2');
            if (input2.getAttribute('type') === 'password') {
                target.classList.add('view');
                input2.setAttribute('type', 'text');
            } else {
                target.classList.remove('view');
                input2.setAttribute('type', 'password');
            }
            return false;
        }
    </script>

    @endsection
