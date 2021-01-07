<?php


namespace App\Repositories;


interface ProductRepository
{
    public function getContent();
    public static function getProductFromSKU($sku);
}