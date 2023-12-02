@extends('layouts.delivery')
@section('title', 'Clean | Доставка')
@section('content')

    <div class="shipping">

        <div class="thumb">
            <a href="{{ URL('/') }}"><span>Главная</span></a>
            <span>/</span>
            <a href="{{ route('delivery') }}"><span>Доставка</span></a>
        </div>

        <h2>Доставка</h2>
        <p class="sub-title">Сделать заказ можно через этот сайт или контактный центр по телефону   8 (351) 729 39 06</p>
        <div class="shipping-table">
            <div class="shipping-table-items">
                <div class="shipping-table-item">
                    <p>Минимальный заказ — 350 рублей</p>
                </div>
                <div class="shipping-table-item">
                    <p>Бесплатная доставка – при заказе более 5 000 рублей</p>
                </div>
                <div class="shipping-table-item">
                    <p>Доставка 300 рублей – при заказе от 2 000 до 4 999 рублей</p>
                </div>
                <div class="shipping-table-item">
                    <p>Доставка 350 рублей – при заказе до 1 999 рублей</p>
                </div>
                <div class="shipping-table-item">
                    <p>Доставка осуществляется круглосуточно</p>
                </div>
                <div class="shipping-table-item">
                    <p>Оплата при получении наличными или банковской картой</p>
                </div>
                <div class="shipping-table-item">
                    <p>Вы можете отказаться от любого товара при получении</p>
                </div>
                <div class="shipping-table-item">
                    <p>Территория доставки – весь Челябинск</p>
                </div>
            </div>
        </div>
    </div>

    @endsection