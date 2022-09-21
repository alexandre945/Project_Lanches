
@extends('adminlte::page')

@section('title', 'Lanches')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1><strong>Lanches</strong></h1>
        </div>
        <div class="">
            <div class=" d-flex justify-content-start">
                <a href="{{route('combo.create')}}" class="btn btn-info float-sm-right ml-3"><i class="fas fa-users"></i>Cadastrar-Combos</a>
                <a href="{{route('admin.create')}}" class="btn btn-info float-sm-right ml-3"><i class="fas fa-users"></i>Cadastrar-Lanche</a>
                <a href="{{route('drink.create')}}" class="btn btn-info float-sm-right ml-3"><i class="fas fa-users"></i>Cadastrar-Bebidas</a>
            </div>
        </div>
        
        </div>
    </div>
@stop

@section('content')
    <section class="content">
        <div class="container-fluid">
            {{--
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                          <h3 class="card-title">
                            Filtro
                          </h3>
                          <!-- tools box -->
                          <div class="card-tools">
                            <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                              <i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip"
                                    title="Remove">
                              <i class="fas fa-times"></i></button>
                          </div>
                          <!-- /. tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body pad">
                            <form action="{{ route('manifest.index') }}" method="GET">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Nome Titulo:</label>
                                            <input type="text" class="form-control" placeholder="Nome do Titulo" name="titulo">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Descrição</label>
                                            <input type="text" class="form-control" placeholder="Descrição" name="descrição">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Imagem</label>
                                            <input type="text" class="form-control" placeholder="Imagem" name="imagem">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label></label>
                                            <button type="submit" class="form-control btn btn-primary" style="margin-top: 6px">Procurar</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
             --}}
            <div class="row">
                <div class="col-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Listagem de Lanches</h3>
                            <a href="{{route('admin.index')}}" class="text-center ml-5">LANCHES</a>
                            <a href="{{route('combo.index')}}" class="m-3">COMBOS</a>
                            <a href="{{route('drink.index')}}" class="m-3">BEBIDAS</a>
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
                                <table class="table-responsive">
                                    <thead>
                                    <tr>
                                       
                                        <th>Name</th>
                                        <th>Descrição</th>
                                        <th>Preço</th>
                                        <th>Imagem</th>
                                        <th>Ação</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($product as $item)
                                        <tr class="p-2">
                                       
                                            <th>{{ $item->name }}</th>
                                            <th>{{ $item->description}}</th>
                                            <th>{{ $item->price }}</th>
                                            <td class="p-2">
                                                <img src="{{ asset('storage/'.$item->image) }}" style="width: 50px">
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.update',$item->id)}}" title="Editar" class="btn btn-primary"> <i class="fas fa-edit"></i> </a>
                                                <form action="{{route('admin.delete',$item->id)}}" method="POST" style="display: inline" >
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger" title="Excluir">
                                                    <i class="fas fa-trash-alt"></i>
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







