<?php


namespace App\Product;
use App\Repositories\ProductRepository as IProduct;
use App\Review;
use Illuminate\Database\Eloquent\Model;

class Product extends Model implements IProduct
{

    public function getContent()
    {
        $product_details = [
            'name' => $this->name,
            'sku' => $this->sku,
            'category' => $this->category->name,
            'detail' => $this->details->getContent()
        ];
        return $product_details;
    }

    public static function getProductFromSKU($sku)
    {
        return self::where('sku', $sku)->first();
    }

    public static function getFromId($id)
    {
        return self::where('id',$id)->first();
    }

    public function review()
    {
        return $this->hasOne(Review::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function details()
    {
        $class = 'App\\Product\\' . ucfirst($this->category->name);
        return $this->hasOne(new $class,'id','sku');
    }

}