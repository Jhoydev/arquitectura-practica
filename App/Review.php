<?php

namespace App;

use App\Product\Product;
use App\Repositories\ReviewRepository;
use Illuminate\Database\Eloquent\Model;

class Review extends Model implements ReviewRepository
{


    public function setProduct(Product $product)
    {
        $this->product_id = $product->id;
    }

    public function getContent()
    {
        $data = [];

        return $this->product->getContent();
    }

    public static function getFromId($id)
    {
        return self::where('id',$id)->first();
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }


}