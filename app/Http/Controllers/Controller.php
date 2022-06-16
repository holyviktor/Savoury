<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Dish;
use App\Models\Dish_of_the_day;
use App\Models\Ingredient;
use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getCookies($value){
        $dish_of_the_day = Dish_of_the_day::where('date', today())->first();
        $all_dishes = new Collection();
        $total_price = 0;
        if (isset($value)) {
            foreach ($value as $id => $count) {
                $dish = Dish::find($id);
                if (isset($dish)) {
                    $all_dishes->push($dish);
                    if (isset($dish_of_the_day) && $dish->id == $dish_of_the_day->dish_id) {
                        $total_price += $dish->price * (1 - $dish_of_the_day->discount / 100) * $count;
                    } else {
                        $total_price += $dish->price * $count;
                    }
                }
            }
        }
        return array('count'=>$value, 'dishes_basket'=>$all_dishes, 'total_price'=>$total_price,
            'dish_of_the_day'=>$dish_of_the_day);
    }

    public function getMenuInfo($request){
        $dish_of_the_day = Dish_of_the_day::where('date', today())->first();
        $categories = Category::all();
        $dishes = Dish::all();
        $selected_category = null;
        $search = $request->input('search');
        if ($search !== null){
            $searched_ingredients = Ingredient::where('name', 'like', '%'.$request->input('search').'%')->get();
            $searched_by_names = Dish::where('name', 'like', '%'.$request->input('search').'%')->get();
            $dishes = new Collection();
            foreach ($searched_ingredients as $ingredient){
                $dishes=$dishes->merge($ingredient->dish);
            }
            foreach ($searched_by_names as $name){
                if (!$dishes->contains($name)) {
                    $dishes->push($name);
                }
            }
        }
        if ($request->input('category') !== null) {
            $selected_category = Category::where('name', $request->input('category'))->first();
            if (isset($selected_category)) {
                $dishes = $selected_category->dish;
            }
        }
        if ($request->input('page') !== null){
            $count = $request->input('page')+1;
        }else{
            $count = 1;
        }
        $showButton = false;
        if(count($dishes->skip(16*($count)))>0) {
            $showButton = true;
        }

        return ['dishes'=>$dishes->take(12*$count), 'categories'=>$categories,
            'selected_category'=>$selected_category, 'search'=>$search, 'dish_of_the_day'=>$dish_of_the_day,
            'count'=>$count, 'showButton'=>$showButton];
    }

    public function createDishDay(){
        $dish_day = Dish_of_the_day::where('date', today())->first();
        if (!isset($dish_day)) {
            $dish_orders = new Collection();
            $dishes = [];
            $id = 0;
            $orders_by_data = Order::where('date', date('Y-m-d', strtotime("-1 days")))->get();
            foreach ($orders_by_data as $orders) {
                $dish_orders->push($orders->dish_order);
            }
            foreach ($dish_orders as $dish_order) {
                foreach ($dish_order as $d) {
                    $dishes[] = $d->dish_id;
                }
            }
            $dishes = array_count_values($dishes);
            arsort($dishes);
            foreach ($dishes as $dish => $count) {
                $id = $dish;
                break;
            }
            if ($id == 0) {
                $id = Dish::all()->random()->id;
            }
            Dish_of_the_day::insert(array(
                    'date' => today(),
                    'dish_id' => $id)
            );
        }
    }

    public function setInput($id, $count, $value){
        $value[$id]=$count;
        return $value;
    }

    public function itemToBasket($request){
        $value = json_decode($request->cookie('basket'), TRUE);
        $addition = $request->input('inputItem');
        if($request->has('decrementItem')){
            if ($addition>1) {
                $addition -= 1;
            }
        }
        if($request->has('incrementItem')){
            $addition += 1;
        }
        if($request->has('itemToBasket')){
            if (!isset($value[$request->input('item')])){
                $value[$request->input('item')]=$addition;
            }else{
                $value[$request->input('item')]+=$addition;
            }
        }
        return ['value'=>$value, 'addition'=>$addition];
    }
}
