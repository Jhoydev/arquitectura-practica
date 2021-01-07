<?php


namespace App\Repositories;


use App\Product\Product;

interface ReviewRepository
{
    public function setProduct(Product $product);
    public function getContent();
}