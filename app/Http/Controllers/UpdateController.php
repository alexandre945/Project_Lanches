<?php

namespace App\Http\Controllers;
use App\Models\Demand;
use App\Models\Demand_Product;


use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

     public function update(Request $request, $id)
     {
        $demand = Demand_Product::findOrFail($id);

        $demand->update([
            'quanty' => $demand->quanty+1,
            
        ]);
        
         return redirect()->route('show.cart',compact('demand'));  
     }

     public function updateSub(Request $request, $id)
       {
        
        $demand = Demand_Product::findOrFail($id);
     
        if ($demand->quanty > 1){
            $demand->decrement('quanty');

            } else {
                $demand->delete();
            }

            return redirect()->route('show.cart',compact('demand')); 
       }
    
}
