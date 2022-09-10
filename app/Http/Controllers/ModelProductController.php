<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Demand;
use App\Models\User;
use App\Models\ItenDemand;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ModelProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $product =  New Product;
        $product = $product::where('categorie_id', 1)->get();
       
       
        return view ('admin.index',compact('product'));
    }

    public function create()
    {
        $categories = Category::all();
        return view ('admin.create', compact('categories'));
    }

    public function show(Request $request)
    {
        $product =  New Product;
        $product = $product::where('categorie_id', 1)->get();

        return view ('user.index',compact('product'));  
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
       
 
        

         return redirect()->route('admin.index',compact('product'))->with('message','produto cadastrado com sucesso');
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        return view('admin.edit',compact('product'));
    }

    public function edit(Request $request, $id)
    {
        $product = new Product;

        $product::findOrFail($request->id)->update($request->all());

        return redirect()->route('admin.index',compact('product'))->with('success','Produto atualizado com sucesso!');


    }

    public function delete($id)
    {
        $product = New Product;
        $product::findOrFail($id)->delete();

        return redirect()->route('admin.index',compact('product'))->with('missage','cadastro excluido com sucesso');

    }

    //combos

    public function comboCreate()
    {
        $categories = Category::all();
        return view ('combo.create', compact('categories'));  
    }

    public function comboStore(Request $request)
    {
        $product = Product::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'price' => $request['price'],
            'image' => $request->file('image')->store('product'),
            'categories' => $request['categorie_id'],
            'categorie_id' => $request['categorie_id'],
        ]);
        return redirect()->route('combo.index',compact('product'))->with('message','produto cadastrado com sucesso');

    }

    public function comboIndex(Category $categories)
    {
        $product =  New Product;
    
       $product = $product::where('categorie_id', 2)->get();
       
 
        return view ('combo.index',compact('product'));

    }

    public function comboshow(Request $request)
    {
        $product =  New Product;
        $product = $product::where('categorie_id', 2)->get();

        return view ('combo.comboIndex',compact('product'));  
    }

    //drink

    public function drinkCreate()
    {
        $categories = Category::all();
        return view ('drink.create', compact('categories'));
    }

    public function drinkStore(Request $request)
    {
        $product = Product::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'price' => $request['price'],
            'categories' => $request['categorie_id'],
            'categorie_id' => $request['categorie_id'],
        ]);
        return redirect()->route('drink.index',compact('product'))->with('mensage', 'bebida cadastrada com sucesso');
    }

    public function drinkIndex(Category $categories)
    {
        $product =  New Product;
    
        $product = $product::where('categorie_id', 3)->get();
        
  
         return view ('drink.index',compact('product')); 
    }

    public function drinkShow(Request $request)
    {
        $product =  New Product;
        $product = $product::where('categorie_id', 3)->get();

        return view ('user.show',compact('product'));  
    }

    //cart

    public function cartStore(Request $request,$id)
    {
      $product = Product::find($id);

        if($product){
            $cart = session('car', []);
            array_push($cart, $product);
            session(['car' => $cart]);

        }
        return redirect()->route('user.index');
    }

    public function showCart(Request $request)
    {


     $user = user::first();

     $user->userdemands;

   

        // $demands = Demand::where([
        //     'status' => 'RE',
        //     'user_id' => Auth::id()
        // ])->get();
       

        // dd([
        //   $demands,
        //   $demands[0],
        //   $demands[0]->item_demands[0]->product
        // ]);
        $cart = session('car', []);
       
        $data = ['car' => $cart];
           return view ('user.cart',compact('user','data'));
    }
}
