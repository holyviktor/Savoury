<div class="container-fluid px-0 popup-shadow d-flex justify-content-center">
    <div class="popup d-flex flex-column align-items-center py-md-4 py-2">
        <a href="{{route('basket')}}" class="popup-cross">
            <img src="View/media/close-w.svg" alt="cross">
        </a>
        <h2 class="popup-title order mb-md-3 mt-md-3 mb-1 mt-3">
            Оформлення замовлення
        </h2>
        @if ($errors->any())
            <div>
                <ul>
                    @foreach($errors->all() as $error)
                        <li class="errors-popup">{{str_replace($eng, $ua, $error)}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('basket')}}" method="POST">
            @csrf
            <div class="popup-body container-fluid p-0 d-flex flex-column align-items-center">
                <div class="ordering-container">
                    <div class="order-section active">
                        <div class="order-section-title d-flex">
                            <div class="order-section-number">
                                <span class="d-flex justify-content-center align-items-center mt-md-3 mt-2">
                                    1
                                </span>
                            </div>
                            <h3 class="order-section-name">
                                Персональні дані
                            </h3>
                        </div>

                        <div class="order-section-body d-flex ">
                            <span class="order-section-line">
                            </span>
                            <div class="order-section-content pb-md-4 pb-2">
                                <div class="ms-md-5 ms-3">
                                    <p class="order-text mb-0 mt-1">Заповніть поля:</p>
                                    <div class="container-fluid p-0 d-flex flex-md-row flex-column justify-content-between">
                                        <div class="order-input medium mt-4">
                                            <p class="order-input-name">
                                                Ваше ім'я
                                            </p>
                                            <input type="text" name="name">
                                        </div>
                                        <div class="order-input medium mt-4">
                                            <p class="order-input-name">
                                                Номер телефону
                                            </p>
                                            <input type="text" name="phone">
                                        </div>
                                    </div>
                                    <div class="container-fluid p-0 d-flex flex-wrap justify-content-between">
                                        <div class="order-input small mt-4">
                                            <p class="order-input-name">
                                                Вулиця
                                            </p>
                                            <label>
                                                <input type="text" name="street">
                                            </label>
                                        </div>
                                        <div class="order-input small mt-4">
                                            <p class="order-input-name">
                                                Будинок
                                            </p>
                                            <label>
                                                <input type="text" name="house">
                                            </label>
                                        </div>
                                        <div class="order-input small mt-4">
                                            <p class="order-input-name">
                                                Квартира
                                            </p>
                                            <label>
                                                <input type="text" name="flat">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="order-section">
                        <div class="order-section-title d-flex">
                            <div class="order-section-number">
                                <span class="d-flex justify-content-center align-items-center mt-md-3 mt-2">
                                    2
                                </span>
                            </div>
                            <h3 class="order-section-name">
                                Оплата
                            </h3>
                        </div>
                        <div class="order-section-body d-flex">
                            <span class="order-section-line">
                            </span>
                            <div  class="order-section-content pb-4 ">
                                <div class="payment-container ms-md-5 ms-3 d-flex flex-column align-items-center">
                                    <p class="order-text mt-1">
                                        До сплати: <b class="ms-2">{{$total_price}} грн</b>
                                    </p>
                                    <p class="order-text mt-0">Введіть дані про карту:</p>
                                    <div class="debit-card p-4">
                                        <div class="d-flex flex-md-row flex-column align-items-center justify-content-between mb-3">
                                            <label for="cardId" class="card-input-title">Номер карти:</label>
                                            <input class="debit-card-input" type="number" id="cardId1" name="card_number" placeholder="XXXX XXXX XXXX XXXX">
                                        </div>
                                        <div class="d-flex mt-4 mb-3">
                                            <div class="d-flex">
                                                <label for="cardId" class="card-input-title me-2">Термін дії:</label>
                                                <input class = "debit-card-input small" type="text" id="cardId2" name="validity" placeholder="/">
                                            </div>
                                            <div class="d-flex justify-content-end">
                                                <label for="cardId" class="card-input-title me-2">CVV:</label>
                                                <input class = "debit-card-input small" type="number" id="cardId3" name="cvv" placeholder="XXX">
                                            </div>
                                        </div>
                                        <div class="d-flex flex-md-row flex-column align-items-center justify-content-between mt-3 mt-md-4">
                                            <label for="cardId" class="card-input-title">Власник:</label>
                                            <input class = "debit-card-input" type="text" id="cardId4" name="owner">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="order-section">
                        <div class="order-section-title d-flex">
                            <div class="order-section-number">
                                <span class="d-flex justify-content-center align-items-center mt-md-3 mt-2">
                                    3
                                </span>
                            </div>
                            <h3 class="order-section-name">
                                Додатково
                            </h3>
                        </div>

                        <div class="order-section-body d-flex">
                            <span class="order-section-line">

                            </span>
                            <div  class="order-section-content pb-4">
                                <div class="ms-md-5 ms-3">
                                    <div class="container-fluid mt-3 p-0 d-flex flex-column align-items-center">
                                        <p class="order-text mt-1">Додайте коментар до замовлення(за потреби):</p>
                                        <div class="order-input large mt-2">
                                            <p class="order-input-name">
                                                Коментар
                                            </p>
                                            <input type="text" name="comment">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="d-block order-btn header-btn mt-4" type="submit" name="pay">
                    СПЛАТИТИ
                </button>
            </div>
        </form>
    </div>
</div>
<script src="../View/JS/ordering.js"></script>
