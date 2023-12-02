<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
    <link href="{{asset('css/popup.css')}}" rel="stylesheet">
    <link href="{{asset('css/product.css')}}" rel="stylesheet">
    <link href="{{asset('css/glass.css')}}" rel="stylesheet">
</head>
<body class="body_hide">

{{--<div class="preloader" id="page-preloader">
    <div class="loader"><span id="load_perc">0%</span></div>
</div>--}}

<header>
    <div class="header-item logo">
        <div class="logo-icon" id="logo-icon">
            <i class="fa fa-tint"></i>
        </div>
        <div class="logo-slogan">
            <h1>Clear</h1>
            <h3>Уборочный инвентарь<br>
                и моющие средства</h3>
        </div>
    </div>
    <div class="header-item contacts">
        <div class="phone">
            <i class="fa fa-phone"></i>
            <span>8 (351) 729 39 06</span>
        </div>
        <div class="location">
            <i class="fa fa-map-marker"></i>
            <span>Челябинск, ул.Энгельса, 44</span>
        </div>
        <div class="location">
            <i class="fa fa-clock-o"></i>
            <span>09:00 – 18:00</span>
        </div>
    </div>
    <div class="social" id="social">
        <p>
            <i class="fa fa-facebook fa-social"></i>
            <i class="fa fa-odnoklassniki fa-social"></i>
            <i class="fa fa-vk fa-social"></i>
            <i class="fa fa-whatsapp fa-social"></i>
        </p>
    </div>
</header>
<div class="bg-nav">
    <div class="navigation">
        <div class="mobile-nav">
            <input type="checkbox" id="checkbox4" class="checkbox4 visuallyHidden">
            <label for="checkbox4">
                <div class="hamburger hamburger4" id="hamburger">
                    <span class="bar"></span>
                </div>
            </label>
        </div>
        <ul>
            <li><a href="{{ route('welcome') }}">Главная</a></li>
            <li><a href="{{ route('categories') }}">Категории</a></li>
            <li><a href="{{ route('delivery') }}">Доставка</a></li>
            <li><a href="{{ route('promo') }}">Акции</a></li>
            <li><a href="{{ route('contacts') }}">Контакты</a></li>
        </ul>
        <div class="cabinet">
            <div class="cabinet-user">
                @guest
                <a href="#popupin">
                    <img src="{{asset('images/user.png')}}" alt="">
                </a>
                @endguest
                @auth
                <a href="{{ route('account') }}">
                    <img src="{{asset('images/userin.png')}}" alt="">
                </a>
                @endauth
            </div>
            @auth
                <div class="cabinet-favorites">
                    <a href="{{ route('wishlist') }}">
                        <img src="{{asset('images/favorites.png')}}" alt="">
                    </a>
                </div>
            @endauth
            <div class="cabinet-cart">
                <a href="{{ route('carts') }}">
                    <img src="{{asset('images/cart.png')}}" alt="">
                    <div class="cart-count">{{ Cart::count() }}</div>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="mobile-menu" id="mobile-menu">
    <ul>
        <a href="#" class="mobile-menu-close" id="mobile-menu-close">
            <i class="fa fa-times"></i>
        </a>
        <li class=""><a href="{{ route('welcome') }}">Главная</a></li>
        <li class=""><a href="{{ route('categories') }}">Категории</a></li>
        <li class=""><a href="{{ route('delivery') }}">Доставка</a></li>
        <li class=""><a href="{{ route('promo') }}">Акции</a></li>
        <li class=""><a href="{{ route('contacts') }}">Контакты</a></li>
    </ul>
</div>

@yield('content')

<div id="toTop"><i class="fa fa-arrow-circle-up fa-slogan"></i></div>

<div class="bg-footer">
    <div class="footer">
        <div class="footer-item-policy2">
            <a href="">Политика компании в отношении обработки персовнальных данных</a>
            <a href=""><i class="fa fa-envelope"></i>&ensp;clear@gmail.com</a>
        </div>
        <div class="footer-item-policy">
            <a href="">Политика компании в отношении<br>обработки персовнальных данных</a>
            <a href=""><i class="fa fa-envelope"></i>&ensp;clear@gmail.com</a>
        </div>
        <div class="footer-item">
            <a href="">Доставка и оплата</a>
            <a href="">Возврат и обмен</a>
            <a href="">Покупка в кредит</a>
        </div>
        <div class="footer-item">
            <a href="#">Поставщикам</a>
            <a href="#">Юридическим лицам</a>
            <a href="#">Карта сайта</a>
        </div>
        <div class="footer-item-form">
            <form>
                <input type="text" class="footer-input" placeholder="Ваш e-mail">
                <button type="submit" class="footer-btn">Подписаться</button>
            </form>
        </div>
    </div>
</div>

<div class="copyright">
    <a href="http://wd-asha.ru">
        <p>&copy; wd-asha</p>
    </a>
</div>

<div class="sorry">
    <p>Извените, сайт не оптимизирован под данную ширину экрана. Минимальная ширина 320px</p>
</div>

<div class="fix-box" id="fix-box"></div>

{{-- Modal Login --}}
<div class="popup" id="popupin">
    <a href="#fix-box" class="popup_area"></a>
    <div class="popup_body">
        <div class="popup_content">
            <a href="#fix-box" class="popup_close">
                <i class="fa fa-times"></i>
            </a>
            <div class="popup_title">
                Вход
            </div>
            <div class="popup_text">
                <form class="login-form" action="{{ route('login') }}" method="POST">
                    @csrf
                    <input class="login-input" name="email" type="email" placeholder="Email *">
                    @error('email')
                    <div style="color: red; font-size: .8rem; width: 100%; transform: translateY(-.75rem);">
                        <p style="text-align: center; width: 100%; margin: 0; padding: 0">{{ $message }}</p>
                    </div>
                    @enderror
                    <div style="position: relative">
                        <input class="login-input" name="password" id="password-input3" type="password" placeholder="Пароль *">
                        <a href="#" class="password-control" onclick="return show_hide_password3(this);"></a>
                        @error('password')
                        <div style="color: red; font-size: .8rem; width: 100%; transform: translateY(-.75rem);">
                            <p style="text-align: center; width: 100%; margin: 0; padding: 0">{{ $message }}</p>
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="login_submit">Войти</button>
                </form>
                <a href="{{ route('password.reque') }}">Забыли пароль?</a>
                <a href="#popupout" class="last-link">Hет аккаунта?</a>
            </div>
        </div>
    </div>
</div>
{{-- end modal login --}}
{{-- Modal Register --}}
<div class="popup" id="popupout">
    <a href="#fix-box" class="popup_area"></a>
    <div class="popup_body">
        <div class="popup_content">
            <a href="#fix-box" class="popup_close">
                <i class="fa fa-times"></i>
            </a>
            <div class="popup_title">
                Регистрация
            </div>
            <div class="popup_text">
                <form class="login-form" action="{{ route('register') }}" method="POST">
                    @csrf
                    <input class="login-input" name="name" type="text" placeholder="Имя *" value="{{ old('name') }}">
                    @error('name')
                    <div style="color: red; font-size: .8rem; width: 100%;transform: translateY(-.75rem);">
                        <p style="text-align: center; width: 100%; margin: 0; padding: 0">{{ $message }}</p>
                    </div>
                    @enderror
                    <input class="login-input" name="email" type="text" placeholder="Email *">
                    @error('email')
                    <div style="color: red; font-size: .8rem; width: 100%; transform: translateY(-.75rem);">
                        <p style="text-align: center; width: 100%; margin: 0; padding: 0">{{ $message }}</p>
                    </div>
                    @enderror
                    <div style="position: relative">
                        <input class="login-input" name="password" id="password-input4" type="password" placeholder="Пароль *">
                        <a href="#" class="password-control" onclick="return show_hide_password4(this);"></a>
                        @error('password')
                        <div style="color: red; font-size: .8rem; width: 100%; transform: translateY(-.75rem);">
                            <p style="text-align: center; width: 100%; margin: 0; padding: 0">{{ $message }}</p>
                        </div>
                        @enderror
                    </div>
                    <div style="position: relative">
                        <input class="login-input" name="password_confirmation" id="password-input5" type="password" placeholder="Пароль еще раз *">
                        <a href="#" class="password-control" onclick="return show_hide_password5(this);"></a>
                        @error('password_confirmation')
                        <div style="color: red; font-size: .8rem; width: 100%; transform: translateY(-.75rem);">
                            <p style="text-align: center; width: 100%; margin: 0; padding: 0">{{ $message }}</p>
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="login_submit">Зарегистрировать</button>
                </form>
                <div style="text-align: center; margin-bottom: 1rem">
                    <input type="checkbox" id="degree" style="font-size: .8rem; line-height: .8rem;">
                    <label for="degree" style="font-size: .9rem; line-height: .8rem;">Согласие на обработку персональных данных</label>
                </div>
                <a href="#popupin" class="reg-link">Уже есть аккаунт?</a>
            </div>
        </div>
    </div>
</div>
{{-- end modal register --}}

<!-- Preloader -->
<script>
    setTimeout(function(){
        document.body.classList.add('body_visible');
    }, 200);
    /*let
        images = document.images,
        images_total_count = images.length,
        images_loaded_count = 0,
        preloader = document.getElementById('page-preloader'),
        perc_display = document.getElementById('load_perc');
    for( let i = 0; i < images_total_count; i++) {
        image_clone = new Image();
        image_clone.onload = image_loaded;
        image_clone.onerror = image_loaded;
        image_clone.src = images[i].src;
    }

    function image_loaded() {
        images_loaded_count++;
        perc_display.innerHTML = (((100 / images_total_count) * images_loaded_count) << 0) + '%';
        if(images_loaded_count >= images_total_count) {
            setTimeout(function () {
                if (!preloader.classList.contains('done')) {
                    preloader.classList.add('done');
                }
            }, 500);
        }
    }*/
</script>

<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>

<script>
    function show_hide_password3(target){
        let input3 = document.getElementById('password-input3');
        if (input3.getAttribute('type') === 'password') {
            target.classList.add('view');
            input3.setAttribute('type', 'text');
        } else {
            target.classList.remove('view');
            input3.setAttribute('type', 'password');
        }
        return false;
    }
    function show_hide_password4(target){
        let input4 = document.getElementById('password-input4');
        if (input4.getAttribute('type') === 'password') {
            target.classList.add('view');
            input4.setAttribute('type', 'text');
        } else {
            target.classList.remove('view');
            input4.setAttribute('type', 'password');
        }
        return false;
    }
    function show_hide_password5(target){
        let input5 = document.getElementById('password-input5');
        if (input5.getAttribute('type') === 'password') {
            target.classList.add('view');
            input5.setAttribute('type', 'text');
        } else {
            target.classList.remove('view');
            input5.setAttribute('type', 'password');
        }
        return false;
    }
</script>

<script>
    let
        images = document.images,
        images_total_count = images.length,
        images_loaded_count = 0,
        preloader = document.getElementById('page-preloader'),
        perc_display = document.getElementById('load_perc');
    for( let i = 0; i < images_total_count; i++) {
        image_clone = new Image();
        image_clone.onload = image_loaded;
        image_clone.onerror = image_loaded;
        image_clone.src = images[i].src;
    }

    function image_loaded() {
        images_loaded_count++;
        perc_display.innerHTML = (((100 / images_total_count) * images_loaded_count) << 0) + '%';
        if(images_loaded_count >= images_total_count) {
            setTimeout(function () {
                if (!preloader.classList.contains('done')) {
                    preloader.classList.add('done');
                }
            }, 500);
        }
    }
</script>

<!-- Scroll Up -->
<script>
    $(function() {
        $(window).scroll(function() {
            if($(this).scrollTop() > 300) {
                $('#toTop').fadeIn();
            } else {
                $('#toTop').fadeOut();
            }
        });
        $('#toTop').click(function() {
            $('body,html').animate({scrollTop:0},800);
        });
    });
</script>

<script>
    $(document).ready(function(){

        $('#hamburger').click(function(){
            $('#mobile-menu').toggleClass('mobile-menu-down');
        });

        let $productsItem = $('.products-item');
        let $mobileMenuClose = $('.mobile-menu-close');

        $mobileMenuClose.click(function(e){
            e.preventDefault();
            $('#mobile-menu').toggleClass('mobile-menu-down');
        });

        $productsItem.mouseover( function() {
            $(this).find('img').css({"transition" : "0.8s", "opacity" : 0.6});
            $(this).children('.my-fa').css({"display" : "block"});
            $(this).children('h3').css({"color" : "rgba(255, 255, 255, 1.0)"});
            $(this).children('p').css({"color" : "rgba(255, 255, 255, 1.0)"});
        });
        $productsItem.mouseout( function() {
            $(this).find('img').css({"opacity" : 1});
            $(this).children('.my-fa').css({"display" : "none"});
            $(this).children('h3').css({"color" : "rgba(255, 255, 255, .8)"});
            $(this).children('p').css({"color" : "rgba(255, 255, 255, .8)"});
        });
    });
</script>

<script>
    let qtyMinus = document.querySelector('#qtyMinus');
    let qtyPlus = document.querySelector('#qtyPlus');
    let qtyCount = document.querySelector('#qtyCount');
    let qtyH = document.querySelector('#qtyH');
    function minusQty() {
        if(Number(qtyCount.innerHTML) > 1) {
            qtyCount.innerHTML = Number(qtyCount.innerHTML) - 1;
            qtyH.setAttribute('value', Number(qtyH.value) - 1);
        }
    }
    function plusQty() {
        qtyCount.innerHTML = Number(qtyCount.innerHTML) + 1;
        qtyH.setAttribute('value', Number(qtyH.value) + 1);
    }
    qtyMinus.addEventListener('click', minusQty);
    qtyPlus.addEventListener('click', plusQty);
</script>

</body>
</html>
