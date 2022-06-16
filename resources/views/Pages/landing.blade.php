@extends('layout')

@section('title')
    Savoury
@endsection

@section('main-content')
    @if(isset($showItem) && $showItem)
        @include("Pages/item")
    @endif
    <section class="preview container-fluid">
        <ul class="benefits container-xl d-flex justify-content-between p-0">
            <li class="d-flex flex-column justify-content-end align-items-center">
                <img src="../View/media/delicious.png" alt="">
                <p>
                    Смачна Їжа
                </p>
            </li>
            <li class="d-flex flex-column justify-content-end align-items-center">
                <img src="../View/media/delivery-man.png" alt="">
                <p>
                    Безкоштовна Доставка
                </p>
            </li>
            <li class="d-flex flex-column justify-content-end align-items-center">
                <img src="../View/media/low-price.png" alt="">
                <p>
                    Низькі Ціни
                </p>
            </li>
            <li class="d-flex flex-column justify-content-end align-items-center">
                <img src="../View/media/healthy-food.png" alt="">
                <p>
                    Якісні Продукти
                </p>
            </li>
        </ul>
        <div class="preview-intro container-xl p-0">
            <h2 class="title text-center d-flex align-items-center justify-content-center container-fluid p-0">
                <span class="preview-title">
                    ЛАСКАВО ПРОСИМО ДО SAVOURY!
                </span>
            </h2>
            <div class="preview-content mt-4">
                <img src="../View/media/landing-croissant.png" alt="delicious" class="preview-img">
                <p class="preview-text mb-0">
                    Якщо Ви хочете смачно поїсти, але не маєте часу на приготування їжі, Savory допоможе вирішити цю проблему.
                </p>
                <p class="preview-text mb-0">
                    Доставка їжі від Sauvory – це послуга для тих, хто цінує смачну, ситну та якісну їжу.
                </p>
                <p class="preview-text mb-0">
                    Замовляючи їжу у нас, Ви гарантовано отримаєте якісно приготовану страву. Наші професійні кухарі готують для Вас на найсучаснішому обладнанні із найсвіжіших продуктів.
                </p>
                <p class="preview-text mb-0">
                    Ми доставимо замовлення в будь-яку точку Києва, а їжа буде все ще гарячою!
                </p>
                <p class="preview-text mb-0">
                    Величезний вибір різноманітних страв задовольнить смаки навіть найвибагливіших гурманів.
                </p>
                <img src="../View/media/landing-croissant-mob.png" alt="delicious" class="preview-img-mob">
            </div>
        </div>
    </section>
    @if(isset($dish_of_the_day->dish))
    <section class="daily-dish container-fluid py-3">
        <div class="container-xl p-0 d-flex flex-column align-items-center">
            <h1 class="daily-dish-title">
                СТРАВА ДНЯ!
            </h1>
            <div class="daily-dish-content container-fluid p-0 mt-md-3 mt-0 d-flex justify-content-between align-items-center">
                <div class="daily-dish-discount d-flex flex-column justify-content-between">
                    <div class="daily-dish-circle">
                        <h1>
                            Sale {{$dish_of_the_day->discount}}%
                        </h1>
                    </div>
                    <div class="daily-dish-line">
                        <h2 class="prev-price">
                            Стара ціна: {{$dish_of_the_day->dish->price}}₴
                        </h2>
                        <h1 class="curr-price">
                            Нова ціна: {{$dish_of_the_day->dish->price*(1 - $dish_of_the_day->discount/100)}}₴
                        </h1>
                    </div>
                    <div class="daily-dish-circle">
                        <h1>
                            Sale {{$dish_of_the_day->discount}}%
                        </h1>
                    </div>
                </div>
                <div class="daily-dish-text d-flex align-items-center flex-column">
                    <h2 class="daily-dish-name">
                        {{$dish_of_the_day->dish->name}}
                    </h2>
                    <form action="{{route('menu')}}" class="daily-dish-ingred">
                        <p>
                            @foreach($dish_of_the_day->dish->ingredients as $ingredient)
                                <button class="popup-ingredients p-0" type="submit" value="{{$ingredient->name}}" name="search">
                                    @if(count($dish_of_the_day->dish->ingredients) -1 !== $loop->index)
                                        {{$ingredient->name}},
                                    @else
                                        {{$ingredient->name}}
                                    @endif
                                </button>
                            @endforeach
                        </p>
                    </form>
                    <p class="prev-price-mob">Стара ціна: {{$dish_of_the_day->dish->price}}₴</p>
                    <p class="curr-price-mob">Нова ціна: {{$dish_of_the_day->dish->price*(1-$dish_of_the_day->discount/100)}}₴</p>
                    <form action="{{route('landing')}}" method="POST">
                        @csrf
                        <button class="daily-btn mt-2" type="submit" name="outerCart">
                            <input type="hidden" name="item" value="{{$dish_of_the_day->dish->id}}">
                            ЗАМОВИТИ
                        </button>
                    </form>

                </div>
                <div class="outer">
                    <div class="discount-percent d-flex d-md-none">
                        <h1 class="daily-dish-name">
                            Sale {{$dish_of_the_day->discount}}%
                        </h1>
                    </div>
                    <div class="daily-dish-image">
                        <div class="img-frame1"></div>
                        <div class="img-frame2"></div>
                        <div class="img-frame3"></div>
                        <div class="img-frame4"></div>
                        <form action="{{route('landing')}}" class="p-0">
                            <button type="submit" name="item" value="{{$dish_of_the_day->dish_id}}">
                                <img src="{{$dish_of_the_day->dish->photo}}" alt="daily-dish">
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    <section class="dishes-menu container-fluid">
        <div class="container-xl d-flex flex-column align-items-center p-0">
            <h2 class="dishes-menu-title title align-items-center justify-content-center d-flex text-center">
                <span class="all-big-titles">
                    НАШЕ МЕНЮ
                </span>
            </h2>
            <div class="dishes-menu-content container-fluid p-0 mt-md-4 my-3">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        @foreach($dishes as $dish)
                        <div class="dishes-menu-card card swiper-slide">
                            <form action="{{route('landing')}}" class="p-0">
                                <button type="submit" name="item" value="{{$dish->id}}" class="btn-photo p-0">
                                    <img class="dishes-menu-img card-img-top" src="{{$dish->photo}}" alt="Card image cap">
                                </button>
                            </form>
                            <div class="card-body p-0 py-3 pb-2 row m-0">
                                <div class="col-md-9 col-7 p-0">
                                    <h5 class="card-title">{{$dish->name}}</h5>
                                    @if(isset($dish_of_the_day) && $dish->id == $dish_of_the_day->dish_id)
                                        <p class="card-text">Ціна: {{$dish->price*(1-$dish_of_the_day->discount/100)}}₴</p>
                                    @else
                                        <p class="card-text">Ціна: {{$dish->price}}₴</p>
                                    @endif

                                </div>
                                <form action="{{route('landing')}}" method="POST" class="d-flex align-items-center col-md-3 col-5 p-0 pr-2 justify-content-center">
                                    @csrf
                                    <button type="submit" name="outerCart">
                                        <i class="menu-basket basket">
                                            <input type="hidden" class="form-control" name="item" value="{{$dish->id}}">
                                            <img src="View/media/shopping-cart.svg" alt="Basket">
                                        </i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="swiper-button-prev">
                    <img src="View/media/arrow left.svg" class="menu-arrow" alt="left arrow">
                </div>
                <div class="swiper-button-next">
                    <img src="View/media/arrow right.svg" class="menu-arrow" alt="right arrow">
                </div>

            </div>
            <form action="{{route('menu')}}">
                <button class="dishes-menu-btn" type="submit">
                    БІЛЬШЕ
                </button>
            </form>
        </div>
    </section>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script src="../View/JS/app.js"></script>
@endsection
