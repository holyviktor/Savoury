@extends('layout')
@section('title')
    Menu
@endsection
@section('main-content')
    <section class="container-fluid menu-categories pb-md-5 pb-3 px-0">
        @if(isset($showItem) && $showItem)
            @include("Pages/item")
        @endif
        <div class="container-xl p-0 d-flex flex-column align-items-center">
            <h2 class="dishes-menu-title title align-items-center justify-content-center d-flex text-center">
        <span class="all-big-titles">
            МЕНЮ
        </span>
            </h2>
            <div class="dishes-menu-content container-fluid p-0 my-3">
                <form action="">
                <div class="swiper menu-swiper pb-2">
                    <div class="swiper-wrapper">
                        @foreach($categories as $category)
                            <button @if (isset($selected_category->id) && $category->id == $selected_category->id)
                                        class="menu-category-card sel_category p-2 swiper-slide"
                                    @else
                                        class="menu-category-card card  p-2 swiper-slide"
                                    @endif
                                        type="submit" name="category" value="{{$category->name}}">
                                <img class="card-img-top" src="{{$category->photo}}" alt="Card image cap">
                                <span class="card-body px-0">
                                    <span class="card-text my-0">{{$category->name}}</span>
                                </span>
                            </button>
                        @endforeach
                    </div>
                </div>
                </form>
                <div class="swiper-button-prev">
                    <img src="../View/media/arrow left.svg" class="menu-arrow" alt="left arrow">
                </div>
                <div class="swiper-button-next">
                    <img src="../View/media/arrow right.svg" class="menu-arrow" alt="right arrow">
                </div>

            </div>
        </div>
    </section>
    <section class="menu-alldishes container-fluid pb-5">
        <div class="container-xl d-flex flex-column align-items-center p-0 ">
            <h2 class="menu-alldishes-title title-top d-flex flex-column align-items-center text-center mb-3">
                <span class="dishes-menu-name-category">
                    @if(isset($selected_category))
                        {{$selected_category->name}}
                    @elseif(isset($search))
                        ПОШУК
                    @else
                        ВСІ СТРАВИ
                    @endif
                </span>
            </h2>
            <form class="container-fluid p-0" method="get">
                <div class="form-group menu-alldishes-search d-flex align-items-center ps-2">
                    <img src="../View/media/search.svg" alt="search">
                    <input type="text" class="form-control" placeholder="Пошук" name="search" value="{{$search}}">
                </div>
            </form>
            @if(count($dishes)>0)
            <div class="menu-alldishes-container my-md-4 my-3">
                @foreach($dishes as $dish)
                <div class="card menu-alldishes-card">
                    <form action="{{route('menu')}}" class="p-0">
                    <button type="submit" name="item" value="{{$dish->id}}">
                        <img class="card-img-top" src="../{{$dish->photo}}" alt="Card image cap">
                    </button>
                    </form>
                    <div class="card-body px-md-3 py-md-0 p-2 pb-0 row m-0">
                        <div class="col-md-12 col-8 p-0">
                            <h5 class="card-title">{{$dish->name}}</h5>
                            @if(isset($dish_of_the_day) && $dish->id === $dish_of_the_day->dish_id)
                                <p class="card-text d-flex d-md-none">Ціна: {{$dish->price*(1-$dish_of_the_day->discount/100)}}₴</p>
                            </div>
                            <p class="card-text d-none d-md-flex col-7 p-0">Ціна: {{$dish->price*(1-$dish_of_the_day->discount/100)}}₴</p>
                            @else
                                <p class="card-text d-flex d-md-none">Ціна: {{$dish->price}}₴</p>
                            </div>
                            <p class="card-text d-none d-md-flex col-7 p-0">Ціна: {{$dish->price}}₴</p>
                            @endif
                        <form action="{{route('menu')}}" method="POST" class="d-flex col-md-5 col-4 p-0 pb-2">
                            @csrf
                            <button type="submit" name="outerCart" class="d-flex align-items-end justify-content-end">
                                <i class="menu-basket basket">
                                    <img src="../View/media/shopping-cart.svg" alt="Basket">
                                    <input type="hidden" class="form-control" name="item" value="{{$dish->id}}">
                                </i>
                            </button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
            @if($showButton)
                <form action="{{route('menu')}}">
                    <button class="dishes-menu-btn" type="submit" name="page" value="{{$count}}">
                        БІЛЬШЕ
                    </button>
                </form>
            @endif
            @else
                @component('Components/errors')
                Пуста категорія!
                @endcomponent
            @endif
        </section>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script src="../View/JS/menu.js"></script>
@endsection
