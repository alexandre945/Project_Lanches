<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Demand;
use App\Models\Demand_Product;
use App\Models\User;

use Illuminate\Http\Request;

class ControllerDrink extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    //drink

    public function create()
    {
        $categories = Category::all();
        return view('drink.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $product = Product::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'price' => $request['price'],
            'categories' => $request['categorie_id'],
            'categorie_id' => $request['categorie_id'],
        ]);
        return redirect()->route('drink.index', compact('product'))->with('mensage', 'bebida cadastrada com sucesso');
    }

    public function index(Category $categories)
    {
        $product =  new Product;

        $product = $product::orderBy('name', 'asc')->where('categorie_id', 3)->get();


        return view('drink.index', compact('product'));
    }

    public function show(Request $request)
    {
        $product =  new Product;
        $product = $product::orderBy('name', 'asc')->where('categorie_id', 3)->get();

        return view('user.show', compact('product'));
    }

}
