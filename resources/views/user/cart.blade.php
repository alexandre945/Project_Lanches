@extends('adminlte::page')

@section('title', 'Carrinho')

@section('content_header')


@stop

@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <p>{{session('success')}}</p>
        </div>
    @endif
    <div class="row"> 
        <div class="card justify-contente-center m-5 p-5">
            <div class="text-center">
                <h2> Produtos do seu Carrinho</h2>
             {{-- <h6>Seja Bem Vindo(a) . {{$users}}</h6> --}}
                <h5>PEDIDO: {{$data->id}}</h5>
                <h6>CRIADO EM: {{$data->created_at}}</h6>

            </div>
        </div>  
  
        <table class="table">
            <thead>
                <tr>
                    <th>Excluir</th>
                    <th>Quantidade</th>
                    <th>Produto</th>
                    <th>Valor Unitario</th>
                    <th>Sub-total</th>
                    
                </tr>
            </thead>
            <tbody>
             
                @foreach($data->productId as $item)
                    <tr>
                            <td>
                                <form action="{{route('delete.cart',$item->id)}}" method="POST" style="display: inline" >
                                    @method('DELETE')
                                    @csrf
                                        <button class="btn btn-danger" title="Excluir">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                </form>
                            </td>
                            <td class= 'justify-contente-center'>
                                <div class="justify-contente-center">
                                    <a href="#"><i class="fa fa-circle">-</i></a>
                                    <span>{{$item->quanty}}</span>
                                    <a href="#"><i class="fas fa-circle">+</i></a>
                                </div>
                            </td>    
                            <td>{{$item->produtsIds->name}}</td> 
                            <td>R$-{{$item->produtsIds->price}}</td>
                           <td>{{$item->produtsIds->count}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    
 
        <div class="btn-group btn-group-justified">
            <a href="{{route('user.index')}}"><button class="btn btn-success m-2">CONTINUAR COMPRANDO</button></a>
            <input type="text" name="total" value="" placeholder="TOTAL"
              style="width:120px; height:60px;" 
            disabled class="text-center  border border-success rounded mt-2">
            <a href="#"><button class="btn btn-success m-2">FECHAR PEDIDO</button></a>
        </div>
    </div>
</div>

@stop
@section('css')
    <style>
        .container{
            margin-top:30px;
        }
    </style>    
@endsection

@section('js')
@stop