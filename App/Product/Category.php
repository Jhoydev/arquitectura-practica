<?php


namespace App\Product;


use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function product()
    {
        return $this->hasOne(Product::class);
    }

}