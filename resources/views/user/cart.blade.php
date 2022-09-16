@extends('adminlte::page')

@section('title', 'Carrinho')

@section('content_header')


@stop

@section('content')
<div class="container">
    <div class="row"> 
        <div class="card justify-contente-center m-5 p-5">
            <div class="text-center">
                <h2> Produtos do seu Carrinho </h2>
                <h5>PEDIDO:{{$data->id}}</h5>
                <h5>CRIADO EM: {{$data->datedemand}}</h5>
            </div>
        </div>  
        <table class="table">
            <thead>
                <tr>
                    <th>Imagem</th>
                    <th>Quantidade</th>
                    <th>Produto</th>
                    <th>Valor Unitario</th>
                    <th>Sub-total</th>
                    
                </tr>
            </thead>
            <tbody>
                {{-- @php
                  $Total_pedido,
                @endphp --}}
               
               
                @foreach($data->productId as $item)
                    <tr>
                        <td>
                            <img src="{{ asset('storage/'.$item->produtsIds->image) }}" style="width: 60px">
                        </td>
                        <td class= 'justify-contente-center'>
                            <div class="justify-contente-center">
                                <a href="#"><i class="fa fa-circle">-</i></a>
                                <span>{{$item->quanty}}</span>
                                <a href="#"><i class="fas fa-circle">+</i></a>
                            </div>
                            {{-- <a href="#">retirar produto do carrinho</a> --}}
                        </td>    
                        <td>{{$item->produtsIds->name}}</td> 
                        <td>R${{$item->produtsIds->price}}</td>
                        <td></td>  
                       
                    
                     
                     
                    </tr>
                @endforeach
            </tbody>
        </table>
       
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