<?php

namespace App\Product;

use App\Repositories\LensesRepository;
use Illuminate\Database\Eloquent\Model;

class Lens extends Model implements LensesRepository
{

    public function getContent()
    {
        $response = [
            'focal' => $this->focal,
            'aperture_max' => $this->aperture_max,
            'aperture_min' => $this->aperture_min
        ];
        return $response;
    }

    public static function getProductFromSKU($sku)
    {
        return self::where('sku', $sku)->first();
    }
}