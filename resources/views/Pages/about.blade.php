@extends('layout')
@section('title')
    About
@endsection
@section('main-content')
<section class="about-info container-fluid">
    <div class="container-xl p-0 d-flex flex-column align-items-center">
        <h2 class="dishes-menu-title title align-items-center justify-content-center d-flex text-center">
                <span class="all-big-titles">
                    ПРО НАС
                </span>
        </h2>
        <div class="about-info-content my-md-2 my-2">
            <p>Savoury - це доставка їжі з смачними стравами та приємними цінами в Києві. </p>
            <p>Ми працюємо з 9:00 до 23:00, щоб кожна людина могла насолодитися пікантним смаком нашої свіжоприготованої їжі.</p>
            <p>Для нас клієнт завжди правий, тому не переймайтесь - зворотній зв’язок забезпечений на високому рівні.</p>
            <p>Позиції нашого меню готуються з якісних продуктів одразу після Вашого замовлення професійними кухарями з великим стажем роботи , тому їжа буде доставлена свіжою. Наша безкоштовна доставка триває від години, в залежності від Вашого місцезнаходження.</p>
            <p>Доставимо їжу в будь-яку точку Києва гарячою та смачною через 1.5 години після замолення.</p>
            <p>Не вірите? Спробуйте!</p>
        </div>
    </div>
</section>
<section class="container-fluid about-steps pb-5">
    <div class="container-xl p-0 d-flex flex-column align-items-center">
        <h2 class="about-steps-title title-top about-steps-title d-flex flex-column align-items-center text-center my-3">
                <span class="dishes-menu-name-category">
                    КРОКИ ДО НАСОЛОДИ
                </span>
        </h2>
        <div class="about-steps-inner container-fluid p-0 d-flex flex-md-column flex-row-reverse align-items-center justify-content-center">
            <div class="about-steps-container container-fluid p-0 d-flex flex-md-row flex-column justify-content-between mt-3 mt-md-4">
                <div class="about-steps-step d-flex flex-md-column flex-row align-items-center">
                    <img src="View/media/food-service.svg" alt="choose">
                    <p class="about-steps-description text-md-center">
                        Обирайте страви та робіть замовлення на сайті.
                    </p>
                </div>
                <div class="about-steps-step d-flex flex-md-column flex-row align-items-center">
                    <img src="View/media/debit-card.svg" alt="payment">
                    <p class="about-steps-description text-md-center">
                        Оплатіть замовлення на сайті.
                    </p>
                </div>
                <div class="about-steps-step d-flex flex-md-column flex-row align-items-center">
                    <img src="View/media/operator.svg" alt="operator">
                    <p class="about-steps-description text-md-center">
                        З Вами зв’яжеться оператор та озвучить час доставки.
                    </p>
                </div>
                <div class="about-steps-step d-flex flex-md-column flex-row align-items-center">
                    <img src="View/media/food-delivery.svg" alt="wait">
                    <p class="about-steps-description text-md-center">
                        Дочекайтеся кур’єра та насолоджуйтеся смачною їжею.
                    </p>
                </div>
            </div>
            <div class="about-steps-bar d-flex flex-column flex-md-row justify-content-between mt-md-3 my-0 me-3 ms-3 mx-md-0 mb-md-4 ">
                  <span class="about-steps-circle d-flex align-items-center justify-content-center">
                        1
                  </span>
                <span class="about-steps-circle d-flex align-items-center justify-content-center">
                        2
                  </span>
                <span class="about-steps-circle d-flex align-items-center justify-content-center">
                        3
                  </span>
                <span class="about-steps-circle d-flex align-items-center justify-content-center">
                        4
                  </span>
            </div>
        </div>
        <p class="about-steps-wish">
            Приємного апетиту!
        </p>
    </div>
</section>
@endsection
