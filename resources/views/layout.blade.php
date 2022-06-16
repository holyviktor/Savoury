<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../View/styles/bootstrap-grid.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="../View/styles/style.css">
    <link rel="shortcut icon" href="../View/media/Mask Group.png" type="image/x-icon">
    <title>@yield('title')</title>
</head>
<body>
<header class="container-fluid m-0 pb-4 header">
    <div class="header-background m-0">
        <div class="gradient p-0">
            @if (request()->is('/'))
                <div class="fill">
                </div>
            @else
                <div class="fill cut">
                </div>
            @endif
        </div>
    </div>
    <div class="container-xl header-menu">
        <nav class="row navbar-expand-md navbar dish-nav p-0">
            <div class="col-3 d-flex align-items-center p-0">
                <img src="../View/media/Mask Group.svg" alt="logo" class="logo">
                <h3 class="m-0 logo-title">Savoury</h3>
            </div>
            <div class="header-nav col-7 collapse collapse-horizontal navbar-collapse p-0" id="collapseWidthExample">
                <ul class="navbar-nav flex-column flex-md-row container-fluid d-flex justify-content-between p-0">
                    <li class="nav-item d-flex justify-content-center px-md-3">
                            <a href="{{route('landing')}}" class="nav-text d-flex align-items-center">
                                <img src="../View/media/home 1.svg" alt="main">
                                ГОЛОВНА
                            </a>
                    </li>
                    <li class="nav-item d-flex justify-content-center px-md-3">
                        <a href="{{route('about')}}" class="nav-text d-flex align-items-center">
                            <img src="../View/media/info 1.svg" alt="about">
                            ПРО НАС
                        </a>
                    </li>
                    <li class="nav-item d-flex justify-content-center px-md-3">
                            <a href="{{route('menu')}}" class="nav-text d-flex align-items-center">
                                <img src="../View/media/menu 1.svg" alt="menu">
                                МЕНЮ
                            </a>
                    </li>
                    <li class="nav-item d-flex justify-content-center px-md-3">
                            <a href="{{route('basket')}}" class="basket">
                                <img src="../View/media/shopping-cart.svg" alt="Basket">
                            </a>
                            <a href="{{route('basket')}}" class="nav-text d-flex align-items-center d-md-none">
                                <img src="../View/media/shopping-cart.svg" alt="basket">
                                КОШИК
                            </a>
                    </li>
                </ul>
                <button class="menu-closer" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="true" aria-controls="collapseWidthExample">
                    <img src="../View/media/close-b.svg" alt="menu closer">
                </button>
            </div>
            <div class="col-2 d-flex align-items-center justify-content-end p-0 white">
                +380550000000
            </div>
            <div class="d-md-none col-2 offset-7 d-flex justify-content-end p-0">
                <a href="+380965400409" class="header-call d-flex align-items-center me-3">
                    <img src="../View/media/phone-call.svg" alt="call us">
                </a>
                <button class="btn-menu" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="true" aria-controls="collapseWidthExample">
                    <img src="../View/media/more.svg" alt="menu expander">
                </button>
            </div>
        </nav>
        @if (request()->is('/'))
        <div class="row mt-4 align-items-center">
            <div class="intro col-6 p-0">
                <h2>
                    Доставимо Вашу улюблену їжу  гарячою та смачною!
                </h2>
                <p class="description mt-2">
                    Подолаємо голод разом!
                </p>
                <form action="{{route('menu')}}">
                    <button type="submit" class="d-block header-btn mt-4">
                        ЗАМОВИТИ
                    </button>
                </form>
            </div>
            <aside class="header-image col-6  d-flex justify-content-end p-0">
                <img class = "decor-dish" src="../View/media/decorDish.png" alt="DecorDish">
            </aside>
        </div>
        @endif
    </div>
</header>
@yield("main-content")
<footer class="footer conteiner-fluid ">
    <div class="footer-data container-xl py-3 mx-auto d-flex justify-content-between align-items-center flex-md-row flex-column">
        <div class="footer-text">
            <div class="contacts">
                <p>
                    ЗВ'ЯЖІТЬСЯ З НАМИ
                </p>
                <p>
                    для запитань
                </p>
                <div class="contacts-icon">
                    <a href="https://uk-ua.facebook.com/">
                        <img src="../View/media/facebook.svg" alt="facebook">
                    </a>
                    <a href="https://www.instagram.com/">
                        <img src="../View/media/instagram.svg" alt="instagram">
                    </a>
                    <a href="https://web.telegram.org">
                        <img src="../View/media/telegram.svg" alt="telegram">
                    </a>
                    <a href="https://www.google.com/intl/ru/gmail/about/">
                        <img src="../View/media/gmail-logo.svg" alt="gmail-log">
                    </a>
                    <a href="">
                        <img src="../View/media/phone-call-f.svg" alt="phone-call">
                    </a>
                </div>
            </div>
            <div class="working-hours">
                <p>
                    Години роботи:
                </p>
                <p>
                    9:00-23:00
                </p>
            </div>
            <div class="city">
                <p>
                    Місто:
                </p>
                <p>
                    Київ
                </p>
            </div>
            <div class="address">
                <p>
                    Адреса:
                </p>
                <p>
                    вулиця Хрещатик, 21
                </p>
            </div>
        </div>
        <div class="map">
            <a href="https://www.google.com.ua/maps/place/%D0%9A%D0%B8%D0%B5%D0%B2,+02000/@50.4020355,30.5326905,10z/data=!3m1!4b1!4m5!3m4!1s0x40d4cf4ee15a4505:0x764931d2170146fe!8m2!3d50.4500992!4d30.5234098?hl=ru">
                <img src="../View/media/map.png" alt="location">
            </a>
        </div>
        <div class="contacts-mob">
            <p class="text-center">
                ЗВ'ЯЖІТЬСЯ З НАМИ
            </p>
            <p>
                для запитань
            </p>
            <div class="contacts-icon d-flex justify-content-center">
                <a href="https://uk-ua.facebook.com/">
                    <img src="../View/media/facebook.svg" alt="facebook">
                </a>
                <a href="https://www.instagram.com/">
                    <img src="../View/media/instagram.svg" alt="instagram">
                </a>
                <a href="https://web.telegram.org">
                    <img src="../View/media/telegram.svg" alt="telegram">
                </a>
                <a href="">
                    <img src="../View/media/gmail-logo.svg" alt="gmail-log">
                </a>
                <a href="+380965400409">
                    <img src="../View/media/phone-call-f.svg" alt="phone-call">
                </a>
            </div>
        </div>
    </div>
</footer>
<script src="../View/JS/expander.js"></script>
</body>
</html>

