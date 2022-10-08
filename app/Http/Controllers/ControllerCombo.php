<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Demand;
use App\Models\Demand_Product;

use Illuminate\Http\Request;

class ControllerCombo extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Category $categories)
    {
        $product =  new Product;

        $product = $product::where('categorie_id', 2)->get();


        return view('combo.index', compact('product'));
    }

    public function show(Request $request)
    {
        $product =  new Product;
        $product = $product::where('categorie_id', 2)->get();

        return view('combo.comboIndex', compact('product'));
    }

     

        public function create()
        {
            $categories = Category::all();
            return view('combo.create', compact('categories'));
        }
    
        public function store(Request $request)
        {
            $product = Product::create([
                'name' => $request['name'],
                'description' => $request['description'],
                'price' => $request['price'],
                'image' => $request->file('image')->store('product'),
                'categories' => $request['categorie_id'],
                'categorie_id' => $request['categorie_id'],
            ]);
            return redirect()->route('combo.index', compact('product'))->with('message', 'produto cadastrado com sucesso');
        }

}
