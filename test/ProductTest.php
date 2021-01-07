<?php

namespace test;

require_once __DIR__.'/../vendor/autoload.php';

use App\Product\Camera;
use App\Product\Product;
use App\Review;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    function test_product_should_return_content_success()
    {
        //setup
        $product = new Product();

        //exec
        $content = $product->getContent();

        //assert
        $this->assertNotNull($content);
    }

    function test_created_review_should_return_success()
    {

        //setup
        $review = new Review();
        $review->title = 'Titulo';
        $review->content = 'Contenido';
        $review->author = 'Jhoy';
        $product_sku = 5;

        //exec
        $product = Product::getProductFromSKU($product_sku);
        $review->setProduct($product);
        $responseCreateReview = $review->save();

        //assert
        $this->assertTrue($responseCreateReview);

    }

    function test_get_review_with_product()
    {
        $review_id  = 1;
        $review = Review::getFromId($review_id);
        $product = null;
        if ($review){
            $product = Product::getFromId($review->product_id);
        }

        $responseReview = [
            'review' => $review,
            'product' => $product
        ];
        $reviewJson = json_encode($responseReview);

        $this->assertNotNull($responseReview['product'],'No se ha encontrado producto en estas review');
        $this->assertNotNull($responseReview['review'],'No se ha encontrado review');
        $this->assertJson($reviewJson);
    }

    function test_get_product_content_from_review()
    {
        // setup
        $review_id  = 4;

        // exec
        $review = Review::getFromId($review_id);
        $product = $review->product;

        $content = $product->getContent();
        $content = json_encode($content);

        // assert
        $this->assertJson($content);
        $this->assertNotEmpty($content);
    }



}
