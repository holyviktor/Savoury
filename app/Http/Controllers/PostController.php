<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Dish;
use App\Models\Dish_of_the_day;
use App\Models\Dish_Order;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostController extends Controller
{
    private int $minutes = 43800;

    public function orderingPost($request){
        $request->validate([
            'name'=>'required',
            'card_number'=>'required|digits:16',
            'validity'=>'required|date_format:m/y|after:tomorrow',
            'cvv'=>'required|digits:3',
            'owner'=>'required',
            'phone'=>'required|regex:/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/',
            'street'=>'required',
            'house'=>'required',
            'flat'=>'required|numeric'
        ]);
        $cookieData = $this->getCookies(json_decode($request->cookie('basket'), TRUE));

        $id = Order::insertGetId(
            array(
                'name'=>$request->input('name'),
                'phone_number'=>$request->input('phone'),
                'street'=>$request->input('street'),
                'house'=>$request->input('house'),
                'flat'=>$request->input('flat'),
                'comment'=>$request->input('comment'),
                'date'=>today()
            )
        );
        foreach ($cookieData['count'] as $dishId=>$count) {
            Dish_Order::insert(array(
                'order_id' => $id,
                'dish_id' => $dishId,
                'count' => $count
            ));
        }
        $response = new Response();
        $response->setContent(view('Pages/basket', ['name'=>$request->input('name'), 'showMessage'=>true],
            $this->getCookies(json_decode('', TRUE))));
        $response->withCookie(cookie('basket', '', $this->minutes));
        return $response;
    }

    public function postBasket(Request $request){
        $response = new Response();
        $value = json_decode($request->cookie('basket'), TRUE);
        if ($request->has('delete')) {
            unset($value[$request->input('id')]);
            $response->setContent(view('Pages/basket', $this->getCookies($value)));
        }
        else if($request->exists('decrement')){
            if ($value[$request->input('decrement')]>1){
                $value[$request->input('decrement')]-=1;
            }else{
                unset($value[$request->input('decrement')]);
            }
            $response->setContent(view('Pages/basket', $this->getCookies($value)));
        }
        else if($request->has('increment')){
            $value[$request->input('increment')]+=1;
            $response->setContent(view('Pages/basket', $this->getCookies($value)));
            $response->withCookie(cookie('basket', json_encode($value), $this->minutes));
        }
        else if ($request->has('input')){
            $value = $this->setInput($request->input('value'), $request->input('input'), $value);
            $response->setContent(view('Pages/basket',
                $this->getCookies($value)));
        }
        else if($request->has('pay')){
            return $this->orderingPost($request);
        }
        else{
            $dish_of_the_day = Dish_of_the_day::where('date', today())->first();
            $dishes = new Dish();
            $categories = new Category();
            $dish = $dishes->find($request->input('item'));
            $data = $this->itemToBasket($request);
            $value = $data["value"];
            $response->setContent(view('Pages/basket',
                array_merge($this->getCookies(json_decode($request->cookie('basket'), true)),
                ['showItem'=> true, 'dish'=>$dish,
                    'dish_of_the_day' => $dish_of_the_day->dish,
                    'category' => $categories->find($dish->category_id), 'value' => $data["addition"]])));
        }
        $response->withCookie(cookie('basket', json_encode($value), $this->minutes));
        return $response;
    }

    public function addToCartMenu(Request $request){
        $dish_of_the_day = Dish_of_the_day::where('date', today())->first();
        $dishes = new Dish();
        $categories = new Category();
        $dish = $dishes->find($request->input('item'));
        $response = new Response();
        $value = json_decode($request->cookie('basket'), TRUE);
        if ($request->has('outerCart')) {
            if (!isset($value[$request->input('item')])) {
                $value[$request->input('item')] = 1;
            } else {
                $value[$request->input('item')] += 1;
            }
            $response->setContent(view('Pages/menu', $this->getMenuInfo($request)));
        }
        else {
            $data = $this->itemToBasket($request);
            $value = $data["value"];
            $response->setContent(view('Pages/menu', array_merge($this->getMenuInfo($request),
                ['showItem'=> true, 'dish'=>$dish,
                    'dish_of_the_day' => $dish_of_the_day->dish,
                    'category' => $categories->find($dish->category->id), 'value' => $data["addition"]])));
        }
        $response->withCookie(cookie( 'basket',json_encode($value), $this->minutes));
        return $response;
    }

    public function addToCartMain(Request $request){
        $dish_of_the_day = Dish_of_the_day::where('date', today())->first();
        $dishes = new Dish();
        $categories = new Category();
        $dish = $dishes->find($request->input('item'));
        $response = new Response();
        $value = json_decode($request->cookie('basket'), TRUE);
        if ($request->has('outerCart')) {
            if (!isset($value[$request->input('item')])) {
                $value[$request->input('item')] = 1;
            } else {
                $value[$request->input('item')] += 1;
            }
            $response->setContent(view('Pages/landing', ['dishes' => Dish::all(), 'dish_of_the_day' => $dish_of_the_day]));
        }
        else {
            $data = $this->itemToBasket($request);
            $value = $data["value"];
            $response->setContent(view('Pages/landing',
                ['showItem'=> true, 'dish'=>$dish,
                    'category' => $categories->find($dish->category_id), 'value' => $data['addition'], 'dishes' => Dish::all(),
                    'dish_of_the_day' => $dish_of_the_day, 'discount' => $dish_of_the_day->discount,]));
        }
        $response->withCookie(cookie( 'basket',json_encode($value), $this->minutes));
        return $response;
    }
}
