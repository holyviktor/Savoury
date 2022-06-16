<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;
    public function category(){
        return $this->BelongsTo(Category::class);
    }
    public function ingredients(){
        return $this->belongsToMany(Ingredient::class);
    }
    public function dish_of_the_day(){
        return $this->hasMany(Dish_of_the_day::class);
    }
    public function dish_order(){
        return $this->hasMany(Dish_Order::class);
    }
}
