<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Demand;
use App\Models\Demand_Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ControllerCart extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

        //cart

        public function store(Request $request, $id)
        {
            $product = Product::find($id);
            $user = Auth::user()->id;
    
            $demand = Demand::where([
                'status' => 'RE',
                'user_id' => Auth::user()->id,
            ])->with('productId')->first();
    
            if (!$demand) {
                $demand = Demand::create([
                    'status' => 'RE',
                    'user_id' => $user,
                    'datedemand' => '2022_09_17'
                ]);
            }
    
    
            $product_demand = Demand_Product::where('demand_id', $demand->id)
                ->where('product_id', $id)
                ->first();
    
            if ($demand) {
                if ($product_demand == null) {
                    Demand_Product::create([
                        'product_id' => $id,
                        'demand_id' => $demand->id,
                        'quanty' => 1,
                    ]);
                } else {
                    $product_demand->update([
                        'quanty' => 2,
                    ]);
                }
            }
            return redirect()->route('user.index')->with('status', 'produto adicionado ao carrinho');
        }
    
        public function show(Request $request)
        {
    
            $user = Auth::user()->id;
            $users = Auth::user()->name;
            $data = Demand::where([
                'status' => 'RE',
                'user_id' => Auth::user()->id,
            ])->with(['productId'])->first();
    
    
    
    
            return view('user.cart', compact('data', 'users'));
        }
    
        public function delete($id)
        {
    
            $user = Auth::user()->id;
            $product = Product::find($id);
            $demandProduct =  new Demand_Product;
            $demand = New Demand;
    
           
           
            $data = Demand_Product::find($id)->produtsIds()->get();
        //     $products = Demand_Product::find($id)->produtsIds->name;
        // $demand::with('productId')->get();
        // dd($demand);
    
       
           
            if ($data) {
                $demandProduct::findOrFail($id)->delete();
                
            } 
            
             else {
          
               $demandProduct::where([$demandProduct == null])->where(['user_id' => Auth::user()->id])->delete();
            }
        
            return redirect()->route('show.cart', compact('demandProduct'))->with('success', 'Produto excluido com sucesso');
        }

}
