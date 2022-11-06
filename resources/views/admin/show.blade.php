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
                {{date('d-m-y')}}
                <h2> Pedidos Realizados</h2>
             <h6>Estatus:{{$data->status}}</h6>
                {{$data->user_id}}
                 <h5>NOME DO CLIENTE<p>{{ $users}}</p></h5>
                <h6>CRIADO EM: {{$data->created_at}}</h6>

            </div>
        </div>  
       
                <table class="table">
                    <thead>
                        <tr>
                         
                            <th>Quantidade</th>
                            <th>Produto</th>
                            <th>Valor Unitario</th>
                            <th>Sub-total</th>
                            <th>Total</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    
                        @foreach($data->productId as $item)
                            <tr>
                                 
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
                    <h5>Não há Pedidos </h5>
                </div>
            @endif
    
    </div>
</div>
            <div class="container m-5 pr-5 d-flex justify-content-center">
                <p>Endereço fornecido para entrega</p>
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
                               
                                {{-- @foreach($user as $data) --}}
                                      
                                        <div class="form-group text-center">

                                            <div class="form-group">
                                                <label>CIDADE</label>
                                                <input type="text" class="form-control" id="city" value= "{{$user->address->city}}" name="city" placeholder="Cidade">
                                            </div> 
                                            
                                            <div class="form-group">
                                                <label>BAIRRO</label>
                                                <input type="text" class="form-control" id="district" value= "{{$user->address->district}}" name="district" placeholder="Bairro">
                                            </div>

                                            <div class="form-group">
                                                <label>RUA</label>
                                                <input type="text" class="form-control" id="name" value= "{{$user->address->street}}" name="street" placeholder="Rua">
                                            </div>

                                            <div class="form-group">
                                                <label>NUMÉRO</label>
                                                <input type="nunber" class="form-control" id="nunber" value= "{{$user->address->nunber}}" name="nunber" placeholder="digite seu numéro">
                                            </div>
                                             
                                             
                                            <div class="form-group">
                                                <label>CEP</label>
                                                <input type="text" class="form-control" id="zipcod" value= "{{$user->address->zipcode}}"name="zipcode" placeholder="cep">
                                            </div>
                                        </div>
                                {{-- @endforeach     --}}
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