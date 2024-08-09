<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use App\Models\Product;

use Response;

class ProductsController extends Controller
{
    public function ieraksti(){

        $products = \App\Models\Product::latest()->take(10)->get();

        return response()->json($products, 200);
    }
}
