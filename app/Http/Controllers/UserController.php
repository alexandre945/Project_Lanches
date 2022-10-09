<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function store(Request $request){
         $data = New User; 
        $user = Auth::user()->id;
        // $users = Auth::user()->id->first();
        $adreesses = Address:: create([
            'street' =>  $request ['street'],
            'nunber' =>  $request ['nunber'],
            'city'   =>  $request ['city'],
            'district' =>  $request ['district'],
            'zipcode'  =>  $request ['zipcode'],
            'user_id'  =>  $user,
        ]);
    //   $user = $users->address()->first();
    //     dd($user);

        return redirect()->route('show.cart', compact('adreesses'))->with('sucesses','cadastro realizado com sucesso');
    }
}
