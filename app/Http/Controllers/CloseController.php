<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demand;
use App\Models\User;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;

class CloseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $user = Auth::user()->name;
        $item = Demand::orderBy('id','desc')->where([
            'status' => 'PG',
            'user_id' => Auth::user()->id,
        ])->whereDate('created_at', '=', date('Y-m-d'))
        ->with('productId')->first();     

       return view('close.index', compact('item','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user()->id;
        $adreess = Address::where('user_id', $user)->get();
      
      if ($adreess->count() > 0){
        $data = Demand::findOrFail($request->id)->where([
            'status' => 'RE', 'user_id' => $user])
            ->whereDate('created_at', '=', date('Y-m-d'))
            ->update(['status' => 'PG']);
    
      } else {
        return redirect()->route('show.cart')->with('message','precisa prencher os campos de endereço abaixo para fechar seu pedido');
      }
        return redirect()->route('close.index', compact('data'))->with('success','Seu Pedido foi enviado com sucesso,Aguarde a Entrega!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
