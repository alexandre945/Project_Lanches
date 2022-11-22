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
                    @if(session('message'))
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <div class="alert alert-danger">
                        <p>{{session('message')}}</p>
                    </div>
                    @endif
   
                <div class="row"> 
                    <div class="card justify-contente-center m-2 p-2 col-md-12 col-sm-4">
                        <div class="text-center">
                            <i><h2 class="font-bold"> Produtos do seu Carrinho</h2></i>
                            <h6>Seja Bem Vindo Sr.(a) . {{$users}}</h6>
                            <h6>Estatus:{{$data->status}}</h6>
                            <h5>PEDIDO: {{$data->id}}</h5>
                            <h6>CRIADO EM: {{$data->created_at}}</h6>

                        </div>
                    </div>  
                            <table class="table col-md-12 col-sm-4">
                                <thead>
                                    <tr>
                                        <th><i>Excluir</i></th>
                                        <th><i>Quantidade</i></th>
                                        <th><i>Produto</i></th>
                                        <th><i>Valor Unitario</i></th>
                                        <th><i>Sub-total</i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @php
                                        $total= 0;
                                        @endphp
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
                                                    @php
                                                        $total += $item->produtsIds->price * $item->quanty;
                                                    @endphp   
                                                <td>{{$item->produtsIds->name}}</td> 
                                                <td>R$_{{ number_format($item->produtsIds->price,2,',','.')}}</td>
                                                <td>R$_{{ number_format($item->produtsIds->price * $item->quanty,2,',','.')}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    <div class=" btn-group btn-group-justified">
                        <a href="{{route('user.index')}}"><button class="btn btn-success m-2">CONTINUAR COMPRANDO</button></a>
                        <div class="p-2">
                                <p class="text-center mb-0">TOTAL</p>
                                <input type="text" name="total" value="R${{ ($total != 0 && $total != '' ? number_format($total, 2, ',', '.') : '') }}" placeholder="TOTAL"
                                style="width:120px; height:60px;" 
                                disabled class="text-center  border border-success rounded ">
                        </div>
                            <form action="{{route('close.update',$data->id)}}" method="POST">
                                @csrf
                                    <button class="btn btn-success m-2">FECHAR PEDIDO</button>
                            </form>
                    
                    </div>
                    @else
                        <div class="alert alert-warning">
                            <h5>Seu Carrinho está vazio</h5>
                        </div>
                    @endif
                    
                </div>
    </div>
            <div class="container m-5 pr-5 d-flex justify-content-center">
                <p>Antes de fechar seu pedido prencha formulario para entrega,
                    Lembrando que se você já tem um endereço cadastrado, não é 
                    necesarío prencher novamente.
                </p>
            </div>
            <div class="container  pr-5 d-flex justify-content-center">
                <p></p>
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
                                                        <input type="text" class="form-control" id="city" name="city"  placeholder="Cidade">
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
                                                    <label>CEL</label>
                                                    <input type="tel" class="form-control" id="zipcod" name="zipcode" placeholder="cep">
                                                </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary" >Enviar</button>
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