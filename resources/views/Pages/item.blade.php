<div class="container-fluid p-0 popup-shadow d-flex align-items-center justify-content-center">
    <div class="popup d-flex flex-column align-items-center p-md-4 p-2">
        <form action="">
            <button class="popup-cross" type="submit">
                <img src="../View/media/close-w.svg" alt="cross">
            </button>
        </form>
        <h2 class="popup-title mb-d-4 mb-2 ">
            {{$dish->name}}
        </h2>
        <div class="popup-body d-flex  mb-d-4 mb-2">
            <img src="../{{$dish->photo}}" alt="toast">
            <div class="popup-content d-flex flex-column justify-content-between ms-md-3 ms-2">
                <p class="popup-line">
                    @if(isset($dish_of_the_day) && $dish->id == $dish_of_the_day->dish_id)
                        ЦІНА:<b>{{$dish->price*(1-$dish_of_the_day->discount/100)}}₴</b>
                    @else
                        ЦІНА:<b>{{$dish->price}}₴</b>
                    @endif
                </p>
                <p class="popup-line">
                    ВАГА: <b>{{$dish->weight}}г</b>
                </p>
                <div class="popup-line">
                    <form action="{{route('menu')}}">
                        <button class="popup-line p-0 m-0 text-align-l" type="submit" value="{{$category->name}}" name="category">
                            КАТЕГОРІЯ: <b>{{$category->name}}</b>
                        </button>
                    </form>
                </div>
                <div class="popup-line mb-0">
                    <form action="{{route('menu')}}">
                        @if (count($dish->ingredients)>0)
                        <div class="popup-line">
                            СКЛАД:
                            <div>
                                @foreach($dish->ingredients as $ingredient)
                                    <button class="popup-ingredients p-0 mb-0" type="submit" value="{{$ingredient->name}}" name="search">
                                        @if(count($dish->ingredients) -1 !== $loop->index)
                                            {{$ingredient->name}},
                                        @else
                                            {{$ingredient->name}}
                                        @endif
                                    </button>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </form>
                </div>
                <form class="form-item" action="" method="POST" name="counterItem">
                    @csrf
                    <div class="popup-controlls d-md-flex d-none justify-content-between align-items-center">
                        <div class="basket-order-counter counter-popup d-flex">
                            <button class="btn-add" name="decrementItem" value="{{$dish->id}}">-</button>
                            <input type="number" name="inputItem" value="{{$value}}" class="btn-add count-input">
                            <button class="btn-add" name="incrementItem" value="{{$dish->id}}">+</button>
                        </div>
                            <button class="dishes-menu-btn popup-btn" type="submit" name="itemToBasket">
                                У КОШИК
                            </button>
                    </div>
                </form>
            </div>
        </div>
        <form class="form-item" action="" method="POST" name="counterItem">
            @csrf
            <div class="popup-controlls d-md-none d-flex justify-content-between align-items-center">
                <div class="basket-order-counter counter-popup d-flex justify-content-center">
                    <button name="decrementItem" value="{{$dish->id}}" class="btn-add">-</button>
                    <input type="number" name="inputItem" value="{{$value}}" class="p-0 count-input">
                    <button name="incrementItem" value="{{$dish->id}}" class="btn-add">+</button>
                </div>
                <button class="dishes-menu-btn popup-btn" type="submit" name="itemToBasket">
                    У КОШИК
                </button>
            </div>
        </form>
    </div>
</div>
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
