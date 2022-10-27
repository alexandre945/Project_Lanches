<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Demand;
use App\Models\Demand_Product;
use App\Models\User;
use App\Models\ItenDemand;
use App\observes\DemandObserver;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ControllerProduct extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $product =  new Product;
        $product = $product::where('categorie_id', 1)->sortBy("name")->get();


        return view('admin.index', compact('product'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.create', compact('categories'));
    }

    public function show(Request $request)
    {
        $product =  new Product;
        $product = $product::where('categorie_id', 1)->get();

        return view('user.index', compact('product'));
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




        return redirect()->route('admin.index', compact('product'))->with('message', 'produto cadastrado com sucesso');
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        return view('admin.edit', compact('product'));
    }

    public function edit(Request $request, $id)
    {
        $product = new Product;

        $product::findOrFail($request->id)->update($request->all());

        return redirect()->route('admin.index', compact('product'))->with('success', 'Produto atualizado com sucesso!');
    }

    public function delete($id)
    {
        $product = new Product;
        $product::findOrFail($id)->delete();

        return redirect()->route('admin.index', compact('product'))->with('missage', 'cadastro excluido com sucesso');
    }




}
