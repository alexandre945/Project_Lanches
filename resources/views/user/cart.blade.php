@extends('adminlte::page')

@section('title', 'Carrinho')

@section('content_header')


@stop

@section('content')
<div class="container mt-28">
    @if(session('success'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <p>{{session('success')}}</p>
        </div>
    @endif
    @if (isset($data->productId) &&  $data!= null && $data->productId->isNotEmpty()) 
    <div class="row"> 
        <div class="card justify-contente-center m-5 p-5">
            <div class="text-center">
                <h2> Produtos do seu Carrinho</h2>
             <h6>Seja Bem Vindo Sr.(a) . {{$users}}</h6>
             <h6>Estatus:{{$data->status}}</h6>
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
                                    <td>R$_{{$item->produtsIds->price}}</td>
                                <td>{{$item->produtsIds->id}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="alert alert-warning">
                    <h5>Seu Carrinho está vazio</h5>
                </div>
            @endif
 
        <div class="btn-group btn-group-justified">
            <a href="{{route('user.index')}}"><button class="btn btn-success m-2">CONTINUAR COMPRANDO</button></a>
            <input type="text" name="total" value="" placeholder="TOTAL"
              style="width:120px; height:60px;" 
            disabled class="text-center  border border-success rounded mt-2">
            <a href="#"><button class="btn btn-success m-2">FECHAR PEDIDO</button></a>
        </div>
    </div>
</div>
            <div class="container m-5 pr-5 d-flex justify-content-center">
                <p>Antes de fechar seu pedido prencha formulario para entrega</p>
            </div>

        <div class="row ">
            <div class="col-12 ">
                <div class="card">
                    @if(session('sucesses'))
                        <div class="alert alert-success height-2">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <p>{{session('sucesses')}}</p>
                        </div>
                    @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                    <div class="card-body">
                        <div class="container-fluid ">
                            <div class="row col-12 d-flex justify-content-center">
                                    <form action="{{route('adeesses.store')}}" method="POST">
                                        @csrf
                                        <div class="form-group text-center">
                                                <div class="form-group">
                                                
                                                    <div class="form-group">
                                                        <label>CIDADE</label>
                                                        <input type="text" class="form-control" id="city" name="city" placeholder="Cidade">
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label>BAIRRO</label>
                                                        <input type="text" class="form-control" id="district" name="district" placeholder="Bairro">
                                                    </div>

                                                        <label>RUA</label>
                                                        <input type="text" class="form-control" id="name" name="street" placeholder="Rua">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">NUMÉRO</label>
                                                        <input type="nunber" class="form-control" id="nunber" name="nunber" placeholder="digite seu numéro">
                                                    </div>
                                           
                                           
                                           
                                                <div class="form-group">
                                                    <label>CEP</label>
                                                    <input type="text" class="form-control" id="zipcod" name="zipcode" placeholder="cep">
                                                </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Enviar</button>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@stop
@section('css')

@endsection

@section('js')
@stop