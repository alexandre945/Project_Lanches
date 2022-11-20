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
            ])->whereDate('created_at', '=', date('Y-m-d'))
            ->with('productId')->first();
    
            if (!$demand) {
                $demand = Demand::create([
                    'status' => 'RE',
                    'user_id' => $user,
                    'datedemand' => date('d-m-y'),
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
                        'quanty' => $product_demand->quanty+1,
                        
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
            ])->whereDate('created_at', '=', date('Y-m-d'))
            ->with(['productId'])->first();

            return view('user.cart', compact('data', 'users'));
        }
    
        public function delete($id)
        {
    
            $user = Auth::user()->id;
            $product = Product::find($id);
            $demandProduct =  new Demand_Product;
            $demand = New Demand;
            
               $demand = $demand::where(['user_id' => Auth::user()->id])
               ->whereDate('created_at', '=', date('Y-m-d'))
               ->with(['productId'])->first();
               if($demand->productId->count() <= 0 ){
                $demand->delete();
            }
                
                $demandProduct::findOrFail($id)->delete();
        
            return redirect()->route('show.cart', compact('demandProduct'))->with('success', 'Produto excluido com sucesso');
        }

}
