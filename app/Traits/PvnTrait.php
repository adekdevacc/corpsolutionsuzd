<?php
namespace App\Traits;

use Illuminate\Http\Request;
use App\Models\Product;

trait PvnTrait {

    public function createPvnArray(){

        $products = Product::all();

        collect($products)->each(function ($item,$key) use ($products){
            $products[$key]['Cena_ar_PVN'] = 
            ($item['Vienību skaits'] * $item['Cena par vienu vienību']) * 
            (1 + config('pvn.PVN')) ;
        });

        return $products;
    }  
}