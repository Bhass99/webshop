<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    
    public function children(){
        return $this->hasMany(Product::class, 'category_id');
    }
}
