@extends('layouts.contacts')
@section('title', 'Clean | Контакты')
@section('content')

    <div class="contacts-page">

        <div class="thumb">
            <a href="{{ URL('/') }}"><span>Главная</span></a>
            <span>/</span>
            <a href="{{ route('contacts') }}"><span>Контакты</span></a>
        </div>

        <h2>Контакты</h2>

        <div class="about">
            <p>«Clear» — производитель профессиональных моющих средств с 2002 года. Высокое качество продукции полностью обеспечивает соблюдение гигиены на любых объектах. Наш портфель предложений включает профессиональные моющие, бытовые и дезинфицирующие средства и решает любые задачи в различных отраслях промышленности.</p>
            <p>В сотрудничестве с нашими клиентами мы предлагаем инновационные конкурентоспособные решения в области гигиены, чистоты и дезинфекции. Используя передовые технологии и накопленный опыт, мы способствуем новым рыночным возможностям наших заказчиков.</p>
            <p>Мы строим свой бизнес в соответствии с принципами концепции «устойчивого развития». Наша цель состоит в том, чтобы стать лидером в сегменте профессиональной химии, используя в работе следующие принципы:<br>
                • инновации в производстве продукции;<br>
                • точное ориентирование на потребности заказчика;<br>
                • формирование лучшей команды сотрудников;<br>
                • обеспечение устойчивого развития бизнеса в сочетании с защитой окружающей среды и социальной ответственностью.
            </p>
            <p>Следование этим принципам создает дополнительные преимущества для компании «Clear» и его партнеров.</p>
        </div>

        <div class="contacts-page-item">
            <div class="item-dep">
                Генеральный директор
            </div>
            <div class="item-name">
                <span>Галкина Людмила Васильевна</span>
            </div>
            <div class="item-phone">
                <i class="fa fa-phone"></i>&ensp;
                7 (351) 729-39-55
            </div>
            <div class="item-email">
                <i class="fa fa-envelope"></i>&ensp;
                clear-info@gmail.com
            </div>
        </div>
        <div class="contacts-page-item">
            <div class="item-dep">
                Специалист по тендерам
            </div>
            <div class="item-name">
                <span>Журавлев Олег Егорович</span>
            </div>
            <div class="item-phone">
                <i class="fa fa-phone"></i>&ensp;
                89227045481
            </div>
            <div class="item-email">
                <i class="fa fa-envelope"></i>&ensp;
                tender-clear@gmail.com
            </div>
        </div>
        <div class="contacts-page-item">
            <div class="item-dep">
                Менеджер с клиентами
            </div>
            <div class="item-name">
                <span>Синицина Мария Алексеевна </span>
            </div>
            <div class="item-phone">
                <i class="fa fa-phone"></i>&ensp;
                7 (351) 778-12-14
            </div>
            <div class="item-email">
                <i class="fa fa-envelope"></i>&ensp;
                sales-clear@gmail.com
            </div>
        </div>
        <div class="contacts-page-item">
            <div class="item-dep">
                Менеджер по продажам
            </div>
            <div class="item-name">
                <span>Орлов Виктор Федерович </span>
            </div>
            <div class="item-phone">
                <i class="fa fa-phone"></i>&ensp;
                7 (351) 729-39-77
            </div>
            <div class="item-email">
                <i class="fa fa-envelope"></i>&ensp;
                sales-clear@gmail.com
            </div>
        </div>
    </div>

    <div class="contact-page-form">
        <div class="contact-page-form-left">
            <p>ООО «Clear»</p>
            <p><i class="fa fa-map-marker"></i>&ensp;Челябинск, ул.Мира, 44</p>
            <p><i class="fa fa-phone"></i>&ensp;7 (351) 729-39-55</p>
            <p><i class="fa fa-phone"></i>&ensp;7 (351) 729-39-77</p>
            <p><i class="fa fa-phone"></i>&ensp;7 (351) 729-39-06</p>
            <p><i class="fa fa-envelope"></i>&ensp;clear@gmail.com</p>
        </div>
        <div class="contact-page-form-left2">
            <div>
                <p>ООО «Clear»</p>
                <p><i class="fa fa-map-marker"></i>&ensp;Челябинск, ул.Мира, 44</p>
                <p><i class="fa fa-envelope"></i>&ensp;clear@gmail.com</p>
            </div>
            <div>
                <p><i class="fa fa-phone"></i>&ensp;7 (351) 729-39-55</p>
                <p><i class="fa fa-phone"></i>&ensp;7 (351) 729-39-77</p>
                <p><i class="fa fa-phone"></i>&ensp;7 (351) 729-39-06</p>
            </div>
        </div>
        <div class="contact-page-form-right">
            <form class="contact-form" action="" method="POST">
                @csrf
                <div class="contact-form-left">
                    <input type="text" name="name" placeholder="Имя">
                    <input type="text" name="email" placeholder="Email">
                    <input type="text" name="phone" placeholder="Телефон">
                </div>
                <div class="contact-form-right">
                    <textarea placeholder="Ваше сообщение" name="message"></textarea>
                    <button type="submit" name="submit">Отправить</button>
                </div>
            </form>
        </div>
    </div>

    @endsection