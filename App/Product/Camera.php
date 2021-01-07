<?php


namespace App\Product;
use App\Repositories\CameraRepository;
use Illuminate\Database\Eloquent\Model;

class Camera extends Model implements CameraRepository
{

    public function getContent()
    {
        $response = [
            'iso' => $this->iso,
            'flash' => $this->flash,
            'format' => $this->format,
            'type' => $this->type
        ];
        return $response;
    }

    public static function getProductFromSKU($sku)
    {
        return self::where('sku', $sku)->first();
    }

}