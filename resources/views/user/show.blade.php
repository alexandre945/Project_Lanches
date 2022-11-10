
@extends('adminlte::page')

@section('title', 'Bebidas')

@section('content_header')

    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><strong>Escolha suas Bebidas aqui:</strong></h1>
            </div>
      
        </div>
    </div>
@stop

@section('content')
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-12 col">
                    <div class="card card-info">
                        <div class="card-header ">
                            <a href="{{route('user.index')}}" class="text-center">LANCHES</a>
                            <a href="{{route('comboIndex.show')}}" class="m-3">COMBOS</a>
                            <a href="{{route('drink.show')}}" class="m-3">BEBIDAS</a>
                            <a href="{{route('show.cart')}}"class="float-right" title="Ver suas Compras"><i class="fas fa-shopping-cart"></i></a>
                          
                        </div>
                        @if(session('message'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <p>{{session('message')}}</p>
                          </div>
                        @endif
                        @if(session('missage'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <p>{{session('missage')}}</p>
                          </div>
                        @endif
                        @if(session('success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <p>{{session('success')}}</p>
                          </div>
                        @endif
                        <div class="card-body">
                            @if (isset($product) && $product->isNotEmpty())
                                <table  class="table-responsive table-bordered table-sm">
                                    <thead>
                                        <tr>
                                            <th class="p-2">Name</th>
                                            <th class="p-2">Descrição</th>
                                            <th class="p-2">Preço</th>
                                            <th class="p-2">Adicionar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($product as $item)
                                        <tr>
                                            <th class="p-2">{{ $item->name }}</th>
                                            <th>
                                                <button type="button"class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$item->id}}">
                                                    DETALHES
                                                   </button>
                                                   
                                                   <!-- Modal -->
                                                   <div class="modal fade"id="exampleModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                     <div class="modal-dialog" role="document">
                                                       <div class="modal-content">
                                                         <div class="modal-header">
                                                           <h5 class="modal-title" id="exampleModalLabel">Ingredientes</h5>
                                                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                             {{-- <span aria-hidden="true">&times;</span> --}}
                                                           </button>
                                                         </div>
                                                             <div class="modal-body">
                                                                    <h4 class="text-center">{{$item->name}}</h4>
                                                                    {{$item->description}}
                                                             </div>
                                                             <div class="modal-footer">
                                                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                                             </div>
                                                       </div>
                                                     </div>
                                                   </div>



                                            </th>
                                            <th class="p-2">{{ $item->price }}</th>
                                            <td class="p-2">
                                                <form action="{{route('cart.store',$item->id)}}" method="POST" style="display: inline" >
                                                @method('Post')
                                                @csrf
                                                <button class="btn btn-primary" title="Adicionar ao carrinho">
                                                    <i class="fas fa-shopping-cart">Adicionar</i>
                                                </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div>
                                    <h5>Não existe Registro de Produtos</h5>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                {{-- @if (isset($data) && $data->isNotEmpty())
                    @if(count($data) == 1)
                        <p><strong>Foi encontrado 1 registro</strong></p>
                    @elseif($data->total() > $data->perPage())
                        <p><strong>Exibindo {{ count($data) }} de um total de {{ $data->total() }} registros</strong></p>
                    @else
                        <p><strong>Foram encontrados {{ count($data) }} registros</strong></p>
                    @endif
                    {!! $data->appends($_GET)->links() !!}
                @endif --}}
            </div>
        </div>
    </section>
@endsection
@section('css')
<style>
    
        img{
            border-radius: 8px;
            border:solid 2px black;
        }


</style>
@stop

@section('js')
@stop







