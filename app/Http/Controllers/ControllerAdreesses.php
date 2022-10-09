<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Address;
use App\Models\Category;
use App\Models\Demand;
use App\Models\Demand_Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ControllerAdreesses extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request){

        $user = Auth::user()->id;
        $adreesses = Address:: create([
            'street' =>  $request ['street'],
            'nunber' =>  $request ['nunber'],
            'city'   =>  $request ['city'],
            'district' =>  $request ['district'],
            'zipcode'  =>  $request ['zipcode'],
            'user_id'  =>  $user,


        ]);

        return redirect()->route('show.cart', compact('adreesses'))->with('sucesses','cadastro realizado com sucesso');
    }
}
