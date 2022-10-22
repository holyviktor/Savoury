<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Client;
use App\Models\Dish;
use App\Models\Dish_of_the_day;
use App\Models\Order;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\Object_;

class MainController extends Controller
{
    public function landing(Request $request){
        $this->createDishDay();
        $categories = new Category();
        $dish_of_the_day = Dish_of_the_day::where('date', today())->first();
        $dishes = new Dish();
        if ($request->has('item')){
            $dish = $dishes->find($request->input('item'));
            if (isset($dish)) {
                return view('Pages/landing', ['dishes' => Dish::all(), 'dish_of_the_day' => $dish_of_the_day,
                    'showItem' => true, 'dish' => $dish,
                    'category' => $categories->find($dish->category_id), 'value' => 1]);
            }
        }
        return view('Pages/landing', ['dishes' => Dish::all(), 'dish_of_the_day' => $dish_of_the_day]);
    }
    public function about(){
        return view('Pages/about');
    }
    public function menu(Request $request){
        $this->createDishDay();
        if ($request->has('item')){
            $categories = new Category();
            $dish_of_the_day = Dish_of_the_day::where('date', today())->first();
            $dishes = new Dish();
            $dish = $dishes->find($request->input('item'));
            if (isset($dish)) {
                return view('Pages/menu', array_merge($this->getMenuInfo($request), ['showItem' => true, 'dish' => $dish,
                    'dish_of_the_day' => $dish_of_the_day->dish,
                    'category' => $categories->find($dish->category_id), 'value' => 1]));
            }
        }
        return view('Pages/menu', $this->getMenuInfo($request));
    }
    public function basket(Request $request){
        $this->createDishDay();
        $categories = new Category();
        $dish_of_the_day = Dish_of_the_day::where('date', today())->first();
        $dishes = new Dish();
        if ($request->has('item')){
            $dish = $dishes->find($request->input('item'));
            if (isset($dish)) {
                return view('Pages/basket', array_merge($this->getCookies(json_decode($request->cookie('basket'), true)),
                    ['showItem' => true, 'dish' => $dish,
                        'dish_of_the_day' => $dish_of_the_day->dish,
                        'category' => $categories->find($dish->category_id), 'value' => 1]));
            }
        }
        if ($request->has('ordering')){
            $data = $this->getCookies(json_decode($request->cookie('basket'), true));
            $translate_ua = ["ім'я", "номер телефону","вулиця", "будинок", "квартира", "номер картки", 'термін дії', 'власник'];
            $translate_eng = ['name', 'phone', 'street', 'house', 'flat', 'card number', 'validity', 'owner'];
            return view('Pages/basket', ['ua'=>$translate_ua, 'eng'=>$translate_eng,
                "showOrdering"=> $data["total_price"]>0], $data);
        }
        return view('Pages/basket',
            $this->getCookies(json_decode($request->cookie('basket'), true)));
    }

    public function ordering($phone_number){
//        $price = $this->getCookies(json_decode($request->cookie('basket')))["total_price"];
//        dd($price);
        $count = Order::where('phone_number', $phone_number)->count();
        return [Client::where('phone_number', $phone_number)->first(), $count];
    }

    public function ordering_price(Request $request){
        $price = $this->getCookies(json_decode($request->cookie('basket')))["total_price"];
//        dd($price);
        return $price;
    }
}
