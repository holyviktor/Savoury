@extends('layout')
@section('title')
    Basket
@endsection
@section('main-content')
    @if(isset($showItem) && $showItem)
        @include("Pages/item")
    @endif
    @if(isset($showOrdering) && $showOrdering)
        @include("Pages/ordering")
    @endif
    @if(isset($showMessage) && $showMessage)
        @include("Pages/message")
    @endif
    <section class="basket-order container-fluid px-0">
        <h2 class="dishes-menu-title title align-items-center justify-content-center d-flex text-center mx-auto">
            <span class="all-big-titles basket-name mx-md-2 mx-1">
                КОШИК
            </span>
        </h2>
        @if (count($dishes_basket)>0)
        <div class="container-fluid p-0 d-flex mt-md-5 mt-3 justify-content-between flex-md-row flex-column">
            <div class="basket-orders">
                @foreach($dishes_basket as $dish_basket)
                <div class="basket-order-frame d-flex justify-content-between align-items-center py-3 mb-1 mb-md-3">
                    <div class="basket-order-info d-flex">
                        <form action="{{route('basket')}}" class="p-0">
                            <button type="submit" name="item" value="{{$dish_basket->id}}">
                                <img src="../{{$dish_basket->photo}}" alt="Card image cap">
                            </button>
                        </form>
                        <div class="basket-order-content ms-md-3 ms-3">
                            <h2 class="basket-order-name mt-2">
                                {{$dish_basket->name}}
                            </h2>
                            <form action="{{route('menu')}}">
                                <p class="basket-order-ingred">
                                    @foreach($dish_basket->ingredients as $ingredient)
                                        <button class="popup-ingredients p-0" type="submit" value="{{$ingredient->name}}" name="search">
                                            @if(count($dish_basket->ingredients) -1 !== $loop->index)
                                                {{$ingredient->name}},
                                            @else
                                                {{$ingredient->name}}
                                            @endif
                                        </button>

                                    @endforeach
                                </p>
                            </form>
                        </div>
                    </div>
                    <div class="basket-order-amount d-flex flex-column align-items-center">
                        <form action="{{route('basket')}}" method="POST" name="counterBasket" class="basket-order-counter basket-order-counter-form d-flex m-0 align-items-center justify-content-center">
                            @csrf
                            <div class="d-flex align-items-center justify-content-center">
                                <button class="btn-add" type="submit" name="decrement" value="{{$dish_basket->id}}">-</button>
                                <input type="number" name="input" value="{{$count[$dish_basket->id]}}" class="p-0">
                                <input type="hidden" name="value" value="{{$dish_basket->id}}">
                                <button class="btn-add" type="submit" name="increment" value="{{$dish_basket->id}}">+</button>
                            </div>
                        </form>
                        <div class="basket-order-price">
                            @if(isset($dish_of_the_day) && $dish_basket->id == $dish_of_the_day->dish_id)
                                {{$dish_basket->price*(1-$dish_of_the_day->discount/100)*$count[$dish_basket->id]}}₴
                            @else
                                {{$dish_basket->price*$count[$dish_basket->id]}}₴
                            @endif
                        </div>
                    </div>
                    <form action="{{route('basket')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$dish_basket->id}}">
                        <button class="basket-order-cross" type="submit" name="delete">
                            <img src="../View/media/close-b.svg" alt="cross">
                        </button>
                    </form>
                </div>
                @endforeach
            </div>
            <div class="basket-recap p-md-3 ps-md-4 p-3 d-flex d-md-block flex-column align-items-center mt-5 mt-md-0">
                <h2 class = "basket-recap-title">
                    Ваше замовлення
                </h2>
                <div class="d-flex d-md-block align-items-center">
                    <p class="mb-0 mt-md-3 mt-0 me-1 d-inline">
                        Загальна сума:
                    </p>
                    <h3 class="d-md-block d-inline">
                        {{$total_price}}₴
                    </h3>
                </div>
                <form action="{{route('basket')}}">
                    <button type="submit" name="ordering" class="daily-btn mt-md-4 mt-2">
                        ЗАМОВИТИ
                    </button>
                </form>
            </div>
        </div>
        @else
            @component('Components/errors')
                Кошик порожній!
            @endcomponent
        @endif
    </section>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="../View/JS/basket.js"></script>
    <script src="../View/JS/writeClient.js"></script>
@endsection
