<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

use App\Http\Requests\admin\CreateRequest;
use App\Http\Requests\admin\UpdateRequest;
use App\Http\Requests\admin\DestroyRequest;

use App\Traits\PvnTrait;

use DB;
use Auth;

class HomeController extends Controller
{
    use PvnTrait;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Product $product)
    {
        $products = $this->createPvnArray();

        DB::table('useractions')->insert(
            [
                'lietotaja_id' => Auth::user()->id, 
                'darbiba' => 'view homescreen',
                'resurs' => 'visi produkti',
                'created_at' => now()
            ]
        );
        return view('home', [
            'products' => $products
        ]);
    }

    // show the form for creating a new resource

    public function create(CreateRequest $request) {
        return view('products.create');
    }

    // store a newly created resource in DB

    public function store(CreateRequest $request) {

        $sanitized = $request->getSanitized();

        if($products = Product::create($sanitized)){
            DB::table('useractions')->insert(
                [
                    'lietotaja_id' => Auth::user()->id, 
                    'darbiba' => 'store product resource',
                    'resurs' => $products->id,
                    'created_at' => now()
                ]
            );
            return redirect()
            ->back()
            ->with('success', 'Jauns products izveidots!');             
        }else{
           return redirect()
           ->back()
           ->with('error', 'Kaut kas nogaja greizi!'); 
        }
    }

    public function show(UpdateRequest $request, $id) {

        $product = Product::findOrFail($id);

        DB::table('useractions')->insert(
            [
                'lietotaja_id' => Auth::user()->id, 
                'darbiba' => 'show product resource',
                'resurs' => $id,
                'created_at' => now()
            ]
        );
        return view('products.show',[
            'nosaukums' => $product['Prece nosaukums'],
            'skaits' => $product['Vienību skaits'],
            'cena' => $product['Cena par vienu vienību'],
            'id' => $id
        ]);
    }

    public function update(UpdateRequest $request, $id) {
    
        $sanitized = $request->getSanitized();
        
        if($products = Product::findOrFail($id)->update($sanitized)){
            DB::table('useractions')->insert(
                [
                    'lietotaja_id' => Auth::user()->id, 
                    'darbiba' => 'update product resource',
                    'resurs' => $products->id,
                    'created_at' => now()
                ]
            );
            return redirect()
            ->back()
            ->with('success', 'Produkta dati izmainiti!');             
        }else{
           return redirect()
           ->back()
           ->with('error', 'Kaut kas nogaja greizi!'); 
        }       
    }

    public function destroy($id, DestroyRequest $request, Product $product) {
        
        if($product::destroy($id)){

        DB::table('useractions')->insert(
            [
                'lietotaja_id' => Auth::user()->id, 
                'darbiba' => 'delete product resource',
                'resurs' => $id,
                'created_at' => now()
            ]
        );        }

        return redirect()->back();

    }
}
