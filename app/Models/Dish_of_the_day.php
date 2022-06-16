<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish_of_the_day extends Model
{
    use HasFactory;
    public function dish(){
        return $this->BelongsTo(Dish::class);
    }
}
