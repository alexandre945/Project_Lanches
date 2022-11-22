@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
  <div class="container text-center">
        <h3><i>PEDIDO ENVIADO</i></h3>
  </div>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="row"> 
                <div class="card justify-contente-center m-4 p-2 col-md-12 col-sm-4">
                    <div class="text-center">
                        <i><h2 class="font-bold"> DADOS DO SEU PEDIDO</h2></i>
                        <h6>Nome do Usuario. {{$user}}</h6>
                        <h6>Estatus:{{$item->status}}</h6>
                        <h5>PEDIDO: {{$item->id}}</h5>
                        <h6>CRIADO EM: {{$item->created_at}}</h6>
                        <p>Seu Pedido foi enviado com sucesso!</p>

                    </div>
                </div> 
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th  class="p-2"><i>Quatidade</i></th>
                                    <th  class="p-2"><i>produto</i></th>
                                    <th  class="p-2"><i>Preço</i></th>
                                    <th  class="p-2"><i>Sub-total</i></th>
                                </tr>
                            </thead>
                            <tbody>
                                    @php
                                    $total = 0;
                                    @endphp
                                @foreach($item->productId as $data)          
                                        <tr>
                                            <td>{{$data->quanty}}</td>
                                            <td>{{$data->produtsIds->name }}</td>
                                            <td>{{$data->produtsIds->price}}</td>
                                            @php
                                                $total += $data->produtsIds->price * $data->quanty;
                                            @endphp 
                                            <td>R$_{{ number_format($data->produtsIds->price * $data->quanty,2,',','.')}}</td>
                                        </tr>
                                @endforeach
                            </tbody>
                           
                        </table>
                        <div class="row" style="margin-left:150px;">
                            <div  class="card m-8 p-2 col-md-12 col-sm-4 d-flex align-center">
                                {{-- <a href="{{route('user.index')}}"><button class="btn btn-success m-2">CONTINUAR COMPRANDO</button></a> --}}
                                
                                        <p class="text-center mb-0">TOTAL</p>
                                        <input type="text" name="total" value="R${{ ($total != 0 && $total != '' ? number_format($total, 2, ',', '.') : '') }}" placeholder="TOTAL"
                                        style="width:120px; height:60px;" 
                                        disabled class="text-center  border border-success rounded ">
                                        
                            </div>
                        </div>
                    @if(session('success'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <p>{{session('success')}}</p>
                    </div>
                    @endif 
          
        </div>
    </div>
@stop
