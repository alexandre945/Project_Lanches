<?php

namespace App\Http\Controllers;

use App\Models\Demand;
use App\Models\User;
use App\Models\Demand_Product;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

   public function index(){

    $user = Auth::user()->id;

    $users = Auth::user()->name;
     
    $data = Demand::with(['productId'])->first();


    $user = User::where(['id' => $user])->with(['address'])->first();
   

    return view('admin.show', compact('data', 'users', 'user'));

   }

}
