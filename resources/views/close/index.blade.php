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
                {{-- @if (isset($item) &&  $item!= null && $item->isNotEmpty())
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th  class="p-2"><i>produto</i></th>
                                    <th  class="p-2"><i>Pedido</i></th>
                                    <th  class="p-2"><i>Status</i></th>
                                    <th  class="p-2"><i>Data do Pedido</i></th>
                                </tr>
                            </thead>
                            @foreach($item->productId as $data)    
                                <tbody>
                                    <tr>
                                        <td>{{$data->produtsId->id}}</td>
                                        <td>{{$data->id}}</td>
                                        <td>{{$data->status}}</td>
                                        <td>{{$data->created_at}}</td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    @else
                        <div class="alert alert-warning">
                            <h5>Não há pedidos Para Mostrar</h5>
                        </div>
                    @endif --}}
            
                    @if(session('success'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <p>{{session('success')}}</p>
                    </div>
                    @endif 
          
        </div>
    </div>
@stop
