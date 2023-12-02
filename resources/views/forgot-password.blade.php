@extends('layouts.account')
@section('title', 'Clean | Аккаунт')
@section('content')

    <div class="for-cart">
        <div class="thumb">
            <a href="{{ URL('/') }}"><span>Главная</span></a>
            <span>/</span>
            <a href="{{ route('account') }}"><span>Аккаунт</span></a>
        </div>

        <h2 id="title">Забыли пароль?</h2>

        <div class="account-forms">
            <form action="{{ route('password.email') }}" method="post" class="personal-form">
                @csrf
                <div class="fields-control">
                    <input type="text" name="email" class="shipping-input" placeholder="Ваш Email" value="{{ old('email') }}">
                        @error('email')
                        <div style="color: red; font-size: .8rem; width: 100%; transform: translateY(-.75rem);">
                            <p style="text-align: center; width: 100%; margin: 0; padding: 0">{{ $message }}</p>
                        </div>
                        @enderror
                    <button type="submit" name="submit" class="personal-btn">Получить ссылку</button>
                </div>
                @if(session('status'))
                    <p>Ссылка для сброса пароля была отправлена вам на email</p>
                @endif
            </form>

        </div>

    </div>

    @endsection
