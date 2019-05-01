<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Searchable;

    public function parent(){
        return $this->belongsTo(CategoryProduct::class, 'id');
    }
   
     public function scopeMightAlsoLike()
    {
        return Product::inRandomOrder()->take(4);
    }
}
