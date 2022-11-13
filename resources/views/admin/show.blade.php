@extends('adminlte::page')

@section('title', 'Cart')

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
    @forelse ($data as $data)
    <div class="row"> 
        <div class="card justify-contente-center m-2 p-5">
            <div class="text-center">
                {{date('d-m-y H:i:s')}}
                <h2> Pedidos Realizados</h2>
                <h6>Estatus:{{$data->status}}</h6>
                <h6>PEDIDO-{{$data->id}}</h6>
                <h5>NOME DO CLIENTE<p>{{ $data->demanduser->name ?? $data->user_id}}</p></h5>
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
                        </tr>
                    </thead>
                    <tbody>
                        @php 
                         $total = 0;
                    
                        @endphp
                        @foreach($data->productId as $item)
                            <tr>
                                    <td>
                                        <span>{{$item->quanty}}</span>
                                    </td>    
                                    <td>{{$item->produtsIds->name}}</td> 
                                    <td>R$_{{$item->produtsIds->price}}</td>
                                    <td>R$_{{ number_format($item->produtsIds->price * $item->quanty,2,',','.')}}</td>
                                @php 
                                $total += $item->produtsIds->price * $item->quanty;
                                @endphp
                            
                            </tr>
                     
                        @endforeach
                    </tbody>
                </table>
           
                    <div class="card-body">
                        <div class="container-fluid ">
                            <div class="row col-12 d-flex justify-content-center">
                                <div class="m-2">
                                    <p class="text-center mb-0">TOTAL</p>
                                    <input type="text" name="total" value="R${{$total ?? ''}}" placeholder="TOTAL"
                                    style="width:120px; height:60px;" 
                                    disabled class="text-center  border border-success rounded ">
                               </div>
                                <div class="container m-1 pr-5 d-flex justify-content-center">
                                    <p><i>Endereço fornecido para entrega</i></p>
                                </div>
                                        <div class="form-group text-center">
                                            <div class="form-group">
                                                <label>CIDADE</label>
                                                <input type="text" class="form-control" id="city" value= "{{$data->demanduser->address->city ?? ''}}" name="city" placeholder="Cidade">
                                            </div> 
                                            
                                            <div class="form-group">
                                                <label>BAIRRO</label>
                                                <input type="text" class="form-control" id="district" value= "{{$data->demanduser->address->district ?? ''}}" name="district" placeholder="Bairro">
                                            </div>
    
                                            <div class="form-group">
                                                <label>RUA</label>
                                                <input type="text" class="form-control" id="name" value= "{{$data->demanduser->address->street ?? ''}}" name="street" placeholder="Rua">
                                            </div>
    
                                            <div class="form-group">
                                                <label>NUMÉRO</label>
                                                <input type="nunber" class="form-control" id="nunber" value= "{{$data->demanduser->address->nunber ?? ''}}" name="nunber" placeholder="digite seu numéro">
                                            </div>
                                             
                                             
                                            <div class="form-group">
                                                <label>CEL</label>
                                                <input type="tel" class="form-control" id="zipcod" value= "{{$data->demanduser->address->zipcode ?? ''}}"name="zipcode" placeholder="telefone">
                                            </div>
                                        </div>
                            </div>
                            <hr class="bg-green" style="height:5px;">
                        </div>
                    </div>   
    </div>
    @empty
    <div class="alert alert-warning">
        <h5>Não há Pedidos Para esta data</h5>
    </div>
    @endforelse
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

                  
                </div>
            </div>
        </div>

@stop
@section('css')

@endsection

@section('js')
{{-- <script>
     const buttondiagog = document.getElementById("button");
 const modal = document.querySelector("dialog");
 const button = document.getElementById("diag")

 buttondiagog.onclick = function() {
   
    modal.showModal()
     console.log(modal)
 }

 button.onclick = function(){
     modal.close()
 }
</script> --}}
@stop