@extends('layouts.account')
@section('title', 'Clean | Аккаунт')
@section('content')

    <div class="for-cart">
        <div class="thumb">
            <a href="{{ URL('/') }}"><span>Главная</span></a>
            <span>/</span>
            <a href="{{ route('account') }}"><span>Аккаунт</span></a>
        </div>

        <h2 id="title">Сброс пароля</h2>

        <div class="account-forms">
            <form action="{{ route('login') }}" method="post" class="personal-form">
                @csrf
                <div class="fields-control">
                    <input type="text" name="email" class="shipping-input" placeholder="Email" value="{{ old('email') }}">
                        @error('email')
                        <div style="color: red; font-size: .8rem; width: 100%; transform: translateY(-.75rem);">
                            <p style="text-align: center; width: 100%; margin: 0; padding: 0">{{ $message }}</p>
                        </div>
                        @enderror
                    <input type="password" class="shipping-input" placeholder="Пароль" id="password" name="password" required autocomplete="new-password">
                        @error('password')
                        <div style="color: red; font-size: .8rem; width: 100%; transform: translateY(-.75rem);">
                            <p style="text-align: center; width: 100%; margin: 0; padding: 0">{{ $message }}</p>
                        </div>
                        @enderror
                    <input type="password" class="shipping-input" placeholder="Повтор" id="password-confirm" name="password_confirmation" required autocomplete="new-password">
                        @error('password-confirm')
                        <div style="color: red; font-size: .8rem; width: 100%; transform: translateY(-.75rem);">
                            <p style="text-align: center; width: 100%; margin: 0; padding: 0">{{ $message }}</p>
                        </div>
                        @enderror
                    <button type="submit" name="submit" class="personal-btn">Сменить пароль</button>
                </div>
            </form>
        </div>

    </div>

    @endsection
